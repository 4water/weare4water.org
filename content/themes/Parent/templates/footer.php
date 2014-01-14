<footer class="content-info" role="contentinfo">
	<div class="container">
		<?php dynamic_sidebar('sidebar-footer'); ?>
		<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
	</div>
</footer>
<script>
    $(function(){
        $('input, textarea').placeholder();
        $('.chromeframe').on('click', function() {
            $(this).slideUp('fast');
        });
    });
</script>
<?php wp_footer(); ?>