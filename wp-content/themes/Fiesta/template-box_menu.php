	<?php 
	 $args = array(
	   'post_type' => 'box_menu',
	   'order' => 'ASC',
	   'posts_per_page'=>'-1',
	   'post_status'=>array('publish'),
	   
	 );
	 $institutional = new WP_Query($args);

	 $finalContent=$institutional->posts;

	 ////////VARS////////
     $arrayHolder=array();
     $keyCounter=0;
     $setCardsCounter=0;
	 foreach ($finalContent as $key => $post) {
		$post_id=$post->ID;
        $post_title=$post->post_title;
        $post_content=$post->post_content;
        $post_excerpt=$post->post_excerpt;
        $image_size='institucional';
    	$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $image_size );
		$img_alt=get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true);
		$url_img=$img[0];
        $permalink = get_permalink($post_id);
        $postInfo=previewPostContent($post_content,$post_excerpt,150);
	 	$arrayHolder[]=array(
	 		"id"=>$post_id,
	 		"titulo"=>previewPostContent('',$post_title,70),
	 		"content"=>$post_content,
	 		"excerpt"=>$post_excerpt,
	 		"url_img"=>$url_img,
	 		"img_alt"=>$img_alt,
	 		"permalink"=>$permalink,
	 		"postInfo"=>$postInfo						
	 	);
	 	$module=$key+1;
	 	if($module % 4==0 && $key!=0 ){
	 		$contentVarsHolder[$setCardsCounter]=$arrayHolder;
	 		$arrayHolder=array();
	 		$setCardsCounter++;
	 	}
	 }







	?>


	<div id="home-menu" class="grid-overlay-20">
		<section class="row max-row">
				<!-- <div class="col-md-12"><h1 data-os-animation-delay="0s" data-os-animation="fadeInLeft" class="mde-line-title center big os-animation">Nuestra <span>estrategia</span></h1></div>  -->
			


		<?php  	
				 foreach ($contentVarsHolder as $key => $contentVars) : 
		?>				 	
			<div class="row content-row menu-row">
		<?php

					$post_id=$contentVars[0]['id'];
			        $post_title=$contentVars[0]['titulo'];
					$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'box_menu' );
					$url_img=$img[0];
			        $permalink = get_permalink($post_id);
			        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
			        $enlace=get_post_meta($post_id,'enlace');
			        $print_rel_open=($enlace[0])?'<a href="'.$enlace[0].'" target="_blank">':'';
			        $print_rel_close=($enlace[0])?'</a>':'';
		?>	        
		
			
					<article data-os-animation-delay="0s" data-os-animation="fadeIn" class="col-md-3  col-xs-6 multimedia-box os-animation" >
						<div>
							<div class="img-holder img-menu" >
								<?php echo $print_rel_open; ?> <img src="<?php echo $url_img ?>"> <?php echo $print_rel_close; ?>
							</div>
						</div>	
					</article>


		<?php

					$post_id=$contentVars[1]['id'];
			        $post_title=$contentVars[1]['titulo'];
					$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'box_menu' );
					$url_img=$img[0];
			        $permalink = get_permalink($post_id);
			        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
			        $enlace=get_post_meta($post_id,'enlace');
			        $print_rel_open=($enlace[0])?'<a href="'.$enlace[0].'" target="_blank">':'';
			        $print_rel_close=($enlace[0])?'</a>':'';
		?>	        
		
			
					<article data-os-animation-delay="0s" data-os-animation="fadeIn" class="col-md-3 col-xs-6 multimedia-box os-animation" >
						<div>
							<div class="img-holder img-menu" >
								<?php echo $print_rel_open; ?> <img src="<?php echo $url_img ?>"> <?php echo $print_rel_close; ?>
							</div>
						</div>	
					</article>

					<?php

					$post_id=$contentVars[2]['id'];
			        $post_title=$contentVars[2]['titulo'];
					$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'box_menu' );
					$url_img=$img[0];
			        $permalink = get_permalink($post_id);
			        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
			        $enlace=get_post_meta($post_id,'enlace');
			        $print_rel_open=($enlace[0])?'<a href="'.$enlace[0].'" target="_blank">':'';
			        $print_rel_close=($enlace[0])?'</a>':'';
		?>	        
		
			
					<article data-os-animation-delay="0s" data-os-animation="fadeIn" class="col-md-3 col-xs-6 multimedia-box os-animation" >
						<div>
							<div class="img-holder img-menu" >
								<?php echo $print_rel_open; ?> <img src="<?php echo $url_img ?>"> <?php echo $print_rel_close; ?>
							</div>
						</div>	
					</article>


					<?php

					$post_id=$contentVars[3]['id'];
			        $post_title=$contentVars[3]['titulo'];
					$img=wp_get_attachment_image_src(get_post_thumbnail_id($post_id), 'box_menu' );
					$url_img=$img[0];
			        $permalink = get_permalink($post_id);
			        $postInfo=previewPostContent($post_content,$post_excerpt,$limit=300);
			        $enlace=get_post_meta($post_id,'enlace');
			        $print_rel_open=($enlace[0])?'<a href="'.$enlace[0].'" target="_blank">':'';
			        $print_rel_close=($enlace[0])?'</a>':'';
		?>	        
		
			
					<article data-os-animation-delay="0s" data-os-animation="fadeIn" class="col-md-3 col-xs-6 multimedia-box os-animation" >
						<div>
							<div class="img-holder img-menu" >
								<?php echo $print_rel_open; ?> <img src="<?php echo $url_img ?>"> <?php echo $print_rel_close; ?>
							</div>
						</div>	
					</article>


			</div>


		<?php  
				 endforeach;    

		?>				
 			
		</section>	
	</div>	

