<?php 


/**

||-> Shortcode: Portfolio 03

*/

function modeltheme_shortcode_portfolio03($params, $content) {
    extract( shortcode_atts( 
        array(
            'animation'                     => '',
            'number'                        => '',
            'portfolio03_title'             => '',
            'portfolio03_subtitle'          => '',
            'portfolio03_background_image'  => ''
        ), $params ) );
    $html = '';
    $html .= '<div class="container_portfolio_grid wow '.$animation.'">';

        $args_portfolioposts = array(
            'posts_per_page'   => $number,
            'orderby'          => 'post_date',
            'order'            => 'DESC',
            'post_type'        => 'portfolio',
            'post_status'      => 'publish' 
        ); 

        $recentportfolio= get_posts($args_portfolioposts);

        // initialization count
        $item_count = 0;

        foreach ($recentportfolio as $portfolio) {
        	$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $portfolio->ID ),'connection_portfolio01_390x275' );
            $portfolio_link = get_permalink($portfolio->ID);
            $portfolio_title = get_the_title ( $portfolio->ID );
            $portfolio_icon = get_post_meta( $portfolio->ID, 'smartowl_portfolio_icon', true );
            $portfolio_background = get_post_meta( $portfolio->ID, 'smartowl_project_color', true );

            $thumb1      = wp_get_attachment_image_src($portfolio03_background_image, "connection_portfolio01_390x275");
            $thumb1_src  = $thumb1[0];

            $item_count++;

            // 3 or less items case
                 if($item_count <= '3') {
                    $html .= '<div class="vc_col-md-4">';
                        $html .= '<a class="portfolio03_link" href="'.$portfolio_link.'">';
                            $html .= '<div class="row single_item_container">';
                                $html .= '<div class="row color_verlay_portfolio3" style="background-color: '.$portfolio_background.';">';
                                    $html .= '<i class="'.$portfolio_icon.'"></i>';
                                $html .= '</div>';
                                $html .= '<h2 class="row portfolio03_title">'.$portfolio_title.'</h2>';
                                    if($thumbnail_src) { 
                                        $html .= '<img class="row portfolio03_thumbnail" src="'. $thumbnail_src[0] . '" alt="'. $portfolio->post_title .'" />';
                                    }else{ 
                                        $html .= '<img class="row portfolio03_thumbnail" src="http://placehold.it/405x400" alt="'. $portfolio->post_title .'" />'; 
                                    }
                            $html .= '</div>';
                        $html .= '</a>';
                    $html .= '</div>';
                }

             // 4 items case   
                 if($item_count == '4'){
                    $html .= '<div class="vc_col-md-8">';
                        $html .= '<div class="row">';
                            $html .= '<div class="row portfolio03_title_subtitle_holder" style="background: rgba(255, 255, 255, 1) url('.$thumb1_src.');">';
                                $html .= '<h1 class="portfolio03_section_title">'.$portfolio03_title.'</h1>';
                                $html .= '<p class="portfolio03_section_subtitle">'.$portfolio03_subtitle.'</p>';
                            $html .= '</div>';
                        $html .= '</div>';
                    $html .= '</div>';
                    $html .= '<div class="vc_col-md-4">';
                        $html .= '<a class="portfolio03_link" href="'.$portfolio_link.'">';
                            $html .= '<div class="row single_item_container">';
                                $html .= '<div class="row color_verlay_portfolio3" style="background-color: '.$portfolio_background.';">';
                                    $html .= '<i class="'.$portfolio_icon.'"></i>';
                                $html .= '</div>';
                                $html .= '<h2 class="row portfolio03_title">'.$portfolio_title.'</h2>';
                                    if($thumbnail_src) { 
                                            $html .= '<img class="row portfolio03_thumbnail" src="'. $thumbnail_src[0] . '" alt="'. $portfolio->post_title .'" />';
                                        }else{ 
                                            $html .= '<img class="row portfolio03_thumbnail" src="http://placehold.it/405x400" alt="'. $portfolio->post_title .'" />'; 
                                        }
                            $html .= '</div>';
                        $html .= '</a>';
                    $html .= '</div>';
                 }

            // 5 or more items case
                if($item_count >= '5'){
                $html .= '<div class="vc_col-md-4">';
                    $html .= '<a class="portfolio03_link" href="'.$portfolio_link.'">';
                        $html .= '<div class="row single_item_container">';
                            $html .= '<div class="row color_verlay_portfolio3" style="background-color: '.$portfolio_background.';">';
                                $html .= '<i class="'.$portfolio_icon.'"></i>';
                            $html .= '</div>';
                            $html .= '<h2 class="row portfolio03_title">'.$portfolio_title.'</h2>';
                                if($thumbnail_src) { 
                                        $html .= '<img class="row portfolio03_thumbnail" src="'. $thumbnail_src[0] . '" alt="'. $portfolio->post_title .'" />';
                                    }else{ 
                                        $html .= '<img class="row portfolio03_thumbnail" src="http://placehold.it/405x400" alt="'. $portfolio->post_title .'" />'; 
                                    }
                        $html .= '</div>';
                    $html .= '</a>';
                $html .= '</div>';
                }
        }
    $html .= '</div>';


    return $html;
}
add_shortcode('shortcode_portfolio03', 'modeltheme_shortcode_portfolio03');


/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';

    vc_map( 
        array(
            "name" => esc_attr__("MT - Portfolio03", 'modeltheme'),
            "base" => "shortcode_portfolio03",
            "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
            "icon" => "smartowl_shortcode",
            "params" => array(
                 array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Number of post", 'modeltheme' ),
                    "param_name" => "number",
                    "value" => "",
                    "description" => esc_attr__( "Enter number of posts to show.", 'modeltheme' )
                 ),
                array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Portfolio section title", 'modeltheme' ),
                    "param_name" => "portfolio03_title",
                    "value" => "",
                    "description" => esc_attr__( "Enter portfolio section title.", 'modeltheme' )
                 ),
                 array(
                    "type" => "textfield",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Portfolio section subtitle", 'modeltheme' ),
                    "param_name" => "portfolio03_subtitle",
                    "value" => "",
                    "description" => esc_attr__( "Enter portfolio subsection title.", 'modeltheme' )
                 ),
                 array(
                    "type" => "attach_image",
                    "holder" => "div",
                    "class" => "",
                    "heading" => esc_attr__( "Background image source url", 'modeltheme' ),
                    "param_name" => "portfolio03_background_image",
                    "value" => "",
                    "description" => ""
                 ),
                 array(
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
        )
    );
}

?>