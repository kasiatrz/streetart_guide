<?php

//PAGINATION
function generatePagination($paged){
        global $wp_query;

    $big = 999999999; // need an unlikely integer

    echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $paged ),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '&lt;&lt;',
        'next_text' => '&gt;&gt;',
        'type' => 'list',
        'end_size'      => 0,
        'mid_size'      =>2
    ) );

 }

//GET CHILD TERM
function ct_get_child_terms( $post_id, $taxonomy = 'category', $args = array() ) {
    
    $object_terms = wp_get_object_terms( $post_id, $taxonomy, $args );
    
    foreach ( $object_terms as $term ) {
        //jeśli 'if'==true wtedy funkcja jest kontynuowana. Czyli tu: jeżeli element taksonomii posiada rodzica funkcja jest kontynuowana
        if ( $term->parent ) {
            $child =  $term->name;
        }
    }
    
    return  $child ;
}




?>

