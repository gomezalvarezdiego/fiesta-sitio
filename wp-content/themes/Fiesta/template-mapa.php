


	<?php 
	 $args = array(
	   'post_type' => 'mde_mapas',
	   'order' => 'ASC',
	   'posts_per_page'=>'-1',
	   'post_status'=>array('publish'),
	   'meta_query' => array(
	       array(
	           'key' => '_is_ns_featured_post',
	           'value' => 'yes',
	           'compare' => '=',
	       )
	   )
	 );
	 $mapas = new WP_Query($args);
	
	?>
	

	<div id="home-map">

				<h1 data-os-animation-delay="0s" data-os-animation="fadeInRight" class="mde-line-title no-line center bottom_spacer big os-animation map-header">Internet <span>Libre</span></h1>
				<?php  
				$map='[Kmap map_type="ROADMAP" map_zoom="15" extra_classes="home-map-cont" map_style="blackwhite" map_scrollable="on" marker="show" 	label="test" height="303" margin_top="short-top" margin_bottom="short-bottom" scroll_animation="fadeInLeft" scroll_animation_delay="0.5"]';
				foreach ( $mapas->posts as $key => $post) :
							$post_id=$post->ID;
					        $post_title=$post->post_title;
					        $post_excerpt=$post->post_excerpt;
							$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'medium' );
							$url_img=$img[0];
					        $postMeta=get_post_meta($post_id);
					        $url_kml=$postMeta['kml_url'][0];
					        $active=$postMeta['activo'][0];
					        $extra_clases=$postMeta['extra_clases'][0];;

					        $map.='[Klayer url="'.$url_kml.'" icon_url="'.$url_img.'" title="'.$post_title.'" extra_class="'.$extra_clases.'" caption="'.$post_excerpt.'" ]';	
 			
				endforeach;

							$map.="[/Kmap]";	
							echo do_shortcode($map);
				?>	 			



	</div>	
