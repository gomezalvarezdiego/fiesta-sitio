	<?php 
	 $args = array(
	   'post_type' => 'testimonials',
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
	 $testimonial = new WP_Query($args);
	?>
	
	<div id="home-testimonial" class="grid-overlay-20">
		<section class="row max-row">
			<div class="col-md-12">
				<h1 data-os-animation-delay="0s" data-os-animation="fadeInLeft" class="mde-line-title no-line center bottom_spacer big os-animation"><span></span></h1>
			</div>
			<div class="col-md-12 slide-home-perfil">

				<?php  foreach ($testimonial->posts as $key => $post) :
							$post_id=$post->ID;
					        $post_title=$post->post_title;
					        $post_content=$post->post_content;
					        $post_excerpt=$post->post_excerpt;
							$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'medium' );
							$url_img=$img[0];
					        $permalink = get_permalink($post_id);
					        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
					        $enlace=get_post_meta($post_id,'enlace');
					        $enlace_html=($enlace[0])?"<a href='".$enlace[0]."'>":'';
					        $enlace_html_end=($enlace[0])?"</a>":'';
				?>
							<article class="row item">
								<div class="col-md-12 post-content">
										<h1><i class="fa fa-quote-left left"></i><?php echo $enlace_html ?><label class="mde-line-title left small"><?php echo $post_content; ?></label><?php echo $enlace_html_end ?><i class="fa fa-quote-right right"></i></h1>
										<div class="content"><?php echo $postInfo ?></div>
								</div>	
							</article>

				<?php endforeach; ?>	
			</div>
		</section>	
	</div>	