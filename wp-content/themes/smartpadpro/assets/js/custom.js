// JavaScript Document

function thousands_separators(num){ 
	var num_parts = num.toString().split(".");
	num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	return num_parts.join(".");
}

// takes the form field value and returns true on valid number
/*function valid_credit_card(value) {
	
  // accept only digits, dashes or spaces
	if (/[^0-9-\s]+/.test(value)) return false;

	// The Luhn Algorithm. It's so pretty.
	var nCheck = 0, nDigit = 0, bEven = false;
	value = value.replace(/\D/g, "");

	for (var n = value.length - 1; n >= 0; n--) {
		var cDigit = value.charAt(n),
			  nDigit = parseInt(cDigit, 10);

		if (bEven) {
			if ((nDigit *= 2) > 9) nDigit -= 9;
		}

		nCheck += nDigit;
		bEven = !bEven;
	}

	return (nCheck % 10) == 0;
}*/
function update_val_acc_define_val(updated_val,less_than,greater_than,less_multiply,greater_multiply)
{
	if(updated_val <= less_than)
	{
		var updated_cost = parseInt(updated_val) * less_multiply;
	}
	else if(updated_val > greater_than)
	{
		var old_val = greater_than*less_multiply;
		var greater_than_val = updated_val-greater_than;
		var new_val = greater_than_val*greater_multiply;
		var total_val = old_val+new_val;
		var updated_cost = parseInt(total_val);
	}			
	return updated_cost;
}
function updateTextInput(val , id , hidden_id) {
	
	if (typeof pricing_cal !== "undefined"){
		
		var cost_upto_2_users 		= ( pricing_cal.cost_upto_2_users != "" ) ? pricing_cal.cost_upto_2_users : 299;
		var cost_upto_35_users 		= ( pricing_cal.cost_upto_35_users != "" ) ? pricing_cal.cost_upto_35_users : 50;
		var cost_upto_60_users 		= ( pricing_cal.cost_upto_60_users != "" ) ? pricing_cal.cost_upto_60_users : 45;
		var cost_upto_200_users 	= ( pricing_cal.cost_upto_200_users != "" ) ? pricing_cal.cost_upto_200_users : 40;
		var cost_per_store 			= ( pricing_cal.cost_per_store != "" ) ? pricing_cal.cost_per_store : 80;
		var cost_upto_35_tasks 		= ( pricing_cal.cost_upto_35_tasks != "" ) ? pricing_cal.cost_upto_35_tasks : 15;
		var cost_more_35_tasks		= ( pricing_cal.cost_more_35_tasks != "" ) ? pricing_cal.cost_more_35_tasks : 10;
		var cost_per_admin_store 	= ( pricing_cal.cost_per_admin_store != "" ) ? pricing_cal.cost_per_admin_store : 80;
		var cost_multiple_stores 	= ( pricing_cal.cost_multiple_stores != "" ) ? pricing_cal.cost_multiple_stores : 400;
		var cost_team_messaging     = ( pricing_cal.cost_team_messaging != "" ) ? pricing_cal.cost_team_messaging : 0;
		var cost_client_links        = ( pricing_cal.cost_client_links != "" ) ? pricing_cal.cost_client_links : 0;
		var cost_send_reports        = ( pricing_cal.cost_send_reports != "" ) ? pricing_cal.cost_send_reports : 0;
		var cost_email_marketing     = ( pricing_cal.cost_email_marketing != "" ) ? pricing_cal.cost_email_marketing : 0;
		
	}
	
		var final_amount = 0;
		
		if( id != "multiple_stores" && hidden_id != "" ){
			jQuery("#"+hidden_id).val(val);
		}
		
		var update_val=0;
		if(id == "multiple_stores")
		{
			// In case of "multiple_stores" val is passes as this
			if(val.checked==true)
			{
				//update_val = 400;
				update_val = cost_multiple_stores;
				jQuery("#"+hidden_id).val("Yes");
				
				
			}else{
				//update_val = "No";
				jQuery("#"+hidden_id).val("No");
			}
		}
		else
		{
			update_val = val;
		}
		
		jQuery("#"+id).html(update_val).show();    // display selected range value 
		
		var  no_of_users = parseInt(jQuery("#no_of_users").html());
		var  no_of_stores = parseInt(jQuery("#no_of_stores").html()) - 1;
		var  automatic_task = parseInt(jQuery("#automatic_task").html());
		var  video_chat = parseInt(jQuery("#video_chat").html());
		var dashboard_analytics = parseInt(jQuery("#dashboard_analytics").html());
		var multiple_stores = parseInt(jQuery("#multiple_stores").html());
		var team_messaging     = parseInt(jQuery("#team_messaging").html());
		var client_links        = parseInt(jQuery("#client_links").html());
		var send_reports        =parseInt(jQuery("#send_reports").html());
		var email_marketing     = parseInt(jQuery("#email_marketing").html());
		
	  /* price calculation on the basis of number of users */
	   if(no_of_users == 2)
	   {	
		    // new_amount = 299;
			new_amount = cost_upto_2_users;
	   }
	   if(no_of_users >=3 && no_of_users <= 35)
	   {
			 no_of_users = no_of_users-2;
		   	 //new_amount = 299+ (no_of_users * 50);   
			 new_amount = cost_upto_2_users+ (no_of_users * cost_upto_35_users);   
       }
	  else if(no_of_users >=36 && no_of_users <= 60)
	   {
			no_of_users = no_of_users-35;
			//var old_val = 33*50;
		    //new_amount = 299 + old_val+ (no_of_users * 45);  
			var old_val = 33*cost_upto_35_users; 
			new_amount = cost_upto_2_users + old_val+ (no_of_users * cost_upto_60_users);   
       }
	   else if(no_of_users >= 61)
	   {
		   no_of_users = no_of_users-60;
		   //var old_val = 58*45;
		   // new_amount = 299 + old_val + (no_of_users * 40); 
		   var old_val = 58*cost_upto_60_users;
		   new_amount = cost_upto_2_users + old_val + (no_of_users * cost_upto_200_users); 
       }
	   
	    /* price calculation on the basis of number of stores */
		
		 // Less than 10 multiply by 80 and gretor than 10 multiply by 50
		 var store_cost = parseInt(no_of_stores) * cost_per_store; 	//update_val_acc_define_val(no_of_stores,10,10,80,50);
		 
		/* price calculation on the basis of number of Manual and Automated Task Management Per User */ 

			// Less than 35 multiply by 15 and gretor than 35 multiply by 10
			//var automated_cost = update_val_acc_define_val(automatic_task,35,35,15,10);
			var automated_cost = update_val_acc_define_val(automatic_task,35,35,cost_upto_35_tasks,cost_more_35_tasks);
			
		/* price calculation on the basis of Admin Performance Dashboard and Analytics Per Store */

			  // Less than 35 multiply by 15 and gretor than 35 multiply by 10
			 // var video_cost = parseInt(video_chat) * 80; //update_val_acc_define_val(video_chat,35,35,80,10);
			  var video_cost = parseInt(video_chat) * cost_per_admin_store;

		/* price calculation on the basis of Admin Performance Dashboard and Analytics Per Store */
		  
		  var dashboard_cost = parseInt(dashboard_analytics) * 30; 	
		  
		  /* price calculation on the basis of Master Console for Dashboard Control of Multiple Stores Per 5 stores attached */
	  
	  	  var dashboard_control_cost = parseInt(multiple_stores);//parseInt(multiple_stores) * 400; 
		  	/*calculate optional */
			
			team_messaging_total_cost = parseInt(team_messaging) * cost_team_messaging;
			client_links_total_cost = parseInt(client_links) * cost_client_links;
			send_reports_total_cost = parseInt(send_reports) * cost_send_reports;
			email_marketing_total_cost = parseInt(email_marketing) * cost_email_marketing;
			
			var total_optional =  team_messaging_total_cost     + client_links_total_cost + send_reports_total_cost + email_marketing_total_cost; 
			  
		  var final_amount =  new_amount + store_cost + automated_cost + video_cost + dashboard_cost + dashboard_control_cost;

			var final_amount = final_amount + total_optional;
		
		jQuery("#total_amount span").text(thousands_separators(parseInt(final_amount)));
		jQuery(".pricing_amount").val(thousands_separators(parseInt(final_amount)));
		//console.log(jQuery("#monthly-cost-hidden").html()+":"+thousands_separators(final_amount));
		jQuery("#monthly-cost-hidden").html(thousands_separators(final_amount));
		jQuery("#total_amount-hidden").val(thousands_separators(final_amount));
	}
	
	var valid_card = 0;
/*	jQuery('.validate_cc_num input[name=cc-num]').keyup(function(e) {
		
        var cc_num = jQuery(this).val();
		
		var first_char = cc_num.charAt(0);
		
		if( first_char != "4" ){
			jQuery('.validate_cc_num').find('.invalid_card').html("Only visa card is accepted.");
			//jQuery('.validate_cc_num').find('.invalid_card').css("margin-bottom","0");
			//jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">Only visa card is accepted.</span>');
		}else{
			jQuery('.validate_cc_num').find('.invalid_card').html("");
			//jQuery('.validate_cc_num').find('.invalid_card').css("margin-bottom","25px");
		}
		
    });*/
	
	/*jQuery('.cvv-num input').blur(function(e) {
		var cvv = jQuery(this).val();
		if( cvv != "" ){
			if( cvv.length != 3 ){
				jQuery('.invalid_cvv').html("Invalid CVV");
			}else{
				jQuery('.invalid_cvv').html("");
			}
		}
    	
    });*/
	
	/*jQuery('.validate_cc_num input[name=cc-num]').blur(function(e) {
		
		var cc_num = jQuery(this).val();
		
		if (/[^0-9-\s]+/.test(cc_num)){
			jQuery('.validate_cc_num').find('.invalid_card').html("Invalid card number.");
			//jQuery('.validate_cc_num').find('.invalid_card').css("margin-bottom","0");
			//jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">Invalid card number.</span>');
		}
        if( cc_num.length == 13 || cc_num.length == 16 || cc_num.length == 19 ){
			jQuery('.validate_cc_num').find('.invalid_card').html("");
			//jQuery('.validate_cc_num').find('.invalid_card').css("margin-bottom","25px");
			//jQuery('.validate_cc_num').find('span').remove();
		}else{
			jQuery('.validate_cc_num').find('.invalid_card').html("Invalid card number.");
			//jQuery('.validate_cc_num').find('.invalid_card').css("margin-bottom","0");
			//jQuery(this).after('<span role="alert" class="wpcf7-not-valid-tip">Invalid card number.</span>');
		}
		
    });*/
	
	jQuery(".multistep-cf7-next, .multistep-cf7-prev").click(function(e) {
	if (typeof pricing_cal !== "undefined"){
		
		var show_default = jQuery.trim(pricing_cal.show_default);
	}
		if( jQuery(".cf7-container-step-confirm").length > 0 ){
			setTimeout(function(){ 
				var i =0;
				jQuery(".cf7-container-step-confirm").find(".cf7-step-confirm-item").each(function(index, element) {
					console.log(i+" : "+jQuery(this).find(".cf7-step-confirm-name").text());
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "count_users: "){
						console.log("FOUND count_users");
						
						jQuery(this).addClass("hidden");
						
						jQuery(this).remove();
						
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "count_licences: "){
						

						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "task_per_user: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "chat_per_user: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "dash_per_store: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "master_console_per_store: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "post_pricing_values: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "pricing_amount: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "submit: "){
						
						jQuery(this).remove();
					}
					
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "generatePDF: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "acceptance-383: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "acceptance-588: "){
						
						jQuery(this).remove();
					}	
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "acceptance-935: "){
						
						jQuery(this).remove();
					}
					if(jQuery(this).find(".cf7-step-confirm-name").text() == "multistep: "){
						
						jQuery(this).remove();
					}
					if(show_default != "true" )
					{
						
						if(jQuery(this).find(".cf7-step-confirm-name").text() == "Send Customised Quote links, Clients can View, Accept, Chat and Pay Deposits Instantly through their personal online link: "){
							
							jQuery(this).remove();
						}
						if(jQuery(this).find(".cf7-step-confirm-name").text() == "Intrenal Team messaging Video chat system Per User: "){
							
							jQuery(this).remove();
						}
						if(jQuery(this).find(".cf7-step-confirm-name").text() == "Create Customised Reports and Schedules to Automatically send reports to teams or individuals: "){
							
							jQuery(this).remove();
						}
						if(jQuery(this).find(".cf7-step-confirm-name").text() == "Create and Send Customised E mail Marketing direct from Smartpad Pro to your Clients, with inbuilt Auto Scheduling, and rule based targeting, get the right message to the right client every single time: "){
							
							jQuery(this).remove();
						}
					}
					
					i = i+1;
					
				});
			}, 1000);
		}
		
        //alert(jQuery( ".cf7-step-confirm-name:contains(count_users_hidden)" ).length);
		//jQuery( ".cf7-step-confirm-name:contains(count_users_hidden)" ).css( "border", "2px solid red" );
jQuery("#monthly-cost-hidden").html(thousands_separators(jQuery("#total_amount-hidden").val()));
					
    });
	
	/*function acc_type_changes(noCHage)
	{
		var selected_val = jQuery('.acc_type_select_box').val();
		
		if(selected_val == "Sign up")
		{
			jQuery('.acc_type_req_field').each(function(){
				var name = jQuery(this).attr('name');
				jQuery(this).parent('.wpcf7-form-control-wrap').addClass(name);
			});
			
			jQuery('.credit_card_details_section').addClass('show_section');
			jQuery('.credit_card_details_section').removeClass('hide_section');
			if(noCHage==0){	jQuery('.credit_card_details_section input').val('');}
			
		}
		else
		{
			jQuery('.acc_type_req_field').each(function(){
				var name = jQuery(this).attr('name');
				jQuery(this).parent('.wpcf7-form-control-wrap').removeClass(name);
			});				
			jQuery('.credit_card_details_section').removeClass('show_section');
			jQuery('.credit_card_details_section').addClass('hide_section');if(noCHage==0){
			
			jQuery('.credit_card_details_section input').each(function(){
				
				var input = jQuery(this);
				input.val("NA");
			});}
		
		}
	}
	*/
	jQuery(document).ready(function(e) {
        //alert(jQuery( ".cf7-step-confirm-name").length);
		//jQuery( ".cf7-step-confirm-name:contains('count_users_hidden: ')" ).css( "text-decoration", "underline" );
		jQuery('.container-cf7-steps.container-cf7-steps-4 .multistep-cf7-next').click(function(){
				var current_tab = jQuery('.cf7-display-steps-container .active').data('i');
				/*if(current_tab == 3)
				{
					acc_type_changes(1);
				}*/
				setTimeout(function(){ 
					var active_tab = jQuery('.cf7-display-steps-container .active').data('i');
					if(active_tab == 3)
					{
						/*jQuery('.multistep-nav .multistep-nav-right .multistep-cf7-next').html('Finish <span class="ajax-loader hidden"></span>');
						jQuery('.cf7-step-confirm-title').each(function(){
							var heading = jQuery(this).text();
							heading = heading.trim();
							
							if(heading == "Account Type")
							{	
								jQuery(this).nextUntil('.cf7-step-confirm-item').css("border","1px solid red");
								
								var i = 1;
								jQuery(this).nextAll('.cf7-step-confirm-item').addClass("acc_type_hide");
								
								jQuery('.acc_type_hide').each(function(){
								
									if( i == 1)
									{
										var account_type = jQuery(this).find('.cf7-step-confirm-value').html();
										if( (account_type == "Choose") || (account_type == "Start a 30 Day Free Trial") )
										{
											jQuery(".acc_type_hide").addClass("hide_section");
											jQuery(".acc_type_hide").removeClass("show_section");
											
											jQuery(this).removeClass("hide_section");
										}
										else
										{
											jQuery(".acc_type_hide").addClass("show_section");
											jQuery(".acc_type_hide").removeClass("hide_section");
										}
									}
									
									i++;								
								});
								
								jQuery(this).nextAll('.cf7-step-confirm-item').each(function(){
									if(i == 1)
									{
										var account_type = jQuery(this).find('.cf7-step-confirm-value').html();
										if( (account_type == "Choose") || (account_type == "Start a 30 Day Free Trial") )
										{
											jQuery(".acc_type_hide").addClass("hide_section");
											jQuery(".acc_type_hide").removeClass("show_section");
										}
										else
										{
											jQuery(".acc_type_hide").addClass("show_section");
											jQuery(".acc_type_hide").removeClass("hide_section");
										}
									}
									i++;
								});
							}
						});*/
					
					
						jQuery('.cf7-content-tab .wpcf7-form-control-wrap').each(function(){
							if(jQuery(this).hasClass('acceptance-383'))
							{
								jQuery(this).find('.wpcf7-not-valid-tip').html("Please accept our terms and conditions before continuing.");
							}
							else if(jQuery(this).hasClass('acceptance-588'))
							{
								jQuery(this).find('.wpcf7-not-valid-tip').html("Please accept our privacy policy before continuing.");
							}
							else if(jQuery(this).hasClass('acceptance-935'))
							{
								jQuery(this).find('.wpcf7-not-valid-tip').html("Please accept our maintenance agreement before continuing.");
							}
							
						});
						jQuery('.pdf-btn').hide();
						var data1 = jQuery('.cf7-container-step-confirm').html();
						var total_cost = jQuery('.view_total_cost').html();
						data = data1 + total_cost;
						   jQuery.post(
							  "../wp-content/themes/smartpadpro/add_data.php",
							  { data: data })
							  .done(function() {
								jQuery('.pdf-btn').show();
						  });
						 // jQuery('.multistep-nav .multistep-nav-right .multistep-cf7-next').html('Thank you for your submission. we will get back to you soon. ');
					}
					else
					{
						/*jQuery('.multistep-nav .multistep-nav-right .multistep-cf7-next').html('Next <span class="ajax-loader hidden"></span>');*/
					}
				}, 1000);
			
		});
		
		/*jQuery('.container-cf7-steps.container-cf7-steps-5 .multistep-cf7-prev,.container-cf7-steps.container-cf7-steps-5 .multistep-cf7-first').click(function(){
			
			jQuery('.multistep-nav .multistep-nav-right .multistep-cf7-next').html('Next <span class="ajax-loader hidden"></span>');			
		});*/
		
		
		jQuery('.download_pdf_button').click(function(event){
			
			jQuery.post(
				  "../wp-content/themes/smartpadpro/pdf.php",
				  { form_action: "confirmation_section" })
				  .done(function(data) {
						if(data == 1)
						{
							document.location.href = '../wp-content/themes/smartpadpro/pdf.php';
						}
			  });
		});
		
				jQuery('.signup_submit .confirm_submission').submit(function(){
					jQuery('.cf7-tab-1').css('display', 'none !important');
					jQuery('.cf7-tab-4').css('display', 'block !important');
					});
		
    });

		/*jQuery(document).delegate(".acc_type_select_box",'change',function(){
			acc_type_changes(0);
		});*/
		
		/*unction initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');

        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo('bounds', map);

        // Set the data fields to return when the user selects a place.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }*/
	  
	  	// new function for range increment 
	  function change_range_value_up(field_id , input_id , fun_field1 , fun_field2 , limit)
		{
				 	var old_val = parseInt(jQuery('#'+field_id).html());
					var new_val = old_val + 1; 
					if(new_val <= limit)
					{
						jQuery('#'+field_id).html(new_val);
						jQuery('#'+input_id).val(new_val);
						jQuery('#'+input_id).trigger('input').val(new_val);
						jQuery('#'+input_id).rangeslider('update', true);
						updateTextInput(new_val , fun_field1, fun_field2);
						
					}
		}
		
		// new function for rangee decrement 
		
function change_range_value_down(field_id , input_id , fun_field1 , fun_field2 , limit) 
		{				 
			var old_val = parseInt(jQuery('#'+field_id).html());
					if(old_val > limit)
					{
						var new_val = old_val -1;
						jQuery('#'+field_id).html(new_val);
						jQuery('#'+input_id).val(new_val);
						jQuery('#'+input_id).trigger('input').val(new_val);
						jQuery('#'+input_id).rangeslider('update', true);
						updateTextInput(new_val , fun_field1, fun_field2);
					}
				  }
				  
				  
				  
				  