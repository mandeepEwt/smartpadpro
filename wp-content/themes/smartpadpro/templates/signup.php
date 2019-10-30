<?php
/**
 * Template Name: Sign Up
 */
?>

<?php get_header(); ?>
	
<div class="section-content color-black"><!-- background-color-light-gray  -->
	<h1 class="text-center font-weight-normal mbottom-50"><?= get_the_title(); ?></h1>
    <h3 class="text-center"><?= get_post_meta(19, 'sign_sub_heading', TRUE) ?></h3>
	<div class="container-fluid site-container background-color-white border-radius-20 padding-0">
		<?php while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>