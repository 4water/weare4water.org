<header class="banner <?php echo is_root_site() ? 'root' : 'child'; ?>" role="banner">
	<div>
		<a class="logo" href="<?php echo home_url(); ?>/">
			<?php $img = wp_get_attachment_image_src( get_field('logo', 'options'), 'full'); ?>
			<img src="<?php echo $img[0]; ?>" alt="4water">
			<?php // img('logo.png', '4water logo'); ?>
		</a>
		<nav id="primary" class="primary" role="navigation">
			<?php if (has_nav_menu('primary_navigation'))	wp_nav_menu(array('theme_location' => 'primary_navigation')); ?>
		<?php
			if (!is_root_site()) :
				$switched = restore_current_blog();
				if ($switched) :
					if (has_nav_menu('primary_navigation'))	wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class'=>'submenu'));
				endif;
			endif;
		?>
		</nav>

		<ul class="cta">
			<?php if (is_root_site()) : ?>
				<li><a href="//facebook.com"><i class="icon-facebook icon-2x"></i>Facebook Page</a></li>
			<?php else : ?>
				<li><a href="#">4water Menu</a></li>
			<?php endif; ?>
		</ul>
		<!--
		<a class="bannerad" href="/shop/">
			<h3>Show your support</h3>
			<p>only &pound;1 each and 60p goes to charity</p>
			<span>Get One</span>
		</a>
		<div class="extended-cta">
			<p>and <a href="http://www.facebook.com/sharer.php?s=100&p[title]=4WATER&p[summary]=Summary content...&p[url]=http://weare4water.org&p[images][0]=YOUR_IMAGE_TO_SHARE_OBJECT">share our story</a> so everyone can benefit</p>
		</div>
		-->
	</div>
</header>