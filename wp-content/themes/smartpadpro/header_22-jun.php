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
   <!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.1/rangeslider.min.css" />-->
     <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
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
			<?php /*?>
            <a class="dropdown-item" href="<?= get_post_meta(2, 'nav_circle_link', TRUE); ?>"><i class="fa fa-user"></i> &nbsp; <?= get_post_meta(2, 'nav_circle_label', TRUE); ?></a>
			<?php */?>
		</div>
	</div>
	
	<div class="sticky-header">
		<nav class="navbar fixed-top navbar-toggleable-lg navbar-light shadowed bg-white hidden-lg-down" <?php if($hasBanner): ?>style="top: -300px;"<?php endif; ?>> <!--  tall-15 fat-35 -->
		    <a class="navbar-brand text-lg-center text-md-center text-sm-center text-xs-center" href="<?= get_site_url(); ?>" style="padding:0px">
		    	<img class="sticky-header-logo" src="<?= get_post_meta(2, 'banner_logo', TRUE); ?>" alt="Smartpad Pro" style="margin-top: 10px;" />
		    </a>
		    <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-collapsible" aria-controls="menu-collapsible" aria-expanded="false" aria-label="Toggle navigation">
		    	<span class="navbar-toggler-icon"></span>
		    </button> -->
            <div class="row" style="width:100%">
		    <div class="collapse navbar-collapse col-lg-12" id="menu-collapsible">

		        <ul class="navbar-nav ml-auto">
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
                      <a class="btn btn-sky-blue white-text top-book-demo" style="margin-top : 0;float:left;margin-left: 6px;border:none" href="<?php echo site_url()?>/contact">Book a Demo</a>
		           <?php /*?> <li class="nav-item">
		                <a style="text-decoration: none !important" class="btn btn-transparent-blue" href="<?= get_post_meta(2, 'nav_circle_link', TRUE); ?>"><?= get_post_meta(2, 'nav_circle_label', TRUE); ?></a>
		            </li><?php */?>
		        </ul> 
		    </div>
			</div>
        </nav>
	</div>
<script>
jQuery(document).ready(function(){
	jQuery('.show_flags').click(function(){ 
			jQuery('.flags').toggle();
		});
	});
</script>
<style>
.top-book-demo
{
	margin-top : 0 !important;
	    padding-top: 10px !important;
}
</style>
	<header <?php echo ((!empty(get_the_post_thumbnail_url(get_the_ID()))) ?  'style="background: url('. get_the_post_thumbnail_url(get_the_ID(), 'full').'); background-size: cover; background-repeat: no-repeat; background-position: center center;"' : '') ?>>
		<div class="headerTop bg-dark col-lg-12" >
            <div class="col-lg-12">                              
                <a class="white-text" href="https://dealers.smartpadpro.com.au/auth">
					<span style="margin-left:20px; float: right; background: #305163; padding: 12px 16px; font-size: 13px; color: white !important; font-weight: 600;">
						<span><img src="/wp-content/uploads/2019/06/SmartpadPro_Pricing_v0.9-06.png" width="13">&nbsp;Log in</span>
                	</span>
				</a>
                <div class="show_flags" style="position : relative; float:right; width: 80px; cursor: pointer; padding: 9px 0;">
					<span> 
						<img src="/wp-content/uploads/2019/06/SmartpadPro_Pricing_v0.9-04.png" >
						<span style="margin-left: 4px; font-size: 13px; vertical-align: middle;">
							Eng &nbsp;
							<i class="fas fa-caret-down"></i>
						</span>
					</span>
				</div>
            </div>
            <ul class="flags" style="right: 154px;
				background: black;
				z-index: 1;
				position: absolute;
				float: right;
				width: 88px;
				top: 40px;display : none;">
				<li> <div style="position : relative;margin-right: 140px;">
					<a href=""> <span> <img src="/wp-content/themes/smartpadpro/assets/images/flags/new-zealand-flag-icon-32.png"  style="margin-top : 8px;border : 2px solid white;">
					 <span style="margin-top: -18px;
						position: absolute;
						margin-left: 36px;
						font-size: 13px;color : white;">&nbsp;NZ</span></span></a>
					 </div>
				 </li>
				 <li> <div style="position : relative;margin-right: 140px;">
					 <a href=""><span> <img src="/wp-content/themes/smartpadpro/assets/images/flags/united-states-of-america-flag-icon-32.png"  style="margin-top : 8px;border : 2px solid white;">
					 <span style="    margin-top: -18px;
						position: absolute;
						margin-left: 36px;
						font-size: 13px;color : white;">&nbsp;USA</span></span></a>
					 </div>
				 </li>
				 <li> <div style="position : relative;margin-right: 140px;">
					 <a href=""><span> <img src="/wp-content/themes/smartpadpro/assets/images/flags/canada-flag-icon-32.png"  style="margin-top : 8px;border : 2px solid white;">
					 <span style="    margin-top: -18px;
						position: absolute;
						margin-left: 36px;
						font-size: 13px;color : white;">&nbsp;CA</span></span></a>
					 </div>
				 </li>
				 <li> <div style="position : relative;margin-right: 140px;">
					 <a href=""><span> <img src="/wp-content/uploads/2019/06/SmartpadPro_Pricing_v0.9-04.png"  style="margin-top : 8px;">
					 <span style="margin-top: -18px;
						position: absolute;
						margin-left: 36px;
						font-size: 13px;color:white;">&nbsp;UK</span></span></a>
					 </div> 
				 </li>
				  
			</ul>
        </div>
		<nav class="navbar navbar-toggleable-lg navbar-light bg-white" style="padding : 10px 35px 10px 35px;">
			<a href="<?php echo site_url(); ?>"><img class="header-logo" src="<?= get_post_meta(2, 'banner_logo', TRUE); ?>" alt="Smartpad Pro" style="margin-top : 10px;"></a>
		   <?php /* <a class="navbar-brand text-lg-center text-md-center text-sm-center text-xs-center" href="<?= get_site_url(); ?>" style="border : 2px solid red;">
				<img src="<?= get_post_meta(2, 'banner_logo', TRUE); ?>" alt="Smartpad Pro" style="width: 325px;" />
			</a> */ ?>
			<!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-collapsible" aria-controls="menu-collapsible" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button> -->
			<div class="row" style="width:100%">

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
						'after'           => 
						'',
						'link_before'     => '',
						'link_after'      => '',
						'items_wrap'      => '<ul id="" class="navbar-nav ml-auto">%3$s</ul>',
						'depth'           => 0,
						'walker'          => false
					]); 
				?>
				<a class="btn btn-sky-blue book-demo" style="float:none; margin-left: 6px;font-weight:600; margin-top: 7px; padding: 10px;" href="<?php echo site_url()?>/contact">Book a Demo</a>
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
				<a class="btn btn-blue" target="_blank" href="/contact/">Sign Up</a>
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
    <?php if(isset($_POST["post_pricing_values"]) ){
		//echo "<pre>"; print_r($_POST);echo "</pre>";
		$_SESSION["pricing_amount"] 			= $_POST["pricing_amount"];
		$_SESSION["count_users"] 				= $_POST["count_users"];
		$_SESSION["count_licences"] 			= $_POST["count_licences"];
		$_SESSION["task_per_user"] 				= $_POST["task_per_user"];
		$_SESSION["chat_per_user"] 				= $_POST["chat_per_user"];
		$_SESSION["dash_per_store"] 			= $_POST["dash_per_store"];
		$_SESSION["master_console_per_store"] 	= $_POST["master_console_per_store"];
	}		
	
	?>
	<script>
		
		jQuery(document).ready(function(e){
			<?php if(isset($_POST["post_pricing_values"]) ){ ?>
				if( jQuery("#count-users-hidden").length>0 ){
					jQuery("#count-users-hidden").val(<?php echo $_SESSION["count_users"]; ?>);
					jQuery("#count-licences-hidden").val(<?php echo $_SESSION["count_licences"]; ?>);
					jQuery("#task-per-user-hidden").val(<?php echo $_SESSION["task_per_user"]; ?>);
					jQuery("#chat-per-user-hidden").val(<?php echo $_SESSION["chat_per_user"]; ?>);
					jQuery("#dash-per-store-hidden").val(<?php echo $_SESSION["dash_per_store"]; ?>);
					jQuery("#master-console-per-store-hidden").val(<?php echo $_SESSION["master_console_per_store"]; ?>);
				}
			<?php } ?> 
		})
	</script>