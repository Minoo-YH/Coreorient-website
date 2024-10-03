<?php 


require_once(__DIR__.'/../vc-shortcodes.inc.arrays.php');

/**

||-> Shortcode: Services

*/
function modeltheme_shortcode_services($params) {
    extract( shortcode_atts( 
        array(
            'number'                      => '',
            'services_icon_hover_color'   => '',
            'animation'                   => ''
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
    $html .= '<div class="mt--services">';
        $html .= '<style>.mt--services .single-service:hover .form_service .service-icon::before, 
                          .mt--services .single-service:hover .form_service .service-icon::after, 
                          .mt--services .single-service:hover .form_service .service-icon {
                            background: '.$services_icon_hover_color.' none repeat scroll 0 0;}
                  </style>';

        $count = 1;
        foreach ($recentposts as $post) {
            $value = $count++;
            #Content
            $content_post = get_post($post->ID);
            $content = $content_post->post_content;
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);
            // $service_icon = get_post_meta( $post->ID, 'smartowl_service_badge_icon', true );
            $service_subtitle = get_post_meta( $post->ID, 'smartowl_service_subtitle', true );
            $select_font_meta = get_post_meta( $post->ID, 'smartowl_select_font', true );



            $icon = '';
            if ($select_font_meta == 'font-awesome-icons') {
                $icon = get_post_meta( $post->ID, 'smartowl_font-awesome-icons', true );
            }elseif ($select_font_meta == 'simple-line-icons') {
                $icon = get_post_meta( $post->ID, 'smartowl_font-simple-line-icons', true );
            }

            $html .= '<article class="single-service wow '.$animation.' id-'.$post->ID.'">';
                $html .= '<form method="GET" class="form_service">';

                    $html .= '<input type="hidden" value="'.$post->ID.'" name="post_id" />';

                    $html .= '<div class="row">';
                        $html .= '<div class="col-md-1 text-center service-count">'.str_pad($value, 2, "0", STR_PAD_LEFT).'</div>';
                        $html .= '
                            <div class="col-md-4 text-right service-title">
                                <h3><a href="'.get_permalink($post->ID).'">'. $post->post_title .'</a></h3>
                                <h6>'.$service_subtitle.'</h6>
                            </div>';
                        $html .= '<div class="col-md-2 text-center"><div class="service-icon"><i class="'.$icon.'"></i></div></div>';
                        $html .= '<div class="col-md-4 service-description">'.modeltheme_excerpt_limit($content, 13).'</div>';
                        $html .=    '<div class="col-md-1 text-center">
                                        <div class="plus-icon">
                                            <i class="icon-plus"></i>
                                            <i class="icon-close"></i>
                                        </div>
                                    </div>';
                    $html .= '</div>';
        	        
                    $html .= '<div class="clearfix"></div>';
                    $html .= '<div class="container ajax-result result-'.$post->ID.'"></div>';
                $html .= '</form>';

            $html .= '</article>';

        }
    $html .= '</div>';

    return $html;
}
add_shortcode('shortcode_services', 'modeltheme_shortcode_services');




if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
    vc_map( 
        array(
            "name" => esc_attr__("MT - Services", 'modeltheme'),
            "base" => "shortcode_services",
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
                    "value" => "5",
                    "description" => ""
                ),
                array(
                    "group" => "Styling",
                    "type" => "colorpicker",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__("Icons hover color", 'modeltheme'),
                    "param_name" => "services_icon_hover_color",
                    "value" => "",
                    "description" => ""
                ),
                array(
                    "group" => "Animation",
                    "type" => "dropdown",
                    "heading" => esc_attr__("Animation", 'modeltheme'),
                    "param_name" => "animation",
                    "std" => '',
                    "holder" => "div",
                    "class" => "",
                    "description" => "",
                    "value" => $animations_list
                )
            )
        ));
}


// AJAX FUNCTION FOR Portfolio01 Shortcode
function mt_services() {

    $post_id = $_GET['post_id'];
    $content_post = get_post($post_id);
    $content = $content_post->post_content;
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ),'mt_900x550' );

    $html = '';
    $html .= '
    <div class="service-post-40 mt-ajax-content">
        <div class="row">
            <div class="col-md-12">
                <div class="post-content">';
                if($thumbnail_src) { 
                    $html .= '<img class="lazy img-responsive" src="'. $thumbnail_src[0] . '" alt="" />';
                }

    $html .= $content.'</div>
            </div>
        </div>
    </div>';

    echo $html;

    die();
}
// Add the ajax hooks for admin
add_action( 'wp_ajax_mt_services', 'mt_services' );
// Add the ajax hooks for front end
add_action( 'wp_ajax_nopriv_mt_services', 'mt_services' );

?>