	<div class="section-content section-gradient-strip fat-sm-30 text-sm-center text-xs-center">
		<div class="container-fluid site-container">
			<div class="row">
				<div class="<?php if( get_the_ID() != 19 ){ ?> col-lg-8 <?php  }else {?> col-lg-12 <?php } ?> mtop-15">
					<h3><?= get_post_meta(2, 'gradient_content', TRUE) ?></h3>
				</div>
                <?php if( get_the_ID() != 19 ){ ?>
                <div class="col-lg-4 text-lg-center text-sm-center text-xs-center">
					<a target="_blank" href="<?= get_post_meta(2, 'gradient_button_action', TRUE) ?>" class="btn btn-white fat-50 tall-15 btn-shadowed"><?= get_post_meta(2, 'gradient_button_label', TRUE) ?></a>
                    <a id="Setmore_button_iframe" class="btn btn-blue" style="float:none" href="https://my.setmore.com/bookingpage/a9c1dda8-a495-4146-abf4-122811bce113">Book a Demo</a>
				</div>
                <?php } ?>
			</div>
		</div>
	</div>

	<footer class="section-content pb-0 pr-0 pl-0 bg-dark" style="padding : 30px 30px;">
    
		<div class="container-fluid site-container fat-sm-30">
			<div class="row" style="padding-right: 30px; padding-left: 30px;">
				<div class="col-lg-5 col-md-12">
					<!--<span class="font-size-normal font-weight-bold color-blue"><?//= get_post_meta(2, 'left_content_title_one', TRUE); ?></span><br>
					<h3 class="color-blue"><?//= get_post_meta(2, 'left_content_title_two', TRUE); ?></h3>
					<br>-->
					<?= get_post_meta(2, 'left_content', TRUE); ?>
				</div>
				
				<div class="col-lg-3 col-sm-4 col-xs-12 ptop-xs-30 footer_nav footer-text-middle">
					<div class="footer-headings color-white"><?= get_post_meta(2, 'middle_content_title', TRUE); ?></div>
					<?php $nav = wp_get_nav_menu_items('Footer Navigation'); ?>
		        	<?php foreach($nav as $n): ?>
		        		<strong><a class="color-gray" href="<?= $n->url; ?>"><?= $n->title; ?></a></strong><br>
				    <?php endforeach; ?>
                    <div class="row">
                    	<div class="col-lg-6"> </div>
                        <div class="col-lg-6"></div>
                    </div>
				</div>
                <div class="col-lg-4 col-sm-8 col-xs-12 footer-text-right">
					<span class="footer-headings color-white"><?= get_post_meta(2, 'right_content_title', TRUE); ?></span>
					<br><br>
					<?php echo do_shortcode('[contact-form-7 id="1605" title="Subscriber Form"]'); ?><br />
                    <div class="row">
						<div class="col-4"><img src="<?= get_post_meta(2, 'footer_right_logo', TRUE); ?>" style="max-width:120px;width:100%" /> </div>
						<div class="col-8 social-icons-col"> 
							<span class="social-icons"><img src="/wp-content/themes/smartpadpro/assets/images/fb.png" /></span> 
							<span class="social-icons"><img src="/wp-content/themes/smartpadpro/assets/images/twitter.png" /></i></span> 
							<span class="social-icons"><img src="/wp-content/themes/smartpadpro/assets/images/instagram.png" /></i> </span> 
							<span class="social-icons"><img src="/wp-content/themes/smartpadpro/assets/images/youtube.png" /></span>
						</div>
				</div>
			</div>
			
		</div>
		
	<br>

		<div class="tall-20 border-top-color-gray footer-divider" style="margin-top: -20px;">
			<div class="container-fluid site-container footer_bottom_part">
				<div class="row">
				<?php /*?>	<div class="col-md-6 col-sm-12 text-md-left text-sm-center text-xs-center">
						<img src="<?= get_post_meta(2, 'footer_logo', TRUE); ?>" alt="Logo" /> 	
                        <img src="<?= get_post_meta(2, 'footer_right_logo', TRUE); ?>" alt="Logo" /> 
					</div><?php */?>
					<div class="col-md-12 col-sm-12 text-sm-center text-xs-center copyright">
                    	<div style="margin-bottom : 5px;">
                    	<a class="color-grey-blue  footer-bottom" href="/maintenance-agreement/">Maintenance Agreement</a>&nbsp;&nbsp; &nbsp;&nbsp;| &nbsp;&nbsp;&nbsp;&nbsp;
						<a class="color-grey-blue footer-bottom" href="/terms-conditions">Terms and Conditions</a>&nbsp;&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="color-grey-blue footer-bottom" href="/privacy-policy">Privacy Policy</a> </div>
                        <div> 
                        <div class="copyright_text">
						&copyCopyright <?= date('Y'); ?>&nbsp;&nbsp; <a href="<?php echo site_url();?>" class="copright_site"><?php echo site_url();?></a> &nbsp;All Rights Reserved.
                        </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<?php include_once('modals.php'); ?>

	<script type="text/javascript">var ajaxurl = "<?= admin_url('admin-ajax.php'); ?>";</script>
	<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
	<script src="<?= actions()->bowerUrl('lodash/lodash.js'); ?>"></script>
    
   
    
    <?php if(get_the_ID() == 17) {  ?>
		<!--<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>-->
    <?php } ?>
	<?php
		wp_enqueue_script('bootstrap', actions()->jsUrl('plugins/owl-carousel/dist/owl.carousel.js'), ['jquery']);
		wp_enqueue_script('owl-carousel', actions()->bowerUrl('bootstrap/dist/js/bootstrap.js'), ['jquery']);
		wp_enqueue_script('site', get_template_directory_uri().'/assets/js/site.js', ['jquery']);
		wp_enqueue_script('tutorials', get_template_directory_uri().'/assets/js/tutorials.js', ['jquery']);
		wp_enqueue_script('map', get_template_directory_uri().'/assets/js/map.js', ['jquery']);
		wp_enqueue_script('custom', get_template_directory_uri().'/assets/js/custom.js', ['jquery']);
		
		//wp_enqueue_script('rangeslider', get_template_directory_uri().'/assets/js/rangeslider.js', ['jquery']);
		//wp_enqueue_script('rangeslider.min', get_template_directory_uri().'/assets/js/rangeslider.min.js', ['jquery']);
		
		if(is_front_page()) { wp_enqueue_script('home', get_template_directory_uri().'/assets/js/home.js', ['jquery']); }
		if(get_the_ID() == 13 || is_front_page()) { wp_enqueue_script('features', get_template_directory_uri().'/assets/js/features.js', ['jquery']); }
		if(get_the_ID() == 17) { wp_enqueue_script('pricing', get_template_directory_uri().'/assets/js/pricing.js', ['jquery']); }
		//if(get_the_ID() == 19) { wp_enqueue_script('signup', get_template_directory_uri().'/assets/js/signup.js', ['jquery']); }
	?>
<?php /*?><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.1/rangeslider.min.js"></script><?php */?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
 <script>


  
      </script> <script>
/* function Export2Pdf() { 
	//console.log(fileName);
	fileName = "dowwnload.pdf";
	element = "generatePDF";
	//jquery('#img-display').show();
        var pdf = new jsPDF('p', 'pt', 'letter');

        // source can be HTML-formatted string, or a reference
        // to an actual DOM element from which the text will be scraped.
        source = document.getElementById("generatePDF").innerHTML;
console.log(source);
        // we support special element handlers. Register them with jQuery-style 
        // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
        // There is no support for any other type of selectors 
        // (class, of compound) at this time.
        specialElementHandlers = {
            // element with id of "bypass" - jQuery style selector
            '#bypassme': function (element, renderer) {
                // true = "handled elsewhere, bypass text extraction"
                return true
            }
        };
        margins = {
            top: 20,
            bottom: 30,
            left: 20,
			right: 20,
            width: 522
        };
        // all coords and widths are in jsPDF instance's declared units
        // 'inches' in this case
        pdf.fromHTML(
        source, // HTML string or DOM elem ref.
        margins.left, // x coord
        margins.top, { // y coord
            'width': margins.width, // max width of content on PDF
            'elementHandlers': specialElementHandlers
        },

        function (dispose) {
            // dispose: object with X, Y of the last line add to the PDF 
            //          this allow the insertion of new lines after html
           pdf.save('Test.pdf');
        }, margins);
    }*/
</script>

	<script>
		jQuery(document).ready(function($)
		{
			var id = <?= get_the_ID(); ?>;

			if(id == 19)
			{
				$('.wpcf7-submit').attr('onClick', "gtag('event', 'send_clicked', {'event_category': 'sign_up'});");
			}
			else if(id == 21)
			{
				$('.wpcf7-submit').attr('onClick', "gtag('event', 'send_contact_us', {'event_category': 'contact_us'});");
			}
			
		});
	</script>
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBC7S6kUjkOExkkBcX40PCPPLV4Z1baopU&libraries=places&callback=initMap" async defer></script>
<script id="setmore_script" type="text/javascript" src="https://my.setmore.com/webapp/js/src/others/setmore_iframe.js"></script>
	<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyADIh1bZSQm8TwCmliP-DITMyvpTaD5-lo" async defer></script>-->
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #description {
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
      }

      #infowindow-content .title {
        font-weight: bold;
      }

      #infowindow-content {
        display: none;
      }

      #map #infowindow-content {
        display: inline;
      }

      .pac-card {
        margin: 10px 10px 0 0;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        background-color: #fff;
        font-family: Roboto;
      }

      #pac-container {
        padding-bottom: 12px;
        margin-right: 12px;
      }

      .pac-controls {
        display: inline-block;
        padding: 5px 11px;
      }

      .pac-controls label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

    </style>

	<?php wp_footer(); 
	?>
	
</body>
</html>