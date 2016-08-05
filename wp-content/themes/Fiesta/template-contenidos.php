

	<?php 
	 $args = array(
	   'post_type' => 'post',
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
	 $post = new WP_Query($args);
     $finalContent=$post->posts;

	 ////////VARS////////
     $arrayHolder=array();
     $keyCounter=0;
     $setCardsCounter=0;
	 foreach ($finalContent as $key => $post) {
		$post_id=$post->ID;
        $post_title=$post->post_title;
        $post_content=$post->post_content;
        $post_excerpt=$post->post_excerpt;
        $image_size='Home-entrada';
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
	 	if($module % 3==0 && $key!=0 ){
	 		$contentVarsHolder[$setCardsCounter]=$arrayHolder;
	 		$arrayHolder=array();
	 		$setCardsCounter++;
	 	}
	 }
	?>

	<div id="home-content" class="grid-overlay-20">

		<section class="row max-row">
			<!-- <div class="col-md-12"><h1 data-os-animation-delay="0s" data-os-animation="fadeInLeft" class=" mde-line-title no-line center bottom_spacer big os-animation">Noticias <span>destacadas</span></h1></div> -->
			
			<?php foreach ($contentVarsHolder as $key => $contentVars) { 
				 $count_posts=count($contentVars);
				 if($count_posts>2){
				 	$offset_class="";
				 }else if($count_posts>1){
				 	$offset_class="col-md-offset-1";
				 }else{
				 	$offset_class="col-md-offset-4";
				 }
			?>
				<div class="row content-row">
						<article data-os-animation-delay="0s" data-os-animation="fadeInLeft" class="col-md-4 <?php echo $offset_class ?>  home-content-article art-1 libro os-animation" >
							<div class="img-holder" >
								<a href="<?php echo $contentVars[0]['permalink'] ?>"><img src="<?php echo $contentVars[0]['url_img'] ?>"	 alt="<?php echo $contentVars[0]['img_alt'] ?>"></a>
							</div>
							<div class="box-content">
									<div class="title "><h1><a href="<?php echo $contentVars[0]['permalink'] ?>"><label class="mde-line-title left small left-align"><?php echo $contentVars[0]['titulo'] ?></label></a></h1></div>
									<div class="content"><?php echo $contentVars[0]['postInfo'] ?></div> 
									<div class="ref-content"><a href="<?php echo $contentVars[0]['permalink'] ?>">Leer contenido +</a></div>
							</div>
						</article>

						<?php if($contentVars[1]): ?>

						<article data-os-animation-delay="0s" data-os-animation="fadeInRight" class="col-md-4 <?php echo $offset_class ?> home-content-article art-1 libro os-animation" >
							<div class="img-holder" >
								<a href="<?php echo $contentVars[1]['permalink'] ?>"><img src="<?php echo $contentVars[1]['url_img'] ?>" alt="<?php echo $contentVars[1]['img_alt'] ?>"></a>
							</div>
							<div class="box-content">
									<div class="title "><h1><a href="<?php echo $contentVars[1]['permalink'] ?>"><label class="mde-line-title left small left-align"><?php echo $contentVars[1]['titulo'] ?></label></a></h1></div>
									<div class="content"><?php echo $contentVars[1]['postInfo'] ?></div> 
									<div class="ref-content"><a href="<?php echo $contentVars[1]['permalink'] ?>">Leer contenido +</a></div>
							</div>
						</article>

						<?php endif?>


						<?php if($contentVars[2]): ?>

						<article data-os-animation-delay="0s" data-os-animation="fadeInRight" class="col-md-4 <?php echo $offset_class ?> home-content-article art-1 libro os-animation" >
							<div class="img-holder" >
								<a href="<?php echo $contentVars[2]['permalink'] ?>"><img src="<?php echo $contentVars[2]['url_img'] ?>" alt="<?php echo $contentVars[2]['img_alt'] ?>"></a>
							</div>
							<div class="box-content">
									<div class="title "><h1><a href="<?php echo $contentVars[2]['permalink'] ?>"><label class="mde-line-title left small left-align"><?php echo $contentVars[2]['titulo'] ?></label></a></h1></div>
									<div class="content"><?php echo $contentVars[2]['postInfo'] ?></div> 
									<div class="ref-content"><a href="<?php echo $contentVars[2]['permalink'] ?>">Leer contenido +</a></div>
							</div>
						</article>

						<?php endif?>
	  			</div>

			<?php } ?>
		</section>	
	
	</div>	
