<?php 


/**

||-> Shortcode: Services Slider

*/
function modeltheme_shortcode_services_slider($params, $content) {
    extract( shortcode_atts( 
        array(
            'number'    => ''
        ), $params ) );


    $args_recenposts = array(
        'posts_per_page'   => $number,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'service',
        'post_status'      => 'publish' 
    ); 
    $recentposts = get_posts($args_recenposts);

    $html = '';

    $html .= '<div class="mt--services_slider_holder">';


        // Left side
        $html .= '<div class="col-md-4 left-side">';
            $html .= '<div>';
                $html .= '<h2>What we do</h2>';
                $html .= '<p>VIEW OUR PORTFOLIO</p>';
            $html .= '</div>';
        $html .= '</div>';


        // Right side
        $html .= '<div class="col-md-8 right-side">';
            $html .= '<div class="mt--services_slider">';



                $html .= '<div class="service_small_slides_holder row">';
                    $html .= '<div class="col-md-2 text-center"><i class="fa fa-angle-left"></i></div>';

                    $html .= '<div class="col-md-8">';
                        $html .= '<div id="service_small_slides" class="owl-carousel">';
                            foreach ($recentposts as $post) {
                                $service_icon = get_post_meta( $post->ID, 'smartowl_service_badge_icon', true );

                                $html .= '<div class="item">';
                                    $html .= '<div class="text-center">';
                                        $html .= '<i class="'.$service_icon.'"></i>';
                                        $html .= '<h3>'. $post->post_title .'</h3>';
                                    $html .= '</div>';
                                $html .= '</div>';
                            }
                        $html .= '</div>';
                    $html .= '</div>';
                
                    $html .= '<div class="col-md-2 text-center"><i class="fa fa-angle-right"></i></div>';
                $html .= '</div>';



                $html .= '<div class="service_big_slides_holder row">';
                    $html .= '<div class="col-md-1"></div>';


                    $html .= '<div class="col-md-10">';
                        $html .= '<div class="">';
                            $html .= '<div id="service_big_slides" class="owl-carousel">';
                                foreach ($recentposts as $post) {
                                    $service_icon = get_post_meta( $post->ID, 'smartowl_service_badge_icon', true );
                                    $html .= '<div class="item">';
                                        $html .= '<div class="text-center service-about">Lorem ipsum dolor sit amet, consectetur adipiscing elit consec tetur adipi adipi scing adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit consec tetur adipi adipi scing adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit consec tetur adipi adipi scing adipiscing elitLorem ipsum dolor sit amet, consectetur adipiscing elit consec tetur adipi adipi scing adipiscing</div>';
                                    $html .= '</div>';
                                }
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';

                    $html .= '<div class="col-md-1"></div>';
                $html .= '</div>';



            $html .= '</div>';
        $html .= '</div>';
    $html .= '</div>';

    return $html;
}
add_shortcode('mt_services_slider', 'modeltheme_shortcode_services_slider');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    //require_once('../vc-shortcodes.inc.arrays.php');

    vc_map( 
        array(
            "name" => esc_attr__("MT - Services Slider", 'modeltheme'),
            "base" => "mt_services_slider",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                array(
                   "group" => "Options",
                   "type" => "textfield",
                   "holder" => "div",
                   "class" => "",
                   "heading" => esc_attr__("Number of services to show", 'modeltheme'),
                   "param_name" => "number",
                   "value" => "10",
                   "description" => ""
                ),
            )
        )
    );
}



?>