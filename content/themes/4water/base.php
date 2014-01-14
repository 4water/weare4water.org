<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]><div class="chromeframe"><p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">activate Google Chrome Frame</a> to improve your experience.</p></div><![endif]-->

	<?php
		if (!is_root_site()) {
			switch_to_blog(1);
			get_template_part('templates/header');
			restore_current_blog();
		}
		if (is_city_site()) {
			switch_to_blog(nsh_get_parent($GLOBALS['blog_id']));
			get_template_part('templates/header');
			restore_current_blog();
		} else {
			get_template_part('templates/header');
		}
		
	?>

	<section<?php if (is_post_type_archive('product')) echo ' class="products columns"'; ?>>
		<div>
			<?php include roots_template_path(); ?>
		</div>

		<?php if (is_home() || (is_single() && get_post_type() == 'post')) : ?>
			<aside class="sidebar <?php echo roots_sidebar_class(); ?>" role="complementary">
				<?php include roots_sidebar_path(); ?>
			</aside>
		<?php endif; ?>
	</section>

	<?php if (!is_root_site()) switch_to_blog(1); ?>
	<?php get_template_part('templates/footer'); ?>
	<?php if (!is_root_site()) 	restore_current_blog(); ?>
	
	<?php wp_footer(); ?>
</body>
</html>