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

(function(module) {
try {
  module = angular.module('policy');
} catch (e) {
  module = angular.module('policy', []);
}
module.run(['$templateCache', function($templateCache) {
  $templateCache.put('policy-archive.html',
    '<div class="col-xs-12 well" ng-controller="PolicyArchiveCtrl" style="background : white"><h1 class="pull-left"><i class="fa fa-file-text-o"></i> POLICIES</h1><h1 class="pull-right" style="margin-right : 20px"><a ng-click="toggleModal();"><i class="fa fa-filter"></i></a></h1><form><input class="form-control" type="text" placeholder="Search policies..." ng-focus="showPolicyList = true" ng-model="searchText"></form><div class="col-md-6" ng-repeat="cardColumn in cardContainer"><div class="col-xs-12" ng-repeat="letter in cardColumn" style="margin-top : 10px;background: #F8F8F8; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175)"><h1>{{letter}}</h1><div class="col xs-12" ng-repeat="post in posts[letter]|filter:searchText" style="background: #fff; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175); padding : 15px; margin : 15px"><h2><a ng-href="{{post.link}}" target="_blank"><i class="fa fa-file-text-o"></i> {{post.title}}</a></h2></div></div></div><div ng-show="showModal" id="keyboard" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display : block"><div ng-show="showModal" class="modal-dialog modal-sm"><div class="modal-content" style="margin-top : 50px;"><div class="modal-header"><i class="close fa fa-times" ng-click="toggleModal()"></i><h4 class="modal-title" id="myModalLabel">Filter by first letter</h4></div><div class="modal-body"><div class="col-xs-12 text-center" style="margin-top : 10px"><a ng-repeat="(character, disabled) in characters" ng-click="filterByLetter(character)" ng-disabled="disabled" class="btn btn-primary" style="width : 50px; margin-top : 10px; margin-left : 2px; margin-right : 2px">{{character}}</a> <a href="" class="btn btn-primary" style="width : 50px; margin-top : 10px" ng-click="filterByLetter(\'\')"><i class="fa fa-undo" style="font-size : 20px"></i></a></div></div></div></div></div></div>');
}]);
})();

(function(module) {
try {
  module = angular.module('policy');
} catch (e) {
  module = angular.module('policy', []);
}
module.run(['$templateCache', function($templateCache) {
  $templateCache.put('policy-single.html',
    '<div><h1 ng-if="selectedPolicy.title">{{selectedPolicy.title}}</h1><div class="col-xs-12"><button class="btn btn-default hidden-xs pull-right" onclick="window.print()" style="margin-bottom: 10px"><i class="fa fa-lg fa-print"></i></button><p>Published on {{selectedPolicy.date|date}}</p></div><div class="col-xs-12 well" style="background : white; border : 2px solid #ecf0f1"><table class="table table-striped"><tbody><tr ng-if="selectedPolicy.meta.subject !== \'\'"><td><strong>Subject</strong></td><td>{{selectedPolicy.meta.subject}}</td></tr><tr ng-if="selectedPolicy.meta.manual !== \'\'"><td><strong>Manual</strong></td><td>{{selectedPolicy.meta.manual}}</td></tr><tr ng-if="selectedPolicy.meta.effective_date !== \'\'"><td><strong>Effective Date</strong></td><td>{{selectedPolicy.meta.effective_date|date}}</td></tr><tr ng-if="selectedPolicy.meta.filing_instructions !== \'\'"><td><strong>Filling Instruction</strong></td><td>{{selectedPolicy.meta.filing_instructions}}</td></tr><tr ng-if="selectedPolicy.meta.policy_number !== \'\'"><td><strong>Policy Number</strong></td><td>{{selectedPolicy.meta.policy_number}}</td></tr><tr ng-if="selectedPolicy.meta.policy_revision !== \'\'"><td><strong>Policy Revision</strong></td><td>{{selectedPolicy.meta.policy_revision}}</td></tr><tr ng-if="selectedPolicy.meta.addendum_number !== \'\'"><td><strong>Addendum Number</strong></td><td>{{selectedPolicy.meta.addendum_number}}</td></tr><tr ng-if="selectedPolicy.meta.addendum_revision !== \'\'"><td><strong>Addendum Revision</strong></td><td>{{selectedPolicy.meta.addendum_revision}}</td></tr><tr ng-if="selectedPolicy.meta.city_manager_approval !== \'\'"><td><strong>City Manager Approval</strong></td><td>{{selectedPolicy.meta.city_manager_approval[0]}}</td></tr><tr ng-if="selectedPolicy.meta.issued_by !== \'\'"><td><strong>Issued By</strong></td><td>{{selectedPolicy.meta.issued_by}}</td></tr></tbody></table></div><p ng-if="selectedPolicy.content" ng-bind-html="selectedPolicy.content"></p><div id="comments" class="comments-area"><h2 class="comments-title" ng-if="commentsCount === 1">1 comment:</h2><h2 class="comments-title" ng-if="commentsCount > 1">{{commentsCount}} comments:</h2><ol class="comment-list"><li class="comment" ng-repeat="comment in comments" style="box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175)"><div class="comment-body"><div class="comment-meta"><div class="comment-author"><img src="{{comment.author.avatar}}" class="avatar"> <b class="fn">{{comment.author.name}}</b> <span class="says">says:</span></div><div class="comment-metadata"><time datetime="{{comment.date}}">{{comment.date|date:"medium"}}</time></div></div><div class="comment-content well" style="background : #fff"><p ng-bind-html="comment.content"></p></div><ol class="children well" ng-if="comment.comments"><li class="comment" ng-repeat="reply in comment.comments" style="box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175)"><div class="comment-body"><div class="comment-meta"><div class="comment-author"><img src="{{reply.author.avatar}}" class="avatar"> <b class="fn">{{reply.author.name}}</b> <span class="says">says:</span></div><div class="comment-metadata"><time datetime="{{reply.date}}">{{reply.date|date:"medium"}}</time></div></div><div class="comment-content well" style="background : #fff"><p ng-bind-html="reply.content"></p></div></div></li></ol><div class="reply" style="margin : 10px" ng-init="showReplyForm = false"><a ng-show="!showReplyForm" ng-click="showReplyForm = true" class="comment-reply-link">Reply</a> <a ng-show="showReplyForm" ng-click="showReplyForm = false" class="comment-reply-link">Cancel Reply</a></div><div id="respond" class="comment-respond" ng-if="showReplyForm"><h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" style="display:none;">Cancel reply</a></small></h3><form action="http://localhost:8888/flat-sassy-boots-theme/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate=""><p class="logged-in-as">Logged in as <a href="http://localhost:8888/flat-sassy-boots-theme/members/admin/profile/edit/">admin</a>. <a href="http://localhost:8888/flat-sassy-boots-theme/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Flocalhost%3A8888%2Fflat-sassy-boots-theme%2Fcoa-policies%2Fpark-policy%2F&amp;_wpnonce=45ba3f3bee" title="Log out of this account">Log out?</a></p><p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p><p class="form-allowed-tags" id="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p><p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="2058" id="comment_post_ID"> <input type="hidden" name="comment_parent" id="comment_parent" value="0"></p><input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="5a2124ebe8"><script>(function(){if(window===window.parent){document.getElementById(\'_wp_unfiltered_html_comment_disabled\').name=\'_wp_unfiltered_html_comment\';}})();</script></form></div></div></li></ol><div id="respond" class="comment-respond"><h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow" id="cancel-comment-reply-link" style="display:none;">Cancel reply</a></small></h3><form action="http://localhost:8888/flat-sassy-boots-theme/wp-comments-post.php" method="post" id="commentform" class="comment-form" novalidate=""><p class="logged-in-as">Logged in as <a href="http://localhost:8888/flat-sassy-boots-theme/members/admin/profile/edit/">admin</a>. <a href="http://localhost:8888/flat-sassy-boots-theme/wp-login.php?action=logout&amp;redirect_to=http%3A%2F%2Flocalhost%3A8888%2Fflat-sassy-boots-theme%2Fcoa-policies%2Fpark-policy%2F&amp;_wpnonce=45ba3f3bee" title="Log out of this account">Log out?</a></p><p class="comment-form-comment"><label for="comment">Comment</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-describedby="form-allowed-tags" aria-required="true"></textarea></p><p class="form-allowed-tags" id="form-allowed-tags">You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: <code>&lt;a href="" title=""&gt; &lt;abbr title=""&gt; &lt;acronym title=""&gt; &lt;b&gt; &lt;blockquote cite=""&gt; &lt;cite&gt; &lt;code&gt; &lt;del datetime=""&gt; &lt;em&gt; &lt;i&gt; &lt;q cite=""&gt; &lt;strike&gt; &lt;strong&gt; </code></p><p class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Post Comment"> <input type="hidden" name="comment_post_ID" value="2058" id="comment_post_ID"> <input type="hidden" name="redirect_to" value="http://localhost:8888/flat-sassy-boots-theme/coa-policies/#/lack-of-money-policy"> <input type="hidden" name="comment_parent" id="comment_parent" value="0"></p><input type="hidden" id="_wp_unfiltered_html_comment_disabled" name="_wp_unfiltered_html_comment" value="5a2124ebe8"><script>(function(){if(window===window.parent){document.getElementById(\'_wp_unfiltered_html_comment_disabled\').name=\'_wp_unfiltered_html_comment\';}})();</script></form></div></div></div>');
}]);
})();
