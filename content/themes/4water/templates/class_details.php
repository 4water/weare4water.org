<aside>
	<section class="localmap">
		<div id="localmap"></div>
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script type="text/javascript">
			var geocoder;
			var map;

			function initialize() {
			  geocoder = new google.maps.Geocoder();
			  var latlng = new google.maps.LatLng(-34.397, 150.644);
			  var mapOptions = {
			    zoom: 15,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				mapTypeControl: false,
				streetViewControl: false
			  }
			  map = new google.maps.Map(document.getElementById('localmap'), mapOptions);

			  codeAddress();
			}

			function codeAddress() {
			  var address = "<?php the_field('post_code'); ?>";
			  geocoder.geocode( { 'address': address}, function(results, status) {
			    if (status == google.maps.GeocoderStatus.OK) {
			      map.setCenter(results[0].geometry.location);
			      var marker = new google.maps.Marker({
			          map: map,
			          position: results[0].geometry.location
			      });
			    } else {
			      alert('Geocode was not successful for the following reason: ' + status);
			    }
			  });
			}

			google.maps.event.addDomListener(window, 'load', initialize);



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