

<?php get_header();?>

<div class="book-page-post">
<?php
	global $post;
	while( have_posts() ) {
	    the_post();
	    get_template_part('partials/content', 'page');
	}
?>

</div>	

<?php get_footer(); ?>