<?php 
function netthemes_sorted_categories() {
    $catarr = array();

    //Get categories of all modified posts
    $args_mod = array(
      'post_type'      => array( 'post' ),
      'orderby'        => 'modified',
      'posts_per_page' => '-1',
      'post_status'    => 'publish',
      'order'          => 'DESC',
    );
    $modified_query = new WP_Query( $args_mod );

    if($modified_query->have_posts()) {
        while ( $modified_query->have_posts() ) {
            $modified_query->the_post();
            $cat = get_the_category()[0];
            array_push($catarr, $cat);
        }
    }

    //Get all empty categories
    $args_cat = array(
      'parent' => 0,
      'hide_empty' => FALSE,
      'orderby' => 'name'
      );
    $categories = get_categories( $args_cat );
    foreach($categories as $category) {

        if($category->count == 0) {
            array_push($catarr, $category);
        }

    }

    return $catarr;

} 
?>
