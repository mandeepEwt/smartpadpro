<?php
/**
 * Template Name: Features
 */
?>

<?php get_header(); ?>

<div class="section-content background-color-light-gray">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-md-6">
				<?php while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<div class="col-md-6 bordered-left-content">
				<?= get_post_meta(13, 'right_content', TRUE); ?>
			</div>
		</div>
	</div>
</div>

<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-md-12">
				<div class="text-center mbottom-50"><strong class="color-blue"><?= get_post_meta(13, 'gallery_title', TRUE); ?></strong></div>

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
								'terms'    => 'feature',
							],
						],
						'posts_per_page' => -1
					]);
				?>

				<div class="text-center hidden-md-down mbottom-100">
					<?php while($features->have_posts()): $features->the_post(); ?>
						<div class="feature-icon">
							<div class="feature-icon-image" style="background-image: url(<?= get_post_meta(get_the_ID(), 'original', TRUE); ?>);">
							</div>
							<span class="feature-icon-title"><?= get_post_meta(get_the_ID(), 'title_display', TRUE); ?></span>

							<div class="feature-image-value hidden-xl-down"><?= get_the_post_thumbnail_url(null, 'full') ?></div>
							<div class="feature-content-value hidden-xl-down"><?php the_content(); ?></div>
							<div class="feature-title-value hidden-xl-down"><?= get_the_title(); ?></div>
							<div class="feature-icon-value hidden-xl-down"><?= str_replace('.png', '-hover.png', get_post_meta(get_the_ID(), 'original', TRUE)); ?></div>
						</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>

				<div class="feature-dropdown dropdown text-center hidden-lg-up mbottom-50">
					<button style="width: 100%" class="btn dropdown-toggle color-blue border-color-blue background-color-white" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<img style="width: 30px" class="feature-icon-image"/> &nbsp;
						<span class="feature-title color-blue"></span>
					</button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenu2">
						<?php while($features->have_posts()): $features->the_post(); ?>
							<button class="dropdown-item color-gray" type="button">
								<img style="width: 30px" src="<?= get_post_meta(get_the_ID(), 'original', TRUE); ?>" alt="<?= get_the_title(); ?>" />
								<span><?= get_the_title(); ?></span>

								<div class="feature-image-value hidden-xl-down"><?= get_the_post_thumbnail_url(null, 'full') ?></div>
								<div class="feature-content-value hidden-xl-down"><?php the_content(); ?></div>
								<div class="feature-title-value hidden-xl-down"><?= get_the_title(); ?></div>
								<div class="feature-icon-value hidden-xl-down"><?= str_replace('.png', '-hover.png', get_post_meta(get_the_ID(), 'original', TRUE)); ?></div>
							</button>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</div>
		
		<div>
			<div class="feature-content">
				<h1 class="text-center mbottom-70 feature-title"></h1>
				<div class="row">
					<div class="col-md-1 text-center hidden-sm-down">
						<button class="feature-previous btn btn-white btn-shadowed border-radius-25 tall-12" style="top: 50%"><i class="fa fa-arrow-left"></i></button>
					</div>
					<div class="col-md-10 feature-image">
						<img class="shadowed" src="" style="width: 100%" />
					</div>
					<div class="col-md-1 text-center hidden-sm-down">
						<button class="feature-next btn btn-white btn-shadowed border-radius-25 tall-12" style="top: 50%""><i class="fa fa-arrow-right"></i></button>
					</div>
				</div>
				<div class="row mtop-70">
					<div class="col-md-1 text-center hidden-sm-down">
					</div>
					<div class="col-md-10 feature-text">
						
					</div>
					<div class="col-md-1 text-center hidden-sm-down">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>