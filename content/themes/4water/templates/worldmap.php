<?php if ($image = get_field('map', 'options')) : ?>
	<section class="worldmap">
		<h1>Classes around the world</h1>
		<?php echo wp_get_attachment_image($image['id'], 'hero', 0, array('title'=> 'A map showing 4water projects around the world.')); ?>
		<?php if ($cities = get_field('cities', 'options')) : ?>
			<?php foreach ($cities as $i => $city) : ?>
				<div style="left:<?php echo $city['x_axis']; ?>px; top: <?php echo $city['y_axis'];?>px">
					<span><?php echo $city['name']; ?></span>
					<ul>
						<?php $projects = $city['projects']; ?>
						<?php foreach ($projects as $i => $project) : ?>
							<li><a href="<?php echo $project['url']; ?>"><?php echo $project['name']; ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</section>
<?php endif; ?>