<?php

global $post;
$post_images=get_post_meta($post->ID,'galeria');
?>

<?php if (is_array($post_images)) :?>

	<div id="single-gallery" class="owl-theme single-gallery">
		<?php foreach ($post_images as $key => $image): ?>
			<div><img src="<?php echo $image['guid'] ?>" alt="<?php echo $image[post_title] ?>"></div>
		<?php  endforeach;?>	
	</div>

<?php endif;?>
