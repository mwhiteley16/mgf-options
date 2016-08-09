<?php
function mgfSpeakers( $atts ) {
     $a = shortcode_atts( array(
          'featured' => 'no',
     ), $atts );
?>

         <?php wp_reset_query(); ?>

         <?php
     	$featured = $a['featured'];
        $staff_query= null;
		$args=array(
     		'post_type' => 'speakers',
     		'post_status' => 'publish',
     		'posts_per_page' => -1,
     		);
     	if ( $featured === 'yes' ) {
             $args['meta_query'] = array(
                  array(
                       'key' => 'featured_speaker',
                       'value' => 'yes',
                       'compare' => 'LIKE',
                  ),
             );
        }
		$staff_query = new WP_Query($args);

		if ( $staff_query->have_posts() ) :

		     $output = '';
		     $output .= '<div class="full-width staff-con">';
               $itemNum = 1;
               $itemAlignment = 'first';
               $dataNum = 1;
                    while ( $staff_query->have_posts() ) : $staff_query->the_post();

          		$post_title = get_the_title();
          		$post_content = get_the_content();
          		$post_thumbnail = get_the_post_thumbnail();
          		$post_link = get_the_permalink();
          		$speaker_title = get_field('speaker_title');
          		$speaker_country = get_field('speaker_country');
          		$speaker_company = get_field('speaker_company');
          		$company_logo = get_field('company_logo');
          		$dir_uri = get_stylesheet_directory_uri();
          		if( empty( $post_thumbnail ) ) {
                         $post_thumbnail = '<img class="no-thumb-image" src="' . $dir_uri . '/images/mgf-sphere.png" alt="Mobile Growth Fellowship Icon">';
                }
          		
          		$output .= '<div class="team-member-con one-fourth item-' . $itemNum . ' ' . $itemAlignment . '">';
          		     $output .= '<div class="team-member-img-con" data-target="target-' . $dataNum . '"><span class="thumb-hover">' . $post_title . '<span class="click-here-open">[ click for bio ]</span></span>' . $post_thumbnail . '</div>';
                         $output .= '<div class="team-member-name">' . $post_title . '</div>';
                         if( $speaker_country ) { $output .= '<div class="team-member-country">' . $speaker_country . '</div>'; }
                         if( $speaker_title ) { $output .= '<div class="team-member-title">' . $speaker_title . '</div>'; }
                         if( $speaker_company ) { $output .= '<div class="speaker-company">' . $speaker_company . '</div>'; }
                         if( $company_logo ) { $output .= '<div class="company-logo-con"><span class="company-logo-con-helper"></span><img class="company-logo" src="' . $company_logo . '" alt="' . $speaker_company . ' Logo"></div>'; }
          		$output .= '</div>';
          		
          		$output .= '<div id="target-' . $dataNum . '" class="speaker-popup" style="display: none;">';
                         $output .= '<i class="fa fa-times-circle close-speaker-lightbox"></i>';
                         $output .= '<div class="overlay-headshot-con">' . $post_thumbnail . '</div>';
                         $output .= '<div class="overlay-content-con">';
                              $output .= '<div class="overlay-speaker">' . $post_title . '</div>';
                              if( $speaker_title ) { $output .= '<div class="overlay-team-member-title">' . $speaker_title . ' - ' . $speaker_company . '</div>'; }
                              $output .= '<div class="overlay-content">' . $post_content . '</div>';
                         $output .= '</div>';
                    $output .= '</div>';

                    if( $itemNum == '1' ) {
                         $itemNum++;
                         $itemAlignment = 'second';
                    } elseif( $itemNum == '2' ) {
                         $itemNum++;
                         $itemAlignment = 'third';
                    } elseif( $itemNum == '3' ) {
                         $itemNum++;
                         $itemAlignment = 'fourth';
                    } elseif( $itemNum == '4' ) {
                         $itemNum = '1';
                         $itemAlignment = 'first';
                    }
                    $dataNum++;
                    endwhile;
               $output .= '</div>';
               else : ?>

          <?php endif; wp_reset_query();
          
          return $output;
}
add_shortcode('mgf-speakers', 'mgfSpeakers');

function mgfSponsors( $atts ) {
     $a = shortcode_atts( array(
          'level' => ' ',
     ), $atts );
?>

     <?php wp_reset_query(); ?>

     <?php
     $sponsor_query= null;
     $sponsor_level = $atts['level'];
     $args=array(
          'post_type' => 'wd_sponsors',
          'post_status' => 'publish',
          'posts_per_page' => -1,
          'tax_query' => array(
               array(
                    'taxonomy' => 'sponsor_level',
                    'terms' => $sponsor_level,
                    'field' => 'slug',
                    'operator' => 'IN',
               )
          ),
     );
     $sponsor_query = new WP_Query($args);
          if ( $sponsor_query->have_posts() ) :
               $output = '';
               $output .= '<div class="sp-container ' . $sponsor_level . '">';
                    $sponsor_level_proper = str_replace("-", " ", $sponsor_level);
		    $output .= '<h2 class="sp-level-header">' . $sponsor_level_proper . '</h2>';
                    $itemNum = '1';
                    $itemAlign = 'first';
                    while ( $sponsor_query->have_posts() ) : $sponsor_query->the_post();
                    $sponsor_image = get_field('sponsor_logo', get_the_ID());
                    $sponsor_link = get_field('sponsor_link', get_the_ID());
                    $sponsor_image_alt = get_field('sponsor_logo_alt', get_the_ID());;
                    $output .= '<div class="sp-item one-third ' . $itemAlign . ' item-' . $itemNum . '">';
                         $output .= '<span class="valign-helper"></span>';
                         if( !empty($sponsor_link) ) { $output .= '<a class="sp-link" href="' . $sponsor_link . '" target="_blank">'; }
                         $output .= '<img class="sp-image" src="' . $sponsor_image . '">';
                         if( !empty($sponsor_link) ) { $output .= '</a>'; }
                    $output .= '</div>';
                    if( $itemNum == '1' ) {
                         $itemAlign = 'second';
                         $itemNum++;  
                    } elseif( $itemNum == '2' ) {
                         $itemAlign = 'third';
                         $itemNum++;
                    } elseif( $itemNum == '3' ) {
                         $itemAlign = 'first';
                         $itemNum = '1';
                    }
                    endwhile;
               $output .= '</div>';
          else : ?>
          <?php endif; wp_reset_query();
          
          return $output;
}

add_shortcode('mgf-sponsors', 'mgfSponsors');
?>