<?php
/*
Template Name: Contenidos
*/
?>



<?php     
	if (isset($_GET['f'])){
		$content_filters=array('element'=>'.dropdown-menu','data'=>$_GET['f']);
		wp_localize_script( THEME_SHORT.'-main', 'c_f', $content_filters );
	}
?>


<?php 
  get_header(); 
  $sub_themes=get_child_imploded('contenidos-de-ciudad','mde_category');

?>


<?php if (have_posts()) : while (have_posts()) : the_post();?>

<?php the_content(); ?>


	<section id="content-archive">
<?php
	echo do_shortcode('[vc_row]
						[vc_column width="1/1"]
						[post_type_portfolio count="20" xs_col="1" extra_classes="simetric-grid bottom-caption-overlay"  sm_col="2" md_col="4" lg_col="4" item_padding="10" pagination="true" item_captions_below="show" item_overlay="none" item_size="cuadricula-contenidos" item_magnific="standard" item_hover_filter="sepia" item_caption_align="center" item_caption_vertical="bottom" item_overlay_animation="fade-in" item_overlay_grid="30" item_overlay_icon="plus" item_scroll_animation="fadeInUp" item_scroll_animation_delay="0.3" item_scroll_animation_timing="staggered" margin_top="medium-top" margin_bottom="medium-bottom" categories="'.$sub_themes.'" filters="categories" item_link_type="item" item_link_target="_self" captions_below_link_type="item" hover_filter_invert="image-filter-onhover" post_type="post,mde_especiales" taxonomy_name="mde_category"  ]
						[/vc_column]
					   [/vc_row]
');
 ?>
	</section>


<?php endwhile; endif; ?>


<?php get_footer();