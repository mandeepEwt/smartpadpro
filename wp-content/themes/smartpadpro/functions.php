<?php

require_once __DIR__ . '/vendor/autoload.php';
require __DIR__.'/app/bootstrap.php';

add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

function mycustom_wpcf7_form_elements( $form ) {
$form = do_shortcode( $form );

return $form;
}

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



add_action( 'admin_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() { ?>
	<script type="text/javascript" >
		function deletion(id , thisObj)
		{
			if(confirm("Are You Sure"))
			{
			thisObj.parent('td').find('img').show();
				var data = {
					'action': 'my_action',
					'id': id
				};
	
			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) { 
					if(response === "true")
					{
						 window.location.reload(true);
					}
					});
			}
			
		}
		
		function delete_meta(id,table_name, thisObj)
		{
			if(confirm("Are You Sure"))
			{
				thisObj.next('img').show();
				var data = {
					'action': 'logo_meta_delete',
					'id': id,
					'table_name' : table_name
				};
				
				jQuery.post(ajaxurl, data, function(response) { 
					if(response === "true")
					{
						 window.location.reload(true);
					}
					});
			}
		}
		
		jQuery(document).ready(function(){
				if(jQuery('.hideWrap').length > 0)
				{
					jQuery('.hideWrap').delay(4000).fadeOut();
				}
				
				/****************************************** Open Specific Tab ***********************************************************************/
				var url = document.location.toString();
				if (url.match('#')) {
					$('.multisite_tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
				} 
				$('.nav-tabs a').on('shown.bs.tab', function (e) {
					window.location.hash = e.target.hash;
				});
			});
		
		
		
	</script> 
<?php }

add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {
	global $wpdb; // this is how you get access to the database

	$id =  $_REQUEST['id'];
	$table_name = 'wp_custom_smart_features';
		if($id > 0)
		{
			$delete = $wpdb->delete( $table_name, array( 'id' => $id ) );
			if($delete > 0)
			{
				echo "true";
			}
			
		}
	wp_die(); // this is required to terminate immediately and return a proper response
}

add_action( 'wp_ajax_logo_meta_delete', 'logo_meta_delete' );

function logo_meta_delete()
{
	global $wpdb; // this is how you get access to the database

	$id =  $_REQUEST['id'];
	$table_name = $_REQUEST['table_name'];
		if($id > 0)
		{
			$delete = $wpdb->delete( $table_name, array( 'id' => $id ) );
			if($delete > 0)
			{
				echo "true";
			}
			
		}
	wp_die(); 
}



function smart_tool_features_admin_menu() {
 add_menu_page( __( 'Smart Features & Tools', 'smart_features' ), __( 'Smart Features & Tools', 'smart_features' ), 'edit_posts', 'add_data', 'smart_tool_features_page_handler', 'dashicons-groups', 6 ) ;
 
  add_submenu_page('add_data', __('Add New'), __('Add New'), 'edit_posts', 'add_data', 'smart_tool_features_page_handler');

  add_submenu_page('add_data', __('View All'), __('View All'), 'edit_posts', 'view_all_smart_features', 'view_all_smartFeatures');
	  add_submenu_page(
      null, 
      'Delete Feature Record',
      'Delete Feature Record', 
      'edit_posts', 
      'delete_feature', 
      'delete_smart_featured_record'
     );
}
add_action( 'admin_menu', 'smart_tool_features_admin_menu' );


function smartpadwebsites_admin_menu() {
  add_menu_page( __( 'My Sites', 'my_sites' ), __( 'My Sites', 'my_sites' ), 'edit_posts', 'site_changes', 'site_au_changes', 'dashicons-groups', 6 ) ;
 
  add_submenu_page('site_changes', __('smartpadpro.co.au'), __('smartpadpro.com.au'), 'edit_posts', 'site_au_changes', 'site_co_au');
 
  add_submenu_page('site_changes', __('smartpadpro.co.uk'), __('smartpadpro.co.uk'), 'edit_posts', 'site_uk_changes', 'site_co_uk');
 
}

add_action( 'admin_menu', 'smartpadwebsites_admin_menu' );

function site_au_changes()
{
	?>
    <div>
    		<h1 style="text-align : center;">smartpadpro websites</h1>
    </div>
    	<table class="wp-list-table widefat fixed striped posts">
        <tr>
            	<td style="width : 5%;"></td><td> Site Name </td> <td></td>
            </tr>
        	<tr>
            	<TD >1. </TD>
            	<td> smartpadpro.com.au </td>
                <td><a href="<?php echo get_dashboard_url();?>admin.php?page=site_au_changes"> Manage </a></td>
            </tr>
            <tr>
           	 <TD>2. </TD>
            	<td> smartpadpro.co.uk </td>
                 <td> <a href="<?php echo get_dashboard_url();?>admin.php?page=site_uk_changes">Manage</a> </td>
            </tr>
        </table>
    <?php
	
}
function site_co_au()
{
	global $wpdb;
	$site_id = 1;
	
	echo "<style>
			.logo_container{
				width: 150px;
				float: left;
				margin-right: 15px;
			    margin-bottom: 15px;
				text-align: center;
				font-size: 11px;
				font-weight: bold;
				color: red;
				background: white;
				border: 1px solid #eee;
				padding: 10px;
				cursor: pointer;
				height : 140px;
			}
			.logo_container span{
				left: 100%;
				top: -20%;
				font-weight: bold;
				font-size: 18px;
				position : absolute;
			}
			.imgLogo .showimage
			{
				max-width : 100%;
				max-height : 100%;
			}
			.imgLogo
			{
				position : relative;
			}
	</style>";
	
	echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div style="margin-top : 20px;">
   <ul class="nav nav-tabs multisite_tabs">
  <li class="active"><a data-toggle="tab" href="#pricing">Pricing</a></li>
  <li><a data-toggle="tab" href="#menu1"> Customer Logos</a></li>
  <li><a data-toggle="tab" href="#menu2">Contact Page</a></li>
  <li><a data-toggle="tab" href="#menu3">Home Page Logos</a></li>
</ul>

<div class="tab-content">
  <div id="pricing" class="tab-pane fade in active">
    <h3>Pricing </h3>';
		echo pricing_calculator_prices($site_id);	
  echo '</div>
  <div id="menu1" class="tab-pane fade">
    <h3>Customer Logo\'s </h3>
    <p> Upload Logo </p>';
		echo media_gallery($site_id);
		echo "<hr>";
  echo '</div>
  <div id="menu2" class="tab-pane fade">
    <h3>Contact</h3>';
    echo contact_page_management($site_id);
  echo '</div>
  <div id="menu3" class="tab-pane fade">
   <h3>Home Page Logo\'s </h3>
    <p> Upload Logo </p>';
	  echo home_page_logos($site_id);
  echo '</div>
</div>
</div>';
}

function home_page_logos($site_id){

	echo load_media("upload-btn2","image_url2");
	echo "
    	<form method='POST' action=''>
       		 <input type='text' name='image_url2' id='image_url2' class='regular-text' value=''>
        	 <input type='button' name='upload-btn' id='upload-btn2' class='button-secondary' value='Select Image'>
			<br><br> <input type='submit' name='add_home_logo' value='Add Logo' class='button-primary'>
        </form>";
	
	global $wpdb;
	
	if(isset($_POST['add_home_logo']))
	{
		$table_name = 'wp_multiplesite_data';
		$default = array(
		  'site_id' => $site_id,
		  'meta_name' => 'home_logo',
		  'meta_value' =>$_POST['image_url2']
		);
		$item = shortcode_atts( $default, $_REQUEST );
		
		$add_data = $wpdb->insert( $table_name, $item );
		if($add_data)
		{
			echo " <div class='wrap hideWrap'><h4 style='color : green;color: white;font-size: 20px;text-align: center;background: green;padding: 10PX;border : 2px solid white;opacity:.7;'>Added Successfully</h4></div>";
		}
	}

	echo "<hr>";

	$home_logo_result = $wpdb->get_results("SELECT * FROM wp_multiplesite_data where site_id = '".$site_id."' and meta_name = 'home_logo' and meta_value != ''");
	if(sizeof($home_logo_result) > 0)
	{
		echo "<div style='float:left;width:100%;'>";
		for($a=0;$a<sizeof($home_logo_result);$a++)
		{
			
			echo "<div class='logo_container' >
				<div class='imgLogo'><span onclick='delete_meta(".$home_logo_result[$a]->id.", \"wp_multiplesite_data\" , $(this));'> X </span>";
				echo "<img src='".site_url()."/wp-content/themes/smartpadpro/assets/images/24.gif' style='width: 12px;display: none;'>
				
				<img src='".$home_logo_result[$a]->meta_value."' class='showimage'></div></div>";
		}
		echo "</div>";
	}
}

function load_media( $source_id,$destination_id ){
	return "
    <script type='text/javascript'>
jQuery(document).ready(function($){
    $('#".$source_id."').click(function(e) {
        e.preventDefault(); 
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
			console.log('uploaded image');
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#".$destination_id."').val(image_url);
        });
    });
});
</script>";
}
function media_gallery($site_id)
{
	global $wpdb;
	wp_enqueue_script('jquery');
	// This will enqueue the Media Uploader script
	wp_enqueue_media();
	
	echo load_media("upload-btn1","image_url");
	echo "
    	<form method='POST' action=''>
       		 <input type='text' name='image_url' id='image_url' class='regular-text' value=''>
        	 <input type='button' name='upload-btn' id='upload-btn1' class='button-secondary' value='Select Image'>
			<br><br> <input type='submit' name='add_logo' value='Add Logo' class='button-primary'>
        </form>";
	
	if(isset($_POST['add_logo']))
	{
		$table_name = 'wp_multiplesite_data';
			$default = array(
			  'site_id' => $site_id,
			  'meta_name' => 'customer_logo',
			  'meta_value' =>$_POST['image_url']);
		 $item = shortcode_atts( $default, $_REQUEST );
		 $add_data = $wpdb->insert( $table_name, $item );
		if($add_data)
				{
					echo " <div class='wrap hideWrap'><h4 style='color : green;color: white;
    font-size: 20px;
    text-align: center;
    background: green;
    padding: 10PX;border : 2px solid white;opacity:.7;'>Added Successfully</h4></div>";
				}
	}
    	
	echo "<hr>";
	
	$logo_result = $wpdb->get_results("SELECT * FROM wp_multiplesite_data where site_id = '".$site_id."' and meta_name = 'customer_logo' and meta_value != ''");
	if(sizeof($logo_result) > 0)
	{
		echo "<div style='float:left;width:100%;'>";
			for($a=0;$a<sizeof($logo_result);$a++)
			{
				echo "<div class='logo_container'>
				<div class='imgLogo'><span onclick='delete_meta(".$logo_result[$a]->id.", \"wp_multiplesite_data\" , $(this));'> X </span><img src='".site_url()."/wp-content/themes/smartpadpro/assets/images/24.gif' style='width: 12px;display: none;'><img src='".$logo_result[$a]->meta_value."'  class='showimage'></div></div>";
			}
		echo "</div>";
	}
}

function site_co_uk()
{
	global $wpdb;
	$site_id = 2;
	
	echo "<style>
			.logo_container{
				width: 150px;
				float: left;
			    margin-right: 15px;
			    margin-bottom: 15px;
				text-align: center;
				font-size: 11px;
				font-weight: bold;
				color: red;
				background: white;
				border: 1px solid #eee;
				padding: 10px;
				cursor: pointer;
				height : 140px;
			}
			.logo_container span{
				left: 100%;
				top: -20%;
				font-weight: bold;
				font-size: 18px;
				position : absolute;
			}
			.imgLogo .showimage
			{
				max-width : 100%;
				max-height : 100%;
			}
			.imgLogo
			{
				position : relative;
			}
	</style>";
	
	echo '<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <div style="margin-top : 20px;">
   <ul class="nav nav-tabs multisite_tabs">
  <li class="active"><a data-toggle="tab" href="#pricing">Pricing</a></li>
  <li><a data-toggle="tab" href="#menu1"> Customer Logos</a></li>
  <li><a data-toggle="tab" href="#menu2">Contact Page</a></li>
  <li><a data-toggle="tab" href="#menu3">Home Page Logos</a></li>
</ul>

<div class="tab-content">
  <div id="pricing" class="tab-pane fade in active">
    <h3>Pricing </h3>';
		echo pricing_calculator_prices($site_id);	
  echo '</div>
  <div id="menu1" class="tab-pane fade">
    <h3>Customer Logo\'s </h3>
    <p> Upload Logo </p>';
		echo media_gallery($site_id);
		echo "<hr>";
  echo '</div>
  <div id="menu2" class="tab-pane fade">
    <h3>Contact</h3>';
   echo contact_page_management($site_id);
   echo '</div>
   <div id="menu3" class="tab-pane fade">
   <h3>Home Page Logo\'s </h3>
    <p> Upload Logo </p>';
	  echo home_page_logos($site_id);
  echo '</div>
</div>
</div>';
}
function pricing_calculator_prices($site_id)
{
	?>
    	<script>
			/*jQuery(document).ready(function(){
				 jQuery('.enable_optional').change(function() {				
     			  if ($(this).prop('checked')) {
           				 jQuery('.optionals').each(function(){
							 	$(this).removeAttr('readonly');
							 });
        			}
					else
					{
						jQuery('.optionals').each(function(){
							 	$(this).attr("readonly","true");
							 });
					}
				});
				});*/
		</script>
    <?php
	if(isset($_POST['pricing_fields']))
	{
		
	
		echo isset($_POST['cost_upto_2_users']) ? custom_contact_meta($site_id , 'cost_upto_2_users' , $_POST['cost_upto_2_users']) : '';
		echo isset($_POST['cost_upto_35_users']) ?custom_contact_meta($site_id , 'cost_upto_35_users' , $_POST['cost_upto_35_users']): '' ;
		echo isset($_POST['cost_upto_60_users']) ?custom_contact_meta($site_id , 'cost_upto_60_users' , $_POST['cost_upto_60_users']): '';
		echo isset($_POST['cost_upto_200_users']) ?custom_contact_meta($site_id , 'cost_upto_200_users' , $_POST['cost_upto_200_users']): '';
		echo isset($_POST['cost_per_store']) ?custom_contact_meta($site_id , 'cost_per_store' , $_POST['cost_per_store']): '';
		echo isset($_POST['cost_upto_35_tasks']) ?custom_contact_meta($site_id , 'cost_upto_35_tasks' , $_POST['cost_upto_35_tasks']): '';
		echo isset($_POST['cost_more_35_tasks']) ?custom_contact_meta($site_id , 'cost_more_35_tasks' , $_POST['cost_more_35_tasks']): '';
		echo isset($_POST['cost_per_admin_store']) ?custom_contact_meta($site_id , 'cost_per_admin_store' , $_POST['cost_per_admin_store']): '';
		echo isset($_POST['cost_multiple_stores']) ?custom_contact_meta($site_id , 'cost_multiple_stores' , $_POST['cost_multiple_stores']): '';
		echo isset($_POST['optional_team_messaging']) ?custom_contact_meta($site_id , 'optional_team_messaging' , $_POST['optional_team_messaging']): '';
		echo isset($_POST['optional_client_links']) ?custom_contact_meta($site_id , 'optional_client_links' , $_POST['optional_client_links']): '';
		echo isset($_POST['optional_send_reports']) ?custom_contact_meta($site_id , 'optional_send_reports' , $_POST['optional_send_reports']): '';
		echo isset($_POST['optional_email_marketing']) ?custom_contact_meta($site_id , 'optional_email_marketing' , $_POST['optional_email_marketing']): '';
		echo isset($_POST['enable_optional']) ? custom_contact_meta($site_id , 'enable_optional' , $_POST['enable_optional']): custom_contact_meta($site_id , 'enable_optional' , "false");
		
	}
			/** Fetch saved settings for Pricing tab as per domain **/
	$cost_upto_2_users 		= get_custom_contact_meta($site_id , 'cost_upto_2_users');
	$cost_upto_35_users 	= get_custom_contact_meta($site_id , 'cost_upto_35_users');
	$cost_upto_60_users 	= get_custom_contact_meta($site_id , 'cost_upto_60_users');
	$cost_upto_200_users 	= get_custom_contact_meta($site_id , 'cost_upto_200_users');
	$cost_per_store 		= get_custom_contact_meta($site_id , 'cost_per_store');
	$cost_upto_35_tasks 	= get_custom_contact_meta($site_id , 'cost_upto_35_tasks');
	$cost_more_35_tasks 	= get_custom_contact_meta($site_id , 'cost_more_35_tasks');
	$cost_per_admin_store 	= get_custom_contact_meta($site_id , 'cost_per_admin_store');
	$cost_multiple_stores 	= get_custom_contact_meta($site_id , 'cost_multiple_stores');
						/* Optional features if enable */
	$team_messaging_video   = get_custom_contact_meta($site_id , 'optional_team_messaging');
	$client_online_links    = get_custom_contact_meta($site_id , 'optional_client_links');
	$send_reports           = get_custom_contact_meta($site_id , 'optional_send_reports');
	$email_marketing        = get_custom_contact_meta($site_id , 'optional_email_marketing');
	$enable_options         = get_custom_contact_meta($site_id , 'enable_optional');
	if($enable_options  == "true" ){ $cheked = "checked=checked" ;}else { $cheked = "";}
	
	echo '<form method="POST">
				<table class="wp-list-table widefat fixed striped posts">
					<tr>
						<td><b>Number of Users</b></td><td></td>
					</tr>
					<tr>
						<td>2 Users </td>
						<td><input type="text" name="cost_upto_2_users" value="'.(!empty($cost_upto_2_users) ? $cost_upto_2_users: "").'"></td>
					</tr>
					<tr>
						<td>3 to 35 per user Add :</td>
						<td><input type="text" name="cost_upto_35_users" value="'.(!empty($cost_upto_35_users) ? $cost_upto_35_users: "").'"></td>
					</tr>
					<tr>
						<td>36 to 60 per user Add : </td>
						<td><input type="text" name="cost_upto_60_users" value="'.(!empty($cost_upto_60_users) ? $cost_upto_60_users: "").'"></td>
					</tr>
					<tr>
						<td>61 to 200 per user Add : </td>
						<td><input type="text" name="cost_upto_200_users" value="'.(!empty($cost_upto_200_users) ? $cost_upto_200_users: "").'"></td>
					</tr>
					<tr>
						<td><b>Number of Stores/Accounts</b></td>
						<td><input type="text" name="cost_per_store" value="'.(!empty($cost_per_store) ? $cost_per_store: "").'"></td>
					</tr>
					<tr>
						<td><b>Manual and Automated Task Management Per User</b></td><td></td>
					</tr>
					<tr>
						<td>1 to 35 per unit Add : </td>
						<td><input type="text" name="cost_upto_35_tasks" value="'.(!empty($cost_upto_35_tasks) ? $cost_upto_35_tasks: "").'"></td>
					</tr>
					<tr>
						<td>> 35 per unit Add : </td>
						<td><input type="text" name="cost_more_35_tasks" value="'.(!empty($cost_more_35_tasks) ? $cost_more_35_tasks: "").'"></td>
					</tr>
						<tr>
						<td><b>Admin Performance Dashboard and Analytics Per Store</b></td>
						<td><input type="text" name="cost_per_admin_store" value="'.(!empty($cost_per_admin_store) ? $cost_per_admin_store: "").'"></td>
					</tr>
					<tr>
						<td><b>Master Console for Dashboard Control of Multiple Stores</b></td>
						<td><input type="text" name="cost_multiple_stores" value="'.(!empty($cost_multiple_stores) ? $cost_multiple_stores: "").'"></td>
					</tr>
					<tr>
						<td><b> Optional Premium Features - Coming Soon</b> &nbsp; &nbsp; &nbsp; Enable Options : 
						<input type="checkbox" name="enable_optional" class="enable_optional" value="true"  '.$cheked.'"></td>
					</tr>
					<tr>
						<td>Intrenal Team messaging Video chat system Per User</td>
						<td><input type="text" name="optional_team_messaging" class="optionals" value="'.(!empty($team_messaging_video) ? $team_messaging_video: "").'"></td>
					</tr>
					<tr>
						<td>Send Customised Quote links, Clients can View, Accept, Chat and Pay Deposits Instantly through their personal online link</td>
						<td><input type="text" name="optional_client_links" class="optionals" value="'.(!empty($client_online_links) ? $client_online_links: "").'"></td>
					</tr>
					<tr>
						<td>Create Customised Reports and Schedules to Automatically send reports to teams or individuals</td>
						<td><input type="text" name="optional_send_reports" class="optionals" value="'.(!empty($send_reports) ? $send_reports: "").'"></td>
					</tr>
					<tr>
						<td>Create and Send Customised E mail Marketing direct from Smartpad Pro to your Clients, with inbuilt Auto Scheduling, and rule based targeting, get the right message to the right client every single time</td>
						<td><input type="text" name="optional_email_marketing"  class="optionals" value="'.(!empty($email_marketing) ? $email_marketing: "").'"></td>
					</tr>
				</table>
				<br>
				<input type="submit" name="pricing_fields" value="Save" class="button button-primary button-large">
			</form>';
}

function smart_tool_features_page_handler() { 
global $wpdb;
wp_enqueue_script('jquery');
// This will enqueue the Media Uploader script
wp_enqueue_media();

echo "<script type='text/javascript'>
jQuery(document).ready(function($){
    $('#upload-btn').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
        });
    });
});
</script>";
echo '<style>

</style>';
	
	if(isset($_POST['add_feature']) )
	{
		$table_name = 'wp_custom_smart_features';
			$default = array(
			  'icon_path' => $_POST['image_url'],
			  'heading' => $_POST[ 'feature_heading'],
			  'description'=> $_POST['feature_description'],
			  'learn_more_link'=> $_POST[ 'learn_more_to'], 
			);
			$item = shortcode_atts( $default, $_REQUEST );
			
			if(isset($_GET['id']) && $_GET['id'] > 0 )
			{
				$id= $_GET['id'];
				$update_record = $wpdb->update( $table_name, $item , array('id' => $id));
				if($update_record)
				{
					echo " <div class='wrap hideWrap'> <h4 style='color : green;color: white;
    font-size: 20px;
    text-align: center;
    background: green;
    padding: 10PX;border : 2px solid white;opacity:.7;'>Updated Successfully</h4></div>";
				}
				
			}
			else
			{
				$add_data = $wpdb->insert( $table_name, $item );
				if($add_data)
				{
					echo " <div class='wrap hideWrap'><h4 style='color : green;color: white;
    font-size: 20px;
    text-align: center;
    background: green;
    padding: 10PX;border : 2px solid white;opacity:.7;'>Added Successfully</h4></div>";
				}
			}
				
     }
if(isset($_GET['id']))
{
		$single_result = $wpdb->get_results("SELECT * FROM wp_custom_smart_features where id = '".$_GET['id']."'");
		$icon_path = $single_result[0]->icon_path;
		$feature_heading = $single_result[0]->heading;
		$description = $single_result[0]->description;
		$learn_more_text = $single_result[0]->learn_more_link;
		$heading = "Edit Feature";
}
else
{
    $icon_path = '';
	$feature_heading = '';
	$description = '';
	$learn_more_text = '';
	$heading = "Add New Feature";
}
echo '<div style="margin-top : 20px;"><h1>'.$heading.'</h1>
<div class="wrap"><a href="'.site_url().'/wp-admin/admin.php?page=view_all_smart_features" class="button button-primary button-large"> View All </a></div><br>
<form method="POST" action="">
<table>
	<tr>
  		 <th>Icon: </th>
  		 <td><input type="text" name="image_url" id="image_url" class="regular-text" value="'.$icon_path.'">
    <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image"></td>
   </tr>
     <tr>
	 	 <th>Heading:</th>
	 	 <td><input type="text" name="feature_heading" style="width:100%;"  value="'.$feature_heading.'"/></td>
	  </tr>
    <tr>
		<th>Description:</th> 
		<td><textarea name="feature_description" style="width:100%;height : 150px;">'.$description.'</textarea></td>
    </tr>
   <tr>
   	<th>Learn More Link :</th>
	<td><input type="text" name="learn_more_to" width="100%" style="width:100%;"  value="'.$learn_more_text.'"/></td>
</tr>
<tr><td colspan="2">
<input type="submit" value="Save" name="add_feature" class="button button-primary button-large"/></td></tr>
</form><div>';

}



function view_all_smartFeatures()
{
	global $wpdb;
		if(isset($_POST['delete_record']))
		{
			$table_name = 'wp_custom_smart_features';
		    $id= $_POST['id'];
			//echo "true - ".$id;
			//$delete = $wpdb->delete( $table_name, array( 'id' => $id ) );
			
		}
		$result = $wpdb->get_results("SELECT * FROM wp_custom_smart_features");
	
	echo '<div style="margin-top : 20px;"><h1 style="text-align : center;">Smart Features & Tools</h1>
<div class="wrap"><a href="'.site_url().'/wp-admin/admin.php?page=add_data" class="button button-primary button-large"> Add New </a></div><br>';

	echo '<table style="width : 100%" class="view_all_smart_features wp-list-table widefat fixed striped posts">';
	echo "<tr><th> Icon </th><th> Heading </th><th>Description</th><th>Learn More</th><th> Action </th></tr>";
	for($i=0;$i<sizeof($result);$i++)
	{
		echo "<tr>";
		echo "<td><img src=".$result[$i]->icon_path." width='50px'></td>";
		echo "<td>".$result[$i]->heading."</td>";
		echo "<td>".$result[$i]->description."</td>";
		echo "<td>".$result[$i]->learn_more_link."</td>";
		echo "<td><a href='".site_url()."/wp-admin/admin.php?page=add_data&id=".$result[$i]->id."' style='cursor:pointer;'>Edit</a> / 
				<a onclick='deletion(".$result[$i]->id.", $(this))' style='cursor:pointer;'> Delete </a><img src='".site_url()."/wp-content/themes/smartpadpro/assets/images/24.gif' style='width: 12px;display: none;'>
			</td>";
		echo "</tr>";
	}
	echo '</table></div>';
}



function front_card_box_smart_features_and_tools()
{

	global $wpdb;
	$result = $wpdb->get_results("SELECT * FROM wp_custom_smart_features");
	$html =  '<style> .custom-lg-3{
			max-width : 23% !important;
			margin-left : 1%;
			margin-right : 1%;
			margin-bottom : 20px;
		}
		
		</style><div class="row">';
	for($i=0;$i<sizeof($result);$i++)
	{
		$html .= '<div class="card-box custom-lg-3 col-lg-3 custom-md-6 col-md-3 custom-sm-12 col-sm-12 custom-12 col-12" style="padding-left: 5px; padding-right: 5px; padding-top: 30px;">
				<p class="margin-b-5"><img class="alignnone size-full wp-image-1118 aligncenter" src="'.$result[$i]->icon_path.'" alt="" width="63" height="63"></p>
				<p class="feature_tool_headdark text-medium font-16">'.$result[$i]->heading.'</p>
				<p class="feature_tool_headlight text-normal font-13-5 dark-brown">'.$result[$i]->description.'</p>
				<div class="learn_more"><a class="link-blue font-12 text-medium" href="'.$result[$i]->learn_more_link.'">LEARN MORE</a></div>
			</div>';	
	}
	$html .= '<div>';
	return $html;
}
add_shortcode('smart_features_and_tools' , 'front_card_box_smart_features_and_tools');

function contact_page_management($site_id)
{
	if(isset($_POST['contact_fields']))
	{
		echo custom_contact_meta($site_id , 'phone_tech_support' , $_POST['phone_tech_support']);
		echo custom_contact_meta($site_id , 'email_tech_support' , $_POST['email_tech_support']);
		echo custom_contact_meta($site_id , 'phone_sales_enquiry' , $_POST['phone_sales_enquiry']);
		echo custom_contact_meta($site_id , 'email_sales_enquiry' , $_POST['email_sales_enquiry']);
		echo custom_contact_meta($site_id , 'phone_product_support' , $_POST['phone_product_support']);
		echo custom_contact_meta($site_id , 'email_product_support' , $_POST['email_product_support']);
	}
	
	
		/** Fetch saved settings for contact tab as per domain **/
		$tech_phone = get_custom_contact_meta($site_id , 'phone_tech_support');
		$tech_email = get_custom_contact_meta($site_id , 'email_tech_support');
		$sales_phone = get_custom_contact_meta($site_id , 'phone_sales_enquiry');
		$sales_email = get_custom_contact_meta($site_id , 'email_sales_enquiry');
		$product_phone = get_custom_contact_meta($site_id , 'phone_product_support');
		$product_email = get_custom_contact_meta($site_id , 'email_product_support');
		
		
	?>
    <form method="post">
    	<table class="wp-list-table widefat fixed striped posts">
        	<tr><td>Form Name</td><td>Phone Number</td> <td>Email Address</tr>
            <tr> 
                <td>Tech Support</td>
                <td><input type="text" name="phone_tech_support" value="<?php echo !empty($tech_phone) ? $tech_phone: "";?>"/></td>
                <td><input type="text" name="email_tech_support" value="<?php echo !empty($tech_email) ? $tech_email: ""; ?>"/></td>
            </tr>
              <tr> 
                    <td>Sales Enquiries</td>
                    <td><input type="text" name="phone_sales_enquiry" value="<?php echo !empty($sales_phone) ? $sales_phone: ""?>"/></td>
                    <td><input type="text" name="email_sales_enquiry" value="<?php echo !empty($sales_email ) ?$sales_email  : ""?>"/></td>
              </tr>
              <tr> 
                	<td>Product support</td>
                    <td><input type="text" name="phone_product_support" value="<?php echo !empty($product_phone) ? $product_phone : ""?>"/></td>
                    <td><input type="text" name="email_product_support" value="<?php echo !empty($product_email) ? $product_email :""?>"/></td>
               </tr>
        </table>
        <input type="submit" name="contact_fields" value="Save" class="button button-primary button-large" />
        </form>
    <?php
}
function custom_contact_meta($site_id , $meta_name , $meta_value)
{
	global $wpdb;
	$get_meta = '';
	$get_meta = $wpdb->get_results("SELECT * FROM wp_multiplesite_data where site_id = '".$site_id."' and meta_name = '".$meta_name."'");
	
						 $default = array(
					  'site_id' => $site_id,
					  'meta_name'=> $meta_name,
					  'meta_value'=> $meta_value, 
					);
					$item = shortcode_atts( $default, $_REQUEST );
					$table_name = 'wp_multiplesite_data';
					$id = $get_meta[0]->id;
			if(sizeof($get_meta))
			{			
					$update_record = $wpdb->update( $table_name, $item , array('id' => $id ));
			}
			else
			{	
	
				     $add_data = $wpdb->insert( $table_name, $item );
			}
	
}

function get_custom_contact_meta($site_id , $meta_name)
{
	global $wpdb;
	$get_meta = $wpdb->get_results("SELECT * FROM wp_multiplesite_data where site_id = '".$site_id."' and meta_name = '". $meta_name."'");
	if(sizeof($get_meta))
	{
		return $get_meta[0]->meta_value;
	}
}
// calculator with advance functionality

function new_pricing_calculator()
{
	
	$class="";
	$site_id = fetch_website_id();
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
	$master_console_per_store 	= ( (isset($_SESSION["master_console_per_store"]) && ($_SESSION["master_console_per_store"] == 400) )?"checked":"" );
	$optional_team_messaging 	= ( isset($_SESSION["optional_team_messaging"])?$_SESSION["optional_team_messaging"]:"00" );
	$optional_client_links 		= ( isset($_SESSION["optional_client_links"])?$_SESSION["optional_client_links"]:"00" );
	$optional_send_reports 	    = ( isset($_SESSION["optional_send_reports"])?$_SESSION["optional_send_reports"]:"00" );
	$optional_email_marketing 	= ( isset($_SESSION["optional_email_marketing"])?$_SESSION["optional_email_marketing"]:"00" );
	
	if( isset($_SESSION) ){
		// Destroy Session
		//echo "<pre>"; print_r($_SESSION); echo "</pre>";
		unset($_SESSION);
	}

	$enable_options    = get_custom_contact_meta($site_id , 'enable_optional');
	if($enable_options  == "true" ){ ?>
		<style>
        	.dummy-row-disable{display : none;}
        </style>
	<?php }else { ?> 	<style>
        	.original-row-disable{display : none;}
        </style><?php }
	
	?>
	<script>
jQuery(function() {
  
  jQuery('input[type=range]').rangeslider({
    polyfill: false
  });
  
});
</script>
 <script>
	 jQuery(document).ready(function() {
    	var $element = jQuery('input[type="range"]');

$element
  .rangeslider({ 
    polyfill: false,
    onInit: function() {
      var $handle = jQuery('.rangeslider__handle', this.$range);
      updateHandle($handle[0], this.value);
    }
  })
  .on('input', function(e) { 
    var $handle = jQuery('.rangeslider__handle', e.target.nextSibling);
    updateHandle($handle[0], this.value);
  });

function updateHandle(el, val) {
  el.textContent = val;
}
	 });
    </script>
<?php
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
.rangeslider__handle
{
	padding-top: 6px;
	background : #06e9ed;
	border: 3px solid white;
	box-shadow : 1px 1px 12px 1px rgba(6, 233, 237, 0.7) !important;
	background-image : none;
	color : white;
	font-weight : 600;
	font-family : poppins;
}
.rangeslider
{
	background : white;
}
.rangeslider__handle:after
{
	content : none;
}
body .slidecontainer
{
	margin-top: 40px;
}
.premium_feature_box .slidecontainer
{
	margin-top: 10px;
}
@media (max-width:767px){
	.section-content.pricing-cal{
		padding:0px;
	}
}
</style><form action="'.site_url().'/signup" method="post"><div class="bg-white section-content pricing-cal">
<div class="container">
<div class="imp_fields"  style="max-width: 600px; margin: 0 auto;">
<input type="hidden" name="post_pricing_values" value="1">
<input type="hidden" name="pricing_amount" class="pricing_amount" value="'.( !empty($pricing_amount)?$pricing_amount:get_custom_contact_meta($site_id , 'cost_upto_2_users') ).'">
<input type="hidden" name="show_default" value="'.$enable_options.'">
<div class="hero_section">
     <div class="row ptop-30 font-25 font-bold" >
          <div class="col-lg-8 col-md-6 col-6 text-right">
               <label class="pricing_main_head font-34"> Monthly Cost </label> 
          </div>
          <div class="col-lg-4 col-md-6 col-6"><div id="total_amount" class="white-text pricing_main_head font-34">$ <span> '.
		  ( !empty($pricing_amount) ? $pricing_amount : get_custom_contact_meta($site_id , 'cost_upto_2_users') ).' </span></div></div>
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
	 <div class="row font-bold margin-bottom-20 dummy-row-disable">
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
	 
	 <!--  New Field 1 --> 
	 	 <div class="row font-bold margin-bottom-20 original-row-disable" >
          <div class="col-lg-5 text-left ">
               <label class="optional_features_heading"> Intrenal Team messaging Video chat system Per User </label> 
          </div>
          <div class="col-lg-5 col-md-10 col-sm-10 col-8">
              	   <div class="slidecontainer ">
                    <input type="range" min="0" max="200" value="'.$optional_team_messaging.'" class="slider" name="optional_team_messaging" id="optional_team_messaging" oninput="updateTextInput(this.value , \'team_messaging\',\'optional_team_messaging-hidden\');">
               </div>
          </div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-4">
				<span class="up" onclick="change_range_value_up(\'team_messaging\' , \'optional_team_messaging\' ,\'team_messaging\',\'optional_team_messaging-hidden\' , 200);">  <div class="addbutton"></div> </span>
		  <div id="team_messaging" class="show_price show_data"> '.$optional_team_messaging.' </div>
		<span class="down" onclick="change_range_value_down(\'team_messaging\' , \'optional_team_messaging\' ,\'team_messaging\',\'optional_team_messaging-hidden\' ,0);"> <div class="minbutton"></div></span> 
			</div>
     </div>
	 <!--  End New Field 1 -->
	 
	 <div class="row font-bold margin-bottom-20 dummy-row-disable">
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
	 
	 
	  <!--  New Field 2 --> 
	 	 <div class="row font-bold margin-bottom-20 original-row-disable">
          <div class="col-lg-5 text-left ">
               <label class="optional_features_heading"> Send Customised Quote links, Clients can View, Accept, Chat and Pay Deposits Instantly through their personal online link </label> 
          </div>
          <div class="col-lg-5 col-md-10 col-sm-10 col-8">
              	   <div class="slidecontainer ">
                    <input type="range" min="0" max="200" value="'.$optional_client_links.'" class="slider" name="optional_client_links" id="optional_client_links" oninput="updateTextInput(this.value , \'client_links\',\'optional_client_links-hidden\');">
               </div>
          </div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-4">
				<span class="up" onclick="change_range_value_up(\'client_links\' , \'optional_client_links\' ,\'client_links\',\'optional_client_links-hidden\' , 200);">  <div class="addbutton"></div> </span>
		  <div id="client_links" class="show_price show_data"> '.$optional_client_links.' </div>
		<span class="down" onclick="change_range_value_down(\'client_links\' , \'optional_client_links\' ,\'client_links\',\'optional_client_links-hidden\' ,0);"> <div class="minbutton"></div></span> 
			</div>
     </div>
	 <!--  End New Field 2 -->
	 
	 
	 <div class="row font-bold margin-bottom-20 dummy-row-disable ">
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
	 
	  <!--  New Field 3 --> 
	 	 <div class="row font-bold margin-bottom-20 original-row-disable">
          <div class="col-lg-5 text-left ">
               <label class="optional_features_heading"> Create Customised Reports and Schedules to Automatically send reports to teams or individuals </label> 
          </div>
          <div class="col-lg-5 col-md-10 col-sm-10 col-8">
              	   <div class="slidecontainer ">
                    <input type="range" min="0" max="200" value="'.$optional_send_reports.'" class="slider" name="optional_send_reports" id="optional_send_reports" oninput="updateTextInput(this.value , \'send_reports\',\'optional_send_reports-hidden\');">
               </div>
          </div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-4">
				<span class="up" onclick="change_range_value_up(\'send_reports\' , \'optional_send_reports\' ,\'send_reports\',\'optional_send_reports-hidden\' , 200);">  <div class="addbutton"></div> </span>
		  <div id="send_reports" class="show_price show_data"> '.$optional_send_reports.' </div>
		<span class="down" onclick="change_range_value_down(\'send_reports\' , \'optional_send_reports\' ,\'send_reports\',\'optional_send_reports-hidden\' ,0);"> <div class="minbutton"></div></span> 
			</div>
     </div>
	 <!--  End New Field 3 -->
	 
	 
	 
	 <div class="row font-bold margin-bottom-20 dummy-row-disable">
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
	 
	 
	  <!--  New Field 4 --> 
	 	 <div class="row font-bold margin-bottom-20 original-row-disable">
          <div class="col-lg-5 text-left ">
               <label class="optional_features_heading"> Create and Send Customised E mail Marketing direct from Smartpad Pro to your Clients, with inbuilt Auto Scheduling, and rule based targeting, get the right message to the right client every single time</label> 
          </div>
          <div class="col-lg-5 col-md-10 col-sm-10 col-8">
              	   <div class="slidecontainer ">
                    <input type="range" min="0" max="200" value="'.$optional_email_marketing.'" class="slider" name="optional_email_marketing" id="optional_email_marketing" oninput="updateTextInput(this.value , \'email_marketing\',\'optional_email_marketing-hidden\');">
               </div>
          </div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-4">
				<span class="up" onclick="change_range_value_up(\'email_marketing\' , \'optional_email_marketing\' ,\'email_marketing\',\'optional_email_marketing-hidden\' , 200);">  <div class="addbutton"></div> </span>
		  <div id="email_marketing" class="show_price show_data"> '.$optional_email_marketing.' </div>
		<span class="down" onclick="change_range_value_down(\'email_marketing\' , \'optional_email_marketing\' ,\'email_marketing\',\'optional_email_marketing-hidden\' ,0);"> <div class="minbutton"></div></span> 
			</div>
     </div>
	 <!--  End New Field 4 -->
	 
	 
	 
	 <div class="row" style="text-align : center;"><input type="submit" name="submit" class="btn gradient_green_blue white-text '.$class.'" style="margin: 0 auto;" value="SIGN UP NOW"></div>
	 </div>
	 
</div> </div>
	
</div></form>
';
return $data;
}
add_shortcode('pricing_calculator' , 'new_pricing_calculator');  


function check_mail_send_contactform($cf7) {
    
	 //if( $_SERVER['REMOTE_ADDR'] == "103.16.166.243" || $_SERVER['REMOTE_ADDR'] == "203.134.193.44" ){
		 
		 $contact_form_id = $cf7->id;
		 
		 $server_name = ( isset($_SERVER['SERVER_NAME'])?$_SERVER['SERVER_NAME']:'' );
		 
		 //$server_name = 'smartpadpro.com.au';
		 
		 $contact_forms = array(1565,1566,1567);
		 //$contact_forms = array(557,558,570); Localhost contact form ids
		 
		 if( $contact_form_id == 1565 ){ // Contact Tech Support
			 $meta_name = "email_tech_support";
		 }
		 if( $contact_form_id == 1566 ){ // Contact Sales Enquiries
			 $meta_name = "email_sales_enquiry";
		 }
		 if( $contact_form_id == 1567 ){ // Contact Product Support
			 $meta_name = "email_product_support";
		 }
		 
		 //echo $server_name; echo $contact_form_id; echo $meta_name;
	  
		 if( in_array( $contact_form_id,$contact_forms) ){
			
			if( $server_name == "smartpadpro.com.au" ){
				$website_id = 1;
			}elseif( $server_name == "smartpadpro.co.uk" ){
				$website_id = 2;
			}else{
			
			}
			
			if( isset($website_id)  && !empty($meta_name) ){
				//$recipient = "trannum.webtech@gmail.com";
				$recipient = get_custom_contact_meta($website_id,$meta_name);
				
				$mail = $cf7->prop( 'mail' );
			
			 	$mail["recipient"]= $recipient;
			 	$cf7->set_properties( array( 'mail' => $mail ) );
			 	return $cf7;
			}
		 }
	 
	 //}

	
}
add_action('wpcf7_before_send_mail','check_mail_send_contactform');

/************************************************************** Load Testimonials with respect to website ID **************************************************************/
function load_testimonial_rotator( $atts ){
	$site_id = fetch_website_id();
	
	if( $site_id == "1" ){
		return do_shortcode("[testimonial_rotator id=881]");
	}else{
		return do_shortcode("[testimonial_rotator id=887]");
	}
	
}
add_shortcode( 'Load_Testimonial', 'load_testimonial_rotator' );

/************************************************************** fetch Website site ID with respect to Domain name **************************************************************/
function fetch_website_id(){
	$server_name = ( isset($_SERVER['SERVER_NAME'])?$_SERVER['SERVER_NAME']:'' );
	if( $server_name == "smartpadpro.com.au" ){
		$website_id = 1;
	}elseif( $server_name == "smartpadpro.co.uk" ){
		$website_id = 2;
	}else{
		$website_id = 1;
	}
	return $website_id;
}


function get_pricing_cost(){
	
	$site_id = fetch_website_id();
	
	/** Fetch saved settings for Pricing tab as per domain **/
	$cost_upto_2_users 		= get_custom_contact_meta($site_id , 'cost_upto_2_users');
	$cost_upto_35_users 	= get_custom_contact_meta($site_id , 'cost_upto_35_users');
	$cost_upto_60_users 	= get_custom_contact_meta($site_id , 'cost_upto_60_users');
	$cost_upto_200_users 	= get_custom_contact_meta($site_id , 'cost_upto_200_users');
	$cost_per_store 		= get_custom_contact_meta($site_id , 'cost_per_store');
	$cost_upto_35_tasks 	= get_custom_contact_meta($site_id , 'cost_upto_35_tasks');
	$cost_more_35_tasks 	= get_custom_contact_meta($site_id , 'cost_more_35_tasks');
	$cost_per_admin_store 	= get_custom_contact_meta($site_id , 'cost_per_admin_store');
	$cost_multiple_stores 	= get_custom_contact_meta($site_id , 'cost_multiple_stores');
	$cost_team_messaging 	= !empty(get_custom_contact_meta($site_id , 'optional_team_messaging')) ? get_custom_contact_meta($site_id , 'optional_team_messaging') : 0;
	$cost_client_links 		= !empty(get_custom_contact_meta($site_id , 'optional_client_links')) ? get_custom_contact_meta($site_id , 'optional_client_links') : 0;
	$cost_send_reports 	    = !empty(get_custom_contact_meta($site_id , 'optional_send_reports')) ? get_custom_contact_meta($site_id , 'optional_send_reports'): 0;
	$cost_email_marketing 	= !empty(get_custom_contact_meta($site_id , 'optional_email_marketing')) ? get_custom_contact_meta($site_id , 'optional_email_marketing'): 0;
	$show_default           = get_custom_contact_meta($site_id , 'enable_optional');
	
	echo "<script> var pricing_cal = {cost_upto_2_users:".$cost_upto_2_users.", cost_upto_35_users:".$cost_upto_35_users.", cost_upto_60_users:".$cost_upto_60_users.", cost_upto_200_users:".$cost_upto_200_users.", cost_per_store:".$cost_per_store.", cost_upto_35_tasks:".$cost_upto_35_tasks.", cost_more_35_tasks:".$cost_more_35_tasks.", cost_per_admin_store:".$cost_per_admin_store.", cost_multiple_stores:".$cost_multiple_stores.",cost_team_messaging :".$cost_team_messaging.", cost_client_links:".$cost_client_links.", cost_send_reports:".$cost_send_reports.", cost_email_marketing:".$cost_email_marketing.",show_default:".$show_default."};</script>";
}
add_action( 'wp_print_footer_scripts', 'get_pricing_cost' );

/************************************************************** Load Testimonials with respect to website ID **************************************************************/
function add_logos( $atts ){
	
	$site_id = fetch_website_id();
	
	global $wpdb;
$display_logo = '';
	if( isset( $atts["type"] ) && !empty($atts["type"]) ){
		if( $atts["type"] == "home" ){
			$logos = $wpdb->get_results("SELECT * FROM wp_multiplesite_data where site_id = '".$site_id."' and meta_name = 'home_logo' and meta_value != ''");
			
		}else{
			$logos = $wpdb->get_results("SELECT * FROM wp_multiplesite_data where site_id = '".$site_id."' and meta_name = 'customer_logo' and meta_value != ''");
		}
		if(sizeof($logos) > 0)
		{
			$display_logo .= "<div class='row'>";
			for($a=0;$a<sizeof($logos);$a++)
			{
				$display_logo .=  "<div class='front_logo col-lg-3'><span class='helper'></span><img src='".$logos[$a]->meta_value."'></div>";
			}
			$display_logo .=  "</div>";				
		}
	}
	return $display_logo;
}
add_shortcode( 'Add_Logos', 'add_logos' );

?>
