<?php get_header(); ?>

	<section id="home-slider">	
		<?php putRevSlider( "home" ); ?>		
	</section>

	
<!-- 	BOXED MENU TEMPLATE -->
<?php //get_template_part('template','box_menu'); ?>

<!-- 	CONTENIDOS TEMPLATE -->

	<?php get_template_part('template','contenidos'); ?>

<!-- 	TESTIMONIAL TEMPLATE -->

	<?php get_template_part('template','testimonial'); ?>

<!-- 	VIDEOS TEMPLATE -->

	<?php // get_template_part('template','videos'); ?>


<!-- 	MAPAS TEMPLATE -->

	<?php get_template_part('template','institutional'); ?>



<?php get_footer();