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
	<?php if ($wp_query->max_num_pages > 1) : ?>
		<nav class="post-nav">
			<ul class="pager">
				<li class="previous"><?php next_posts_link(__('Older Videos', 'roots')); ?></li>
				<li class="next"><?php previous_posts_link(__('Newer Videos', 'roots')); ?></li>
			</ul>
		</nav>
	<?php endif; ?>
</section>