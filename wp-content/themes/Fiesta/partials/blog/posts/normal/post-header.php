
<header class="post-head">
    <?php if( is_sticky() ) : ?>
        <span class="post-sticky">
            <i class="fa fa-star"></i>
        </span>
    <?php endif; ?>
    <?php if( !is_single() ) : ?>
        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'omega-td' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
    <?php else : ?>
        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>
    <?php endif; ?>

    <small>
        <?php _e( 'Por', 'omega-td' );  ?>
        <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>">
            <?php the_author(); ?>
        </a>
        <?php _e( 'en', 'omega-td' ); ?>
        <?php the_time(get_option('date_format')); ?>
        <?php if (oxy_get_option('blog_comment_count') == 'on') {
            echo ', ';
            comments_popup_link( _x( 'No hay comentarios', 'Número de comentarios', 'omega-td' ), _x( '1 comentario', 'Número de comentarios', 'omega-td' ), _x( '% comentarios', 'Número de comentarios', 'omega-td' ) );
        } ?>
    </small>

     <?php
        $check = oxy_get_option( 'blog_social_networks' );
        if ( !in_array("none", $check) ) { ?>
            <div class="post-share top-share">
                <?php
                    echo oxy_shortcode_sharing( array(
                        'icon_size'         => 'sm',
                        'background_show'   => 'simple',
                        'margin_top'        => 'no-top inline-block',
                        'margin_bottom'     => 'no-bottom',
                    ));
                ?>
            </div>
        <?php } ?>


</header>

