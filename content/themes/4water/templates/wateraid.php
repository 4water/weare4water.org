<!--
	li are display block
	h1 is a big green box yay wide, &:hover, &.active have an arrow border on the right
	img are position absolute; right:0; top:0; and fade in and out
	div is position absolute; right:0; bottom:0;
-->
<?php if ($slides = get_field('slides', 'option')) : ?>
	<section class="multihero wateraid">
		<ul>
			<?php foreach ($slides as $i=>$slide) : ?>
				<?php $img = wp_get_attachment_image( $slide['image']['id'], 'hero', 0, array('title'=> $slide['title'])); ?>
				<li class="<?php echo $i==0 ? 'active':''; ?>">
					<!--<img src="<?php echo $slide['image']; ?>" style="max-width: 940px;" alt="<?php echo $slide['title']; ?>">-->
					<?php echo $img; ?>
					<?php if ($slide['title'] != '' || $slide['content`'] != '') : ?>
						<div>
							<h3><?php echo $slide['title']; ?></h3>
							
								<?php echo $slide['content']; ?>
								<?php if ($links = $slide['links']) : ?>
									<ul>
										<?php foreach ($links as $i=>$link) : ?>
											<li><a class="btn" href="<?php echo $link['url']; ?>" target="_self"><?php echo $link['text']; ?> &gt;</a></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							
						</div>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<!-- Carousel nav -->
		<?php if (count($slides) > 1) : ?>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
		<?php endif; ?>
	</section>
<?php endif; ?>