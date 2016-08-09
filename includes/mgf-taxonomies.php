<?php
// Create Sponsor Level taxonomy
add_action( 'init', 'sponsor_level_taxonomy', 0 );
function sponsor_level_taxonomy() {
     register_taxonomy(
          'sponsor_level',
          'wd_sponsors',
          array(
               'labels' => array(
                    'name' => 'Sponsorship Levels',
                    'add_new_item' => 'Add New Level',
                    'new_item_name' => 'New Level',
               ),
               'show_ui' => true,
               'show_tagcloud' => false,
               'hierarchical' => true,
          )
     );
}
