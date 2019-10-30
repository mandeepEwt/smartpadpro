<?php get_header(); ?>

<div class="section-content background-color-light-gray">
	<div class="site-container container-fluid">
		<h1 class="text-center color-black font-weight-normal mbottom-70"><?php the_title(); ?></h1>
		<?php while(have_posts()): the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer(); ?>