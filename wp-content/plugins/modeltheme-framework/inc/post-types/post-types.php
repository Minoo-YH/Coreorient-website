<?php




/**
||-> CPT - [mt_job]
*/
// function mt_jobs_cpt() {

//     register_post_type('mt_job', array(
//                         'label' => __('Jobs','modeltheme'),
//                         'description' => '',
//                         'public' => true,
//                         'show_ui' => true,
//                         'show_in_menu' => true,
//                         'capability_type' => 'post',
//                         'map_meta_cap' => true,
//                         'hierarchical' => false,
//                         'rewrite' => array('slug' => 'job', 'with_front' => true),
//                         'query_var' => true,
//                         'menu_position' => '1',
//                         'menu_icon' => 'dashicons-money',
//                         'supports' => array('title','editor','thumbnail','author','excerpt'),
//                         'labels' => array (
//                             'name' => __('Jobs','modeltheme'),
//                             'singular_name' => __('Job','modeltheme'),
//                             'menu_name' => __('MT Jobs','modeltheme'),
//                             'add_new' => __('Add Job','modeltheme'),
//                             'add_new_item' => __('Add New Job','modeltheme'),
//                             'edit' => __('Edit','modeltheme'),
//                             'edit_item' => __('Edit Job','modeltheme'),
//                             'new_item' => __('New Job','modeltheme'),
//                             'view' => __('View Job','modeltheme'),
//                             'view_item' => __('View Job','modeltheme'),
//                             'search_items' => __('Search Jobs','modeltheme'),
//                             'not_found' => __('No Jobs Found','modeltheme'),
//                             'not_found_in_trash' => __('No Jobs Found in Trash','modeltheme'),
//                             'parent' => __('Parent Job','modeltheme'),
//                             )
//                         ) 
//                     ); 
// }
// add_action('init', 'mt_jobs_cpt');

/**
||-> TAX - [mt_job_type]
||-> CPT - [mt_job]
*/
// function mt_job_type_taxonomy() {
    
//     $labels = array(
//         'name'                       => _x( 'Job Types', 'Taxonomy General Name', 'modeltheme' ),
//         'singular_name'              => _x( 'Job', 'Taxonomy Singular Name', 'modeltheme' ),
//         'menu_name'                  => __( 'Job Types', 'modeltheme' ),
//         'all_items'                  => __( 'All Items', 'modeltheme' ),
//         'parent_item'                => __( 'Parent Item', 'modeltheme' ),
//         'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
//         'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
//         'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
//         'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
//         'update_item'                => __( 'Update Item', 'modeltheme' ),
//         'view_item'                  => __( 'View Item', 'modeltheme' ),
//         'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
//         'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
//         'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
//         'popular_items'              => __( 'Popular Items', 'modeltheme' ),
//         'search_items'               => __( 'Search Items', 'modeltheme' ),
//         'not_found'                  => __( 'Not Found', 'modeltheme' ),
//     );
//     $args = array(
//         'labels'                     => $labels,
//         'hierarchical'               => true,
//         'public'                     => true,
//         'show_ui'                    => true,
//         'show_admin_column'          => true,
//         'show_in_nav_menus'          => true,
//         'show_tagcloud'              => true,
//     );
//     register_taxonomy( 'mt_job_type', array( 'mt_job' ), $args );
// }
// add_action( 'init', 'mt_job_type_taxonomy' );




/**
||-> CPT - [testimonial]
*/
function modeltheme_events_cpt() {

    register_post_type('mt_event', array(
                        'label' => __('Events','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'events', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-calendar-alt',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Events','modeltheme'),
                            'singular_name' => __('Event','modeltheme'),
                            'menu_name' => __('MT Events','modeltheme'),
                            'add_new' => __('Add Event','modeltheme'),
                            'add_new_item' => __('Add New Event','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Event','modeltheme'),
                            'new_item' => __('New Event','modeltheme'),
                            'view' => __('View Event','modeltheme'),
                            'view_item' => __('View Event','modeltheme'),
                            'search_items' => __('Search Events','modeltheme'),
                            'not_found' => __('No Events Found','modeltheme'),
                            'not_found_in_trash' => __('No Events Found in Trash','modeltheme'),
                            'parent' => __('Parent Event','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'modeltheme_events_cpt');


/**

||-> CPT - [testimonial]

*/
function smartowl_testimonial_custom_post() {

    register_post_type('Testimonial', array(
                        'label' => __('Testimonials','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'testimonial', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-format-status',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Testimonials','modeltheme'),
                            'singular_name' => __('Testimonial','modeltheme'),
                            'menu_name' => __('MT Testimonials','modeltheme'),
                            'add_new' => __('Add Testimonial','modeltheme'),
                            'add_new_item' => __('Add New Testimonial','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Testimonial','modeltheme'),
                            'new_item' => __('New Testimonial','modeltheme'),
                            'view' => __('View Testimonial','modeltheme'),
                            'view_item' => __('View Testimonial','modeltheme'),
                            'search_items' => __('Search Testimonials','modeltheme'),
                            'not_found' => __('No Testimonials Found','modeltheme'),
                            'not_found_in_trash' => __('No Testimonials Found in Trash','modeltheme'),
                            'parent' => __('Parent Testimonial','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'smartowl_testimonial_custom_post');


/**

||-> CPT - [mt-gallery]

*/
function mt_gallery_custom_post() {

    register_post_type('mt-gallery', array(
                        'label' => __('MT Galley','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'mt-gallery', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-format-gallery',
                        'supports' => array('title','editor','thumbnail','author'),
                        'labels' => array (
                            'name' => __('Galleries','modeltheme'),
                            'singular_name' => __('Gallery Item','modeltheme'),
                            'menu_name' => __('MT Galleries','modeltheme'),
                            'add_new' => __('Add Gallery Item','modeltheme'),
                            'add_new_item' => __('Add New Gallery Item','modeltheme'),
                            'edit' => __('Edit Item','modeltheme'),
                            'edit_item' => __('Edit Gallery Item','modeltheme'),
                            'new_item' => __('New Gallery Item','modeltheme'),
                            'view' => __('View Gallery Item','modeltheme'),
                            'view_item' => __('View Gallery Item','modeltheme'),
                            'search_items' => __('Search Gallery Items','modeltheme'),
                            'not_found' => __('No Gallery Item Found','modeltheme'),
                            'not_found_in_trash' => __('No Gallery Item Found in Trash','modeltheme'),
                            'parent' => __('Parent Gallery Item','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'mt_gallery_custom_post');



/**

||-> TAX - [mt-gallery-category]
||-> CPT - [mt-gallery]

*/
function mt_gallery_category_taxonomy() {
    
    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'modeltheme' ),
        'singular_name'              => _x( 'Gallery', 'Taxonomy Singular Name', 'modeltheme' ),
        'menu_name'                  => __( 'Gallery Categories', 'modeltheme' ),
        'all_items'                  => __( 'All Items', 'modeltheme' ),
        'parent_item'                => __( 'Parent Item', 'modeltheme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
        'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
        'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
        'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
        'update_item'                => __( 'Update Item', 'modeltheme' ),
        'view_item'                  => __( 'View Item', 'modeltheme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
        'popular_items'              => __( 'Popular Items', 'modeltheme' ),
        'search_items'               => __( 'Search Items', 'modeltheme' ),
        'not_found'                  => __( 'Not Found', 'modeltheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'mt-gallery-category', array( 'mt-gallery' ), $args );
}
add_action( 'init', 'mt_gallery_category_taxonomy' );





/**

||-> CPT - [portfolio]

*/
function mt_portfolio_custom_post() {

    register_post_type('Portfolio', array(
                        'label' => __('Portfolios','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'portfolio', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-portfolio',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Portfolios','modeltheme'),
                            'singular_name' => __('Portfolio','modeltheme'),
                            'menu_name' => __('MT Portfolios','modeltheme'),
                            'add_new' => __('Add Portfolio','modeltheme'),
                            'add_new_item' => __('Add New Portfolio','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Portfolio','modeltheme'),
                            'new_item' => __('New Portfolio','modeltheme'),
                            'view' => __('View Portfolio','modeltheme'),
                            'view_item' => __('View Portfolio','modeltheme'),
                            'search_items' => __('Search Portfolios','modeltheme'),
                            'not_found' => __('No Portfolios Found','modeltheme'),
                            'not_found_in_trash' => __('No Portfolios Found in Trash','modeltheme'),
                            'parent' => __('Parent Portfolio','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'mt_portfolio_custom_post');



/**

||-> TAX - [services]
||-> CPT - [service]

*/
function mt_portfolio_taxonomy() {
    
    $labels = array(
        'name'                       => _x( 'Portfolios', 'Taxonomy General Name', 'modeltheme' ),
        'singular_name'              => _x( 'Portfolio', 'Taxonomy Singular Name', 'modeltheme' ),
        'menu_name'                  => __( 'Portfolio Categories', 'modeltheme' ),
        'all_items'                  => __( 'All Items', 'modeltheme' ),
        'parent_item'                => __( 'Parent Item', 'modeltheme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
        'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
        'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
        'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
        'update_item'                => __( 'Update Item', 'modeltheme' ),
        'view_item'                  => __( 'View Item', 'modeltheme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
        'popular_items'              => __( 'Popular Items', 'modeltheme' ),
        'search_items'               => __( 'Search Items', 'modeltheme' ),
        'not_found'                  => __( 'Not Found', 'modeltheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'portfolios', array( 'portfolio' ), $args );
}
add_action( 'init', 'mt_portfolio_taxonomy' );



/**

||-> TAX - [portfolioskill]
||-> CPT - [portfolio]

*/
function mt_portfolio_tags_taxonomy() {
    
    $labels = array(
        'name'                       => _x( 'Skills', 'Taxonomy General Name', 'modeltheme' ),
        'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'modeltheme' ),
        'menu_name'                  => __( 'Portfolio Skills', 'modeltheme' ),
        'all_items'                  => __( 'All Items', 'modeltheme' ),
        'parent_item'                => __( 'Parent Item', 'modeltheme' ),
        'parent_item_colon'          => __( 'Parent Item:', 'modeltheme' ),
        'new_item_name'              => __( 'New Item Name', 'modeltheme' ),
        'add_new_item'               => __( 'Add New Item', 'modeltheme' ),
        'edit_item'                  => __( 'Edit Item', 'modeltheme' ),
        'update_item'                => __( 'Update Item', 'modeltheme' ),
        'view_item'                  => __( 'View Item', 'modeltheme' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'modeltheme' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'modeltheme' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'modeltheme' ),
        'popular_items'              => __( 'Popular Items', 'modeltheme' ),
        'search_items'               => __( 'Search Items', 'modeltheme' ),
        'not_found'                  => __( 'Not Found', 'modeltheme' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'portfolioskill', array( 'portfolio' ), $args );
}
add_action( 'init', 'mt_portfolio_tags_taxonomy' );






/**

||-> CPT - [client]

*/
function connection_client_custom_post() {

    register_post_type('Clients', array(
                        'label' => __('Clients','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'client', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Clients','modeltheme'),
                            'singular_name' => __('Client','modeltheme'),
                            'menu_name' => __('MT Clients','modeltheme'),
                            'add_new' => __('Add Client','modeltheme'),
                            'add_new_item' => __('Add New Client','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Client','modeltheme'),
                            'new_item' => __('New Client','modeltheme'),
                            'view' => __('View Client','modeltheme'),
                            'view_item' => __('View Client','modeltheme'),
                            'search_items' => __('Search Clients','modeltheme'),
                            'not_found' => __('No Clients Found','modeltheme'),
                            'not_found_in_trash' => __('No Clients Found in Trash','modeltheme'),
                            'parent' => __('Parent Client','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'connection_client_custom_post');




/**

||-> CPT - [quote]

*/
// function smartowl_quote_custom_post() {

//     register_post_type('quote', array(
//                         'label' => __('Quotes','modeltheme'),
//                         'description' => '',
//                         'public' => true,
//                         'show_ui' => true,
//                         'show_in_menu' => true,
//                         'capability_type' => 'post',
//                         'map_meta_cap' => true,
//                         'hierarchical' => false,
//                         'rewrite' => array('slug' => 'quote', 'with_front' => true),
//                         'query_var' => true,
//                         'menu_position' => '1',
//                         'menu_icon' => 'dashicons-format-quote',
//                         'supports' => array('title','editor','thumbnail','author','excerpt'),
//                         'labels' => array (
//                             'name' => __('Quotes','modeltheme'),
//                             'singular_name' => __('Quote','modeltheme'),
//                             'menu_name' => __('MT Quotes','modeltheme'),
//                             'add_new' => __('Add Quote','modeltheme'),
//                             'add_new_item' => __('Add New Quote','modeltheme'),
//                             'edit' => __('Edit','modeltheme'),
//                             'edit_item' => __('Edit Quote','modeltheme'),
//                             'new_item' => __('New Quote','modeltheme'),
//                             'view' => __('View Quote','modeltheme'),
//                             'view_item' => __('View Quote','modeltheme'),
//                             'search_items' => __('Search Quotes','modeltheme'),
//                             'not_found' => __('No Quotes Found','modeltheme'),
//                             'not_found_in_trash' => __('No Quotes Found in Trash','modeltheme'),
//                             'parent' => __('Parent Quote','modeltheme'),
//                             )
//                         ) 
//                     ); 
// }
// add_action('init', 'smartowl_quote_custom_post');




/**

||-> CPT - [member]

*/
function smartowl_members_custom_post() {

    register_post_type('member', array(
                        'label' => __('Members','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'member', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-businessman',
                        'supports' => array('title','editor','thumbnail','author','excerpt'),
                        'labels' => array (
                            'name' => __('Members','modeltheme'),
                            'singular_name' => __('Member','modeltheme'),
                            'menu_name' => __('MT Members','modeltheme'),
                            'add_new' => __('Add Member','modeltheme'),
                            'add_new_item' => __('Add New Member','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Member','modeltheme'),
                            'new_item' => __('New Member','modeltheme'),
                            'view' => __('View Member','modeltheme'),
                            'view_item' => __('View Member','modeltheme'),
                            'search_items' => __('Search Members','modeltheme'),
                            'not_found' => __('No Members Found','modeltheme'),
                            'not_found_in_trash' => __('No Members Found in Trash','modeltheme'),
                            'parent' => __('Parent Member','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'smartowl_members_custom_post');





/**

||-> CPT - [service]

*/
function smartowl_services_custom_post() {

    register_post_type('service', array(
                        'label' => __('Services','modeltheme'),
                        'description' => '',
                        'public' => true,
                        'show_ui' => true,
                        'show_in_menu' => true,
                        'capability_type' => 'post',
                        'map_meta_cap' => true,
                        'hierarchical' => false,
                        'rewrite' => array('slug' => 'service', 'with_front' => true),
                        'query_var' => true,
                        'menu_position' => '1',
                        'menu_icon' => 'dashicons-feedback',
                        'supports' => array('title','editor','thumbnail','author','excerpt','comments'),   
                        'labels' => array (
                            'name' => __('Services','modeltheme'),
                            'singular_name' => __('Service','modeltheme'),
                            'menu_name' => __('MT Services','modeltheme'),
                            'add_new' => __('Add Service','modeltheme'),
                            'add_new_item' => __('Add New Service','modeltheme'),
                            'edit' => __('Edit','modeltheme'),
                            'edit_item' => __('Edit Service','modeltheme'),
                            'new_item' => __('New Service','modeltheme'),
                            'view' => __('View Service','modeltheme'),
                            'view_item' => __('View Service','modeltheme'),
                            'search_items' => __('Search Service','modeltheme'),
                            'not_found' => __('No Services Found','modeltheme'),
                            'not_found_in_trash' => __('No Services Found in Trash','modeltheme'),
                            'parent' => __('Parent Service','modeltheme'),
                            )
                        ) 
                    ); 
}
add_action('init', 'smartowl_services_custom_post');


?>