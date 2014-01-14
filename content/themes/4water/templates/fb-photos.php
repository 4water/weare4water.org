<div class="columns">
	<div>
		<?php
			$photos = ft_get_facebook_photos(get_field('album_id'));

			foreach ($photos as $i=>$photo) : ?>
				<div class="item"<?php if ($i%3 == 2) echo ' style="margin-right:0"'; ?>>
					<img src="<?php echo $photo['source']; ?>" />
				</div>
			<?php
			endforeach;
		?>
		<?php if ($i%3 == 2) echo '</div><div>'; // end & start row ?>
	</div>
</div>