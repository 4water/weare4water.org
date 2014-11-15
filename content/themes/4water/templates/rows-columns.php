<?php $columns = get_field('format') == 'Columns'; ?>
<?php if ($items = get_field('items')) : ?>
	<div class="<?php echo $columns ? 'columns' : 'rows'; ?>">
		<?php if ($columns) echo '<div>'; // start row ?>
		<?php foreach ($items as $i=>$item) : ?>
			<?php $img = wp_get_attachment_image( $item['image']['id'], 'column', 0, array('title'=> $item['title'])); ?>
			<div class="item"<?php if ($i%3 == 2) echo ' style="margin-right:0"'; ?>>
				<?php echo $img; ?>
				<?php
					if ($item['video_id']) :
						echo ft_get_facebook_video($item['video_id']);
					endif; 
				?>
				<?php if ($item['title'] != '' || $item['content'] != '') : ?>
					<h2><?php echo $item['title']; ?></h2>
					<?php echo $item['content']; ?>
					<?php if ($links = $item['links']) : ?>
						<ul>
							<?php foreach ($links as $j=>$link) : ?>
								<li><a class="btn" href="<?php echo $link['url']; ?>" target="_self"><?php echo $link['text']; ?></a></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php if ($columns && $i%3 == 2) echo '</div><div>'; // end & start row ?>
		<?php endforeach; ?>
		<?php if ($columns) echo '</div>'; // end row ?>
	</div>
<?php endif; ?>