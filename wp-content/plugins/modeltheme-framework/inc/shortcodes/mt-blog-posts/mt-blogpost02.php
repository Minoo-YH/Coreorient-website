<?php 
/**

/**

||-> Shortcode: Blog Posts Grid

*/
function modeltheme_show_blog_post_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'number'                => '',
            'category'              => '',
            'columns'               => '',
            'badge_background_color'    => '',
            'button_text_color'     => '',
            'animation'             => '',
            'posts_text_button'     => ''
           ), $params ) );

    $args_posts = array(
            'posts_per_page'        => $number,
            'post_type'             => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'slug',
                    'terms' => $category
                )
            ),
            'post_status'           => 'publish'
        );


    $posts = get_posts($args_posts);
    $shortcode_content = '<div class="eagle_shortcode_blog vc_row sticky-posts animateIn" data-animate="'.$animation.'">';

    $counter = 0;
    foreach ($posts as $post) {
        $counter++;
        $excerpt = get_post_field('post_content', $post->ID);
        $blog_badge = get_post_meta( $post->ID, 'mt_blog_badge', true );
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'eaglewp_post_pic700x450' );
        $author_id = $post->post_author;

        $post_background_color = get_post_meta( $post->ID, 'eagle_post_background_color', true );

        $custom_blog_color1 = "";
        if ( !empty($post_background_color) ) { 
            $custom_blog_color1 = "text-white";
        } else { 
            echo ""; 
        }
     
            $shortcode_content .= '<div class="'.esc_attr($columns).' post">';
                $shortcode_content .= '<div class="shortcode_blog_post_content  ' .$custom_blog_color1.'">';
                    $shortcode_content .= '<a href="'.get_permalink($post->ID).'">';
                        if ($columns == 'vc_col-sm-6') {
                            $shortcode_content .= '<div class="col-md-5 featured_image_content">';
                        } elseif ( $columns == 'vc_col-sm-4' || $columns == 'vc_col-sm-3') {
                            $shortcode_content .= '<div class="col-md-12 featured_image_content">';
                        }
                          $shortcode_content .= '<div class="blog_badge">'.esc_attr($blog_badge).'</div>';

                            if($thumbnail_src) { 
                                $shortcode_content .= '<img src="'. esc_attr($thumbnail_src[0]) . '" alt="'. $post->post_title .'" />';
                            }else{ 
                                $shortcode_content .= '<img src="http://placehold.it/530x450" alt="'. $post->post_title .'" />'; 
                            }
                        $shortcode_content .= '</div>';
                    $shortcode_content .= '</a>';
                    if ($columns == 'vc_col-sm-6') {
                        $shortcode_content .= '<div class="col-md-7 text_content">';
                    } elseif ( $columns == 'vc_col-sm-4' || $columns == 'vc_col-sm-3' ) {
                        $shortcode_content .= '<div class="col-md-12 text_content">';
                    }
                        $shortcode_content .= '<div style="color: '.esc_attr($button_text_color). ' !important;" class="blog_badge_date">
                                <span>'.esc_attr(get_the_date('F j, Y', $post->ID)).'</span>
                        </div>';
                        $shortcode_content .= '<h3 class="post-name post-name-color"><a href="'.get_permalink($post->ID).'">'.$post->post_title.'</a></h3>';
                        $shortcode_content .= '<div class="post-blog-excerpt-text">'.modeltheme_excerpt_limit($excerpt,30).'</div>';

                        
                        $shortcode_content .= '<div class="post-more-download">';
                            if ( $columns == 'vc_col-sm-3'){
                                $shortcode_content .= '<div class="post-read-more">';
                                    $shortcode_content .= '<a class="hvr-float post-read-more-button" href="'.get_permalink($post->ID).'"><i class="fa fa-file-text-o"></i>'.$posts_text_button.'</a>';
                                $shortcode_content .= '</div>';
                            } elseif ($columns == 'vc_col-sm-6' || $columns == 'vc_col-sm-4')  {
                                $shortcode_content .= '<div class="post-read-more">';
                                $shortcode_content .= '<a class="rippler rippler-default" href="'.get_permalink($post->ID).'">'.esc_html__('Read More','modeltheme').'<i style="color: '.esc_attr($button_text_color).'" class="fa fa-angle-right" aria-hidden="true"></i></a>';
                                $shortcode_content .= '</div>';
                            }
                        $shortcode_content .= '</div>';
                    $shortcode_content .= '</div>';
                $shortcode_content .= '</div>';
            $shortcode_content .= '</div>';

            if ($columns == 'vc_col-sm-6' AND $counter%2 == 0) {
                $shortcode_content .= '<div style="clear: both;"></div>';
            }elseif ($columns == 'vc_col-sm-4' AND $counter%3 == 0) {
                $shortcode_content .= '<div style="clear: both;"></div>';
            }elseif ($columns == 'vc_col-sm-3' AND $counter%4 == 0) {
                $shortcode_content .= '<div style="clear: both;"></div>';
            }
    } 
    $shortcode_content .= '</div>';
    return $shortcode_content;
}
add_shortcode('modeltheme-blog-posts-grid', 'modeltheme_show_blog_post_shortcode');



/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  $post_category_tax = get_terms('category');
  $post_category = array();
  foreach ( $post_category_tax as $term ) {
     $post_category[$term->name] = $term->slug;
  }

  vc_map( array(
     "name" => __("Blog Grid", 'modeltheme'),
     "base" => "modeltheme-blog-posts-grid",
     "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
     "icon" => "smartowl_shortcode",
     "params" => array(
        array(
            "type" => "textfield",
            "holder" => "div",
            "class" => "",
            "heading" => esc_attr__( "Number", 'modeltheme' ),
            "param_name" => "number",
            "value" => "5",
            "description" => esc_attr__( "" )
        ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Select Blog Category", 'modeltheme'),
           "param_name" => "category",
           "description" => esc_attr__("Please select blog category", 'modeltheme'),
           "std" => esc_attr__('Default value', 'modeltheme'),
           "value" => $post_category
        ),
        array(
           "type" => "dropdown",
           "holder" => "div",
           "class" => "",
           "heading" => esc_attr__("Columns", 'modeltheme'),
           "param_name" => "columns",
           "std" => '',
           "description" => esc_attr__(""),
           "value" => array(
            esc_attr__('2 columns', 'modeltheme')     => 'vc_col-sm-6',
            esc_attr__('3 columns', 'modeltheme')     => 'vc_col-sm-4',
            esc_attr__('4 columns', 'modeltheme')     => 'vc_col-sm-3'
           )
        ),
        array(
          "type" => "dropdown",
          "heading" => esc_attr__("Animation", 'modeltheme'),
          "param_name" => "animation",
          "std" => 'fadeInLeft',
          "holder" => "div",
          "class" => "",
          "description" => esc_attr__(""),
          "value" => $animations_list
        ),
        array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Badge Background", 'modeltheme' ),
          "param_name" => "badge_background_color",
          "value" => "#ff3514", //Default color
          "description" => esc_attr__( "Choose Badge Background", 'modeltheme' )
        ),
         array(
          "group" => "Styling",
          "type" => "colorpicker",
          "class" => "",
          "heading" => esc_attr__( "Arrow Color", 'modeltheme' ),
          "param_name" => "button_text_color",
          "value" => "#ff3514", //Default color
          "description" => esc_attr__( "Choose Arrow Color", 'modeltheme' )
        )
     )
  ));
}

?>