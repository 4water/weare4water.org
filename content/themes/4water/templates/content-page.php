<?php while (have_posts()) : the_post(); ?>
	<section>
		<?php get_template_part('templates/multihero'); ?>
		<?php if (is_front_page() && is_root_site()) : ?>
			<div class="mission">
				<h1><?php the_field('mission_headline'); ?></h1>
				<p><?php the_field('mission'); ?></p>
			</div>
			<?php get_template_part('templates/worldmap'); ?>
			<?php get_template_part('templates/donations'); ?>
			<?php get_template_part('templates/wateraid'); ?>

		<?php elseif (is_front_page() && is_project_site()) : ?>
			<section class="description">
				<?php the_content(); ?>
			</section>

			<?php if (is_salsa_site()) : ?>
				<?php get_template_part('templates/worldmap'); ?>
				<section class="project-tutorial">
					<h1>Latest Tutorial</h1>
					<?php
						query_posts(array(
							'post_type'	=> 'tutorial',
							'showposts' => 1
						));
						while (have_posts()) : the_post();
							get_template_part('templates/content-tutorial');
						endwhile;
						wp_reset_query();
					?>
				</section>
			<?php endif; ?>
			<section class="project-news">
				<?php
					query_posts(array(
						'post_type'	=> 'post',
						'showposts' => 1
					));
					while (have_posts()) : the_post();
						get_template_part('templates/content');
					endwhile;
					wp_reset_query();
				?>
			</section>
			<?php if (!is_salsa_site()) : ?>
				<?php get_template_part('templates/worldmap'); ?>
			<?php endif; ?>
		<?php elseif (is_front_page() && is_city_site()) : ?>
			
			<article class="class"><?php the_content(); ?></article>
			<?php get_template_part('templates/class_details'); ?>

		<?php else : ?>
			<?php the_content(); ?>
			<?php if (get_field('album_id'))	get_template_part('templates/fb-photos'); ?>
			<?php if (get_field('videos'))		get_template_part('templates/fb-videos'); ?>
		<?php endif; ?>

		<?php get_template_part('templates/rows-columns'); ?>
		
	</section>
	<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>
<?php endwhile; ?>