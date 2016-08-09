<?php
//Register Speakers Post Type
add_action( 'init', 'create_speakers_posts');
function create_speakers_posts() {
     register_post_type( 'speakers',
          array(
               'labels' => array(
                    'name' => 'Speakers',
                    'singular_name' => 'Speaker',
                    'plural_name' => 'Speakers',
                    'add_new' => 'Add Speaker',
                    'all_items' => 'All Speakers',
               ),
               'public' => true,
               'has_archive' => false,
               'query_var' => true,
               'rewrite' => array( 'slug' => 'speakers' ),
               'capability_type' => 'post',
               'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'revisions',
                    'excerpt',
               ),
               'taxonomies' => array(
               ),
               'menu_position' => 4,
          )
     );
}
// Setup columns for Management post type
//add_filter( 'manage_edit-management_columns', 'wd_management_edit_columns' ) ;
function wd_management_edit_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'type' => __( 'Type' ),
		'date' => __(' Date ')
  	);
     return $columns;
}
//add_action( 'manage_management_posts_custom_column', 'wd_management_manage_columns', 10, 2 );
function wd_management_manage_columns( $column, $post_id ) {
	global $post;
     switch( $column ) {
		case 'type' :
			$wd_department = get_the_term_list( $post_id, 'management_type', '', ',' , '' );
			$wd_department = strip_tags( $wd_department );
			if ( is_string($wd_department) )
                    echo $wd_department;
			else
			     echo 'None';
			break;
		default :
		break;
	}
}

add_action( 'init', 'create_sponsors_posts');
function create_sponsors_posts() {
     register_post_type( 'wd_sponsors',
          array(
               'labels' => array(
                    'name' => 'Sponsors',
                    'singular_name' => 'Sponsor',
                    'plural_name' => 'Sponsors',
                    'add_new' => 'Add Sponsor',
                    'all_items' => 'All Sponsors',
               ),
               'public' => true,
               'has_archive' => false,
               'query_var' => true,
               'capability_type' => 'post',
               'supports' => array(
                    'title',
               ),
               'rewrite' => array('slug' => 'sponsors'),
               'menu_position' => 5,
          )
     );
}

//custom columns to show sponsorship level and image
function wd_sponsors_column_headers($defaults) {
    unset($defaults['date']);
    $defaults['sponsor_level_column'] = 'Sponsorship Level';
    $defaults['sponsor_image_column'] = 'Sponsor Image';
    $defaults['date'] = 'Date';
    return $defaults;
}
function wd_sponsors_column_content($column_name, $post_ID) {
     if ($column_name == 'sponsor_level_column') {
          $array = wp_get_post_terms( $post_ID, 'sponsor_level');
          foreach( $array as $term) { echo $term->name ; }
     }
     if ($column_name == 'sponsor_image_column') {
          $sponsor_image = get_field('sponsor_logo', $post_ID);
          if( !empty($sponsor_image) ) {
               echo '<img class="sponsors-image-preview" src="' . $sponsor_image .'" style="max-height: 75px; max-width: 150px;">';
          }
     }
}
add_filter('manage_wd_sponsors_posts_columns', 'wd_sponsors_column_headers');
add_action('manage_wd_sponsors_posts_custom_column', 'wd_sponsors_column_content', 10, 2);

?>
