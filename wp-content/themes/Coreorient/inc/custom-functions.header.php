<?php
/**
CUSTOM HEADER FUNCTIONS
*/




/**
||-> FUNCTION: GET HEADER-TOP LEFT PART
*/
function eaglewp_get_top_left(){

    $html = '';
    $html .= '<a href="#"><i class="fa fa-phone"></i> +34-2345-3456</a>';

    return $html;
}



/**
||-> FUNCTION: GET HEADER-TOP RIGHT PART
*/
function eaglewp_get_top_right(){

    // CONTENT
    $html = '';
    $html .= '<a class="modeltheme-trigger" href="#"><i class="fa fa-lock"></i> '.esc_attr__('Log In', 'eaglewp').'</a>';

    return $html;
}





/**
Function name: 				eaglewp_get_nav_menu()			
Function description:		Get page NAV MENU
*/
function eaglewp_get_nav_menu(){

    // PAGE METAS
	$page_custom_menu = get_post_meta( get_the_ID(), 'smartowl_page_custom_menu', true );

	$html = '';
    if ( has_nav_menu( 'primary' ) ) {
		$defaults = array(
			'menu'            => '',
			'container'       => false,
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => false,
			'before'          => '<ul class="menu nav navbar-nav nav-effect nav-menu pull-right">',
			'after'           => '</ul>',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => ''
		);

		$defaults['theme_location'] = 'primary';
		if (isset($page_custom_menu)) {
			$html .= wp_nav_menu( array('menu' => $page_custom_menu ));
		}else{
			$html .= wp_nav_menu( $defaults );
		}
	}else{
		$html .= '<p class="no-menu text-right">'.esc_html__('Primary navigation menu is missing.','eaglewp').'<p>';
	}

    return $html;
}



/**
Function name: 				eaglewp_current_header_template()			
Function description:		Gets the current header variant from theme options. If page has custom options, theme options will be overwritten.
*/
function eaglewp_current_header_template(){

	global  $eaglewp_redux;

	// the_post_thumbnail( $size, $attr );

    // PAGE METAS
    $custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
	$sidebar_headers = array('header6', 'header7', 'header15');


	$html = '';

    if (is_page() && $header_v) {
        if ($custom_header_activated && $custom_header_activated == 'yes') {
			if (!in_array($header_v, $sidebar_headers)){
            	$html .= get_template_part( 'templates/template-'.esc_html($header_v) ); ?>

        	<?php }else{ ?>

        	<?php }
        }?>
    <?php }else{
    	if (isset($eaglewp_redux['mt_header_layout'])) {
			if (!in_array($header_v, $sidebar_headers)){
    			$html .= get_template_part( 'templates/template-'.esc_html($eaglewp_redux['mt_header_layout']) );
        	}
    	}else{
    		$html .= get_template_part( 'templates/template-header1' );
    	}
    }
    return $html;
}


/**
||-> FUNCTION: GET GOOGLE FONTS FROM THEME OPTIONS PANEL
*/
add_action('wp_head', 'eaglewp_get_site_fonts');
function eaglewp_get_site_fonts(){

    global  $eaglewp_redux;

    $html = '';

    if (isset($eaglewp_redux['mt_google_fonts_select'])) {
        foreach(array_keys($eaglewp_redux['mt_google_fonts_select']) as $key){
            $font_url = str_replace(' ', '+', $eaglewp_redux['mt_google_fonts_select'][$key]);
            $html .= "<link href='https://fonts.googleapis.com/css?family=".esc_attr($font_url)."' rel='stylesheet' type='text/css'>\n";
        }
    }

    echo  wp_kses_post($html);
}


// Add specific CSS class by filter
add_filter( 'body_class', 'eaglewp_body_classes' );
function eaglewp_body_classes( $classes ) {

	global  $eaglewp_redux;

    // CHECK IF FEATURED IMAGE IS FALSE(Disabled)
    $post_featured_image = '';
    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	    if (is_singular('post')) {
	        if ($eaglewp_redux['mt_post_featured_image'] == false) {
	            $post_featured_image = 'hide_post_featured_image';
	        }else{
	            $post_featured_image = '';
	        }
	    }
	}

    // CHECK IF THE NAV IS STICKY
    $is_nav_sticky = '';
    if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
	    if (!is_null($eaglewp_redux)) {
		    if ($eaglewp_redux['mt_is_nav_sticky'] == true) {
		        // If is sticky
		        $is_nav_sticky = 'is_nav_sticky';
		    }else{
		        // If is not sticky
		        $is_nav_sticky = '';
		    }
	    }
    }

    // CHECK IF HEADER IS SEMITRANSPARENT
    $semitransparent_header_meta = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
    $semitransparent_header = '';
    if ($semitransparent_header_meta == 'enabled') {
        // If is semitransparent
        $semitransparent_header = 'is_header_semitransparent';
    }

    // DIFFERENT HEADER LAYOUT TEMPLATES
    $header_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_v = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );

    $header_version = 'header1';
    if ($header_status && $header_status == 'no') {
	    $header_version = 'header1';
	    if ($eaglewp_redux['mt_header_layout']) {
	        // Header Layout #1
	        $header_version = $eaglewp_redux['mt_header_layout'];
	    }
    }else{
    	$header_version = $header_v;
    }

    // add 'class-name' to the $classes array
    $classes[] = esc_html($post_featured_image) . ' ' . esc_html($is_nav_sticky) . ' ' . esc_html($header_version) . ' ' . esc_html($semitransparent_header) . ' ';
    // return the $classes array
    return $classes;

}

/**
||-> FUNCTION: GET DYNAMIC CSS
*/
add_action('wp_enqueue_scripts', 'eaglewp_dynamic_css' );
// add_action('wp_head', 'eaglewp_dynamic_css');
function eaglewp_dynamic_css(){

    $html = '';
    $html .= eaglewp_redux('mt_custom_css');

	wp_enqueue_style(
	   'eaglewp-custom-style',
	    get_template_directory_uri() . '/css/custom-editor-style.css'
	);

    //PAGE PRELOADER BACKGROUND COLOR
    $mt_page_preloader = get_post_meta( get_the_ID(), 'mt_page_preloader', true );
    $mt_page_preloader_bg_color = get_post_meta( get_the_ID(), 'mt_page_preloader_bg_color', true );
    if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
        $html .= 'body .eaglewp_preloader_holder{
					background-color: '.esc_html($mt_page_preloader_bg_color).';
        		}';
    }elseif (eaglewp_redux('mt_preloader_status')) {
        $html .= 'body .eaglewp_preloader_holder{
					background-color: '.eaglewp_redux('mt_preloader_status').';
        		}';
    }

	// HEADER SEMITRANSPARENT - METABOX
	$custom_header_activated = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
	$mt_header_custom_bg_color = get_post_meta( get_the_ID(), 'mt_header_custom_bg_color', true );
	$mt_header_semitransparent = get_post_meta( get_the_ID(), 'mt_header_semitransparent', true );
	if (isset($mt_header_semitransparent) == 'enabled') {
		$mt_header_semitransparentr_rgba_value = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value', true );
		$mt_header_semitransparentr_rgba_value_scroll = get_post_meta( get_the_ID(), 'mt_header_semitransparentr_rgba_value_scroll', true );
		
		if (isset($mt_header_custom_bg_color)) {
			list($r, $g, $b) = sscanf($mt_header_custom_bg_color, "#%02x%02x%02x");
		}else{
			$hexa = '#000'; //Theme Options Color
			list($r, $g, $b) = sscanf($hexa, "#%02x%02x%02x");
		}

		$html .= '
			.is_header_semitransparent .logo-infos,
			.is_header_semitransparent .navbar-default{
			    background: rgba('.esc_html($r).', '.esc_html($g).', '.esc_html($b).', '.esc_html($mt_header_semitransparentr_rgba_value).') none repeat scroll 0 0;
			}
			.is_header_semitransparent header{
			    background-color: transparent;
			}
			.is_header_semitransparent .sticky-wrapper.is-sticky .navbar-default {
			    background: rgba('.esc_html($r).', '.esc_html($g).', '.esc_html($b).', '.esc_html($mt_header_semitransparentr_rgba_value_scroll).') none repeat scroll 0 0;
			}';
    }
   

    // Defaults
    $default_backgrounds_color = '#ec1d23';
    $default_backgrounds_color_hover = '#0099d1';
    $default_texts_color = '#EC1D23';

    // METABOX COLORPICKER -> Main color
	$mt_custom_main_color = get_post_meta( get_the_ID(), 'mt_custom_main_color', true );
    if(isset($mt_custom_main_color) && !empty($mt_custom_main_color)) {
    	$mt_style_main_backgrounds_color = $mt_custom_main_color;
	}else{
    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
    		$mt_style_main_backgrounds_color = eaglewp_redux("mt_style_main_backgrounds_color");
    	}else{
    		$mt_style_main_backgrounds_color = $default_backgrounds_color;
    	}
	}
	// METABOX COLORPICKER -> Main color - hover
	$mt_custom_main_hover_color = get_post_meta( get_the_ID(), 'mt_custom_main_hover_color', true );
    if(isset($mt_custom_main_hover_color) && !empty($mt_custom_main_hover_color)) {
    	$mt_style_main_backgrounds_color_hover = $mt_custom_main_hover_color;
	}else{
    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
    		$mt_style_main_backgrounds_color_hover = eaglewp_redux("mt_style_main_backgrounds_color_hover");
    	}else{
    		$mt_style_main_backgrounds_color_hover = $default_backgrounds_color_hover;
    	}
	}


    // METABOX COLORPICKER -> Main texts color
	$main_texts_color = get_post_meta( get_the_ID(), 'main_texts_color', true );
    if(isset($main_texts_color) && !empty($main_texts_color)) {
    	$mt_style_main_texts_color = $main_texts_color;
	}else{
    	if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
    		$mt_style_main_texts_color = eaglewp_redux("mt_style_main_texts_color");
    	}else{
    		$mt_style_main_texts_color = $default_texts_color;
    	}
	}

	// FOOTER BACKGROUND - METABOX
	$mt_custom_footer_options_status = get_post_meta( get_the_ID(), 'mt_custom_footer_options_status', true );
	$mt_footer_custom_bg_color = get_post_meta( get_the_ID(), 'mt_footer_custom_bg_color', true );
    if (isset($mt_custom_footer_options_status) == 'enabled' && isset($mt_footer_custom_bg_color)) {
		$html .= '
			footer .footer{
				background-color: '.esc_html($mt_footer_custom_bg_color).' !important;
			}';
    }

    // THEME OPTIONS STYLESHEET
    $html .= '
    		.breadcrumb a::after {
	        	content: "'.eaglewp_redux('mt_breadcrumbs_delimitator').'";
	    	}
		    .logo img,
		    .navbar-header .logo img {
		        max-width: '.eaglewp_redux('mt_logo_max_width').'px;
		    }

		    ::selection{
		        color: '.eaglewp_redux('mt_text_selection_color').';
		        background: '.eaglewp_redux('mt_text_selection_background_color').';
		    }
		    ::-moz-selection { /* Code for Firefox */
		        color: '.eaglewp_redux('mt_text_selection_color').';
		        background: '.eaglewp_redux('mt_text_selection_background_color').';
		    }

		    a{
		        color: '.eaglewp_redux('mt_global_link_styling', 'regular').';
		    }
		    a:focus,
		    a:visited,
		    a:hover{
		        color: '.esc_html($mt_style_main_backgrounds_color_hover).';
		    }

		    /*------------------------------------------------------------------
		        COLOR
		    ------------------------------------------------------------------*/
		    a, 
		    a:hover, 
		    a:focus,
		    span.amount,
		    .widget_popular_recent_tabs .nav-tabs li.active a,
		    .widget_product_categories .cat-item:hover,
		    .widget_product_categories .cat-item a:hover,
		    .widget_archive li:hover,
		    .widget_archive li a:hover,
		    .widget_categories .cat-item:hover,
		    .widget_categories li a:hover,
		    .pricing-table.recomended .button.solid-button, 
		    .pricing-table .table-content:hover .button.solid-button,
		    .pricing-table.Recommended .button.solid-button, 
		    .pricing-table.recommended .button.solid-button, 
		    #sync2 .owl-item.synced .post_slider_title,
		    #sync2 .owl-item:hover .post_slider_title,
		    #sync2 .owl-item:active .post_slider_title,
		    .pricing-table.recomended .button.solid-button, 
		    .pricing-table .table-content:hover .button.solid-button,
		    .testimonial-author,
		    .testimonials-container blockquote::before,
		    .testimonials-container blockquote::after,
		    .post-author > a,
		    h2 span,
		    label.error,
		    .author-name,
		    .comment_body .author_name,
		    .prev-next-post a:hover,
		    .prev-text,
		    .wpb_button.btn-filled:hover,
		    .next-text,
		    .social ul li a:hover i,
		    .wpcf7-form span.wpcf7-not-valid-tip,
		    .text-dark .statistics .stats-head *,
		    .wpb_button.btn-filled,
		    footer ul.menu li.menu-item a:hover,
		    .widget_meta a:hover,
		    .widget_pages a:hover,
		    .simple_sermon_content_top h4,
		    .widget_recent_entries_with_thumbnail li:hover a,
		    .widget_recent_entries li a:hover,
		    h3.post-slider-name.row a:hover,
		    .owl-theme .owl-controls .owl-page span,
		    .sidebar-content .widget_nav_menu li a:hover{
		        color: '.esc_html($mt_style_main_texts_color).'; /*Color: Main blue*/

		    }


		    /*------------------------------------------------------------------
		        BACKGROUND + BACKGROUND-COLOR
		    ------------------------------------------------------------------*/
		    .search-form input[type="submit"],
		    #navbar .menu-item.selected > a,
			#navbar .menu-item:hover > a,
		    .tagcloud > a:hover,
		    .modeltheme-icon-search,
		    .wpb_button::after,
		    .rotate45,
		    .latest-posts .post-date-day,
		    .latest-posts h3, 
		    .latest-tweets h3, 
		    .latest-videos h3,
		    .button.solid-button, 
		    button.vc_btn,
		    .pricing-table.recomended .table-content, 
		    .pricing-table .table-content:hover,
		    .pricing-table.Recommended .table-content, 
		    .pricing-table.recommended .table-content, 
		    .pricing-table.recomended .table-content, 
		    .pricing-table .table-content:hover,
		    .block-triangle,
		    .owl-theme .owl-controls .owl-page span,
		    body .vc_btn.vc_btn-blue, 
		    body a.vc_btn.vc_btn-blue, 
		    body button.vc_btn.vc_btn-blue,
		    .pagination .page-numbers.current,
		    .pagination .page-numbers:hover,
		    #subscribe > button[type=\'submit\'],
		    .social-sharer > li:hover,
		    .prev-next-post a:hover .rotate45,
		    .masonry_banner.default-skin,
		    .form-submit input,
		    .member-header::before, 
		    .member-header::after,
		    .member-footer .social::before, 
		    .member-footer .social::after,
		    .subscribe > button[type=\'submit\'],
		    .no-results input[type=\'submit\'],
		    h3#reply-title::after,
		    .newspaper-info,
		    .categories_shortcode .owl-controls .owl-buttons i:hover,
		    .widget-title:after,
		    h2.heading-bottom:after,
		    .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,
		    #primary .main-content ul li:not(.rotate45)::before,
		    .wpcf7-form .wpcf7-submit,
		    ul.ecs-event-list li span,
		    #contact_form2 .solid-button.button,
		    .navbar-default .navbar-toggle .icon-bar,
		    .details-container > div.details-item .amount, .details-container > div.details-item ins,
		    .modeltheme-search .search-submit,
		    .pricing-table.recommended .table-content .title-pricing,
		    .pricing-table .table-content:hover .title-pricing,
		    .pricing-table.recommended .button.solid-button,
		    #navbar ul.sub-menu li a:hover,
		    .post-category-date a[rel="tag"],
		    #navbar .mt-icon-list-item:hover,
		    footer .mc4wp-form-fields input[type="submit"],
		    .pricing-table .table-content:hover .button.solid-button,
		    footer .footer-top .menu .menu-item a::before,
		    .blog-slider-container .blog_custom_icon,
		    .shortcode_blog_post_content .featured_image_content .blog_badge,
		    .post-password-form input[type=\'submit\'] {
		        background: '.esc_html($mt_style_main_backgrounds_color).';

		    }

		    .modeltheme-search.modeltheme-search-open .modeltheme-icon-search, 
		    .no-js .modeltheme-search .modeltheme-icon-search,
		    .modeltheme-icon-search:hover,
		    .latest-posts .post-date-month,
		    .button.solid-button:hover,
		    body .vc_btn.vc_btn-blue:hover, 
		    body a.vc_btn.vc_btn-blue:hover, 
		    .post-category-date a[rel="tag"]:hover,
		    .single-post-tags > a:hover,
		    body button.vc_btn.vc_btn-blue:hover,
		    #contact_form2 .solid-button.button:hover,
		    .subscribe > button[type=\'submit\']:hover,
		    footer .mc4wp-form-fields input[type="submit"]:hover,
		    .no-results input[type=\'submit\']:hover,
		    ul.ecs-event-list li span:hover,
		    .pricing-table.recommended .table-content .price_circle,
		    .pricing-table .table-content:hover .price_circle,
		    #modal-search-form .modal-content input.search-input,
		    .wpcf7-form .wpcf7-submit:hover,
		    .form-submit input:hover,
		    .pricing-table.recommended .button.solid-button:hover,
		    .error-return-home.text-center > a:hover,
		    .pricing-table .table-content:hover .button.solid-button:hover,
		    .post-password-form input[type=\'submit\']:hover {
		        background: '.esc_html($mt_style_main_backgrounds_color_hover).';

		    }
		    .tagcloud > a:hover{
		        background: '.esc_html($mt_style_main_backgrounds_color_hover).' !important;

		    }

		    .flickr_badge_image a::after,
		    .thumbnail-overlay,
		    .portfolio-hover,
		    .pastor-image-content .details-holder,
		    .item-description .holder-top,
		    blockquote::before {
		        background: '.eaglewp_redux("mt_style_semi_opacity_backgrounds", "alpha").';
		    }

		    /*------------------------------------------------------------------
		        BORDER-COLOR
		    ------------------------------------------------------------------*/
		    .author-bio,
		    blockquote,
		    .widget_popular_recent_tabs .nav-tabs > li.active,
		    body .left-border, 
		    body .right-border,
		    body .member-header,
		    body .member-footer .social,
		    body .button[type=\'submit\'],
		    .navbar ul li ul.sub-menu,
		    .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
		    #contact-us .form-control:focus,
		    .sale_banner_holder:hover,
		    .testimonial-img,
		    .wpcf7-form input:focus, 
		    .wpcf7-form textarea:focus,
		    .navbar-default .navbar-toggle:hover, 
		    .header_search_form,
		    li.bitwallet-single-point.is-open,
		    .navbar-default .navbar-toggle{
		        border-color: '.esc_html($mt_style_main_texts_color).'; 

		    }
		    /*------------------------------------------------------------------
		        HOME 9 - Header 
		    ------------------------------------------------------------------*/
		    .header14.is_header_semitransparent nav#modeltheme-main-head {
		    	position:absolute !important;
		    }';

    wp_add_inline_style( 'eaglewp-custom-style', eaglewp_minify_css($html) );

}
?>