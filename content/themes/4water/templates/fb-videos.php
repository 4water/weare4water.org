<div class="columns">
	<div>
		<?php
			$videos = get_field('videos');
			foreach ($videos as $i=>$video) : 
			?>
				<div class="item"<?php if ($i%3 == 2) echo ' style="margin-right:0"'; ?>>
					<?php echo ft_get_facebook_video($video['video_id']); ?>
				</div>
				<?php if ($i%3 == 2) echo '</div><div>'; // end & start row ?>
			<?php
			endforeach;
		?>
	</div>
</div>