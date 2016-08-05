
<?php if( is_single() ) : ?>
    <?php oxy_wp_link_pages(array('before' => '<div class="text-center post-showinfo">', 'after' => '</div>')); ?>
    <div class="row">
        <div class="col-md-6 small-screen-center extra-post-info">
            <div class="post-extras">
                <?php if( has_category() && oxy_get_option( 'blog_categories' ) === 'on' ) : ?>
                    <div class="post-category row">
                        <div class="col-md-12"> 
                            <i class="fa fa-folder-open"></i>
                            <label><?php _e( 'Categorías', 'omega-td' ); ?> </label>
                        </div>
                        <div class="col-md-12 cont">
                        <?php $terms=get_the_terms( $post->ID , 'mde_category' );  
                        if(is_array($terms)){
                            foreach ( $terms as $term ) {
                                // The $term is an object, so we don't need to specify the $taxonomy.
                                $term_link = get_term_link( $term );
                                // If there was an error, continue to the next term.
                                if ( is_wp_error( $term_link ) ) {
                                    continue;
                                }

                                // We successfully got a link. Print it out.
                                $print.='<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a> , ';
                            }
                                echo substr($print, 0,-2);
                        }

                        ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if( has_tag() && oxy_get_option( 'blog_tags' ) === 'on' ) : ?>
                    <div class="post-tags row">
                        <div class="col-md-12">
                            <i class="fa fa-tags"></i>
                            <label><?php _e( 'Tags', 'omega-td' ); ?></label>
                        </div>
                        <div class="col-md-12 cont">
                         <?php the_tags( $before = '', $sep = ', ', $after = '' ); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ( comments_open() && ! post_password_required() && oxy_get_option( 'blog_comment_count' ) === 'on' ) : ?>
                    <div class="post-link row">
                        <div class="col-md-12">
                            <i class="fa fa-comments"></i>
                            <label><?php _e( 'Comentarios', 'omega-td' ); ?></label>
                        </div> 
                        <div class="col-md-12 cont">
                            <?php comments_popup_link( _x( 'No hay comentarios', 'Número de comentarios', 'omega-td' ), _x( '1 comentario', 'Número de comentarios', 'omega-td' ), _x( '% comentarios', 'Número de comentarios', 'omega-td' ) ); ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 text-right small-screen-center">
            <?php
            $check = oxy_get_option( 'blog_social_networks' );
            if ( !in_array("none", $check) ) { ?>
                <div class="post-share">
                    <small><?php
                        _e( 'Comparte esta noticia: ', 'omega-td' ); ?>
                    </small>
                    <?php
                        echo oxy_shortcode_sharing( array(
                            'social_networks'   => implode( ',', oxy_get_option( 'blog_social_networks' ) ),
                            'icon_size'         => 'sm',
                            'background_show'   => 'simple',
                            'margin_top'        => 'no-top inline-block',
                            'margin_bottom'     => 'no-bottom',
                        ));
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php  if( oxy_get_option( 'author_bio' ) === 'on' ) : ?>
        <?php
        $author_id = get_the_author_meta('ID');
        $author_url = get_author_posts_url( $author_id );
        $extra_post_class  = oxy_get_option('blog_post_icons') == 'on' ? 'post-showinfo' : '';
        ?>
        <div class="author-info media small-screen-center <?php echo $extra_post_class; ?>">
            <div class="author-avatar pull-left circle-clip"><?php
            if (oxy_get_option('author_bio_avatar') == 'on') {
                echo get_avatar( $author_id, 150 );
            }?>
            </div>
            <div class="media-body">Por :
                <a href="<?php echo $author_url; ?>">
                    <h3 class="media-heading bordered bordered-small"> <?php
                    the_author_meta('nickname'); ?>
                    </h3>
                </a>
                <div class="media">
                    <p>
                        <?php the_author_meta('description'); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php oxy_atom_author_meta(); ?>