<?php
/**
 * Template Name: Contact Us
 */
?>

<?php get_header(); 
$site_id= fetch_website_id(); ?>
	
<div class="section-content background-color-light-gray color-black">
	<h1 class="text-center font-weight-normal mbottom-50"><?= get_the_title(); ?></h1>
	<div class="container-fluid site-container background-color-white border-radius-20 padding-0">
		<?php while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<div class="section-content background-color-white tall-30 tall-xl-20">
	<div class="site-container container-fluid">
		<div class="row mtop-40 text-sm-center text-xs-center text-lg-left fat-xl-30 mobile-padding-none">
			
            <div class="col-lg-4">
            	<div class="contact_section">
                    
                    <div class="col-xl-12 col-lg-12 text-xl-left text-lg-center mbottom-xl-60 mbottom-20 f-left">
                    	<h3>Tech Support</h3>
                        <img style="width: 100%;" class="align-top mtop-8" src="<?= get_post_meta(21, 'section_one_image', TRUE) ?>" alt="<?= get_post_meta(21, 'section_one_title', TRUE) ?>" />  
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 text-xl-left text-lg-center mbottom-xl-60 mbottom-20 f-left">
                        <span class="font-size-21 color-black"><?= get_post_meta(21, 'section_one_title', TRUE) ?></span>
                        <br><br>
                        <span>Phone: <?php echo  get_custom_contact_meta($site_id , 'phone_tech_support');?></span><br />
                        <span>Email: <?php echo  get_custom_contact_meta($site_id , 'email_tech_support');?></span><br /><br />
                        <span><?php  //get_post_meta(21, 'section_one_content', TRUE) ?></span>
                        <a class="btn btn-transparent-blue" data-toggle="modal" data-target="<?= get_post_meta(21, 'contact_us_link_1', TRUE) ?>" href="<?= get_post_meta(21, 'contact_us_link_1', TRUE) ?>"><?= get_post_meta(21, 'contact_us_label_1', TRUE) ?></a>
                    </div>
            	</div>
                
            </div>
            
            <div class="col-lg-4">
            	<div class="contact_section">
                    
                    <div class="col-xl-12 col-lg-12 text-xl-left text-lg-center mbottom-20 f-left">
                        <h3>Sales Enquiries</h3>
                        <img style="width: 100%;" class="align-top mtop-8" src="<?= get_post_meta(21, 'section_two_image', TRUE) ?>" alt="<?= get_post_meta(21, 'section_two_title', TRUE) ?>" />  
                    </div>
                
                    <div class="col-xl-12 col-lg-12 text-xl-left text-lg-center mbottom-20 f-left"> <!--  pl-0 -->
                        <span class="font-size-21 color-black"><?= get_post_meta(21, 'section_two_title', TRUE) ?></span>
                        <br><br>
                        <span> Phone : <?php echo get_custom_contact_meta($site_id, 'phone_sales_enquiry');?></span><br />
                          <span>Email: <?php echo  get_custom_contact_meta($site_id , 'email_sales_enquiry');?></span><br /><br />
                        <?php //get_post_meta(21, 'section_two_content', TRUE) ?>
                        <div> <a class="btn btn-transparent-blue" data-toggle="modal" data-target="<?= get_post_meta(21, 'contact_us_link_2', TRUE) ?>" href="<?= get_post_meta(21, 'contact_us_link_2', TRUE) ?>"><?= get_post_meta(21, 'contact_us_label_2', TRUE) ?></a></div>
                    </div>
                </div>
        	</div>
            
            <div class="col-lg-4">
            	<div class="contact_section">
                    
                    <div class="col-xl-12 col-lg-12 text-xl-left text-lg-center mbottom-20 f-left">
                        <h3>Product support</h3>
                        <img style="width: 100%;" class="align-top mtop-8" src="<?= get_post_meta(21, 'section_three_image', TRUE) ?>" alt="<?= get_post_meta(21, 'section_three_title', TRUE) ?>" />  
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 text-xl-left text-lg-center mbottom-20 f-left"> <!--  pl-0 -->
                        <span class="font-size-21 color-black"><?= get_post_meta(21, 'section_three_title', TRUE) ?></span>
                        <br><br>
                       <span> Phone : <?php echo get_custom_contact_meta($site_id , 'phone_product_support');?></span><br />
                        <span>Email: <?php echo  get_custom_contact_meta($site_id , 'email_product_support');?></span><br /><br />
                        <?php  //get_post_meta(21, 'section_three_content', TRUE) ?>
                        <div> <a class="btn btn-transparent-blue" data-toggle="modal" data-target="<?= get_post_meta(21, 'contact_us_link_3', TRUE) ?>" href="<?= get_post_meta(21, 'contact_us_link_3', TRUE) ?>"><?= get_post_meta(21, 'contact_us_label_3', TRUE) ?></a></div>
                    </div>
                </div>
        	</div>
            
		</div>
        <br />
	</div>
</div>

<div class="section-content" style="background-color:<?= get_post_meta(21, 'pricing_bg_color', TRUE); ?>">
    <div class="row">
        <div class="col-lg-12"> 
            <div class="text-white text-center font_20">
                <span> <?= get_post_meta(21, 'pricing_heading', TRUE); ?> </span> &nbsp; &nbsp; &nbsp; &nbsp;
                <a class="btn btn-transparent-white" href=" <?= get_post_meta(21, 'pricing_link', TRUE); ?> "> <?= get_post_meta(21,'pricing_button', TRUE); ?> </a>
            </div>
        </div>
    </div>
</div>
        
<div class="section-content">
	<div class="container-fluid site-container background-color-white border-radius-20 padding-0">
		<h1 class="text-center font-weight-normal mbottom-50"><?= get_post_meta(21, 'demo_heading', TRUE); ?></h1>
		<h3 style="margin-bottom:20px; color: black;text-align : center;"><?= get_post_meta(21, 'demo_sub_heading', TRUE); ?></h3>
        <div>
        	<?= get_post_meta(21, 'demo_content', TRUE); ?>
        </div>
	</div>
</div>

<div class="section-content bg-light">
	<div class="row">
        <div class="col-lg-12"> 
            <h3 class=" mtop-20"><?= get_post_meta(21, 'demo_form_heading', TRUE); ?></h3>
            <?= do_shortcode(get_post_meta(21, 'demo_form', TRUE)); ?>
        </div>
	</div>
</div>



<div id="contact_tech_support" class="modal modal-lg mtop-20 fadeIn" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tech Support</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            	<?php 
					$shortcode = get_post_meta(21, 'contact_us_tech_form', TRUE);
					echo do_shortcode($shortcode); 
				?>
            	
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div>

<div id="contact_sales_enquiries" class="modal modal-lg mtop-20 fadeIn" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sales Enquiries</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            	<?php 
					$shortcode = get_post_meta(21, 'contact_us_sales_form', TRUE);
					echo do_shortcode($shortcode); 
				?>
            	
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div>

<div id="contact_product_support" class="modal modal-lg mtop-20 fadeIn" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Product support</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            	<?php 
					$shortcode = get_post_meta(21, 'contact_us_product_form', TRUE);
					echo do_shortcode($shortcode); 
				?>
            	
            </div>
            <!--<div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div>

<iframe src="<?= get_post_meta(21, 'map_url', TRUE); ?>" width="100%" height="450" frameborder="0" style="margin-bottom: -10px; border:0" allowfullscreen></iframe>

<?php get_footer(); ?>