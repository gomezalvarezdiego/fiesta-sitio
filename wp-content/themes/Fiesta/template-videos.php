


	<?php 
	 $args = array(
	   'post_type' => 'multimedia',
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
	 $videos = new WP_Query($args);
	?>
	

	<div id="home-videos" class="grid-overlay-20">
		<section class="row max-row">
				<h1 data-os-animation-delay="0s" data-os-animation="fadeInLeft" class="mde-line-title no-line center bottom_spacer big os-animation"><span>Multimedia</span></h1> 
			<div class="col-md-12 home-video-slide">

				<?php  foreach ( $videos->posts as $key => $post) :
							$post_id=$post->ID;
					        $post_title=$post->post_title;
					        $post_content=$post->post_content;
					        $post_excerpt=$post->post_excerpt;
							$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'Multimedia' );
							$url_img=$img[0];
					        $permalink = get_permalink($post_id);
					        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
					        $postMeta=get_post_meta($post_id);
					        $enlace=get_post_meta($post_id,'enlace');
					        $print_rel_open=($enlace[0])?'<a href="'.$enlace[0].'">':'';
					        $print_rel_close=($enlace[0])?'</a>':'';
					        $show_top=($postMeta['show_top_controls'][0]!="Sí")?'&controls=0':"";
					        $show_bot=($postMeta['show_bottom_controls'][0]!="Sí")?'&showinfo=0':"";
				?>
		
							<article data-os-animation-delay="0s" data-os-animation="fadeIn" class="col-md-12 multimedia-box os-animation" >
								<div>
									<div class="img-holder" >
										<?php echo $print_rel_open; ?> <img src="<?php echo $url_img ?>" alt="<?php echo $post_excerpt ?>"><?php echo $print_rel_close; ?>
									</div>
									<div class="box-content">
											<div class="content"><?php echo $post_excerpt ?></div> 
									</div>
								</div>	
							</article>


				<?php endforeach; ?>	 			

 			</div>
		</section>	
	</div>	
