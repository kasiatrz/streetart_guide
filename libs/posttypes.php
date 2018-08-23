<?php
add_action('init', 'streetart_posttypes');
    
    function streetart_posttypes(){
        
        
        /*
         * Register Artists Post Type
         */
        $artists_args = array(
            'labels' => array(
                'name' => 'Artists',
                'singular_name' => 'Artists',
                'all_items' => 'All artists',
                'add_new' => 'Add new artist',
                'add_new_item' => 'Add new artist',
                'edit_item' => 'Edit artist',
                'new_item' => 'New artist',
                'view_item' => 'View artist',
                'search_items' => 'Search artist',
                'not_found' =>  'Artist not found',
                'not_found_in_trash' => 'No artist found in trash', 
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => get_template_directory_uri() . "/assets/artists.png",
            'supports' => array(
                'title','editor','author','thumbnail','comments'
            ),
            'has_archive' => true            
        );
        
        
        
        
        
   
        
        register_post_type('artists', $artists_args);
        

    
        /*
         * Register Work Post Type
         */
        $works_args = array(
            'labels' => array(
                'name' => 'Works',
                'singular_name' => 'Works',
                'all_items' => 'All works',
                'add_new' => 'Add new work',
                'add_new_item' => 'Add new work',
                'edit_item' => 'Edit work',
                'new_item' => 'New work',
                'view_item' => 'View work',
                'search_items' => 'Search work',
                'not_found' =>  'Work not found',
                'not_found_in_trash' => 'Work not found in trash', 
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => get_template_directory_uri() . "/assets/works.png",
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields', 'post-formats'
            ),
            'has_archive' => true
            
        );
        
        register_post_type('works', $works_args); 
        
        
        
        
              /*
         * Register Maps Post Type
         */
        $maps_args = array(
            'labels' => array(
                'name' => 'Maps',
                'singular_name' => 'Maps',
                'all_items' => 'All maps',
                'add_new' => 'Add new map',
                'add_new_item' => 'Add new map',
                'edit_item' => 'Edit map',
                'new_item' => 'New map',
                'view_item' => 'View map',
                'search_items' => 'Search map',
                'not_found' =>  'Map not found',
                'not_found_in_trash' => 'Map not found in trash', 
                'parent_item_colon' => ''
            ),
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true, 
            'query_var' => true,
            'rewrite' => true,
            'capability_type' => 'post',
            'hierarchical' => false,
            'menu_position' => 5,
            'menu_icon' => get_template_directory_uri() . "/assets/maps.png",
            'supports' => array(
                'title','editor','author','thumbnail','excerpt','comments','custom-fields', 'post-formats'
            ),
            'has_archive' => true
            
        );
        
        register_post_type('maps', $maps_args); 
    }

/* register taxonomie*/
add_action('init', 'streetart_taxonomies');
    
    /* rejestruje taksonioemjeie*/
    
    function streetart_taxonomies(){
        
        // Artists
        register_taxonomy(
            'artists',
            array('works'),
            array(
				/* hierarchical becaouse I use it in filter? But not sure*/
                'hierarchical' => true,
                'labels' => array(
                    'name' => 'Artists',
                    'singular_name' => 'Artists',
                    'search_items' =>  'Search artist',
                    'popular_items' => 'Popular artists',
                    'all_items' => 'All artists',
                    'most_used_items' => null,
                    'parent_item' => null,
                    'parent_item_colon' => null,
                    'edit_item' => 'Edit artists', 
                    'update_item' => 'Update artist',
                    'add_new_item' => 'Add new artist',
                    'new_item_name' => 'Add new artist',
                    'separate_items_with_commas' => 'Separate artists with commas',
                    'add_or_remove_items' => 'Add or remove artist',
                    'choose_from_most_used' => 'Choose from most used artists',
                    'menu_name' => 'Artists',
                    'public' => true,
                ),
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'artist' )
        ));
         // Cities
        register_taxonomy(
            'cities',
            array('works'),
            array(
				/* hierarchical becaouse I use it in filter? But not sure*/
                'hierarchical' => true,
                'labels' => array(
                    'name' => 'Cities',
                    'singular_name' => 'Cities',
                    'search_items' =>  'Search cities',
                    'popular_items' => 'Popular cities',
                    'all_items' => 'All cities',
                    'most_used_items' => null,
                    'parent_item' => null,
                    'parent_item_colon' => null,
                    'edit_item' => 'Edit cities', 
                    'update_item' => 'Update city',
                    'add_new_item' => 'Add new city',
                    'new_item_name' => 'Add new city',
                    'separate_items_with_commas' => 'Separate cities with commas',
                    'add_or_remove_items' => 'Add or remove city',
                    'choose_from_most_used' => 'Choose from most used cities',
                    'menu_name' => 'Cities',
                    'public' => true,
                ),
                'show_ui' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array('slug' => 'city' )
        ));
       
    }

    //adding post thumbnail
    add_theme_support( 'post-thumbnails' ); 


        
       
?>




