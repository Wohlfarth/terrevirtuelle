<?php get_header(); ?>
<?php get_sidebar(); ?>


		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<h2><?php the_title(); ?></h2>	
				<?php the_content('<p>Read more...</p>'); ?>

		<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>



<?php get_footer(); ?>
