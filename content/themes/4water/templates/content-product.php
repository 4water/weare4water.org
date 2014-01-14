<div class="item">
	<?php if (has_post_thumbnail()) the_post_thumbnail('column'); ?>
	<h2><?php the_title(); ?></h2>
	<?php the_content(); ?>
	<?php if (get_field('in_stock') == false) : ?>
		<p><em>Out of stock</em></p>
	<?php else : ?>
		<?php if ($variations = get_field('variations')) : ?>
			<ul class="variations">
				<?php foreach ($variations as $i=>$variation) : ?>
					<li>
						<strong>
							&pound;<?php echo $variation['unit_price']; ?> each
							<?php if ($variation['description'] != '') echo '<small>' . $variation['description'] . '</small>'; ?> 
						</strong>
						<form name="_xclick" action="https://www.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="weare4water@gmail.com">
							<input type="hidden" name="currency_code" value="GBP">
							<input type="hidden" name="item_name" value="<?php the_title() . ' ~ ' . $variation['description']; ?>">
							<input type="hidden" name="amount" value="<?php echo $variation['unit_price']; ?>">
							<input type="image" src="http://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
						</form>
					</li>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
</div>