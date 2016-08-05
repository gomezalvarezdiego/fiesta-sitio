<?php


// create defines
define( 'THEME_NAME', 'LIBRO' );
define( 'THEME_SHORT', 'LIBRO' );

define( 'MDE_THEME_DIR', get_stylesheet_directory() . '/' );
define( 'MDE_THEME_URI', get_stylesheet_directory_uri() . '/' );


function oxy_load_child_scripts() {
    wp_enqueue_style( THEME_SHORT . '-child-theme' , get_stylesheet_directory_uri() . '/style.css', array( THEME_SHORT . '-theme' ), false, 'all' );
}

add_action( 'wp_enqueue_scripts', 'oxy_load_child_scripts');


///////Allow KMZ///////
function add_upload_mimes($mimes=array()) {
    $mimes['kml']='application/vnd.google-earth.kml+xml';
    $mimes['kmz']='application/vnd.google-earth.kmz';
    return $mimes;
}
add_filter("upload_mimes","add_upload_mimes");

// load theme style
wp_enqueue_style( THEME_SHORT.'-theme-mde', MDE_THEME_URI . 'assets/css/libro_theme.css');
wp_enqueue_style( THEME_SHORT.'-owl-mde', MDE_THEME_URI . 'vendor/owl.carousel/owl-carousel/owl.carousel.css');
wp_enqueue_style( THEME_SHORT.'-owl-theme-mde', MDE_THEME_URI . 'vendor/owl.carousel/owl-carousel/owl.theme.css');

// load theme script
wp_enqueue_script( THEME_SHORT.'-owl', MDE_THEME_URI . 'vendor/owl.carousel/owl-carousel/owl.carousel.min.js',array('jquery'),'',true);
wp_enqueue_script( THEME_SHORT.'-main', MDE_THEME_URI . 'js/main.js',array('jquery',THEME_SHORT.'-owl'),'1.0.0',true);


include MDE_THEME_DIR . 'inc/custom-posts.php';
include MDE_THEME_DIR . 'inc/options/shortcodes/shortcodes.php';



add_image_size('Home-entrada', '357', '239',true);
add_image_size('Multimedia', '532', '261',true);
add_image_size('Institucional', '248', '160',true);


function register_my_menus() {
    register_nav_menus(
            array(
                'header-bar-menu' => __('Top bar menu')
            )
    );
}

function previewPostContent($content,$excerpt="",$limit=200,$readMore=false,$postId=""){

	$string=($excerpt)?$excerpt:$content;

    if (strlen($string) > $limit) {
        // truncate string
        $stringCut = substr($string, 0, $limit);
        // make sure it ends in a word so assassinate doesn't become ass...
        $string = substr($stringCut, 0, strrpos($stringCut, ' '));

        if ($readMore){
        	$string.='... <a href="' . get_permalink($postId) . '">Leer más...</a>';
        }
        return $string;
    }else{
    	return $string;
    }
}

add_action('init', 'register_my_menus');

function add_my_var($public_query_vars) {
    $public_query_vars[] = 'we-do';
    return $public_query_vars;
}

add_filter('query_vars', 'add_my_var');

function do_rewrite() {
    add_rewrite_rule('que-hacemos/([^/]+)/?$', 'index.php?pagename=que-hacemos&we-do=$matches[1]','top');
    add_rewrite_rule('quienes-somos/([^/]+)/?$', 'index.php?pagename=quienes-somos&we-do=$matches[1]','top');
}

add_action('init', 'do_rewrite');


add_action( 'widgets_init', 'side_bar_widgets_init' );
function side_bar_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Que hacemos Sidebar', 'mde-side-slug' ),
        'id' => 'que-hacemos-side',
        'description' => __( 'Side bar de contenidos de que hacemos', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="sidebar-header">',
    'after_title'   => '</h2>',
    ) );
}

add_filter( 'posts_fields', 'wcm_limit_post_fields_cb', 0, 2 );
function wcm_limit_post_fields_cb( $fields, $query )
{
  if (
        ! is_admin()
    OR ! $query->is_main_query()
        OR ( defined( 'DOING_AJAX' ) AND DOING_AJAX )
        OR ( defined( 'DOING_CRON' ) AND DOING_CRON )
    )
        return $fields;

    $p = $GLOBALS['wpdb']->posts;
    return implode( ",", array(
        "{$p}.ID",
        "{$p}.post_title",
        "{$p}.post_date",
        "{$p}.post_author",
        "{$p}.post_name",
        "{$p}.comment_status",
        "{$p}.ping_status",
        "{$p}.post_password",
    ) );
}


function get_child_imploded($parent_slug,$taxonomy,$implode=true,$imploded_conf='slug'){

    $mde_themes_term=get_term_by( 'slug', $parent_slug, $taxonomy);
    $term_id=$mde_themes_term->term_id;
    $child_terms=get_term_children( $term_id, $taxonomy);
    $child_term_names=array();

    foreach ($child_terms as $key => $term_id) {
        $actual_term=get_term_by( 'id', $term_id, $taxonomy);
        if ($implode){
            $child_term_names[]=$actual_term->$imploded_conf;
        }else{
            $child_term_names[]=$actual_term;
        }
    }

    if ($implode){
        $sub_themes=implode(',', $child_term_names);
    }else{
        $sub_themes=$child_term_names;
    }

    return  $sub_themes;
}





