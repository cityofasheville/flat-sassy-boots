// $( window ).resize(function() {
  
// });

// var adminBarHeight = $( "#wpadminbar" ).height();
// $(".navbar").css("margin-top", adminBarHeight); 


jQuery(document).ready(function($){

    var setNavbarMarginTopToHeightOfAdminBar = function(){
      var adminBarHeight = $( "#wpadminbar" ).height();
      $(".navbar").css("margin-top", adminBarHeight); 
    };
    //call it initially 
    setNavbarMarginTopToHeightOfAdminBar();
    //call it everytime the window resizes
    $( window ).resize(function() {
      setNavbarMarginTopToHeightOfAdminBar();
      if($("#home").height() < $(window).height()){
         $("#home").height($(window).height());
      }
      if($("#primary").height() < $(window).height()){
         $("#primary").height($(window).height());
      }
     
    });
    if($("#home").height() < $(window).height()){
         $("#home").height($(window).height());
      }
      if($("#primary").height() < $(window).height()){
         $("#primary").height($(window).height());
      }
    //$("#home").height($(window).height());
    $(document).ready(function(){
        $('.dropdown-toggle').dropdown()
    });

});


