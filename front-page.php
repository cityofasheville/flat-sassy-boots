<?php
/**
 * The template for displaying all pages.
 *
 * The is custom front page template
 *
 * @package Flat Sassy Boots
 */

get_header(); ?>

  <div id="primary" class="content-area" style = "width : 100%">
    <main id="main" class="site-main " role="main">

    <div id = "home"  style = "background-color : #3498db; width : 100%; margin : 0 auto; width : 100%;">
      <div class="col-xs-12">
        <div class="col-lg-6 col-lg-offset-1 col-md-7 col-md-offset-1 col-sm-9 col-sm-offset-1 col-xs-12">
          <h1 class="hidden-xs" style = "margin-top : 15%; color : #fff; font-size : 100px; font-weight : 700"><i class="fa fa-desktop"></i> ONE AVL</h1>
          <h2 class="hidden-xs" style = "color : #2c3e50">City of Asheville Intranet</h2>
          <h1 class="text-primary text-center visible-xs">City of Asheville Intranet</h1>

          <?php get_search_form( true ); ?> 
          <div class="col-xs-12 visible-md visible-lg hidden-xs visible-sm" style = "margin-top : 10px">
            <a class = "btn btn-primary" href="">EMPLOYEE DIRECTORY</a>
            <a class = "btn btn-primary" href="">EMPLOYEE SELF SERVICE</a>
            <div class="dropdown" style = "display : inline">
              <a class = 'text-muted dropdown-toggle btn btn-primary' href="" data-toggle="dropdown">APPS <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">MUNIS</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">ACCELA</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">MAXIMO</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">GIS</a></li>
              </ul>
            </div>
          </div>
          <div class="col-xs-12 text-center visible-xs hidden-sm hidden-md hidden-lg" style = "margin-top : 10px; margin-bottom : 30px">
            <a class = 'btn btn-info col-xs-12' style = "margin-bottom : 5px; opacity : 0.8" href="">EMPLOYEE DIRECTORY</a>
            <a class = 'btn btn-info col-xs-12' style = "margin-bottom : 5px; opacity : 0.8" href="">EMPLOYEE SELF SERVICE</a>
            <div class="dropdown col-xs-12" style = "padding : 0px; opacity : 0.8">
              <a class = 'btn btn-info dropdown-toggle col-xs-12' href="" data-toggle="dropdown">APPS <span class="caret"></span></a>
              <ul class="dropdown-menu text-center" role="menu" aria-labelledby="dropdownMenu1" style = "width : 100% ">
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">MUNIS</a></li>
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">ACCELA</a></li>
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">MAXIMO</a></li>
                <li class = "text-center" role="presentation"><a role="menuitem" tabindex="-1" href="#">GIS</a></li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div><!-- /.container -->

    <div class="container" style = "background : #1EA0DE; margin : 0 auto; width : 100%; min-height : 70px">
      <div class="col-lg-9" style = "background : #1EA0DE; padding : 20px; border-radius : 4px">
        <?php if (function_exists (rssshow)) rssshow(); ?>
      </div>
      <div class="col-lg-3 text-center">
        <a href="http://coablog.ashevillenc.gov/" target = "_blank">
          <img style = "margin : 0 auto; margin-top : 10px" src="http://coablog.avlcloud.com/wp-content/uploads/2014/12/city-source-logo-2.gif">
        </a>
      </div>
      
    </div><!-- /.container -->

    <div id = 'policies' class="container" style = "background : #2C3E50; margin : 0 auto; width : 100%;">
      <div class="col-xs-12" style = 'margin-top : 50px; padding : 30px'>
        <div class="col-xs-12" >
          <div class="col-lg-6">
            <h1 class = "" style = "">
              
              <span class="fa-stack fa-lg">
                <i style = "color : white" class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-file-text fa-stack-1x text-primary"></i>
              </span>
              <strong style = "color : white"> POLICIES</strong>
            </h1>
          </div>
        </div>
      
        <div class="col-xs-12" style = "background : white; border-radius : 4px; margin-top : 50px">
          <div id = "travel-policies" class="col-xs-12" style = " border : 3px solid #ecf0f1; border-radius : 6px; margin-bottom : 10px; margin-top : 10px">
            <h1 class="visible-xs text-center" style = "margin-bottom : 0px"><i class="fa fa-bed"></i></h1>
            <h3 class = "visible-xs text-center" style = 'border-bottom : 3px solid #2C3E50; padding : 5px'>Travel</h3>
            <h2 class = "hidden-xs"><i class="fa fa-bed"></i> Travel</h2>
             <?php 
                 
                $query = new WP_Query( array('category_name'=>'travel-policies', 'orderby'=>'title', 'order'=>'ASC'));
              
                // The Loop
                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<div class="col-xs-12 col-sm-6 col-md-4"> <div class="well col-xs-12">';
                    //the_content();
                    the_title( sprintf( '<h3 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); 
                    echo '</div></div>';
                  }
                }
            ?>
          </div>
          <div id = "motor-pool-policies" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-car"></i>  Motor Pool</h2>
            <a href="" class="col-lg-4 col-sm-6 text-center"><h5>Fleet Vehicles and Equipment</h5></a>
          </div>        
          <div id = "it-policies" class="col-lg-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-laptop"></i> IT</h2>
            <a href="" class="col-lg-4 col-sm-6 text-center"><h5>Internet Policy</h5></a>
            <a href="" class="col-lg-4 col-sm-6 text-center"><h5>Password Policy</h5></a>
            <a href="" class="col-lg-4 col-sm-6 text-center"><h5>Email Policy</h5></a>
          </div>       
          <div id = "building-policies" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-building-o"></i>  Building</h2>
            <a class="col-lg-4 col-sm-6 text-center" href=""><h5>City Hall Safe Access Guidelines</h5></a>
            <a class="col-lg-4 col-sm-6 text-center" href=""><h5>City Hall Building Evacuation Plan</h5></a>
            <a class="col-lg-4 col-sm-6 text-center" href=""><h5>Building Security Badges Policy and Procedures</h5></a>
          </div>
          <div id = "sustainability-policies" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-recycle"></i>  Sustainability</h2>
            <a class="col-lg-4 col-sm-6 text-center" href=""><h5>Fuel Conservation Policy</h5></a>
          </div>
          <div id = "finance-policies" class="col-xs-12" style = " border : 3px solid #ecf0f1; border-radius : 6px; margin-bottom : 10px">
            <h1 class="visible-xs text-center" style = "margin-bottom : 0px"><i class="fa fa-money"></i></h1>
            <h3 class = "visible-xs text-center" style = 'border-bottom : 3px solid #2C3E50; padding : 5px'>Finance</h3>
            <h2 class = "hidden-xs"><i class="fa fa-money"></i> Finance</h2>
             <?php 
              $categories = get_categories('child_of=193'); 
              foreach ($categories as $category) {
                $category_xssmheading = '<h4 class = "visible-xs visible-sm hidden-md hidden-lg col-xs-12 text-center">';
                $category_xssmheading .= $category->cat_name;
                $category_xssmheading .= '</h4>';
                $category_mdlgheading = '<h3 class = "hidden-xs hidden-sm visible-md visible-lg col-xs-12">';
                $category_mdlgheading .= $category->cat_name;
                $category_mdlgheading .= '</h3>';
                echo $category_xssmheading; 
                echo $category_mdlgheading; 
                $query = new WP_Query( array('category_name'=>$category->cat_name, 'orderby'=>'title', 'order'=>'ASC'));
              
                // The Loop
                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<div class="col-xs-12 col-sm-6 col-md-4"> <div class="well col-xs-12">';
                    //the_content();
                    the_title( sprintf( '<h3 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); 
                    echo '</div></div>';
                  }
                }
              }
            ?>
          </div>
          <div id = "human-resources-policies" class="col-xs-12" style = " border : 3px solid #ecf0f1; border-radius : 6px; margin-bottom : 10px">
            <h1 class="visible-xs text-center" style = "margin-bottom : 0px"><i class="fa fa-university"></i></h1>
            <h3 class = "visible-xs text-center" style = 'border-bottom : 3px solid #2C3E50; padding : 5px'>Human Resources</h3>
            <h2 class = "hidden-xs"><i class="fa fa-university"></i> Human Resources</h2>
            <?php 
              $categories = get_categories('child_of=192'); 
              foreach ($categories as $category) {
                $category_xssmheading = '<h4 class = "visible-xs visible-sm hidden-md hidden-lg col-xs-12 text-center">';
                $category_xssmheading .= $category->cat_name;
                $category_xssmheading .= '</h4>';
                $category_mdlgheading = '<h3 class = "hidden-xs hidden-sm visible-md visible-lg col-xs-12">';
                $category_mdlgheading .= $category->cat_name;
                $category_mdlgheading .= '</h3>';
                echo $category_xssmheading; 
                echo $category_mdlgheading; 
                $query = new WP_Query( array('category_name'=>$category->cat_name, 'orderby'=>'title', 'order'=>'ASC'));
              
                // The Loop
                if ( $query->have_posts() ) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<div class="col-xs-12 col-sm-6 col-md-4"> <div class="well col-xs-12">';
                    //the_content();
                    the_title( sprintf( '<h3 class="text-center"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); 
                    echo '</div></div>';
                  }
                }
              }
            ?>
          </div>
        </div>
      </div>
    </div><!-- /.container -->
    <div id = 'forms' class="container" style = "background : #18BC9C; margin : 0 auto; width : 100%;">
      <div class="col-xs-12" style = 'margin-top : 50px;  padding : 30px; padding-bottom : 60px'>
        <div class="col-xs-12" >
            <h1>
              <span class="fa-stack fa-lg">
                <i style = "color : white" class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-check-square-o fa-stack-1x text-success"></i>
              </span>
              <strong style = "color : white"> FORMS</strong>
            </h1>
        </div>
        <div class="col-lg-10 col-lg-offset-2">
          <a href="#travelforms" style = "color : white; margin-left : 20px"><h4 style = "display : inline">TRAVEL</h4></a> 
          <a href="#motorpoolforms" style = "color : white; margin-left : 20px"><h4 style = "display : inline">MOTOR POOL</h4></a> 
          <a href="#procurement-and-contract-forms" style = "color : white; margin-left : 20px"><h4 style = "display : inline">PROCUREMENT AND CONTRACTS</h4></a>

          <a href="#financeforms" style = "color : white; margin-left : 20px"><h4 style = "display : inline">FINANCE & PAYROLL</h4></a>
          <a href="#tax-forms" style = "color : white; margin-left : 20px"><h4 style = "display : inline">TAX</h4></a>  
          <a href="#humanresourcesforms" style = "color : white; margin-left : 20px"><h4 style = "display : inline">HUMAN RESOURCES</h4></a> 
        </div>
         <div class="col-xs-12" style = "background : white; border-radius : 4px; margin-top : 50px">
          <div id = "travelforms" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-bed"></i> Travel</h2>
            <a class="col-lg-4" href=""><h5>Travel Expense Form</h5></a>
            <a class="col-lg-4" href=""><h5>Travel Authorization Form</h5></a>
            <a class="col-lg-4" href=""><h5>Instructions for Travel Expense Form </h5></a>   
          </div>
          <div id = "motorpoolforms" class="col-xs-12" >
            <h2 style = 'margin-top : 70px;'><i class="fa fa-car"></i>  Motor Pool</h2>
            <a href="" class="col-lg-4"><h5>Monthly Mileage Form</h5></a>
            <a href="" class="col-lg-4"><h5>Acceptance Form for  WEX Gas Card </h5></a>
          </div>        
          <div id = "procurement-and-contract-forms" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-credit-card"></i>  Procurement and Contracts</h2>
            <a class="col-lg-4" href=""><h5>Procurement Card Enrollment Form</h5></a>
            <a class="col-lg-4" href=""><h5>Billing Requisition</h5></a>
            <a class="col-lg-4" href=""><h5>Procurement Card Enrollment Form</h5></a>
            <a class="col-lg-4" href=""><h5>Construction Contract Check Request and Sales Tax Affidavit</h5></a>
            <a class="col-lg-4" href=""><h5>Contract Change Order</h5></a>
            <a class="col-lg-4" href=""><h5>Rental Agreement Authorization Form</h5></a>
            <a class="col-lg-4" href=""><h5>Minority Business Forms ( Other than Bldg Construction) Revised February 2014</h5></a>
            <a class="col-lg-4" href=""><h5>Construction Contract Check Request and Sales Tax Affidavit</h5></a>
            <a class="col-lg-4" href=""><h5>IPS Posting Request Form</h5></a>
            <a class="col-lg-4" href=""><h5>Construction Bid Advertisement to Post on IPS Site</h5></a>
            <a class="col-lg-4" href=""><h5>Evaluator Responsibilities Agreement</h5></a>
            <a class="col-lg-4" href=""><h5>Lien Waiver Form</h5></a>
            <a class="col-lg-4" href=""><h5>Notice of Award Form</h5></a>
            <a class="col-lg-4" href=""><h5>Notice to Proceed Letter Form</h5></a>
            <a class="col-lg-4" href=""><h5>Procurement Bid Advertisement to Post on IPS Site</h5></a>
            <a class="col-lg-4" href=""><h5>General Services Bid Advertisement</h5></a>
            <a class="col-lg-4" href=""><h5>Worker's Compensation Waiver Form</h5></a>
            <a class="col-lg-4" href=""><h5>Sales and Use Taxes Form sample</h5></a>
            <a class="col-lg-4" href=""><h5>Instructions for Sales and Use Taxes Form</h5></a>
            <a class="col-lg-4" href=""><h5>E-Verify Affidavit (Word version for bids)</h5></a>
          </div>
          <div id = "financeforms" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-money"></i>  Finance & Payroll</h2>
            <a class="col-lg-4" href=""><h5>Direct Deposit Form</h5></a>
            <a class="col-lg-4" href=""><h5>Payroll Change Form</h5></a>
            <a class="col-lg-4" href=""><h5>Payroll Correction Form</h5></a>
            <a class="col-lg-4" href=""><h5>Payroll Adjustment Form</h5></a>
          </div>
          <div id = "tax-forms" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-calculator"></i>  Tax</h2>
            <a class="col-lg-4" href=""><h5>W-9 Tax Form</h5></a>
            <a class="col-lg-4" href=""><h5>NC-4 EZ Tax Form</h5></a>
            <a class="col-lg-4" href=""><h5>Authorization to Electronically Deliver IRS Form W-2</h5></a>
            <a class="col-lg-4" href=""><h5>W-4 Form</h5></a>
          </div>
          <div id = "humanresourcesforms" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-university"></i> Human Resources</h2>
            <a href="" class="col-lg-4"><h5>Personnel Action Form (Updated 3.1.13)</h5></a>
            <a href="" class="col-lg-4"><h5>Change from Overtime to Compensatory Leave Accrual Agreement Form</h5></a>
            <a href="" class="col-lg-4"><h5>Change from Compensatory Leave Accrual to Overtime Compensation Agreement Form</h5></a>
            <a href="" class="col-lg-4"><h5>FMLA Request- Family Member's Serious Health Condition Leave Form</h5></a>
            <a href="" class="col-lg-4"><h5>FMLA Request - Employee's Serious Health Condition Leave Form</h5></a>
            <a href="" class="col-lg-4"><h5>Extended Medical Leave Form for Family Member</h5></a>
            <a href="" class="col-lg-4"><h5>Extended Medical Leave Form for Employee</h5></a>

            <a href="" class="col-lg-4"><h5>Secondary Employment Request</h5></a>
            <a href="" class="col-lg-4"><h5>Sick Leave Bank Application</h5></a>
            <a href="" class="col-lg-4"><h5>Grievance Form</h5></a>
            <a href="" class="col-lg-4"><h5>Allstate Wellness Claim Form</h5></a>
            <a href="" class="col-lg-4"><h5>EAN Referral Agreement</h5></a>
            <a href="" class="col-lg-4"><h5>General Retirement Form</h5></a>

            <a href="" class="col-lg-4"><h5>Avesis Eye Claim Form</h5></a>
            <a href="" class="col-lg-4"><h5>Delta Dental Form</h5></a>
            <a href="" class="col-lg-4"><h5>Injury Exposure Report</h5></a>
            <a href="" class="col-lg-4"><h5>Reasonable Suspicion (DFW) Form</h5></a>
            <a href="" class="col-lg-4"><h5>ADA Form</h5></a>
            <a href="" class="col-lg-4"><h5>Background Auth. Check Form</h5></a>
            <a href="" class="col-lg-4"><h5>Reference Check Form</h5></a>
            <a href="" class="col-lg-4"><h5>Confidentiality Agreement for Interviews</h5></a>
            <a href="" class="col-lg-4"><h5>Asheville Way Awards Individual Nomination form</h5></a>
            <a href="" class="col-lg-4"><h5>Asheville Way Awards Team Nomination form</h5></a>
            <a href="" class="col-lg-4"><h5>Name & Address Change Forms</h5></a>
            <a href="" class="col-lg-4"><h5>Change of Address</h5></a>
            <a href="" class="col-lg-4"><h5>401K Change Form (Required)</h5></a>
            <a href="" class="col-lg-4"><h5>Pension Change Form (Required)</h5></a>
            <a href="" class="col-lg-4"><h5>I-9 Form (Required / See HR)</h5></a>
          </div>
        </div>
      </div>
    </div><!-- /.container -->
    <div id = 'howto' class="container" style = "background : #3498DB; margin : 0 auto; width : 100%;">
      <div class="col-xs-12" style = 'margin-top : 50px'>
        <div class="col-xs-12" >
          <div class="col-lg-6">
            <h1 class = "" style = "">
              <span class="fa-stack fa-lg">
                <i style = "color : white" class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-question fa-stack-1x text-info"></i>
              </span>
              <strong style = "color : white"> HOW-TO</strong>
            </h1>
          </div>
        </div>
        <div class="col-lg-10 col-lg-offset-2">
          <a href="#travel-how-to" style = "color : white; margin-left : 20px"><h4 style = "display : inline">TRAVEL</h4></a> 
          <a href="#motorpool-how-to" style = "color : white; margin-left : 20px"><h4 style = "display : inline">MOTOR POOL</h4></a> 
          <a href="#it-policies-how-to" style = "color : white; margin-left : 20px"><h4 style = "display : inline">IT</h4></a>
        </div>
        <div class="col-xs-12" style = "background : white; border-radius : 4px; margin-top : 50px">
          <div id = "travel-how-to" class="col-xs-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-bed"></i> Travel</h2>
            <a href=""><h3>What forms do I need to fill out to travel?</h3></a>
            <a href=""><h3>How do I get reimbursed for travel expenses?</h3></a> 
          </div>
          <div id = "motorpool-how-to" class="col-xs-12" >
            <h2 style = 'margin-top : 70px;'><i class="fa fa-car"></i>  Motor Pool</h2>
            <a href=""><h3>How do I schedule a city owned vehicle?</h3></a>
          </div>
          <div id = "it-policies-how-to" class="col-lg-12">
            <h2 style = 'margin-top : 70px;'><i class="fa fa-laptop"></i> IT</h2>
            <a href=""><h3>How do I make a help desk request?</h3></a>
          </div> 
        </div>
        <h1 class = "text-center" style = "color : white"><strong>Can't find a how-to?</strong></h1>
        <h1 class = "text-center" style = "color : white"><a href="" class = "btn btn-primary">Submit a How-To Request!</a></h1>
      </div>
    </div>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php get_footer(); ?>
