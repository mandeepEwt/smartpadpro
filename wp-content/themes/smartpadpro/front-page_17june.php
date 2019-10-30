<?php get_header(); ?>

<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-md-12">
				<?php $logo = get_post_meta(get_the_ID(), 'featured_logo', TRUE); ?>
				<?php if($logo): ?>
					<div class="text-center mbottom-50">
						<img src="<?= $logo; ?>" />
					</div>
				<?php endif; ?>
				<div class="text-center mbottom-50"><strong class="color-blue"><?= get_post_meta(get_the_ID(), 'feature_icons_heading', TRUE); ?></strong></div>

				<?php
					$features = new WP_Query([
						'post_type'      => 'feature',
						'post_status'    => 'publish',
						'orderby'        => 'menu_order',
						'order'          => 'ASC',
						'tax_query'      => [
							[
								'taxonomy' => 'feature-category',
								'field'    => 'slug',
								'terms'    => 'home',
							],
						],
						'posts_per_page' => -1
					]);
				?>
				<div class="text-center hidden-sm-down mbottom-100">
					<?php $key = 0; while($features->have_posts()): $features->the_post(); $key++; ?>
						<a class="feature-icon color-gray" href="#feature-icon-<?= $key; ?>" style="text-decoration: none;">
							<div class="feature-icon-image" style="background-image: url(<?= get_post_meta(get_the_ID(), 'original', TRUE); ?>);">
							</div>
							<span class="feature-icon-title"><?= get_post_meta(get_the_ID(), 'title_display', TRUE); ?></span>

							<div class="feature-image-value hidden-xl-down"><?= get_the_post_thumbnail_url(null, 'full') ?></div>
							<div class="feature-content-value hidden-xl-down"><?php the_content(); ?></div>
							<div class="feature-title-value hidden-xl-down"><?= get_the_title(); ?></div>
							<div class="feature-icon-value hidden-xl-down"><?= str_replace('.png', '-hover.png', get_post_meta(get_the_ID(), 'original', TRUE)); ?></div>
						</a>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>

				<div class="feature-dropdown dropdown text-center hidden-md-up mbottom-50">
					<button style="width: 100%" class="btn dropdown-toggle color-blue border-color-blue background-color-white" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img style="width: 30px" class="feature-icon-image"/> &nbsp;
						<span class="feature-title color-blue"></span>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
						<?php $key = 0; while($features->have_posts()): $features->the_post(); $key++; ?>
							<a class="dropdown-item color-gray" type="button" href="#feature-icon-<?= $key; ?>" style="text-decoration: none; -webkit-appearance: none;">
								<img style="width: 30px" src="<?= get_post_meta(get_the_ID(), 'original', TRUE); ?>" alt="<?= get_the_title(); ?>" />
								<span><?= get_the_title(); ?></span>

								<div class="feature-image-value hidden-xl-down"><?= get_the_post_thumbnail_url(null, 'full') ?></div>
								<div class="feature-content-value hidden-xl-down"><?php the_content(); ?></div>
								<div class="feature-title-value hidden-xl-down"><?= get_the_title(); ?></div>
								<div class="feature-icon-value hidden-xl-down"><?= str_replace('.png', '-hover.png', get_post_meta(get_the_ID(), 'original', TRUE)); ?></div>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="feature-icons owl-carousel owl-theme">
					<?php $key =0; while($features->have_posts()): $features->the_post(); $key++; ?>
						<div class="item" data-hash="feature-icon-<?= $key; ?>">
							<h1 class="text-center mbottom-70"><?= get_the_title(); ?></h1>
							<?php the_content(); ?>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</div>

<div class="section-content background-color-light-gray">
	<div class="container-fluid site-container">
		<div class="text-center mbottom-20"><strong class="color-blue"><?= get_post_meta(get_the_ID(), 'features_heading', TRUE); ?></strong></div>
		<h1 class="text-center feature-home-title feature-home-fade"></h1>
		<br>
		<div style="width: 90%; margin:0 auto;">
			<div class="feature-home-fade">
				<span class="feature-home-content"></span>
				<p class="text-center">
					<strong><a style="text-decoration: underline" href="<?= get_post_meta(2, 'feature_learn_more_link', TRUE); ?>" class="color-dark-gray">Learn More</a></strong>
				</p>
			</div>
			
			<div class="text-center feature-home-dots">
			</div>
			
			<div class="text-center mtop-40 shadowed feature-home-fade">
				<img class="feature-home-image" style="width: 100%" />
			</div>
		</div>
	</div>
</div>

<div class="icon-operating-system-wrapper section-content section-gradient-strip section-gradient-strip-large fat-sm-30 text-sm-center text-xs-center pbottom-0" style="margin-top: -80px; position: relative; z-index: 100;">
	<div class="container-fluid site-container">
		<h1 class="text-center color-white"><?= get_post_meta(get_the_ID(), 'logos_heading_one', TRUE); ?></h1>
		<?php 
			$logos = new WP_Query([
				'post_type'      => 'logo',
				'post_status'    => 'publish',
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'tax_query'      => [
					[
						'taxonomy' => 'logo-category',
						'field'    => 'slug',
						'terms'    => 'operating-systems',
					],
				],
				'posts_per_page' => -1
			]);
		?>
		<div class="text-center mtop-30 mbottom-50">
			<?php while($logos->have_posts()): $logos->the_post(); ?>
				<img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?= get_the_title(); ?>" class="mright-30 mbottom-30" />
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>

	<div class="text-center">
		<img src="<?= actions()->imageUrl('background-devices.png'); ?>" alt="Devices" class="devices-images mtop-0">
	</div>
</div>

<div class="section-content background-color-white">
	<div class="container-fluid site-container ptop-170 ptop-sm-50">
		<div class="row">
			<div class="col-md-12">
				<h1 class="text-center color-black"><?= get_post_meta(get_the_ID(), 'logos_heading_two', TRUE); ?></h1>

				<div class="row mtop-80">
					<?php 
						$logos = new WP_Query([
							'post_type'      => 'logo',
							'post_status'    => 'publish',
							'orderby'        => 'menu_order',
							'order'          => 'ASC',
							'tax_query'      => [
								[
									'taxonomy' => 'logo-category',
									'field'    => 'slug',
									'terms'    => 'third-party-softwares',
								],
							],
							'posts_per_page' => -1
						]);
					?>
					<?php while($logos->have_posts()): $logos->the_post(); ?>
						<div class="col-xl col-lg-3 col-md-4 col-sm-6 text-center mbottom-30">
							<img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>" alt="<?= get_the_title(); ?>" />
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-content background-color-light-gray">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-lg-6">
				<?php while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<!-- <div class="col-lg-6" style="background: url(<?php //actions()->imageUrl('video-bg.png'); ?>) no-repeat; width: 80%; padding: 30px;"> -->
			<div class="col-lg-6">
            	<div class="video-fluid">
					<iframe class="video-fluid-content" type="text/html" src="<?= get_post_meta(2, 'youtube_link', TRUE); ?>" frameborder="0"></iframe>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<h1 class="text-center color-black mbottom-80"><?= get_post_meta(get_the_ID(), 'map_heading', TRUE); ?></h1>
	</div>
</div>

<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<div class="video-fluid">
			<div id="map" data-type="store" class="video-fluid-content" style="width: 100%;"></div>
		</div>

		<div class="mtop-40">
			<?php
				$users = get_post_meta(get_the_ID(), 'map_box_one_value', TRUE); 
				$sales = get_post_meta(get_the_ID(), 'map_box_two_value', TRUE);

				$updated = date('Y-m-d') == get_post_meta(get_the_ID(), 'last_update', true);
				if(!$updated)
				{
					$users += rand(2, 4);
					$sales = str_replace('.', '', $sales) + rand(2000000, 3000000);
					update_post_meta(get_the_ID(), 'last_update', date('Y-m-d'));
					update_post_meta(get_the_ID(), 'map_box_one_value', $users);
					update_post_meta(get_the_ID(), 'map_box_two_value', $sales);
				}
				$users = number_format($users, 0);
				$sales = number_format($sales, 0);
			?>
			<div class="row">
				<div class="col-lg-4">
					<div class="site-count mbottom-50 fat-50 tall-30 border-radius-10 background-color-white text-center shadowed-lighter">
						<span class="site-count-value color-black font-weight-300">
							<?= $users; ?>
						</span> <br>
						<span class="color-blue site-count-label"><strong><?= get_post_meta(get_the_ID(), 'map_box_one_label', TRUE); ?></strong></span>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="site-count mbottom-50 fat-50 tall-30 border-radius-10 background-color-white text-center shadowed-lighter">
						<span class="site-count-value color-black font-weight-300">
							<span class="dollar">$</span>
							<span style="display-inline: block; margin-left: -7px;"><?= $sales ?></span>
						</span> <br>
						<span class="color-blue site-count-label">
							<strong><?= get_post_meta(get_the_ID(), 'map_box_two_label', TRUE); ?></strong>
						</span>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="site-count mbottom-50 fat-50 tall-30 border-radius-10 background-color-white text-center shadowed-lighter">
						<span class="site-count-value color-black font-weight-300"><?= get_post_meta(get_the_ID(), 'map_box_three_value', TRUE); ?></span> <br>
						<span class="color-blue site-count-label"><strong><?= get_post_meta(get_the_ID(), 'map_box_three_label', TRUE); ?></strong></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-content pbottom-50" style="background: url(<?= actions()->imageUrl('background-testimonials.jpg'); ?>);">
	<div class="container-fluid site-container">
		<h1 class="text-center color-white"><?= get_post_meta(get_the_ID(), 'testimonials_heading', TRUE); ?></h1>
		<div class="testimonials owl-carousel owl-theme mtop-80">
			<?php 
				$testimonials = new WP_Query([
					'post_type' => 'testimonial', 
					'posts_per_page' => -1, 
					'order' => 'ASC', 
					'orderby' => 'menu_order', 
					'post_status' => 'publish' 
				]); 
			?>
			<?php while($testimonials->have_posts()): $testimonials->the_post(); ?>
				<div class="testimonial-item item">
					<div class="row">
						<div class="col-md-8">
							<h3 class="color-black"><?= get_the_title(); ?></h3>
						</div>
						<div class="col-md-4 text-md-right text-left ptop-5 pbottom-10">
							<?php $rating = get_post_meta(get_the_ID(), 'rating', TRUE); ?>
							<?php for($i=1; $i<=5; $i++): ?>
								<i class="fa fa-star <?= $rating >= $i ? 'color-blue' : '' ?>"></i>
							<?php endfor; ?>
						</div>
					</div>
					
					<?= get_post_meta(get_the_ID(), 'author', TRUE); ?>
					<br><br>
					<p>
						<?php the_content(); ?>
					</p>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<div class="section-content background-color-light-gray">
	<div class="container-fluid site-container">
		<div class="text-center color-blue"><strong><?= get_post_meta(get_the_ID(), 'our_values_heading', TRUE); ?></strong></div>

		<div class="row mtop-50">
			<?php $values = new WP_Query(['post_type' => 'our-value', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order', 'post_status' => 'publish' ]); ?>
			<?php while($values->have_posts() ) : $values->the_post(); ?>
				<div class="col-md col-sm-12 mbottom-30">
				    <div class="text-center">
						<?php the_post_thumbnail(); ?>
						<div class="mtop-10 color-black"><strong><?= get_the_title(); ?></strong></div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>