
<?php
/*
Template Name: Navegacion
*/
?>


<?php get_header(); ?>



<?php     
	global $wp_query;
	$current_bullet=$wp_query->query_vars['we-do'];
	if (isset($current_bullet)){
		$content_filters=array('element'=>'.dropdown-menu','data'=>$current_bullet);
		//wp_localize_script( THEME_SHORT.'-main', 'b_nav', $content_filters );
		echo "<script type='text/javascript'> var b_nav='".$current_bullet."' </script>";
	}
?>

<div id="bullet-page-containter">

<?php
	global $post;
	while( have_posts() ) {
	    the_post();
	    get_template_part('partials/content', 'page');
	}
?>

</div>


<?php get_footer(); ?>