<?php
global $post;
$extra_post_class   = oxy_get_option('blog_post_icons') === 'on' ? 'post-showinfo' : '';
$post_images=get_post_meta($post->ID,'galeria');
$gallery_number=count($post_images);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $extra_post_class.'page mde-single-post' ); ?>>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'header' ); ?>

    <?php if( has_post_thumbnail() && !is_search() && is_array($post_images[0]) && $gallery_number>1 ) { ?>
        <div class="post-media">
            <?php get_template_part( 'partials/blog/posts/normal/featured-imagethumb' ); ?>
        </div>
    <?php }else if($gallery_number==1){ ?>
        <div class="post-media">
            <?php get_template_part( 'partials/blog/posts/normal/featured-image' ); ?>
        </div>
    <?php } ?>


    <div class="post-body">
        <?php
        the_content( '', oxy_get_option('blog_stripteaser') === 'on' ); ?>
        <?php  $post_meta=get_post_meta(get_the_ID());?>
        <?php if($post_meta['creditos_autor'][0]||$post_meta['creditos_ilustra'][0]||$post_meta['creditos_foto'][0]): ?>
        <section class="mde-credits">
            <?php if ($post_meta['creditos_autor'][0]): ?>
                        <div class="autor row small-screen-center">
                            <label class="col-md-1 col-xs-12">
                                 <i class="fa fa-pencil"></i> Por    
                            </label>
                            <div class="col-md-9 col-xs-12">
                                <?php echo $post_meta['creditos_autor'][0] ?>
                            </div>
                        </div>
            <?php endif; ?>   
            <?php if ($post_meta['creditos_ilustra'][0]): ?>
                        <div class="ilustra row small-screen-center">
                            <label class="col-md-2 col-xs-12"> <i class="fa fa-paint-brush"></i> Ilustración </label>
                            <div class="col-md-9 col-xs-12">
                                <?php echo $post_meta['creditos_ilustra'][0] ?>
                            </div>
                        </div>
            <?php endif; ?>   
            <?php if ($post_meta['creditos_foto'][0]): ?>
                        <div class="foto row small-screen-center">
                            <label class="col-md-2 col-xs-12"> <i class="fa fa-camera"></i></i> Fotografía </label>
                            <div class="col-md-9 col-xs-12">
                                <?php echo $post_meta['creditos_foto'][0] ?>
                            </div>
                        </div>
            <?php endif; ?>   
        </section>    

        <?php endif; ?>

        <?php
        if( !is_single() && oxy_get_option('blog_show_readmore') == 'on' ) {
            // show up to readmore tag and conditionally render the readmore
            oxy_read_more_link();
        }
        ?>
    </div>

    <?php get_template_part( 'partials/blog/posts/normal/post', 'footer' ); ?>
</article>