<!doctype html>
<html lang="en">
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-128268782-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-128268782-1');
	</script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=AW-781576648"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'AW-781576648');
	</script>

	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="<?= actions()->cssUrl('style.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?= actions()->cssUrl('animate.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?= actions()->cssUrl('animation.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?= actions()->jsUrl('plugins/owl-carousel/dist/assets/owl.carousel.css'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?= actions()->jsUrl('plugins/owl-carousel/dist/assets/owl.theme.default.min.css'); ?>" />
    
    <?php if( get_the_ID() == 17){ ?>
    	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<?php } ?>

    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="shortcut icon" href="<?= actions()->imageUrl('favicon.png'); ?>?d=<?= time(); ?>">
	<meta name="description" content="<?= get_post_meta(get_the_ID(), 'meta_description', TRUE); ?>">
	<meta name="keywords" content="<?= get_post_meta(get_the_ID(), 'meta_keywords', TRUE); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php wp_head(); ?>
	<?php
		$hasBanner = get_the_ID() != 386 && get_the_ID() != 412 ? 1 : 0;
	?>
	<meta name="google-site-verification" content="HcsjlYeQ_Cijk2naHDU2vD85jHWU9_4ie3rXytTD_VY" />
	<style>
	.box-head{
		font-size: 19px;
    color: black;
    font-weight: 600;
}
.box-desc
{
font-size: 13px;
    line-height: 19px;
    color: grey;
    text-align: center;
    word-spacing: 2px;
}
	
	</style>
</head>
<body>
	<input type="hidden" name="has_banner" value="<?= $hasBanner; ?>" />
	<div class="floating-menu hidden-xl-up">
		<button class="btn btn-white btn-shadowed tall-12 fat-15" id="dropdown-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fa fa-list"></i>
		</button>
		<div class="dropdown-menu dropdown-menu-right padding-0" aria-labelledby="dropdown-menu">
			<?php $nav = wp_get_nav_menu_items('Footer Navigation'); ?>
        	<?php foreach($nav as $n): ?>
            	<a class="dropdown-item <?= $n->object_id == get_the_ID() ? 'active' : '' ?>" href="<?= $n->url; ?>"><?= $n->title; ?></a>
		    <?php endforeach; ?>
            <div class="dropdown-divider m-0"></div>
            <a class="dropdown-item" href="<?= get_post_meta(2, 'nav_circle_link', TRUE); ?>">"><i class="fa fa-user"></i> &nbsp; <?= get_post_meta(2, 'nav_circle_label', TRUE); ?></a>
		</div>
	</div>
	
	<div class="sticky-header">
		<nav class="navbar fixed-top navbar-toggleable-lg navbar-light shadowed bg-dark hidden-lg-down" <?php if($hasBanner): ?>style="top: -300px;"<?php endif; ?>> <!--  tall-15 fat-35 -->
		    <a class="navbar-brand text-lg-center text-md-center text-sm-center text-xs-center" href="<?= get_site_url(); ?>">
		    	<img src="<?= get_post_meta(2, 'footer_logo', TRUE); ?>" alt="Smartpad Pro" style="width: 325px;" />
		    </a>
		    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-collapsible" aria-controls="menu-collapsible" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		    </button> -->
            <div class="row">
		    <div class="collapse navbar-collapse col-lg-12" id="menu-collapsible">

		        <ul class="navbar-nav ml-auto" style="padding-left: 15px;">
					<?php 
						wp_nav_menu([
							'menu'            => 'Main Navigation',
						    'container'       => '',
						    'container_class' => '',
						    'container_id'    => '',
						    'menu_class'      => 'navbar-nav ml-auto stickyMenu',
						    'menu_id'         => '',
						    'echo'            => true,
						    'fallback_cb'     => 'wp_page_menu',
						    'before'          => '',
						    'after'           => '',
						    'link_before'     => '',
						    'link_after'      => '',
						    'items_wrap'      => '<ul id="" class="navbar-nav ml-auto stickyMenu">%3$s</ul>',
						    'depth'           => 0,
						    'walker'          => false
						]); 
					?>
                    <a id="Setmore_button_iframe" class="btn btn-blue white-text" style="float:none;" href="https://my.setmore.com/bookingpage/a9c1dda8-a495-4146-abf4-122811bce113">Book a Demo</a>
		           <?php /*?> <li class="nav-item">
		                <a style="text-decoration: none !important" class="btn btn-transparent-blue" href="<?= get_post_meta(2, 'nav_circle_link', TRUE); ?>"><?= get_post_meta(2, 'nav_circle_label', TRUE); ?></a>
		            </li><?php */?>
		        </ul>
		    </div>
			</div>
        </nav>
	</div>
<style>

</style>

	<header <?php echo ((!empty(get_the_post_thumbnail_url(get_the_ID()))) ?  'style="background: url('. get_the_post_thumbnail_url(get_the_ID(), 'full').'); background-size: cover; background-repeat: no-repeat; background-position: center center;"' : '') ?>>
        
			<nav class="navbar navbar-toggleable-lg navbar-light bg-dark">
			    <a class="navbar-brand text-lg-center text-md-center text-sm-center text-xs-center" href="<?= get_site_url(); ?>">
			    	<img src="<?= get_post_meta(2, 'banner_logo', TRUE); ?>" alt="Smartpad Pro" style="width: 325px;" />
			    </a>
			    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-collapsible" aria-controls="menu-collapsible" aria-expanded="false" aria-label="Toggle navigation">
			    	<span class="navbar-toggler-icon"></span>
			    </button> -->
			    <div class="row">
                <div class="headerTop bg-dark col-lg-12">
            <div class="col-lg-12">                              
               
                	<span style="margin-left: 25px;    float: right;">
                		<a class="btn btn-blue" href="<?= get_post_meta(2, 'nav_circle_link', TRUE); ?>"><?= get_post_meta(2, 'nav_circle_label', TRUE); ?></a>
                	</span>
					<?php 
						wp_nav_menu([
							'menu'            => 'Top menu',
						    'container'       => '',
						    'container_class' => '',
						    'container_id'    => '',
						    'menu_class'      => 'navbar-nav ml-auto',
						    'menu_id'         => '',
						    'echo'            => true,
						    'fallback_cb'     => 'wp_page_menu',
						    'before'          => '',
						    'after'           => '',
						    'link_before'     => '',
						    'link_after'      => '',
						    'items_wrap'      => '<ul id="" class="topBar ml-auto">%3$s</ul>',
						    'depth'           => 0,
						    'walker'          => false
						]); 
					?>
 
                   
            </div>
        </div>
        		<div class="collapse navbar-collapse col-lg-12" id="menu-collapsible">
					<?php 
						wp_nav_menu([
							'menu'            => 'Main Navigation',
						    'container'       => '',
						    'container_class' => '',
						    'container_id'    => '',
						    'menu_class'      => 'navbar-nav ml-auto',
						    'menu_id'         => '',
						    'echo'            => true,
						    'fallback_cb'     => 'wp_page_menu',
						    'before'          => '',
						    'after'           => '',
						    'link_before'     => '',
						    'link_after'      => '',
						    'items_wrap'      => '<ul id="" class="navbar-nav ml-auto">%3$s</ul>',
						    'depth'           => 0,
						    'walker'          => false
						]); 
					?>
		            <a id="Setmore_button_iframe" class="btn btn-blue" style="float:none;" href="https://my.setmore.com/bookingpage/a9c1dda8-a495-4146-abf4-122811bce113">Book a Demo</a>
			    </div>
                </div>
			</nav>
            
				<?php 
					$bannerHeading              = get_post_meta(get_the_ID(), 'banner_heading', TRUE);
					$bannerHeading              = $bannerHeading ? $bannerHeading : '';
					$bannerHeadingDescription   = get_post_meta(get_the_ID(), 'banner_heading_description', TRUE);
					$bannerHeadingDescriptionFS = get_post_meta(get_the_ID(), 'banner_heading_description_font_size', TRUE);
					$bannerHeadingDescriptionFS = $bannerHeadingDescriptionFS.'px' ? $bannerHeadingDescriptionFS.'px' : '14px';

					$bannerButton     = get_post_meta(get_the_ID(), 'banner_button_label', TRUE);
					$bannerButtonLink = get_post_meta(get_the_ID(), 'banner_button_link', TRUE);
					if((!empty(get_the_post_thumbnail_url(get_the_ID()))) || !empty($bannerHeading || (!empty($bannerHeadingDescription)))){	?>            
					<div class="container-fluid site-container ptop-30 pbottom-25">
					
		
					<div class="text-center mtop-70 mtop-xl-0 padding-30">
		
						<?php if(!is_front_page()): ?>
							<br><br><br><br>
						<?php endif; ?>
						<h1 class="color-white"><?= $bannerHeading; ?></h1>
                        <a class="btn btn-blue" target="_blank" href="/signup/">Sign Up</a>
						<?php if($bannerHeadingDescription): ?>
							<br><br>
							<span style="font-size: <?= $bannerHeadingDescriptionFS; ?>"><?= $bannerHeadingDescription; ?></span>
						<?php endif; ?>
						<?php if($bannerButton): ?>
							<br><br>
							<a href="<?= $bannerButtonLink; ?>" class="btn btn-white fat-50 tall-15 btn-shadowed"><?= $bannerButton; ?></a>
						<?php endif; ?>
						<br><br><br>
						
						<?php 
							$banners = new WP_Query([
								'post_type' => 'banner', 
								'posts_per_page' => -111, 
								'order' => 'ASC',
								'orderby' => 'menu_order', 
								'post_status' => 'publish' 
							]); 
							if( is_front_page() ):
						?>
								<div class="card-container container mtop-80 pbottom-<?= is_front_page() ? 0 : 120; ?>  hidden-xs-down" style="max-width: 1200px; margin-bottom: -80px; visibility: <?= is_front_page() ? 'visible' : 'hidden'; ?>;">
									<img src="<?= actions()->imageUrl('mac.png'); ?>" style="width: 100%;" />
				
									<?php while($banners->have_posts()): $banners->the_post();  ?>
										<div class="mac-book-image" style="position: absolute; width: 100%; left: 0; display: none;">
											<img src="<?= get_the_post_thumbnail_url(false, 'full'); ?>" alt="<?= get_the_title(); ?>" style="width: 100%;">
										</div>
									<?php endwhile; wp_reset_postdata(); ?>
				
									<div class="mac-book-image-pager" style="position: absolute; width: 100%; bottom: 80px; text-align: center; font-size: 8px;">
										<?php while($banners->have_posts()): $banners->the_post();  ?>
											<i style="cursor: pointer; color: #999; opacity: 0.5" class="fa fa-circle"></i>&nbsp;&nbsp;
										<?php endwhile; wp_reset_postdata(); ?>
									</div>
								</div>
								
						<?php endif; ?>
					</div>
				</div>
				<?php } ?>
	</header>