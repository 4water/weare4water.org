<aside>
	<section class="localmap">
		<div id="localmap"></div>
		<script type="text/javascript" src="https://www.google.com/jsapi"></script>
		<script type="text/javascript">
			google.load("search", "1");
			google.load("maps", "3", {other_params:'sensor=false'});
			google.setOnLoadCallback(function () {
				getLatLngFromPostCode('<?php the_field('post_code'); ?>', drawMap);
			});

			function getLatLngFromPostCode(postcode, callbackFunc) {
				var localSearch = new GlocalSearch();
				localSearch.setSearchCompleteCallback(null, function() {
					if (localSearch.results[0]) {
						var latlng = new google.maps.LatLng(localSearch.results[0].lat, localSearch.results[0].lng)
						callbackFunc(latlng);
					} else {
						alert('Postcode not found');
					}
				});
				localSearch.execute(postcode + ", <?php the_field('country'); ?>");
			}

			function drawMap(latlng) {
				var map = new google.maps.Map(document.getElementById('localmap'), {
					zoom: 15,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					mapTypeControl: false,
					streetViewControl: false
				});

				var marker = new google.maps.Marker({
					map: map,
					position:latlng,
					title: 'Find us here!'
				})
			}
		</script>
	</section>
	<section>
		<h3>Costs</h3>
		<h5>Pay Per Class</h5>
		<dl>
			<dt>Students</dt>
			<dd><?php the_field('student_day_pass_cost'); ?></dd>
			<dt>Non-Students</dt>
			<dd><?php the_field('non-student_day_pass_cost'); ?></dd>
		</dl>
		<h5>Month Pass</h5>
		<dl>
			<dt>Students</dt>
			<dd><?php the_field('student_month_pass_cost'); ?></dd>
			<dt>Non-Students</dt>
			<dd><?php the_field('non-student_month_pass_cost'); ?></dd>
		</dl>
		<?php if (is_salsa_site()) : ?>
			<?php if (isset($_GET['voucher'])) : ?>
				<div class="voucher">Great stuff! Your voucher for your first free class is: <span><?php echo get_voucher(); ?></span>.  Bring it along and present it to the cashier at the door.  Have fun!</div>
			<?php else : ?>
				<a href="?voucher=true" class="button voucher">Free Class <small>Get your first class free with this voucher</small></a>
			<?php endif; ?>
		<?php endif; ?>
	</section>
	<section>
		<h3>Times</h3>
		<?php if ($days = get_field('timetable')) : foreach ($days as $day) :?>
			<h4><?php echo $day['day']; ?></h4>
			<?php foreach ($day['types'] as $type) : ?>
				<h5><?php echo $type['name']; ?></h5>
				<dl>
					<?php foreach ($type['classes'] as $class) : ?>
						<dt><?php echo $class['level']; ?></dt>
						<dd><?php echo $class['time']; ?></dd>
					<?php endforeach; ?>
				</dl>
			<?php endforeach; ?>
		<?php endforeach; endif; ?>
	</section>
	<section>
		<h3>Contact</h3>
		<p><a href="mailto:<?php the_field('contact'); ?>"><?php the_field('contact'); ?></a></p>
	</section>
</aside>