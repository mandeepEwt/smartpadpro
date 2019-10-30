<?php
/**
 * Template Name: Our Team
 */
?>
<?php get_header(); ?>


		
<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<h1 class="text-center color-black"><?= get_the_title(); ?></h1>
		<?php while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<div class="video-fluid">
			<div id="map" data-type="team" class="video-fluid-content" style="width: 100%;"></div>
		</div>
	</div>
</div>

<div class="section-content background-color-white">
	<div class="container-fluid site-container">
		<div class="row">
			<?php 
				$teams = new WP_Query([
					'post_type' => 'team', 
					'posts_per_page' => -1, 
					'order' => 'ASC', 
					'orderby' => 'menu_order', 
					'post_status' => 'publish',
				]);
			?>
			<?php while($teams->have_posts()): $teams->the_post(); ?>
				<div class="col-lg-3 col-md-6 mbottom-30 team-box-wrapper" data-team-member-location="<?= get_post_meta(get_the_ID(), 'location', TRUE); ?>">
					<div class="team-box shadowed-lighter tall-40 fat-30 border-radius-10 text-center"">
						<img src="<?= get_the_post_thumbnail_url(get_the_ID(), 'full') ?>" alt="<?= get_the_title(); ?>" class="border-radius-half" />
						<div class="font-size-30 color-black"><?= get_the_title(); ?></div>
						<small><?= get_post_meta(get_the_ID(), 'position', TRUE); ?></small>
						<br><br>
						<?php the_content(); ?>
						<br><br>
						<?php if(get_post_meta(get_the_ID(), 'facebook', TRUE)): ?>
							<a target="_blank" href="<?= get_post_meta(get_the_ID(), 'facebook', TRUE); ?>"><i class="fab fa-facebook color-blue"></i></a> &nbsp;
						<?php endif; ?>
						<?php if(get_post_meta(get_the_ID(), 'twitter', TRUE)): ?>
							<a target="_blank" href="<?= get_post_meta(get_the_ID(), 'twitter', TRUE); ?>"><i class="fab fa-twitter color-blue"></i></a> &nbsp;
						<?php endif; ?>
						<?php if(get_post_meta(get_the_ID(), 'email', TRUE)): ?>
							<a href="mailto:<?= get_post_meta(get_the_ID(), 'email', TRUE); ?>"><i class="fas fa-envelope color-blue"></i></a> &nbsp;
						<?php endif; ?>
						<?php if(get_post_meta(get_the_ID(), 'linkedin', TRUE)): ?>
							<a target="_blank" href="<?= get_post_meta(get_the_ID(), 'linkedin', TRUE); ?>"><i class="fab fa-linkedin color-blue"></i></a> &nbsp;
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>