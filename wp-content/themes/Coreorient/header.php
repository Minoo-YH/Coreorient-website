<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <link rel="shortcut icon" href="<?php echo esc_url(eaglewp_redux('mt_favicon', 'url')); ?>">
    <?php } ?>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    }
    ?>

    <?php 
    $below_slider_headers = array('header8', 'header9', 'header10', 'header11', 'header13');
    $normal_headers = array('header1', 'header2', 'header3', 'header4', 'header5', 'header12','header14');
    $custom_header_options_status = get_post_meta( get_the_ID(), 'smartowl_custom_header_options_status', true );
    $header_custom_variant = get_post_meta( get_the_ID(), 'smartowl_header_custom_variant', true );
    $header_layout = eaglewp_redux('mt_header_layout');
    if (isset($custom_header_options_status) && $custom_header_options_status == 'yes') {
        $header_layout = $header_custom_variant;
    }
    ?>


    <?php if(eaglewp_redux('mt_header_is_search') == true){ ?>
    <!-- Fixed Search Form -->
    <div class="fixed-search-overlay">
        <!-- Close Sidebar Menu + Close Overlay -->
        <i class="icon-close icons"></i>
        <!-- INSIDE SEARCH OVERLAY -->
        <div class="fixed-search-inside">
            <?php echo eaglewp_custom_search_form(); ?>
        </div>
    </div>
    <?php } ?>


    <?php if(eaglewp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
        <!-- Fixed Sidebar Overlay -->
        <div class="fixed-sidebar-menu-overlay"></div>
        <!-- Fixed Sidebar Menu -->
        <div class="relative fixed-sidebar-menu-holder header7">
            <div class="fixed-sidebar-menu">
                <!-- Close Sidebar Menu + Close Overlay -->
                <i class="icon-close icons"></i>
                <!-- Sidebar Menu Holder -->
                <div class="header7">
                    <!-- RIGHT SIDE -->
                    <div class="left-side">
                        <div class="logo"><?php echo esc_attr(get_bloginfo()); ?></div>
                        <?php if (is_active_sidebar( eaglewp_redux('mt_header_fixed_sidebar') )) {
                            dynamic_sidebar( eaglewp_redux('mt_header_fixed_sidebar') ); 
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <!-- PAGE #page -->
    <div id="page" class="hfeed site">
        <?php
            $page_slider = get_post_meta( get_the_ID(), 'select_revslider_shortcode', true );
            if (in_array($header_layout, $below_slider_headers)){
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.esc_html($page_slider).']');
                    echo '</div>';
                }

                // Header template variant
                echo eaglewp_current_header_template();
            }elseif (in_array($header_layout, $normal_headers)){
                // Header template variant
                echo eaglewp_current_header_template();
                // Revolution slider
                if (!empty($page_slider)) {
                    echo '<div class="theme_header_slider">';
                    echo do_shortcode('[rev_slider '.esc_html($page_slider).']');
                    echo '</div>';
                }
            }else{
                echo eaglewp_current_header_template();
            }
        ?>