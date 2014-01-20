<div class="item">
	<iframe width="560" height="315" src="http://www.youtube.com/embed/<?php the_field('video_code'); ?>" frameborder="0" allowfullscreen></iframe>
	<?php
		if (is_single()) :
			?><h2><?php the_title(); ?></h2><?php
			the_content(); 
		else :
			?><a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a><?php
			the_excerpt();
		endif;
	?>
</div>