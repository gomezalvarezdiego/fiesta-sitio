<?php


/* ------------------ CAJAS DE MENÚ-----------------------*/


$labels = array(
    'name'               => __('Menu', 'omega-admin-td'),
    'singular_name'      => __('Menu', 'omega-admin-td'),
    'add_new'            => __('Agregar Nueva Opción', 'omega-admin-td'),
    'add_new_item'       => __('Agregar Nueva Opción', 'omega-admin-td'),
    'edit_item'          => __('Editar Opción', 'omega-admin-td'),
    'new_item'           => __('Nueva Opción', 'omega-admin-td'),
    'all_items'          => __('Todas las opciones', 'omega-admin-td'),
    'view_item'          => __('Ver Opciones', 'omega-admin-td'),
    'search_items'       => __('Buscar Opciones', 'omega-admin-td'),
    'not_found'          => __('No se encontraron Opciones', 'omega-admin-td'),
    'not_found_in_trash' => __('No se encontraron Opciones en la papelera', 'omega-admin-td'),
    'menu_name'          => __('Menú', 'omega-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'supports'           => array( 'title', 'thumbnail')
);
register_post_type('box_menu', $args);





//Frases destacadas//
$labels = array(
    'name'               => __('Frases Destacadas', 'omega-admin-td'),
    'singular_name'      => __('Frase destacada', 'omega-admin-td'),
    'add_new'            => __('Agregar nuevo', 'omega-admin-td'),
    'add_new_item'       => __('Agregar nueva Frase', 'omega-admin-td'),
    'edit_item'          => __('Editar Frase', 'omega-admin-td'),
    'new_item'           => __('Nueva Frase', 'omega-admin-td'),
    'all_items'          => __('Todas las Frases', 'omega-admin-td'),
    'view_item'          => __('Ver Frase', 'omega-admin-td'),
    'search_items'       => __('Buscar Frases', 'omega-admin-td'),
    'not_found'          => __('No se encontraron Frases', 'omega-admin-td'),
    'not_found_in_trash' => __('No se encontraron Frases en la papelera', 'omega-admin-td'),
    'menu_name'          => __('Frases Destacadas', 'omega-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-groups',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions','excerpt' )
);
register_post_type('testimonials', $args);


function mde_edit_columns_testimonial($columns) {
    $columns = array(
        'cb'                   => '<input type="checkbox" />',
        'title'                => __('Author', 'omega-admin-td'),
        'featured-image'       => __('Image', 'omega-admin-td'),
        'mde-testimonial-theme'    => __('Tema', 'omega-admin-td'),
        'date'    => __('Fecha', 'omega-admin-td'),
        'ns_featured_posts_col'    => __('Destacado', 'omega-admin-td')
    );
    return $columns;
}
add_filter( 'manage_edit-mde_testimonial_columns', 'mde_edit_columns_testimonial' );



/* ------------------ MULTIMEDIA -----------------------*/

$labels = array(
    'name'               => __('Multimedia', 'omega-admin-td'),
    'singular_name'      => __('Multimedia', 'omega-admin-td'),
    'add_new'            => __('Agregar Multimedia', 'omega-admin-td'),
    'add_new_item'       => __('Agregar Multimedia', 'omega-admin-td'),
    'edit_item'          => __('Editar Multimedia', 'omega-admin-td'),
    'new_item'           => __('Nueva Multimedia', 'omega-admin-td'),
    'all_items'          => __('Todas las Multimedia', 'omega-admin-td'),
    'view_item'          => __('Ver Multimedia', 'omega-admin-td'),
    'search_items'       => __('Buscar Multimedia', 'omega-admin-td'),
    'not_found'          => __('No se encontro Multimedia', 'omega-admin-td'),
    'not_found_in_trash' => __('No se encontro Multimedia en la Papelera', 'omega-admin-td'),
    'menu_name'          => __('Multimedia', 'omega-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-format-video',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions','excerpt' )
);
register_post_type('multimedia', $args);



/* ------------------ INSTITUCIONAL-----------------------*/


$labels = array(
    'name'               => __('Institucional', 'omega-admin-td'),
    'singular_name'      => __('Institucional', 'omega-admin-td'),
    'add_new'            => __('Agregar Nuevo Institucional', 'omega-admin-td'),
    'add_new_item'       => __('Agregar Nuevo Institucional', 'omega-admin-td'),
    'edit_item'          => __('Editar Institucional', 'omega-admin-td'),
    'new_item'           => __('Nuevo Institucional', 'omega-admin-td'),
    'all_items'          => __('Todos los Institucionales', 'omega-admin-td'),
    'view_item'          => __('Ver Institucional', 'omega-admin-td'),
    'search_items'       => __('Buscar Institucional', 'omega-admin-td'),
    'not_found'          => __('No se encontraron Institucionales', 'omega-admin-td'),
    'not_found_in_trash' => __('No se encontraron Institucionales en la papelera', 'omega-admin-td'),
    'menu_name'          => __('Institucionales', 'omega-admin-td')
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => null,
    'menu_icon'          => 'dashicons-welcome-learn-more',
    'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'revisions','excerpt' )
);
register_post_type('institucionales', $args);


//////////////////ADD TEMPLATE///////////////////////////

# Define your custom post type string
define('MY_CUSTOM_POST_TYPE', 'testimonials');

/**
 * Register the meta box
 */
add_action('add_meta_boxes', 'page_templates_dropdown_metabox');
function page_templates_dropdown_metabox(){
    add_meta_box(
        MY_CUSTOM_POST_TYPE.'-page-template',
        __('Template', 'rainbow'),
        'render_page_template_dropdown_metabox',
        MY_CUSTOM_POST_TYPE,
        'side', #I prefer placement under the post actions meta box
        'low'
    );
}

/**
 * Render your metabox - This code is similar to what is rendered on the page post type
 * @return void
 */
function render_page_template_dropdown_metabox(){
    global $post;
    $template = get_post_meta($post->ID, '_wp_page_template', true);
    echo "
        <label class='screen-reader-text' for='page_template'>Page Template</label>
            <select name='_wp_page_template' id='page_template'>
            <option value='page-mde_especiales.php'>Especial</option>";
            page_template_dropdown($template);
    echo "</select>";
}

/**
 * Save the page template
 * @return void
 */
function save_page_template($post_id){

    # Skip the auto saves
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    elseif ( defined( 'DOING_AJAX' ) && DOING_AJAX )
        return;
    elseif ( defined( 'DOING_CRON' ) && DOING_CRON )
        return;

    # Only update the page template meta if we are on our specific post type
    elseif(MY_CUSTOM_POST_TYPE === $_POST['post_type'])
        update_post_meta($post_id, '_wp_page_template', esc_attr($_POST['_wp_page_template']));
}
add_action('save_post', 'save_page_template');


/**
 * Set the page template
 * @param string $template The determined template from the WordPress brain
 * @return string $template Full path to predefined or custom page template
 */
function set_page_template($template){
    global $post;
    if(MY_CUSTOM_POST_TYPE === $post->post_type){
        $custom_template = get_post_meta($post->ID, '_wp_page_template', true);
        if($custom_template)
            #since our dropdown only gives the basename, use the locate_template() function to easily find the full path
            return locate_template($custom_template);
    }
    return $template;
}
add_filter('single_template', 'set_page_template');


//////////////////////////////////////////////////////////////////////////////



/////////////////MDE CONTENT CATEGORY//////////
$labels = array(
    'name'          => __( 'Temas', 'omega-admin-td' ),
    'singular_name' => __( 'Tema', 'omega-admin-td' ),
    'search_items'  => __( 'Buscar Tema', 'omega-admin-td' ),
    'all_items'     => __( 'Todos los Temas', 'omega-admin-td' ),
    'edit_item'     => __( 'Editar Tema', 'omega-admin-td'),
    'update_item'   => __( 'Actualizar Tema', 'omega-admin-td'),
    'add_new_item'  => __( 'Agregar Nuevo Tema', 'omega-admin-td'),
    'new_item_name' => __( 'Nuevo nombre del tema', 'omega-admin-td')
);

register_taxonomy(
    'category',
    array('post','testimonials','multimedia','institucionales'),
    array(
        'hierarchical' => true,
        'labels'       => $labels,
        'show_ui'      => true,
        'query_var'    => true,
        'rewrite'      => array( 'slug' => 'temas' ),
    )
);



// Remove menu
function remove_menus(){
     remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category');
}

add_action( 'admin_menu', 'remove_menus' );

    


