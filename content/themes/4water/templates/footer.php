<footer>
	<div>
		<div class="summary">
			<?php $img = get_field('footer_logo', 'options'); ?>
			<img src="<?php echo $img['url']; ?>" alt="4water">
			<?php the_field('summary', 'options'); ?>
		</div>

		<?php if ($sponsors = get_field('sponsors', 'options')) : ?>
		<div class="sponsors">
			<h3><?php the_field('sponsors_headline', 'options'); ?></h3>
			<?php foreach ($sponsors as $i=>$sponsor) : ?>
				<?php echo wp_get_attachment_image($sponsor['logo'], 'hero', 0, array('title'=> $sponsor['name'])); ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>

		<form class="mailing_list">
			<h3><?php the_field('mailing_list_headline', 'options'); ?></h3>
			<p><?php the_field('mailing_list_content', 'options'); ?></p>
			<label>Name: <input type="text" id="fullname" placeholder="name" /></label>
			<label>Email: <input type="text" placeholder="email" id="email" class="email" /></label>
			<small>We <em>don't</em> spam - you can unsubscribe at any time.</small>
			<input type="submit" value="Join" class="button" />
			<?php wp_nonce_field( 'subscribe', 'subscribe_nonce' ); ?>
			<input type="hidden" id="blog_name" value="<?php restore_current_blog(); bloginfo('name'); ?>" />
		</form>
	</div>
</footer>
<?php
	$languages = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');
	if (isset($languages) && count($languages) > 1) :
		$css = '<style>';
		$css.=	'#language_switcher{margin:0;padding:0;list-style:none;position:fixed; right:0; top:285px; z-index:9999; background:#f5f5f5; border:1px solid #dfdfdf;}'.
				'#language_switcher li a{display:block; padding:0.5em; border-bottom:1px solid #dfdfdf;}'.
				'#language_switcher li a:hover, #language_switcher li.active a{background:white}'.
				'#language_switcher li:last-child a{border-bottom:none}';
		$css.='</style>';
		$html = '<ul id="language_switcher">';
		foreach ($languages as $key=>$language) :
			$html .= '<li'.($key == ICL_LANGUAGE_CODE ? ' class="active"':'').'><a href="'.$language['url'].'" title="'.$language['native_name'].' Version"><img src="'.$language['country_flag_url'].'" alt="'.$language['native_name'].' Flag" /></a></li>';
		endforeach;
		$html.= '</ul>';
		echo $css;
		echo $html;
	endif;
?>