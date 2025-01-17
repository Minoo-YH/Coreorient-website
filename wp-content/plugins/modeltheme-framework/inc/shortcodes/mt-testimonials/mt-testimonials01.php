<?php

require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**

||-> Shortcode: Testimonials

*/

function modeltheme_shortcode_testimonials($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'             =>'',
            'testimonial01_color'   =>'',
            'number'                =>'',
            'visible_items'         =>''
        ), $params ) );




    $html = '';
    $html .= '<style type="text/css" scoped>
                .testimonial01-img-holder::before {
                  background: '.$testimonial01_color.' none repeat scroll 0 0;
                  border-radius: 50%;
                  content: "";
                  height: 10px;
                  position: absolute;
                  top: -5px;
                  width: 10px;
                }
              </style>';
              
    $html .= '<div class="vc_row">';
        $html .= '<div class="wow '.$animation.' testimonials-container-'.$visible_items.' owl-carousel owl-theme">';
        $args_testimonials = array(
                'posts_per_page'   => $number,
                'orderby'          => 'post_date',
                'order'            => 'DESC',
                'post_type'        => 'testimonial',
                'post_status'      => 'publish' 
                ); 
        $testimonials = get_posts($args_testimonials);
            foreach ($testimonials as $testimonial) {
                #metaboxes
                $metabox_job_position = get_post_meta( $testimonial->ID, 'job-position', true );
                $metabox_company = get_post_meta( $testimonial->ID, 'company', true );
                // $metabox_testimonial_bg = get_post_meta( $testimonial->ID, 'smartowl_testimonial_bg_color', true );
                $testimonial_id = $testimonial->ID;
                $content_post   = get_post($testimonial_id);
                $content        = $content_post->post_content;
                $content        = apply_filters('the_content', $content);
                $content        = str_replace(']]>', ']]&gt;', $content);
                #thumbnail
                $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $testimonial->ID ),'connection_testimonials_150x150' );
                
                $html.='
                	<div class="item vc_col-md-12 relative">
	                	<div class="testimonial01_item">
		                	<div class="testimonail01-content" style="border-color: '.$testimonial01_color.'">'.eaglewp_excerpt_limit($content,18).'</div>
				                	<div class="testimonial01-img-holder pull-left">
				                            <div class="testimonial01-img">';
				                            if($thumbnail_src) { 
				                            	$html .= '<img src="'. $thumbnail_src[0] . '" alt="'. $testimonial->post_title .'" />';
				                            }else{ 
				                            	$html .= '<img src="http://placehold.it/150x150" alt="'. $testimonial->post_title .'" />'; 
				                            }
		     	$html.='</div>
		     		</div> 
		                	   	<h4><strong>'. $testimonial->post_title .'</strong></h4>
	                    		<h5>'. $metabox_job_position .' <span>-</span> '. $metabox_company . '</h5>
		                    </div>
	                </div>';

            }
    $html .= '</div>
    	</div>';
    return $html;

}
add_shortcode('testimonials01', 'modeltheme_shortcode_testimonials');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    vc_map( array(
     "name" => esc_attr__("MT - Testimonials Box", 'modeltheme'),
     "base" => "testimonials01",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
          "group" => "Options",
          "type" => "textfield",
          "holder" => "div",
          "class" => "",
          "heading" => esc_attr__( "Number of testimonials", 'modeltheme' ),
          "param_name" => "number",
          "value" => "",
          "description" => esc_attr__( "Enter number of testimonials to show.", 'modeltheme' )
        ),
        array(
          "group" => "Options",
          "type" => "dropdown",
          "heading" => esc_attr__("Visible Testimonials per slide", 'modeltheme'),
          "param_name" => "visible_items",
          "std" => '',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => array(
            '1'   => '1',
            '2'   => '2',
            '3'   => '3'
            )
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Testimonial color", 'modeltheme' ),
          "param_name" => "testimonial01_color",
          "value" => "", //Default color
          "description" => esc_attr__( "Choose testimonial color", 'modeltheme' )
        ),
        array(
          "group" => "Animation",
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => "",
          "value" => $animations_list
        )
      )
  ));
}

?>