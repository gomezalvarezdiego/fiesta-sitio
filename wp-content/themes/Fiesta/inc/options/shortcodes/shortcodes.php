<?php
/**
 * Themes shortcode functions go here
 *
 * @package Omega
 * @subpackage Core
 * @since 1.0
 *
 * @copyright (c) 2014 Oxygenna.com
 * @license http://wiki.envato.com/support/legal-terms/licensing-terms/
 * @version 1.7.6
 */


/* --------------------- CUSTOM POST  SHORTCODES --------------------- */

function post_type_shortcode_portfolio( $atts , $content = '', $code ) {
     // setup options
    extract( shortcode_atts( array(
        'categories'             => '',
        'count'                  => 0,
        'filters'                => '',
        'columns'                => 3,
        'xs_col'                 => 1,
        'sm_col'                 => 2,
        'md_col'                 => 3,
        'lg_col'                 => 5,
        'layout_mode'            => 'fitRows',
        // item options
        'item_size'                    => 'portfolio-thumb',
        'item_padding'                 => 15,
        'item_link_type'               => 'magnific',
        'item_captions_below'          => 'hide',
        'captions_below_link_type'     => 'item',
        'item_caption_align'           => 'center',
        'item_hover_filter'            => 'none',
        'hover_filter_invert'          => 'image-filter-onhover',
        'item_overlay'                 => 'icon',
        'item_caption_vertical'        => 'middle',
        'item_overlay_animation'       => 'from-top',
        'item_overlay_grid'            => '0',
        'item_overlay_icon'            => 'plus',
        'item_scroll_animation'        => 'none',
        'item_scroll_animation_delay'  => '0',
        'item_scroll_animation_timing' => 'staggered',
        'pagination'                   => 'none',
        'extra_classes'          => '',
        'margin_top'             => 'normal-top',
        'margin_bottom'          => 'normal-bottom',
        'post_type'              => 'post',
        'taxonomy_name'          => 'category'
    ), $atts ) );

    $show_filters = explode( ',', $filters );
    $post_type=explode(',',$post_type);

    $query_options = array(
        'post_type'   => $post_type,
        'orderby'     => 'menu_order',
        'order'       => 'ASC',
        'suppress_filters' => 0,
        'posts_per_page' => $count === '0' ? -1 : $count
    );

    global $paged, $oxy_is_iphone, $oxy_is_ipad, $oxy_is_android;
    if( $pagination !== 'none' || $oxy_is_iphone || $oxy_is_ipad || $oxy_is_android ) {
        // if pagination, count sets posts per page
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        }
        elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        }
        else {
            $paged = 1;
        }
        $query_options['paged'] = $paged;
        $query_options['posts_per_page'] = $count;
    }

    $filters = get_terms( $taxonomy_name, array( 'hide_empty' => 1 ) );

    if( !empty( $categories ) ) {
        $selected_portfolios = explode( ',', $categories );
        $query_options['tax_query'][] = array(
            'taxonomy' => $taxonomy_name,
            'field' => 'slug',
            'terms' => $selected_portfolios
        );
        // remove categories that arent selected from the category filter
        foreach( $filters as $index => $filter ) {
            if( !in_array( $filter->slug, $selected_portfolios ) ) {
                unset( $filters[$index] );
            }
        }
    }

    $classes = array( 'portfolio', 'masonry', 'no-transition');

    $container_classes = array();
    $container_classes[] = $extra_classes;
    $container_classes[] = 'element-' . $margin_top;
    $container_classes[] = 'element-' . $margin_bottom;
    // fetch posts
    $posts = query_posts( $query_options );
    $count = count( $posts );
    $span_num = 12 / $columns;


    ob_start();
    echo '<div class="portfolio-container ' . implode(' ', $container_classes) . '">';
    include( locate_template( 'partials/shortcodes/portfolio/filters.php' ) );
    include( locate_template( 'partials/shortcodes/portfolio/standard.php' ) );
    echo '</div>';
    $output = ob_get_contents();
    ob_end_clean();

    wp_reset_query();
    wp_reset_postdata();

    return $output;
}
add_shortcode( 'post_type_portfolio', 'post_type_shortcode_portfolio' );

function oxy_shortcode_post_type_masonry( $atts , $content = '', $code ) {
     // setup options
    extract( shortcode_atts( array(
        'categories'             => '',
        'count'                  => 0,
        'filters'                => '',
        'columns'                => 3,
        'xs_col'                 => 1,
        'sm_col'                 => 2,
        'md_col'                 => 4,
        'lg_col'                 => 6,
        'layout_mode'            => 'masonry',
        'pagination'             => 'none',
        // item options
        'item_size'                    => 'full',
        'item_padding'                 => 0,
        'item_link_type'               => 'magnific',
        'item_link_target'             => '_self',
        'item_captions_below'          => 'hide',
        'captions_below_link_type'     => 'item',
        'item_caption_align'           => 'center',
        'item_hover_filter'            => 'none',
        'hover_filter_invert'          => 'image-filter-onhover',
        'item_overlay'                 => 'icon',
        'item_caption_vertical'        => 'middle',
        'item_overlay_animation'       => 'from-top',
        'item_overlay_grid'            => '0',
        'item_overlay_icon'            => 'plus',
        'item_scroll_animation'        => 'none',
        'item_scroll_animation_delay'  => '0',
        'item_scroll_animation_timing' => 'staggered',
        'pagination'                   => 'none',
        'extra_classes'          => '',
        'margin_top'             => 'normal-top',
        'margin_bottom'          => 'normal-bottom',
        'post_type'              => 'post',
        'taxonomy_name'          => 'category',
        'post_link'              => false
    ), $atts ) );

    $show_filters = explode( ',', $filters );
    $post_type=explode(',',$post_type);


    $query_options = array(
        'post_type'   => $post_type,
        'orderby'     => 'menu_order',
        'order'       => 'ASC',
        'suppress_filters' => 0,
        'posts_per_page' => $count === '0' ? -1 : $count
    );

    global $paged, $oxy_is_iphone, $oxy_is_ipad, $oxy_is_android;
    if( $pagination !== 'none' || $oxy_is_iphone || $oxy_is_ipad || $oxy_is_android ) {
        // if pagination, count sets posts per page
        if ( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        }
        elseif ( get_query_var('page') ) {
            $paged = get_query_var('page');
        }
        else {
            $paged = 1;
        }
        $query_options['paged'] = $paged;
        $query_options['posts_per_page'] = $count;
    }

    $filters = get_terms( $taxonomy_name, array( 'hide_empty' => 1 ) );

    if( !empty( $categories ) ) {
        $selected_portfolios = explode( ',', $categories );
        $query_options['tax_query'][] = array(
            'taxonomy' => $taxonomy_name,
            'field' => 'slug',
            'terms' => $selected_portfolios
        );

         // remove categories that arent selected from the category filter
        foreach( $filters as $index => $filter ) {
            if( !in_array( $filter->slug, $selected_portfolios ) ) {
                unset( $filters[$index] );
            }
        }
    }

    $classes = array( 'portfolio', 'masonry', 'no-transition', 'use-masonry' );

    $container_classes = array();
    $container_classes[] = $extra_classes;
    $container_classes[] = 'element-' . $margin_top;
    $container_classes[] = 'element-' . $margin_bottom;


    // fetch posts
    $posts = query_posts( $query_options );
    $count = count( $posts );
    $span_num = 12 / $columns;

    ob_start();
    echo '<div class="portfolio-container ' . implode(' ', $container_classes) . '">';
    include( locate_template( 'partials/shortcodes/portfolio/filters.php' ) );
    include( locate_template( 'partials/shortcodes/portfolio/standard.php' ) );
    echo '</div>';
    $output = ob_get_contents();
    ob_end_clean();

    wp_reset_query();
    wp_reset_postdata();

    return $output;
}
add_shortcode( 'post_type_masonry', 'oxy_shortcode_post_type_masonry' );


/* --------------------- CUSTOM MAPS  SHORTCODES --------------------- */




/**
 * Google Map KML SHORTCODE
 *
 * @return KML Layer
 **/
function inm_shortcode_google_map_kmlLayer( $atts, $content = null) {
    global $map_data;

    extract( shortcode_atts( array(
        'url'   => '',
        'icon_url'   => '',
        'active'=>false,
        'title'  => '',
        'caption'  => '',
        'extra_class'     => '',
        'layerMarker' => MDE_THEME_URI . 'assets/images/marker.png'
    ), $atts ) );    

    $id_control_layer='map_layer_' . rand(1,1000);

    $map_data['Klayers'][]= array(
        'id'=>$id_control_layer,
        'active'=>$active,
        'url'   => $url,
        'icon_url'   => $icon_url,
        'title'  => $title,
        'extra_class'    => $extra_class,
        'layerMarker'       => $layerMarker
    );

    return "<div id='".$id_control_layer."' data-caption='".$caption."' class='kml-switch grid-overlay-20 ".$extra_class."'><img alt='".$title."' src='".$icon_url."'><label>".$title."</label></div>";

}
add_shortcode( 'Klayer', 'inm_shortcode_google_map_kmlLayer' );

/**
 * Google Map KML SHORTCODE
 *
 * @return Map HTML
 **/
function inm_shortcode_google_map_kml( $atts, $content = null) {
    global $map_data;
    extract( shortcode_atts( array(
        'map_type'   => 'ROADMAP',
        'map_zoom'   => 15,
        'map_style'  => 'flat',
        'marker'     => 'show',
        'lat'        => '51.5171',
        'lng'        => '0.1062',
        'address'    => '',
        'height'     => 500,
        // global options
        'extra_classes'          => '',
        'margin_top'             => 'normal-top',
        'margin_bottom'          => 'normal-bottom',
        'scroll_animation'       => 'none',
        'scroll_animation_delay' => '0',
    ), $atts ) );

    

    $classes = array();
    $classes[] = $extra_classes;
    $classes[] = 'element-' . $margin_top;
    $classes[] = 'element-' . $margin_bottom;
    if( $scroll_animation !== 'none' ) {
        $classes[] = 'os-animation';
    }


    $map_data = array(
        'mapType'   => $map_type,
        'mapZoom'   => $map_zoom,
        'mapStyle'  => $map_style,
        'marker'    => $marker,
        'lat'       => $lat,
        'lng'       => $lng,
        'markerURL' => MDE_THEME_URI . 'assets/images/marker.png'
    );


    if( !empty( $atts ) ) {
        $map_data = array_merge( $map_data, $atts );
    }

    $map_id = 'map' . rand(1,1000);


    $output = '<div class="os-animation kml-cont '. implode( ' ', $classes ) .'"  data-os-animation="' . $scroll_animation . '" data-os-animation-delay="' . $scroll_animation_delay . 's">
                    <nav class="grid-overlay-20">'.do_shortcode($content).'<div class="map-caption">Un cedezo es lasa sllorepe sinsn dsodm m daspodm  poasdmo askd  asod asdk aspkd aspod aspUn cedezo es lasa sllorepe sinsn dsodm m daspodm  poasdmo askd  asod asdk aspkd aspod asp</div></nav>     
                    <div id="' . $map_id . '" class="google-map " style="height:' . $height . 'px"></div> 
               </div>';
    wp_enqueue_script( THEME_SHORT.'-google-map-api', 'https://maps.googleapis.com/maps/api/js?sensor=false' );
    wp_enqueue_script( THEME_SHORT.'-google-map', MDE_THEME_URI . 'assets/js/k_map.js', array( 'jquery', THEME_SHORT.'-google-map-api' ) );
    wp_localize_script( THEME_SHORT.'-google-map', $map_id, $map_data );
    return $output;
}


add_shortcode( 'Kmap', 'inm_shortcode_google_map_kml' );



/**
 * Sharing buttons shortcode
 *
 * @return Sharing buttons html
 * @author
 **/
function oxy_shortcode_sharing($atts, $content = '') {
    extract( shortcode_atts( array(
        'title'             => '',
        'social_networks'   => 'facebook,twitter,google',
        'icon_size'         => 'sm',
        'background_show'   => 'background',
        'background_shape'  => 'circle',
        'background_colour' => '#82c9ed',
        // global options
        'extra_classes'          => '',
        'twitter_ref'            => 'MDEInteligente',
        'margin_top'             => 'normal-top',
        'margin_bottom'          => 'normal-bottom',
        'scroll_animation'       => 'none',
        'scroll_animation_delay' => '0',
    ), $atts ) );

    $social_networks = explode( ',', $social_networks );

    // set classes to add to the ul in the partial
    $classes = array();
    $classes[] = 'social-icons';
    $classes[] = 'social-' . $icon_size;
    $classes[] = 'social-' . $background_show;
    $classes[] = 'social-' . $background_shape;
    $classes[] = $extra_classes;
    $container_classes = array();
    $container_classes[] = 'element-' . $margin_top;
    $container_classes[] = 'element-' . $margin_bottom;
    if( $scroll_animation !== 'none' ) {
        $container_classes[] = 'os-animation';
    }

    // create social network links
    global $post;
    $permalink = get_permalink( $post->ID );
    $post_title = rawurlencode( get_the_title( $post->ID ) );
    $network_links = array();
    $network_links['twitter']   = 'https://twitter.com/share?text='.$post_title.'&url=' . $permalink.'&via='.$twitter_ref;
    $network_links['google']    = 'https://plus.google.com/share?url=' . $permalink;
    $network_links['facebook']  = 'http://www.facebook.com/sharer.php?u=' . $permalink;
    $network_links['pinterest'] = '//pinterest.com/pin/create/button/?url=' . $permalink . '&amp;description=' . $post_title;
    $network_links['linkedin'] = 'http://www.linkedin.com/shareArticle?mini=true&url=' . $permalink . '&amp;title=' . $post_title;

    // check for featured image and add it to the links
    $featured_image_attachment = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' );
    if( isset( $featured_image_attachment[0] ) ) {
        $network_links['google']    .= '&amp;images=' . $featured_image_attachment[0];
        $network_links['pinterest'] .= '&amp;media=' . $featured_image_attachment[0];
    }

    ob_start();
    include( locate_template( 'partials/shortcodes/social/social-sharing-icons.php' ) );
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode( 'sharing', 'oxy_shortcode_sharing' );


/**
 * Thumnail-Gallery
 *
 * @return Owl-Thumnail-Gallery
 **/
function mde_shortcode_thumb_gallery( $atts, $content = null) {

    extract( shortcode_atts( array(
        'id'   => '',
        'extra_class'     => '',
        'element_id'=> 'single-gallery-u-'.rand(0, 10000),
        'element_id_sync'=> 'single-gallery-sync-u-'.rand(0, 10000),
    ), $atts ) );    

    $id=explode(',', $id);

    $args = array(
        'post_type' => array( 'attachment' ),
        'orderby' => 'ASC',
        'post_status' => 'any',
        'posts_per_page' => -1,
        'post__in' => $id
    );

    $loop = new WP_Query( $args );  

    $post_images=$loop->posts; 

    ob_start();

         if (is_array($post_images)) :?>
            <section class="thumb-gallery short-load">
                <div id="<?php echo $element_id ?>" class="image-cont owl-theme single-gallery">
                    <?php foreach ($post_images as $key => $image): ?>
                        <?php $img_atachment_big=wp_get_attachment_image_src($image->ID,'galeria-interna'); 
                        ?>
                        <figure>
                            <img src="<?php echo $img_atachment_big[0] ?>" alt="<?php echo $image->post_title ?>">
                            <figcaption><?php  echo $image->post_title ?></figcaption>
                        </figure>
                    <?php  endforeach;?>    
                </div>
                <nav id="<?php echo $element_id_sync ?>" class="nav-cont owl-theme single-gallery">
                    <?php foreach ($post_images as $key => $image): ?>
                        <?php $img_atachment_small=wp_get_attachment_image_src($image->ID,'small')?>      
                        <div><img src="<?php echo $img_atachment_small[0] ?>" alt="<?php echo $image->post_title ?>"></div>
                    <?php  endforeach;?>
                </nav>
            </section>  

        <?php endif;

    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
add_shortcode( 'MDE-Thumb-gallery', 'mde_shortcode_thumb_gallery' );
