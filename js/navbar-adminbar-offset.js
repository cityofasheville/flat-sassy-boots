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
      $("#home").height($(window).height() - 150);
    });
    $("#home").height($(window).height() - 150);


});

