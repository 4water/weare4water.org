<section class="donations">
	<span><?php the_virgin_total(); ?></span>
	<small><?php the_field('caption', 'options'); ?></small>
	<p><?php the_field('more_detail', 'options'); ?></p>
	<a href="<?php the_field('button_url', 'options'); ?>" title="Donate!" class="button"><?php the_field('button_text', 'options'); ?></a>
	<div class="secondary_cta"><?php the_field('secondary_call_to_action', 'options'); ?></div>
</section>