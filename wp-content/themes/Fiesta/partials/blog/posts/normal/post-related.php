<?php

global $wp_query;
$tags = wp_get_post_tags( get_the_ID() );
// $columns = intval( oxy_get_option( 'related_posts_columns' ) );
// $span_width = $columns > 0 ? floor( 12 / $columns ) : 12;
$span_width=3;
$tag_ids = array();
$extra_post_class  = oxy_get_option('blog_post_icons') == 'on'? 'post-showinfo':'';

if( $tags ) {
    foreach($tags as $individual_tag) {
        $tag_ids[] = $individual_tag->term_id;
    }

    $args = array(
        'tag__in'        => $tag_ids,
        'post__not_in'   => array( get_the_ID() ),
        'posts_per_page' => oxy_get_option( 'related_posts_count' ),
    );

    $wp_query = new wp_query( $args );
}
?>
<?php if( !empty( $tag_ids ) && $wp_query->have_posts() ) : ?>


<div class="yellow-cont">
    <section class="post-related <?php echo $extra_post_class; ?>">
        <header class="post-related-head">
            <h3 class="post-related-title"><?php _e('Noticias relacionadas', 'omega-td' ); ?></h3>
            <?php if(oxy_get_option('blog_post_icons') == 'on'){ ?>
                <div class="post-icon">
                    <i class="fa fa-file-text-o"></i>
                </div>
            <?php } ?>
        </header>
        <div class="row">
            <?php
            while( $wp_query->have_posts() ) : ?>
                <div class="col-md-<?php echo $span_width; ?> col-sm-<?php echo $span_width; ?>">
                    <?php
                        global $post;
                        global $more;    // Declare global $more (before the loop).
                        $wp_query->the_post();
                        setup_postdata( $post );
                        $more = 0;
                        // get post format ( only interested in quote / link rest use standard )
                        $format = get_post_format( $post );
                        if( 'quote' !== $format && 'link' !== $format ) {
                            $format = '';
                        }
                        get_template_part( 'partials/blog/posts/related/post', '' );
                    ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</div>
<?php
endif;

wp_reset_postdata();
wp_reset_query();