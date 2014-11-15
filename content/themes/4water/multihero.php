<?php if ($slides = get_field('slides')) : ?>
	<section class="multihero">
		<ul>
			<?php foreach ($slides as $i=>$slide) : ?>
				<?php $img = wp_get_attachment_image_src( $slide['image']['id'], 'hero', 0, array('title'=> $slide['title'], 'height'=>'')); ?>
				<li class="<?php echo $i==0 ? 'active':''; ?>">
					<img src="<?php echo $img[0]; ?>" alt="<?php echo $slide['title']; ?>" width="990" height="430">
					
					<?php if ($slide['title'] != '' || $slide['content`'] != '') : ?>
						<div>
							<h3><?php echo $slide['title']; ?></h3>
							<?php echo $slide['content']; ?>
							<?php if ($links = $slide['links']) : ?>
								<ul>
									<?php foreach ($links as $i=>$link) : ?>
										<li><a class="btn" href="<?php echo $link['url']; ?>" target="_self"><?php echo $link['text']; ?></a></li>
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