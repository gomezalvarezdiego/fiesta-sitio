	<?php 
	 $args = array(
	   'post_type' => 'institucionales',
	   'order' => 'ASC',
	   'posts_per_page'=>'4',
	   'post_status'=>array('publish'),
	   'meta_query' => array(
	       array(
	           'key' => '_is_ns_featured_post',
	           'value' => 'yes',
	           'compare' => '=',
	       )
	   )
	 );
	 $institutional = new WP_Query($args);
	?>


	<div id="home-institutional" class="grid-overlay-20">
		<section class="row max-row">
				<!-- <div class="col-md-12"><h1 data-os-animation-delay="0s" data-os-animation="fadeInLeft" class="mde-line-title center big os-animation">Nuestra <span>estrategia</span></h1></div>  -->
			<div class="col-md-12 home-institutional-slide">


		<?php  	
				 foreach ($institutional->posts as $key => $post) : 
					$post_id=$post->ID;
			        $post_title=$post->post_title;
			        $post_content=$post->post_content;
			        $post_excerpt=$post->post_excerpt;
					$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'Institucional' );
					$url_img=$img[0];
			        $permalink = get_permalink($post_id);
			        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
			        $enlace=get_post_meta($post_id,'enlace');
			        $print_rel_open=($enlace[0])?'<a href="'.$enlace[0].'" target="_blank">':'';
			        $print_rel_close=($enlace[0])?'</a>':'';

		?>
					<article data-os-animation-delay="0s" data-os-animation="fadeIn" class="col-md-12 multimedia-box os-animation" >
						<div>
							<div class="img-holder" >
								<?php echo $print_rel_open; ?> <img src="<?php echo $url_img ?>" alt="<?php echo $post_excerpt ?>"><?php echo $print_rel_close; ?>
							</div>
							
						</div>	
					</article>


		<?php  
				 endforeach;    

		?>				
 			</div>
		</section>	
	</div>	

