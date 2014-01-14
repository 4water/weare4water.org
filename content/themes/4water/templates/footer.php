<footer>
	<div>
		<div class="summary">
			<?php $img = get_field('footer_logo', 'option'); ?>
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