<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>
	<!--[if lt IE 8]><div class="chromeframe"><p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">activate Google Chrome Frame</a> to improve your experience.</p></div><![endif]-->

	<?php get_template_part('templates/header'); ?>

	<div class="main <?php echo roots_main_class(); ?>" role="main">
		<?php include roots_template_path(); ?>
	</div>
	
	<?php if (roots_display_sidebar()) : ?>
		<aside role="complementary">
			<?php include roots_sidebar_path(); ?>
		</aside>
	<?php endif; ?>

	<?php get_template_part('templates/footer'); ?>

</body>
</html>