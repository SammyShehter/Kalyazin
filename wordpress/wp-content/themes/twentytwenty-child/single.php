<?php
get_header();
?>
	<main id="primary" class="site-main">
		<?php
			the_post();
			get_template_part( 'templates/content.template', get_post_type() );
		?>
	</main>
<?php
get_footer();