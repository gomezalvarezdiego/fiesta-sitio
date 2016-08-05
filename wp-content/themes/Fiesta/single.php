


<?php
global $post;
get_header();
?>

<section class="section mde-single-post book-single <?php echo oxy_get_option( 'blog_swatch' ); ?>">
	<?php //putRevSlider( "int-entradas" ); ?>
	<!-- <div class="bread"> -->
		<?php //oxy_blog_header(); ?>
    <!-- </div> -->
    <?php get_template_part( 'partials/blog/list', 'right-mde' ); ?>
</section>

<?php get_footer();



