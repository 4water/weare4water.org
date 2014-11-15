<?php
/**
 * Enqueue scripts and stylesheets
 */
function roots_scripts() {
  // Load style.css from child theme
  if (is_child_theme()) wp_enqueue_style('roots_child', get_stylesheet_uri() . '?v=3', false, null);

  if (is_single() && comments_open() && get_option('thread_comments'))  wp_enqueue_script('comment-reply');

  wp_register_script('fonts', '//ajax.googleapis.com/ajax/libs/webfont/1/webfont.js', false, null, false);
  wp_register_script('combined', get_stylesheet_directory_uri() . '/js/app.combined.js?v=4', false, null, false);

  wp_enqueue_script('fonts');
  wp_enqueue_script('combined');
}
add_action('wp_enqueue_scripts', 'roots_scripts', 100);

function roots_google_analytics() { ?>
<script>
  var _gaq=[['_setAccount','<?php echo GOOGLE_ANALYTICS_ID; ?>'],['_trackPageview']];
  (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
<?php }
if (GOOGLE_ANALYTICS_ID) {
  add_action('wp_footer', 'roots_google_analytics', 20);
}
