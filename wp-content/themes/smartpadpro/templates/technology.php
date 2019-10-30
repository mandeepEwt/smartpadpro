<?php
/**
 * Template Name: Technology
 */
?>

<?php get_header(); ?>

<div class="section-content background-monitor">
	<div class="container-fluid site-container">
		<div class="text-center">
			<h1><?= get_the_title(); ?></h1>
		</div>
		<div class="row mtop-250 mbottom-150 mtop-xl-0 mbottom-xl-0">
			<div class="col-xl-6">
				
			</div>
			<div class="col-xl-6 fat-xl-30">
				<?php while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
		</div>
	</div>
</div>

<div class="section-content background-color-light-gray">
	<div class="container-fluid site-container">
		<div class="row">
			<div class="col-md-12">
				<?= get_post_meta(141, 'other_content', TRUE); ?>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>