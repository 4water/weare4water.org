<article <?php post_class(); ?>>
	<header>
		<h2>
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php get_template_part('templates/entry-meta'); ?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>