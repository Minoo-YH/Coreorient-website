<?php 
/**

||-> Shortcode: BlogPost Slider 

*/
function mt_slider_blog_post_shortcode( $params, $content ) {
    extract( shortcode_atts( 
        array(
            'number'            => '',
            'category'          => '',
            'overlay_color'     => '',
            'visible_items'        => '',
            'text_color'        => ''

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

    $shortcode_content = '';
    $shortcode_content .= '<div class="blog-slider-container-'.$visible_items.' blog-slider-container owl-carousel owl-theme">';

    foreach ($posts as $post) { 
        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'eaglewp_blog_400x400' );
        $excerpt = get_post_field('post_content', $post->ID);
        $url = get_permalink($post->ID);
         $mt_slider_icon = get_post_meta( $post->ID, 'mt_slider_icon', true );
  
        if ($thumbnail_src) {
          $post_img = '<img class="blog_post_slider_image" src="'. esc_url($thumbnail_src[0]) . '" alt="'.$post->post_title.'" />';
          $post_col = 'col-md-6';
        }else{
          $post_col = 'col-md-12 no-featured-image';
          $post_img = '';
        } 
        $shortcode_content.='<div class="odd-post">
                  <article class="single-post list-view">
                    <div class="blog_post_slider_custom">

                      <!-- POST THUMBNAIL -->
                      <div class="col-md-6 post-thumbnail">
                          <a class="relative" href="'.get_permalink($post->ID).'">'.$post_img.'</a>
                          <div class="blog_icon_footer">
                            <div class="blog_custom_icon">
                              <img alt="cat-icon" class="cat-icon" src="'.$mt_slider_icon.'">
                            </div>
                          </div>
                      </div>

                      <!-- POST DETAILS -->
                      <div class="post-slider-details '.$post_col.'">

                        <h3 class="post-slider-name row">
                          <a href="'.get_permalink($post->ID).'" title="'. $post->post_title .'">'. $post->post_title .'</a>
                        </h3>

                        <div class="post-slider-excerpt row">
                          <div class="post-slider-excerpt">'.wp_trim_words($excerpt,20).'</div>
                            <div class="text-element arrow-right">
                              <a href="'.get_the_permalink().'" class="read-more"><i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                      </div>
                      
                    </div>
                  </article>
                </div>';

    } 
    $shortcode_content .= '</div>';
    return $shortcode_content;
}
add_shortcode('eagle-blog-posts', 'mt_slider_blog_post_shortcode');

/**

||-> Map Shortcode in Visual Composer with: vc_map();

*/
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {

    require_once __DIR__ . '/../vc-shortcodes.inc.arrays.php';


  $post_category_tax = get_terms('category');
  $post_category = array();
  if ($post_category_tax) {
    foreach ( $post_category_tax as $term ) {
       $post_category[$term->name] = $term->slug;
    }
  }

  vc_map( 
      array(
       "name" => esc_attr__("MT - Blog Posts Slider", 'modeltheme'),
       "base" => "eagle-blog-posts",
       "category" => esc_attr__('MT: ModelTheme', 'modeltheme'),
       "icon" => "smartowl_shortcode",
       "params" => array(
           array(
              "group" => "Settings",
              "type" => "textfield",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__( "Number", 'modeltheme' ),
              "param_name" => "number",
              "value" => esc_attr__( "3", "ibid" )
           ),
           array(
             "group" => "Settings",
             "type" => "dropdown",
             "holder" => "div",
             "class" => "",
             "heading" => esc_attr__("Select Blog Category", 'modeltheme'),
             "param_name" => "category",
             "description" => esc_attr__("Please select blog category", 'modeltheme'),
             "std" => 'Default value',
             "value" => $post_category
          ),
          array(
            "group" => "Settings",
            "type" => "dropdown",
            "heading" => esc_attr__("Visible blog post per slide", 'mtlisitings'),
            "param_name" => "visible_items",
            "std" => '',
            "holder" => "div",
            "class" => "",
            "description" => "",
            "value" => array(
                '2'   => '2',
                '3'   => '3'
              )
          ),
          array(
              "group" => "Styling",
              "type" => "colorpicker",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Choose overlay color", 'modeltheme'),
              "param_name" => "overlay_color"
           ),
           array(
              "group" => "Styling",
              "type" => "colorpicker",
              "holder" => "div",
              "class" => "",
              "heading" => esc_attr__("Choose text color", 'modeltheme'),
              "param_name" => "text_color"
           )
       )
    ));
}

?>