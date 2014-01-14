<aside>
	<h2>Class index</h2>
	<?php wp_nav_menu(array('menu'=>'tutorials')); ?>
	<h2>Tags</h2>
	<?php wp_tag_cloud(array('taxonomy'=>'tutorial_tag')); ?>
</aside>
<section class="tutorials">
	<?php while (have_posts()) : the_post(); ?>
		<?php get_template_part('templates/content', get_post_type()); ?>
		<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
	<?php endwhile; ?>
</section>