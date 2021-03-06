<?php
/**
 * The template for displaying policy archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Flat Sassy Boots
 */

get_header(); ?>

<div id="primary" ng-app = "policy" class="content-area container" style = "width : 100%;">
  <main id="main" class="site-main col-xs-12" role="main" style = "">
   <div class="col-xs-12 well" ng-controller = "PostArchiveCtrl" style = "background : rgb(52, 152, 219)">
    <!-- header -->
    <h1 class="pull-left" style = "color : #fff"><i class="fa {{archiveProperties[archiveSlug].iconClass}}"></i> {{archiveProperties[archiveSlug].title}}  </h1>
    <h3 class="pull-right visible-sm visible-md visible-lg hidden-xs" style = "margin-right : 20px; "><a ng-click = "toggleModal();" style = "color : #f39c12"><i class="fa fa-filter" style = "color : #f39c12"></i> Filter By Letter</a></h3>
    <h3 class="pull-right visilbe-xs hidden-sm hidden-md hidden-lg" style = "margin-right : 20px; "><a ng-click = "toggleModal();" style = "color : #f39c12"><i class="fa fa-filter" style = "color : #f39c12"></i></a></h3>
    <form>
      <input class = "form-control " type="text" placeholder = "Search ..." ng-focus = "showPolicyList = true" ng-model = "searchText">
    </form>

    <!-- cards -->
    <div class="col-md-6" ng-repeat = "cardColumn in cardContainer">
      <div class="col-xs-12" ng-repeat = "letter in cardColumn" style = "margin-top : 10px;background: #F8F8F8; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175)">
          <h1>{{letter}}</h1>
          <div class="col xs-12" ng-repeat = "post in posts[letter]|filter:searchText" style = "background: #fff; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.175); padding : 15px; margin : 15px">
            <h2><a ng-href="{{post.link}}" target = "_blank"> <i class="fa {{archiveProperties[archiveSlug].iconClass}}"></i> {{post.title}}</a></h2>
          </div>
      </div>
    </div>
    
    <!-- modal keyboard letter filter -->
    <div ng-show = "showModal" id = "keyboard" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style = "display : block">
      <div ng-show = "showModal" class="modal-dialog modal-sm">        
        <div class="modal-content" style = "margin-top : 50px;">
          <div class="modal-header">
            <i class="close fa fa-times" ng-click = "toggleModal()"></i>
            <h4 class="modal-title" id="myModalLabel">Filter By Letter</h4>
          </div>
          <div class="modal-body">
            <div class="col-xs-12 text-center" style = "margin-top : 10px">
              <a ng-repeat = "(character, disabled) in characters" ng-click = "filterByLetter(character)" ng-disabled="disabled" class = "btn btn-primary" style = "width : 50px; margin-top : 10px; margin-left : 2px; margin-right : 2px">{{character}}</a>
              <a href="" class = "btn btn-primary" style = "width : 50px; margin-top : 10px" ng-click = "filterByLetter('')" ><i class="fa fa-undo" style = "font-size : 20px"></i></a>
            </div>
          </div> 
        </div>
      </div> <!-- END modal-dialog -->
    </div> <!-- END modal -->
</div>
  </main> <!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>