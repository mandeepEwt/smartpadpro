<?php

require_once __DIR__ . '/vendor/autoload.php';
require __DIR__.'/app/bootstrap.php';

add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

function mycustom_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );

return $form;
}

function pricing_calculator()
{
	$class="";
	$pagename = get_query_var('pagename');  
	if( $pagename != "pricing" ||  $pagename != "pricing-new"){
		$class="newtest";
	}
	// WOrks if user do sign up from pricing page
	$pricing_amount 			= ( isset($_SESSION["pricing_amount"])?$_SESSION["pricing_amount"]:'' );
	$count_users 				= ( isset($_SESSION["count_users"])?$_SESSION["count_users"]:2 );
	$count_licences 			= ( isset($_SESSION["count_licences"])?$_SESSION["count_licences"]:1 );
	$task_per_user 				= ( isset($_SESSION["task_per_user"])?$_SESSION["task_per_user"]:"00" );
	$chat_per_user 				= ( isset($_SESSION["chat_per_user"])?$_SESSION["chat_per_user"]:"00" );
	$dash_per_store 			= ( isset($_SESSION["dash_per_store"])?$_SESSION["dash_per_store"]:"00" );
	$master_console_per_store 	= ( ( isset($_SESSION["master_console_per_store"]) && ($_SESSION["master_console_per_store"] == 400) )?"checked":"" );
	
	if( isset($_SESSION) ){
		// Destroy Session
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
		unset($_SESSION);
	}
	
	$data = '	
	<style>
    .hero_section ,.div_bottom_arrow{
    position:relative;
    background-color:#229bde;
    width:100% !important;
	text-align: center;
    font-family: poppins;
    color : white;
	padding-left : 40px;
	padding-right : 40px;
	border-radius : 10px;
}


.div_bottom_arrow:after {
    content:" ";
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    margin: 0 auto;
    width: 0;
    height: 0;
    border-top: solid 15px #229bde;
    border-left: solid 50px transparent;
    border-right: solid 50px transparent;
}
.div_bottom_arrow
{
	margin-bottom : 20px;
}
.rangeslider__fill
{
	background: #06e9ed;
}
.hero_section label
{
	color : white;
}
.pricing_calculator_divider
{
	border-top : 2px solid #57b3e6;
}
.marginB25
{
	margin-bottom : 25px;
}
.marginB15
{
	margin-bottom : 15px;
}
.paddingB15
{
	padding-bottom : 15px;
}
.range-number
{
	margin-top : 10px;
}
span.slider-number
{ 
  font-weight : bold;
}
.pricing_label
{   
     float: left;
    word-spacing: 2px;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 12px;
}
.pricing_main_head
{
    font-size: 34px;
    font-weight: 600;
}
.mid-heading-blue
{
	color: #229bde !important;
    font-size: 17px;
    font-weight: 700;
    font-family: poppins;
}
.midsub-heading-black
{
	    margin-bottom: 33px;
    color: #717171;
    font-size: 14px;
    font-weight: 500;
    font-family: poppins;
}
.optional_features_heading
{
	color: #666666;
    font-weight: 600;
    font-size: 15px;
    font-family: poppins;
    opacity: .9;
	text-align: left;
}
.premium_feature_box
{
	text-align: center;
    padding: 20px;
	box-shadow: 0px 0px 10px 0px rgba(160, 160, 160, 0.3);
    border: none;
    margin-top: 0px;
}
body .show_data {
text-align: center;
    background: #fbfbfb;
    border-radius: 25px;
    text-shadow: 0 1px 0 #f3f3f3;
    border-color: #ddd;
    border-width: 1px;
    border-style: solid;
    color: #229bde !important;
    width: 70px;
    height: 35px;
    opacity: 0.7;
    text-align: left;
    /* box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2); */
    padding-top: 5px;
    font-size: 18px;
    font-weight: 600;
	padding-left: 15px;
    font-family: poppins;
	margin-top : 0px;
}
.addbutton {
    position: absolute;
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-bottom: 6px solid #333333;
    display: inline-block;
    margin-left: 0px;
    margin-top: 10px;
    margin-bottom: 10px;
    /* cursor: pointer; */
    opacity: 1;
    z-index: 1;
    border-radius: 10px;

}
.minbutton {
    width: 0;
    height: 0;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    border-top: 6px solid #333333;
    display: inline-block;
    margin-left: 6px;
   margin-top: -16px;
    margin-left: -27px;
    cursor: pointer;
    position: absolute;
	border-radius: 10px;
}
body .slider::-webkit-slider-thumb
{
	box-shadow :  1px 1px 12px 1px rgba(6, 233, 237, 0.7);
	background-color: #06e9ed;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    border: 3px solid white;
}
#count_users::-webkit-slider-thumb
{
	 width: 40px;
    height: 40px;
}
.top_box
{
	margin-top : 36px;
}
.top_box .addbutton , .top_box .minbutton
{
	margin-left : 0;
}
.top_box .show_data
{
	opacity : 1;
	box-shadow : none;
}
body .wpcf7 input[type=range] {
    width: 100%;
}
span.slider-number{
	font-size:16px;
}
.pricing_label{
	margin-bottom:0px;
}
.top_box .addbutton, .top_box .minbutton {
    margin-left: 10px;
}
.top_box span.up, .top_box span.down, .premium_feature_box span.up, .premium_feature_box span.down{
	position: relative;
    width: 50px;
    display: block;
}

.premium_feature_box .addbutton, .premium_feature_box .minbutton {
    right: -10px;
}
.dummy-bar {
	width:55%;
}
@media (max-width:767px){
	.section-content.pricing-cal{
		padding:0px;
	}
}
</style><form action="/signup" method="post"><div class="bg-white section-content pricing-cal">
<div class="container">
<div class="imp_fields"  style="max-width: 600px; margin: 0 auto;">
<input type="hidden" name="post_pricing_values" value="1">
<input type="hidden" name="pricing_amount" class="pricing_amount" value="'.( !empty($pricing_amount)?$pricing_amount:"299" ).'">

<div class="hero_section">
     <div class="row ptop-30 font-25 font-bold" >
          <div class="col-lg-8 col-md-6 col-6 text-right">
               <label class="pricing_main_head font-34"> Monthly Cost </label> 
          </div>
          <div class="col-4 col-md-6 col-6"><div id="total_amount" class="white-text pricing_main_head font-34">$ <span> '.( !empty($pricing_amount)?$pricing_amount:"299" ).' </span></div></div>
     </div> <hr class="pricing_calculator_divider">
     <div class="marginB25 font-16">*Prices in AUD Excluding GST <br></div>
    
     <div class="row marginB15">
	 	<div class="col-sm-10">
	 	<div><label class="pricing_label font-16"> Number of Users </label> </div>
		<div class="slidecontainer">	
			  		<input type="range" min="2" max="200" value="'.$count_users.'" class="slider" id="count_users" name="count_users" data-show-value="true" oninput="updateTextInput(this.value , \'no_of_users\',\'count-users-hidden\');" >		<div class="range-number"><span style="float: left;" class="slider-number"> 2</span> <span style="float: right;" class="slider-number"> 200</span></div>
					 </div>
					 
		</div>
		<div class="col-sm-2 top_box">
		 <span class="up" onclick="change_range_value_up(\'no_of_users\' , \'count_users\' ,  \'no_of_users\',\'count-users-hidden\' , 200);"> <div class="addbutton"></div></span>
		  <div id="no_of_users" class="show_price show_data"> '.$count_users.' </div>
    
		   <span class="down" onclick="change_range_value_down(\'no_of_users\' , \'count_users\' ,  \'no_of_users\',\'count-users-hidden\' , 2);"><div class="minbutton"></div></span> 
		</div>
	 </div>
	 


    <div class="row font-bold paddingB15">
          <div class="col-sm-10">
               <div><label class="pricing_label font-16"> Number of Stores/Accounts</label> </div>
			   <div class="slidecontainer">
				   
                   <input type="range" min="1" max="100" value="'.$count_licences.'" class="slider" name="count_licences" id="count_licences" oninput="updateTextInput(this.value , \'no_of_stores\',\'count-licences-hidden\');"> 
				   <div class="range-number"><span style="float: left;" class="slider-number"> 1</span> <span style="float: right;" class="slider-number"> 100</span></div>
				   
				</div>
          </div>
		  <div class="col-sm-2 top_box">
		  <span class="up" onclick="change_range_value_up(\'no_of_stores\' , \'count_licences\' ,  \'no_of_stores\',\'count-licences-hidden\' , 100);">  <div class="addbutton"></div> </span> 
		  <div id="no_of_stores" class="show_store show_data"> '.$count_licences.' </div>  <span class="down" onclick="change_range_value_down(\'no_of_stores\' , \'count_licences\' ,  \'no_of_stores\',\'count-licences-hidden\' , 1);"> <div class="minbutton"></div> </span> </div>
          <div class="col-lg-5">
               </div>
				
          </div> </div>
		  </div>
		  <div class="div_bottom_arrow"></div>
		<br>
		<h5 class="text-center color-blue mid-heading-blue"> Current Optional Premium Features </h3>
		<p class="text-center midsub-heading-black" >Also available as in system purchases</p>
		<div class="premium_feature_box">
	
	<div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 text-left">
               <label class="optional_features_heading"> Manual and Automated Task Management Per User </label> 
          </div>
          <div class="col-lg-5 col-md-10 col-sm-10 col-8">
               <div class="slidecontainer">	
			   		
                    <input type="range" min="0" max="200" value="'.$task_per_user.'" class="slider" name="task_per_user" id="task_per_user" oninput="updateTextInput(this.value , \'automatic_task\',\'task-per-user-hidden\');">
               </div>
			   </div>
			   <div class="col-lg-2 col-md-2 col-sm-2 col-4"> <span class="up" onclick="change_range_value_up(\'automatic_task\' , \'task_per_user\' ,   \'automatic_task\',\'task-per-user-hidden\' , 200);">  <div class="addbutton"></div> </span> 
		  <div id="automatic_task" class="show_price show_data"> '.$task_per_user.' </div> <span class="down" onclick="change_range_value_down(\'automatic_task\' , \'task_per_user\' ,   \'automatic_task\',\'task-per-user-hidden\' , 0);"> <div class="minbutton"></div></span></div>
          </div>
 	 
	  
	 <div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 text-left ">
               <label class="optional_features_heading"> Admin Performance Dashboard and Analytics Per Store </label> 
          </div>
          <div class="col-lg-5 col-md-10 col-sm-10 col-8">
               <div class="slidecontainer">	
				    
                    <input type="range" min="0" max="200" value="'.$chat_per_user.'" class="slider" name="chat_per_user" id="chat_per_user" oninput="updateTextInput(this.value , \'video_chat\',\'chat-per-user-hidden\');">
               </div>
          </div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-4">
				<span class="up" onclick="change_range_value_up(\'video_chat\' , \'chat_per_user\' ,\'video_chat\',\'chat-per-user-hidden\' , 200);">  <div class="addbutton"></div> </span> 
		  <div id="video_chat" class="show_price show_data"> '.$chat_per_user.' </div><span class="down" onclick="change_range_value_down(\'video_chat\' , \'chat_per_user\' ,\'video_chat\',\'chat-per-user-hidden\' , 0);"> <div class="minbutton"></div></span> 
			</div>
     </div>
	 
	  <div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 col-md-10 col-sm-10 col-8 text-left">
               <label class="optional_features_heading"> Master Console for Dashboard Control of Multiple Stores </label> 
          </div>
		  <div id="multiple_stores" class="show_price show_data hidden"> 0 </div>
          <div class="col-lg-5 col-md-2 col-sm-2 col-4">
               <div class="slidecontainer">	
					<div class="custom-control custom-checkbox" style="display: block;">
					 <input type="checkbox" value="400" name="master_console_per_store" '.$master_console_per_store.' class="master_console_per_store custom-control-input" id="master_console_per_store" oninput="updateTextInput(this, \'multiple_stores\',\'master-console-per-store-hidden\');">
					  <label class="custom-control-label" for="master_console_per_store"></label>
					</div>
               </div>
          </div>
     </div>
	 <div class="optional_coming_soon">
	 <div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 text-left">
               <label class="optional_features_heading"> Intrenal Team messaging Video chat system Per User</label> 
          </div>
		  
          <div class="col-lg-5 col-md-10 col-sm-10 col-12">
               <div class="slidecontainerdummy">	
			   		<div class="dummy-cs"> Coming Soon </div><div class="dummy-bar"></div>
                    
               </div>
          </div>
		  <div class="col-lg-2 col-md-2 col-sm-2 col-2"> <span class="up" onclick="change_range_value_up(\'dashboard_analytics\' , \'dash_per_store\' , \'dashboard_analytics\',\'dash-per-store-hidden\' , 100);">  <div class="addbutton"></div> </span>  
		  <div id="dashboard_analytics" class="show_price show_data"> 00 </div><span class="down"> <div class="minbutton"></div></span></div>
     </div>
	 
	 <div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 text-left">
              <label class="optional_features_heading"> Send Customised Quote links, Clients can View, Accept, Chat and Pay Deposits Instantly through their personal online link</label> 
          </div>
		  
          <div class="col-lg-5 col-md-10 col-sm-10 col-12">
               <div class="slidecontainer">	
			   		
                    <div class="dummy-cs"> Coming Soon </div><div class="dummy-bar"></div>
               </div>
          </div>
		  <div class="col-lg-2 col-md-2 col-sm-2 col-2"> <span class="up" onclick="change_range_value_up(\'dashboard_analytics\' , \'dash_per_store\' , \'dashboard_analytics\',\'dash-per-store-hidden\' , 100);">  <div class="addbutton"></div> </span>  
		  <div id="dashboard_analytics" class="show_price show_data"> 00 </div><span class="down"> <div class="minbutton"></div></span></div>
     </div>
	 
	 <div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 text-left">
               <label class="optional_features_heading">Create Customised Reports and Schedules to Automatically send reports to teams or individuals</label> 
          </div>
		  
          <div class="col-lg-5 col-md-10 col-sm-10 col-12">
               <div class="slidecontainer">	
			   		
                     <div class="dummy-cs"> Coming Soon </div><div class="dummy-bar"></div>
               </div>
          </div>
		  <div class="col-lg-2 col-md-2 col-sm-2 col-2"> <span class="up" onclick="change_range_value_up(\'dashboard_analytics\' , \'dash_per_store\' , \'dashboard_analytics\',\'dash-per-store-hidden\' , 100);">  <div class="addbutton"></div> </span>  
		  <div id="dashboard_analytics" class="show_price show_data"> 00 </div><span class="down"> <div class="minbutton"></div></span></div>
     </div>
	 
	 <div class="row font-bold margin-bottom-20">
          <div class="col-lg-5 text-left">
              <label class="optional_features_heading"> Create and Send Customised E mail Marketing direct from Smartpad Pro to your Clients, with inbuilt Auto Scheduling, and rule based targeting, get the right message to the right client every single time </label> 
          </div>
		  
          <div class="col-lg-5 col-md-10 col-sm-10 col-12">
               <div class="slidecontainer">	
			   		
                     <div class="dummy-cs"> Coming Soon </div><div class="dummy-bar"></div>
               </div>
          </div>
		  <div class="col-lg-2 col-md-2 col-sm-2 col-2"> <span class="up" onclick="change_range_value_up(\'dashboard_analytics\' , \'dash_per_store\' , \'dashboard_analytics\',\'dash-per-store-hidden\' , 100);">  <div class="addbutton"></div> </span>  
		  <div id="dashboard_analytics" class="show_price show_data"> 00 </div><span class="down"> <div class="minbutton"></div></span></div>
     </div>
	 
	 <div class="row" style="text-align : center;"><input type="submit" name="submit" class="btn gradient_green_blue white-text '.$class.'" style="margin: 0 auto;" value="SIGN UP NOW"></div>
	 </div>
	 
</div> </div>
	
</div></form>
';
return $data;
}
add_shortcode('pricing_calculator' , 'pricing_calculator'); 

// To create page shortcode by id
function include_pageContent( $atts, $content = null ) {
	extract(shortcode_atts(array( // a few default values
	   'id' => '')
	   , $atts));
	   get_page_content($id);
}
add_shortcode('page_shortcode', 'include_pageContent');

function get_page_content($pid) {
	$thepageinquestion = get_post($pid);
	$content = $thepageinquestion->post_content;
	$content = apply_filters('the_content', $content);
	 echo $content;
}
?>