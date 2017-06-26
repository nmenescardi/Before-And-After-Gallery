<?php

function baagnc_galeries_cpt_shortcode($atts, $content = null){
	
	
	$atts = shortcode_atts(array(
		'galery-type' => 0
	), $atts);
	
	/* Check if the term exist */
	
	$galeryType = $atts['galery-type'];
	 
	
	$termInfo = term_exists( $galeryType, 'type-of-gallery' );
	if(  $termInfo == 0){
	    return;    
	}
    
    $termTitle = get_term( intval($termInfo['term_taxonomy_id']), 'type-of-gallery');
   
    

	$args = array( 
	        'post_type' => 'galleries', 
	        'tax_query' => array(
                array (
                    'taxonomy' => 'type-of-gallery',
                    'field' => 'slug',
                    'terms' => $galeryType,
                )
            ),
        );
        
    $the_query = new WP_Query( $args ); 
    
	$firstImageWidth = 340;
	$firstImageHeight = 200;
						
						
    if ( $the_query->have_posts() ) {
    ob_start();    
    
    echo '<div class="bagallery-container">';
    
    
    echo '<h1 class="text-center">'.$termTitle->name.'</h1>';
    
        while ( $the_query->have_posts() ){ 
            
 
            $the_query->the_post();

            
            $galeryTitle = get_the_title();
			$postID = get_the_ID();
			$postPermalink = get_post_permalink();
			$imageBefore = get_field('before_image');
			$imageAfter = get_field('after_image');
			
			if( !empty($imageBefore) && !empty($imageAfter) ){
				$couple = array($imageBefore, $imageAfter );
                $mergedimage = home_url('/?mergeimages&amp;image1='.$couple[0]['ID'].'&amp;image2='.$couple[1]['ID'].'&amp;width='.$firstImageWidth.'&amp;height='.$firstImageHeight.'&type=.jpg');	
				
				
				echo '<div class="col-md-6 col-sm-12">';
				    echo '<h2 class="text-center">'.$galeryTitle.'</h2>';
					echo '<div class="item active">';
					        echo '<a href="'.$postPermalink.'" class="bagallery-box-view fancybox" data-fancybox-group="slideshow-'.$postID.'">';
								echo '<div class="display-flex clearfix">';
									foreach ( $couple as $image ){
										echo '<div class="single-image">';
											echo '<img class="image-half-width" src="'.$image['sizes']['medium'].'" class="thumbnail" alt="">';
										echo '</div>';
									}
								echo '</div>';
							echo '</a>';
				    echo '</div>';
			
				echo '</div>';
			}


        }
        
    echo '</div>';


    }

    return ob_get_clean();
}
add_shortcode('baagnc-galeries', 'baagnc_galeries_cpt_shortcode');

