<?php


global $post;
$src = '';
if( has_post_thumbnail() ) {
    $attachment = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'cuadricula-contenidos' );
    if ( isset( $attachment[0] ) ) {
        $src = 'style="background-image: url(' . $attachment[0] . ')"';
    }
}
?>


<article class="portfolio-container simetric-grid bottom-caption-overlay related-post">
    <div data-os-animation-delay="0s" data-os-animation="fadeInUp" class="figure element-no-top element-no-bottom portfolio-os-animation image-filter-sepia image-filter-onhover fade-in text-center figcaption-bottom normalwidth animated fadeInUp" >
        <a target="" data-links="" class="figure-image " href="<?php the_permalink(); ?>">
        <img class="normalwidth" alt="<?php the_excerpt(); ?>" src="<?php echo $attachment[0];?>"> </a>
        <div class="figure-caption text-center">
            <h3 class="figure-caption-title bordered-small bordered-link">
                <a target="" data-links="" class="" href="<?php the_permalink(); ?>"> 
                    <?php the_title(); ?>  </a>
            </h3>
            <p class="figure-caption-description"><?php echo get_the_excerpt(); ?></p>
        </div>
    </div>
</article>

