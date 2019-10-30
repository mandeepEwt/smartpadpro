<?php
/**
 * Template Name: About Us
 */
?>

<?php get_header(); ?>

<div class="section-content background-macbook">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-xl-5">
				
			</div>
			<div class="col-xl-7 fat-xl-30">
				<?php while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<div class="section-content section-gradient-strip fat-30">
	<div class="text-center">
		<h2 class="font-weight-normal color-white"><?= get_post_meta(9, 'gradient_heading', TRUE); ?></h2>
		<br>
		<p class="mb-0 font-size-medium">
			<?= get_post_meta(9, 'gradient_content', TRUE); ?>
		</p>
		<br>
		<a href="<?= get_post_meta(9, 'gradient_button_link', TRUE); ?>" class="btn btn-white fat-50 tall-15 btn-shadowed"><?= get_post_meta(9, 'gradient_button_label', TRUE); ?></a>
	</div>
</div>

<div class="section-content background-color-light-gray color-black">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-md-6 pleft-sm-30 fat-xl-30">
				<?= get_post_meta(9, 'left_content', TRUE); ?>
			</div>
			<div class="col-md-6 bordered-left-content pleft-sm-30 mtop-sm-30">
				<?= get_post_meta(9, 'right_content', TRUE); ?>
				<br><br>

				<?php $values = new WP_Query(['post_type' => 'our-value', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'menu_order', 'post_status' => 'publish' ]); ?>
				<?php while($values->have_posts() ) : $values->the_post(); ?>
				    <div>
						<?php the_post_thumbnail(); ?>
						&nbsp; &nbsp;
						<strong><?= get_the_title(); ?></strong>
					</div>
					<br>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>