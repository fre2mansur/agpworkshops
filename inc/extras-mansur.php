<?php
function create_posttype() {
 
    register_post_type( 'applications',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Applications' ),
                'singular_name' => __( 'Application' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'applications'),
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );


 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Applications', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Application', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Applications', 'twentythirteen' ),
        'parent_item_colon'   => __( 'Parent Movie', 'twentythirteen' ),
        'all_items'           => __( 'All', 'twentythirteen' ),
        'view_item'           => __( 'View', 'twentythirteen' ),
        'add_new_item'        => __( 'Add New', 'twentythirteen' ),
        'add_new'             => __( 'Add New', 'twentythirteen' ),
        'edit_item'           => __( 'Edit', 'twentythirteen' ),
        'update_item'         => __( 'Update', 'twentythirteen' ),
        'search_items'        => __( 'Search', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'applications', 'twentythirteen' ),
        'description'         => __( 'Appicants for workshops', 'twentythirteen' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array('custom-fields', 'author'),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'applications', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );


/*-------------------------------------------------------------------------------
    Custom Columns
-------------------------------------------------------------------------------*/

function application_list_column($columns)
{
    $columns = array(
        'name'  => 'Name',
        'email'    =>  'Email',
        'age'    =>  'Age',
        'payment'    =>  'Payment Status',
        'date'      =>  'Date',
    );
    return $columns;
}
//manage_{$post_type}_posts_columns
add_filter( 'manage_applications_posts_columns', 'application_list_column' );
function my_custom_columns($column)
{
     switch ( $column ) {

        case 'name' :
            echo get_field('name');
            break;

        case 'email' :
            echo get_field('email');
            break;

        case 'age' :
            echo get_field('age');
            break;

        case 'payment' :
            echo get_field('payment');
            break;

    }

}
add_action( 'manage_applications_posts_custom_column' , 'my_custom_columns', 10, 2 );

//add Apply Form in workshop detail page
add_filter('the_content','add_my_content');
function add_my_content($content) {

    $my_custom_text = do_action('form_message') ."
    <form method='post'>
    <h3>Register</h3>
        <p><label for='name'>Your Name</label> <input type='text' name='metaName' id='metaName' /></p>
        <p><label for='email'>Your Email</label> <input type='text' name='metaEmail' id='metaEmail' /></p>
        <p><label for='email'>Your Age</label> <input type='text' name='metaAge' id='metaAge' /></p>
        <p><label for='email'>Your Phone</label> <input type='text' name='metaPhone' id='metaPhone' /></p>
        <button type='submit'>Submit</button>
        ". wp_nonce_field( 'cpt_nonce_action', 'cpt_nonce_field' ) ."</form>";

    if(is_singular('agp_workshop') ) {
        $content = $my_custom_text.$content;
    }
    return $content;
}

