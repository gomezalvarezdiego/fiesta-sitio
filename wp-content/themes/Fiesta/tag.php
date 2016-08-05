
<?php     
	global $wp_query;
	$current_tax=$wp_query->query_vars['tag'];
	$current_termn=$wp_query->query_vars['term'];
	$taxonomy_name=get_term_by('slug',$current_tax,'post_tag');
	if (isset($current_termn)){
		$content_filters=array('element'=>'.dropdown-menu','data'=>$current_termn);
		wp_localize_script( THEME_SHORT.'-main', 'c_f', $content_filters );
	}
?>

<?php get_header(); ?>
	<section id="content-archive">
		<header class="mde-header tax-header"><a href="<?php echo get_home_url();?>/noticias"> Noticias </a> <i class="fa fa-angle-right"></i>Etiquetas <i class="fa fa-angle-right"></i> <span><?php echo $taxonomy_name->name ?></span> </header>
		<?php
			echo do_shortcode('[vc_row]
								[vc_column width="1/1"]
								[post_type_portfolio count="24" xs_col="2" extra_classes="simetric-grid bottom-caption-overlay"  sm_col="2" md_col="4" lg_col="4" item_padding="10" pagination="true" item_captions_below="show" item_overlay="none" item_size="cuadricula-contenidos" item_magnific="standard" item_hover_filter="sepia" item_caption_align="center" item_caption_vertical="bottom" item_overlay_animation="fade-in" item_overlay_grid="30" item_overlay_icon="plus" item_scroll_animation="fadeInUp" item_scroll_animation_delay="0.3" item_scroll_animation_timing="staggered" margin_top="medium-top" margin_bottom="medium-bottom" categories="'.$current_tax.'" filters="categories,sort,order" item_link_type="item" item_link_target="_self" captions_below_link_type="item" hover_filter_invert="image-filter-onhover" post_type="post,mde_especiales" taxonomy_name="post_tag"  ]
								[/vc_column]
							   [/vc_row]
			');
		?>
	</section>

<?php get_footer();