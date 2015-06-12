//instatiate an AngularJS module and inject an dependancy modules
angular.module('policy', ['ngSanitize'])
  .run( ['$http','$rootScope', function($http, $rootScope) {
    $http.defaults.headers.common['X-WP-Nonce'] = wpUrl.nonce;
    // Variables defined by wp_localize_script

    $rootScope.wpUrl = wpUrl.root;
    console.log($rootScope.wpUrl);
   
  }])
  .controller('PostArchiveCtrl', ['$scope', '$filter', 'Posts',
   function ($scope, $filter, Posts) {

    $scope.archiveSlug = "";
    
    var urlArray = window.location.pathname.split('/');
    for (var i = urlArray.length - 1; i >= 0; i--) {
      if(urlArray[i] !== ''){
        $scope.archiveSlug = urlArray[i];
        break;
      }
    };

    $scope.archiveProperties = {
      'coa-policies' : {'title' : 'POLICIES', 'iconClass' : 'fa-file-text-o'},
      'coa-forms' : {'title' : 'FORMS', 'iconClass' : 'fa-check-circle-o'},
      'coa-projects' : {'title' : 'PROJECTS', 'iconClass' : 'fa-line-chart'}
    }




    $scope.characters = {'#' : true,'A' : true,'B' : true,'C' : true,'D' : true,'E' : true,'F' : true,'G' : true,'H' : true,'I' : true,'J' : true,'K' : true,'L' : true,'M' : true,'N' : true,'O' : true,'P' : true,'Q' : true,'R' : true,'S' : true,'T' : true,'U' : true,'V' : true,'W' : true,'X' : true,'Y' : true,'Z' : true};

    $scope.searchText = "";
    $scope.showModal = false;
    $scope.posts = {};
    $scope.postsSource = {};
    $scope.cardContainerSource = {};


    $scope.toggleModal = function(){
      $scope.showModal = !$scope.showModal;
    };

    $scope.filterByLetter = function(letter){
      var newCardContainer = [];
      for (var i = 0; i < $scope.cardContainerSource.length; i++) {
        var tempArray = $filter('filter')($scope.cardContainerSource[i], letter);
        newCardContainer.push(tempArray);
      }
      $scope.cardContainer = newCardContainer;
      $scope.toggleModal()
    };

    Posts.getPosts($scope.archiveSlug)
      .then(function(posts){
        
       
        $scope.posts = {};
        
        for (var i = 0; i < posts.length; i++) {
          var firstLetter = posts[i].title.charAt(0).toUpperCase();
          if($scope.posts[firstLetter] === undefined){
            $scope.posts[firstLetter] = [{'title' : posts[i].title, 'link' : posts[i].link}]
          }else{
            $scope.posts[firstLetter].push({'title' : posts[i].title, 'link' : posts[i].link})
          }
        };

        $scope.postsSource = $scope.posts;

        var keys = _.keys($scope.posts).sort();
        
        $scope.cardContainer = [];

        var arraySize = Math.floor(keys.length/2);

        while (keys.length > 0){
          $scope.cardContainer.push(keys.splice(0, arraySize));
        }

        $scope.cardContainerSource = $scope.cardContainer;
        
        for (var c = 0; c < $scope.cardContainer.length; c++) {
          for (var x = 0; x < $scope.cardContainer[c].length; x++) {
            $scope.characters[$scope.cardContainer[c][x]] = false;
          };
        };
      })

    //watch the search input text and filter the card container by the first letter
    $scope.$watch('searchText' , function(searchText){
      var newCardContainer = [];
      for (var i = 0; i < $scope.cardContainerSource.length; i++) {
        var tempArray = $filter('filter')($scope.cardContainerSource[i], searchText.charAt(0).toUpperCase());
        newCardContainer.push(tempArray);
      };
      $scope.cardContainer = newCardContainer;
    })
  }])
  .factory('Posts', ['$rootScope', '$http', '$q', 
    function($rootScope, $http, $q){

    var Posts = {};

    Posts.getPosts = function(type){
      console.log(type);
      var q = $q.defer();
      var url = $rootScope.wpUrl + "/wp-json/posts";
      var params = {
        type : type
      };
      console.log(url);
      $http({method : 'GET', url : url, params : params, cache : true})
        //callbacks
        .success(function(data, status, headers, config){
          if(data.error){
              console.log(data.error.code);
          }else{
              console.log(data);
              q.resolve(data);
          }
        })
        .error(function(error){
            console.log('Error getting posts');
            console.log(error);
        });
      return q.promise;
    }

    //****Return the factory object****//
    return Posts; 
    
  }]); //END Posts factory function
