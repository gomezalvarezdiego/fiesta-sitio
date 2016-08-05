<?php

global $post;
$post_images=get_post_meta($post->ID,'galeria');
?>

<?php if (is_array($post_images)) :?>
	<section class="thumb-gallery">
		<div id="single-gallery" class="image-cont owl-theme single-gallery">
			<?php foreach ($post_images as $key => $image): ?>
				<?php $img_atachment_big=wp_get_attachment_image_src($image['ID'],'galeria-interna'); 
				?>
				<figure>
					<img src="<?php echo $img_atachment_big[0] ?>" alt="<?php echo $image[post_title] ?>">
					<figcaption><?php  echo $image[post_title]  ?></figcaption>
				</figure>
			<?php  endforeach;?>	
		</div>
		<nav id="single-gallery_sync2" class="nav-cont owl-theme single-gallery">
			<?php foreach ($post_images as $key => $image): ?>
				<?php $img_atachment_small=wp_get_attachment_image_src($image['ID'],'small')?>		
				<div><img src="<?php echo $img_atachment_small[0] ?>" alt="<?php echo $image[post_title] ?>"></div>
			<?php  endforeach;?>
		</nav>
	</section>	
<?php endif;?>
