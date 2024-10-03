<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );


    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Panel', 'eaglewp' ),
        'page_title'           => esc_html__( 'Theme Panel', 'eaglewp' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'eaglewp_redux',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'show_options_object'  => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 2,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon' => get_template_directory_uri().'/images/svg/theme-panel-menu-icon.svg', // Specify a custom URL to an icon

        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => '',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__( 'Theme Support', 'eaglewp'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://themeforest.net/downloads'),
        'title' => esc_html__( 'Rate this theme', 'eaglewp'),
    );
    $args['admin_bar_links'][] = array(
        'href'  => esc_url('http://modeltheme.com'),
        'title' => esc_html__( 'ModelTheme.com', 'eaglewp'),
    );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => esc_url('https://www.facebook.com/modeltheme'),
        'title' => esc_html__('Like us on Facebook', 'eaglewp'),
        'icon'  => 'el el-facebook'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://twitter.com/modeltheme'),
        'title' => esc_html__('Follow us on Twitter', 'eaglewp'),
        'icon'  => 'el el-twitter'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.ticksy.com/'),
        'title' => esc_html__('Submit a Ticket', 'eaglewp'),
        'icon'  => 'el el-cog'
    );
    $args['share_icons'][] = array(
        'url'   => esc_url('http://modeltheme.com/'),
        'title' => esc_html__('ModelTheme Website', 'eaglewp'),
        'icon'  => 'el el-globe'
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( esc_html__( '', 'eaglewp' ), $v );
    } else {
        $args['intro_text'] = esc_html__( '', 'eaglewp' );
    }

    // Add content after the form.
    $args['footer_text'] = esc_html__( '', 'eaglewp' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'eaglewp' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'eaglewp' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'eaglewp' ),
            'content' => esc_html__( 'This is the tab content, HTML is allowed.', 'eaglewp' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( 'This is the sidebar content, HTML is allowed.', 'eaglewp' );
    Redux::setHelpSidebar( $opt_name, $content );
    /*
     * <--- END HELP TABS
     */

    /*
     *
     * ---> START SECTIONS
     *
     */


    include_once(get_template_directory() . '/redux-framework/modeltheme-config.arrays.php');

    /**
    ||-> SECTION: General Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'General Settings', 'eaglewp' ),
        'id'    => 'mt_general',
        'icon'  => 'el el-icon-wrench'
    ));
    // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'General Settings', 'eaglewp' ),
        'id'         => 'mt_general_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_breadcrumbs',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Breadcrumbs</h3>' )
            ),
            array(
                'id'       => 'mt_enable_breadcrumbs',
                'type'     => 'switch', 
                'title'    => esc_html__('Breadcrumbs', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable breadcrumbs', 'eaglewp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_breadcrumbs_delimitator',
                'type'     => 'text',
                'title'    => esc_html__('Breadcrumbs delimitator', 'eaglewp'),
                'subtitle' => esc_html__('This is a little space under the Field Title in the Options table, additional info is good in here.', 'eaglewp'),
                'desc'     => esc_html__('This is the description field, again good for additional info.', 'eaglewp'),
                'default'  => '/',
                'required' => array( 'mt_enable_breadcrumbs', '=', '1' ),

            ),
            array(
                'id'   => 'mt_divider_custom_css',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Custom CSS Code</h3>' )
            ),
            array(
                'id' => 'mt_custom_css',
                'type' => 'ace_editor',
                'title' => esc_html__('CSS Code', 'eaglewp'),
                'subtitle' => esc_html__('Paste your CSS code here.', 'eaglewp'),
                'mode' => 'css',
                'theme' => 'monokai',
                'default' => "#header{\nmargin: 0 auto;\n}"
            )
        ),
    ));
        // GENERAL SETTINGS
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Page Preloader', 'eaglewp' ),
        'id' => 'mt_general_preloader',
        'subsection' => true,
        'fields' => array(
            array(
                'id'   => 'mt_divider_preloader_status',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Status</h3>' )
            ),
            array(
                'id'       => 'mt_preloader_status',
                'type'     => 'switch', 
                'title'    => esc_html__('Enable Page Preloader', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable page preloader', 'eaglewp'),
                'default'  => false,
            ),
            array(
                'id'   => 'mt_divider_preloader_styling',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Styling</h3>' ),
                'required' => array( 'mt_preloader_status', '=', '1' ),

            ),
            array(         
                'id'       => 'mt_preloader_bg_color',
                'type'     => 'background',
                'title'    => esc_html__('Page Preloader Backgrond', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ec1d23', 'eaglewp'),
                'default'  => array(
                    'background-color' => '#ec1d23',
                ),
                'output' => array(
                    '.eaglewp_preloader_holder'
                ),
                'required' => array( 'mt_preloader_status', '=', '1' ),

            ),
            array(
                'id'       => 'mt_preloader_color',
                'type'     => 'color',
                'title'    => esc_html__('Preloader color:', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'eaglewp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'required' => array( 'mt_preloader_status', '=', '1' ),

            ),
            array(
                'id'   => 'mt_divider_preloader_animation',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Page Preloader Variant</h3>' ),
                'required' => array( 'mt_preloader_status', '=', '1' ),

            ),
            array(
                'id'       => 'mt_preloader_animation',
                'type'     => 'radio',
                'title'    => esc_html__('Preloader Animation', 'eaglewp'), 
                'subtitle' => esc_html__('Select Preloader Animation', 'eaglewp'),
                //Must provide key => value pairs for radio options
                'options'  => array(
                        'v1_ball_triangle' => esc_html__('Ball Triangle', 'eaglewp'), 
                        'v2_ball_pulse' => esc_html__('Ball Pulse', 'eaglewp'),
                        'v3_ball_grid_pulse' => esc_html__('Ball Grid Pulse', 'eaglewp'),
                        'v4_ball_clip_rotate' => esc_html__('Ball Clip Rotate', 'eaglewp'),
                        'v5_ball_clip_rotate_pulse' => esc_html__('Ball Clip Rotate Pulse', 'eaglewp'),
                        'v6_square_spin' => esc_html__('Square Spin', 'eaglewp'),
                        'v7_ball_clip_rotate_multiple' => esc_html__('Ball Clip Rotate Multiple', 'eaglewp'),
                        'v8_ball_pulse_rise' => esc_html__('Ball Pulse Rise', 'eaglewp'),
                        'v9_ball_rotate' => esc_html__('Ball Rotate', 'eaglewp'),
                        'v10_cube_transition' => esc_html__('Cube Transition', 'eaglewp'),
                        'v11_ball_zig_zag' => esc_html__('Triangle Zig Zag', 'eaglewp'),
                        'v12_ball_zig_zag_deflect' => esc_html__('Triangle Zig Zag Deflect', 'eaglewp'),
                        'v13_ball_scale' => esc_html__('Ball Scale', 'eaglewp'),
                        'v14_line_scale' => esc_html__('Line Scale', 'eaglewp'),
                        'v15_line_scale_party' => esc_html__('Line Scale Party', 'eaglewp'),
                        'v16_ball_scale_multiple' => esc_html__('Ball Scale Multiple', 'eaglewp'),
                        'v17_ball_pulse_sync' => esc_html__('Ball Pulse Sync', 'eaglewp'),
                        'v18_ball_beat' => esc_html__('Ball Beat', 'eaglewp'),
                        'v19_line_scale_pulse_out' => esc_html__('Line Scale Pulse Out', 'eaglewp'),
                        'v20_line_scale_pulse_out_rapid' => esc_html__('Line Scale Pulse Out Rapid', 'eaglewp')

                ),
                'default' => 'v19_line_scale_pulse_out',
                'required' => array( 'mt_preloader_status', '=', '1' ),

            )
        ),
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sidebars', 'eaglewp' ),
        'id'         => 'mt_general_sidebars',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_sidebars',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Generate Infinite Number of Sidebars</h3>' )
            ),
            array(
                'id'       => 'mt_dynamic_sidebars',
                'type'     => 'multi_text',
                'title'    => esc_html__( 'Sidebars', 'eaglewp' ),
                'subtitle' => esc_html__( 'Use the "Add More" button to create unlimited sidebars.', 'eaglewp' ),
                'add_text' => esc_html__( 'Add one more Sidebar', 'eaglewp' )
            )
        ),
    ));

    /**
    ||-> SECTION: Styling Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Styling Settings', 'eaglewp' ),
        'id'    => 'mt_styling',
        'icon'  => 'el el-icon-magic'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Global Fonts', 'eaglewp' ),
        'id'         => 'mt_styling_global_fonts',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_googlefonts',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Import Infinite Google Fonts</h3>')
            ),
            array(
                'id'       => 'mt_google_fonts_select',
                'type'     => 'select',
                'multi'    => true,
                'title'    => esc_html__('Import Google Font Globally', 'eaglewp'), 
                'subtitle' => esc_html__('Select one or multiple fonts', 'eaglewp'),
                'desc'     => esc_html__('Importing fonts made easy', 'eaglewp'),
                'options'  => $google_fonts_list,
                'default'  => array(
                    'Montserrat:regular,700,latin',
                    'Lato:100,100italic,300,300italic,regular,italic,700,700italic,900,900italic,latin-ext,latin'
                ),
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Skin color', 'eaglewp' ),
        'id'         => 'mt_styling_skin_color',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Links Colors(Regular, Hover, Active/Visited)</h3>' )
            ),
            array(
                'id'       => 'mt_global_link_styling',
                'type'     => 'link_color',
                'title'    => esc_html__('Links Color Option', 'eaglewp'),
                'subtitle' => esc_html__('Only color validation can be done on this field type(Default Regular: #ec1d23; Default Hover: #0099d1; Default Active: #0099d1;)', 'eaglewp'),
                'default'  => array(
                    'regular'  => '#ec1d23', // blue
                    'hover'    => '#0099d1', // blue-x3
                    'active'   => '#0099d1',  // blue-x3
                    'visited'  => '#0099d1',  // blue-x3
                )
            ),
            array(
                'id'   => 'mt_divider_main_colors',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Main Colors & Backgrounds</h3>' )
            ),
            array(
                'id'       => 'mt_style_main_texts_color',
                'type'     => 'color',
                'title'    => esc_html__('Main texts color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ec1d23', 'eaglewp'),
                'default'  => '#ec1d23',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ec1d23', 'eaglewp'),
                'default'  => '#ec1d23',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_main_backgrounds_color_hover',
                'type'     => 'color',
                'title'    => esc_html__('Main backgrounds color (hover)', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #0099d1', 'eaglewp'),
                'default'  => '#0099d1',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_style_semi_opacity_backgrounds',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Semitransparent blocks background', 'eaglewp' ),
                'subtitle' => esc_html__( 'Default: rgba(14, 26, 33, 0.95)', 'eaglewp' ),
                'default'  => array(
                    'color' => '#232331',
                    'alpha' => '.95'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu',
                ),
                'mode'     => 'background'
            ),
            array(
                'id'   => 'mt_divider_text_selection',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Text Selection Color & Background</h3>' )
            ),
            array(
                'id'       => 'mt_text_selection_color',
                'type'     => 'color',
                'title'    => esc_html__('Text selection color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'eaglewp'),
                'default'  => '#ffffff',
                'validate' => 'color',
            ),
            array(
                'id'       => 'mt_text_selection_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Text selection background color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ec1d23', 'eaglewp'),
                'default'  => '#ec1d23',
                'validate' => 'color',
            )
        ),
    ));

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Nav Menu', 'eaglewp' ),
        'id'         => 'mt_styling_nav_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_nav_menu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Menus Styling</h3>' )
            ),
            array(
                'id'       => 'mt_nav_menu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Menu Text Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'eaglewp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar .menu-item > a,
                                .navbar-nav .search_products a,
                                .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus,
                                .navbar-default .navbar-nav > li > a',
                )
            ),
            array(
                'id'   => 'mt_divider_nav_submenu',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Submenus Styling</h3>' )
            ),
            array(
                'id'       => 'mt_nav_submenu_background',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #232331', 'eaglewp'),
                'default'  => '#232331',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar .sub-menu, .navbar ul li ul.sub-menu',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Text Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'eaglewp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_background_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Hover Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #EC1C23', 'eaglewp'),
                'default'  => '#EC1C23',
                'validate' => 'color',
                'output' => array(
                    'background-color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
            array(
                'id'       => 'mt_nav_submenu_hover_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Nav Submenu Hover Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ffffff', 'eaglewp'),
                'default'  => '#ffffff',
                'validate' => 'color',
                'output' => array(
                    'color' => '#navbar ul.sub-menu li a:hover',
                )
            ),
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Typography', 'eaglewp' ),
        'id'         => 'mt_styling_typography',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_4',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Body Font family</h3>' )
            ),
            array(
                'id'          => 'mt_body_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Body Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'line-height'  => false,
                'font-weight'  => false,
                'font-size'   => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array(
                    'body'
                ),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Lato', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_5',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Headings</h3>' )
            ),
            array(
                'id'          => 'mt_heading_h1',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H1 Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h1', 'h1 span'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '36px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h2',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H2 Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h2'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '30px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h3',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H3 Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h3'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '24px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h4',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H4 Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h4'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '18px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h5',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H5 Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h5'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '14px', 
                    'google'      => true
                ),
            ),
            array(
                'id'          => 'mt_heading_h6',
                'type'        => 'typography', 
                'title'       => esc_html__('Heading H6 Font family', 'eaglewp'),
                'google'      => true, 
                'font-backup' => true,
                'color'       => false,
                'text-align'  => false,
                'letter-spacing'  => true,
                'line-height'  => true,
                'font-weight'  => false,
                'font-size'   => true,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('h6'),
                'units'       =>'px',
                'default'     => array(
                    'font-family' => 'Montserrat', 
                    'font-size' => '12px', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_6',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Inputs & Textareas Font family</h3>' )
            ),
            array(
                'id'                => 'mt_inputs_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Inputs Font family', 'eaglewp'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array('input', 'textarea'),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for inputs and textareas', 'eaglewp'),
                'default'           => array(
                    'font-family'       => 'Lato', 
                    'google'            => true
                ),
            ),
            array(
                'id'   => 'mt_divider_7',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Buttons Font family</h3>' )
            ),
            array(
                'id'                => 'mt_buttons_typography',
                'type'              => 'typography', 
                'title'             => esc_html__('Buttons Font family', 'eaglewp'),
                'google'            => true, 
                'font-backup'       => true,
                'color'             => false,
                'text-align'        => false,
                'letter-spacing'    => false,
                'line-height'       => false,
                'font-weight'       => false,
                'font-size'         => false,
                'font-style'        => false,
                'subsets'           => false,
                'output'            => array(
                    'input[type="submit"]'
                ),
                'units'             =>'px',
                'subtitle'          => esc_html__('Font family for buttons', 'eaglewp'),
                'default'           => array(
                    'font-family'       => 'Lato', 
                    'google'            => true
                ),
            ),

        ),
    ));


    /**
    ||-> SECTION: Header Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Header Settings', 'eaglewp' ),
        'id'    => 'mt_header',
        'icon'  => 'el el-icon-arrow-up'
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - General', 'eaglewp' ),
        'id'         => 'mt_header_general',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_generalheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Global Header Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Select Header layout', 'eaglewp' ),
                'options'  => array(
                    'header1' => array(
                        'alt' => esc_html__('Header #1', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/1.png'
                    ),
                    'header2' => array(
                        'alt' => esc_html__('Header #2', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/2.png'
                    ),
                    'header5' => array(
                        'alt' => esc_html__('Header #5', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/5.png'
                    ),
                    'header8' => array(
                        'alt' => esc_html__('Header #8', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/8.png'
                    ),
                    'header9' => array(
                        'alt' => esc_html__('Header #9', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/9.png'
                    ),
                    'header12' => array(
                        'alt' => esc_html__('Header #12', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/12.png'
                    ),
                    'header13' => array(
                        'alt' => esc_html__('Header #13', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/13.png'
                    ),
                    'header14' => array(
                        'alt' => esc_html__('Header #14', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/headers/14.png'
                    ),
                ),
                'default'  => 'header1'
            ),
            array(
                'id' => 'eaglewp_header_order_tracking_link',
                'type' => 'text',
                'title' => __('Order Traking Url', 'eaglewp'),
                'subtitle' => __('A link to for Order Traking button', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id' => 'eaglewp_header_courier_cost_link',
                'type' => 'text',
                'title' => __(' Courier Url', 'eaglewp'),
                'subtitle' => __('A link to for Courier button', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id'       => 'mt_is_nav_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Navigation Menu?', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable "sticky positioned navigation menu".', 'eaglewp'),
                'default'  => false,
                'on'       => esc_html__( 'Enabled', 'eaglewp' ),
                'off'      => esc_html__( 'Disabled', 'eaglewp' )
            ),
            array(
                'id'   => 'mt_divider_header_stat',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Search Icon Settings(from header)</h3>' )
            ),
            array(
                'id'       => 'mt_header_is_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Search Icon Status', 'eaglewp'),
                'subtitle' => esc_html__('Enable or Disable Search Icon".', 'eaglewp'),
                'default'  => true,
                'on'       => esc_html__( 'Enabled', 'eaglewp' ),
                'off'      => esc_html__( 'Disabled', 'eaglewp' )
            ),

        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Logo &amp; Favicon', 'eaglewp' ),
        'id'         => 'mt_header_logo',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_logo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Logo Settings</h3>' )
            ),
            array(
                'id' => 'mt_logo',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Logo image', 'eaglewp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/logoeagle.svg'),
            ),
            array(
                'id'        => 'mt_logo_max_width',
                'type'      => 'slider',
                'title'     => esc_html__('Logo Max Width', 'eaglewp'),
                'subtitle'  => esc_html__('Use the slider to increase/decrease max size of the logo.', 'eaglewp'),
                'desc'      => esc_html__('Min: 1px, max: 500px, step: 1px, default value: 140px', 'eaglewp'),
                "default"   => 200,
                "min"       => 1,
                "step"      => 1,
                "max"       => 500,
                'display_value' => 'label'
            ),
            array(
                'id'   => 'mt_divider_favicon',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Favicon Settings</h3>' )
            ),
            array(
                'id' => 'mt_favicon',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Favicon url', 'eaglewp'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'eaglewp'),
                'default' => array('url' => get_template_directory_uri().'/images/favicon.png'),
            )
        ),
    ) );

    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Header - Main Big', 'eaglewp' ),
        'id'         => 'mt_header_bottom_main',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_mainheader',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Main Header Options</h3>' )
            ),
            array(         
                'id'       => 'mt_header_main_background',
                'type'     => 'background',
                'title'    => esc_html__('Header (main-header) - background', 'eaglewp'),
                'subtitle' => esc_html__('Default color: #232331', 'eaglewp'),
                'output'      => array('.navbar-default'),
                'default'  => array(
                    'background-color' => '#232331',
                )
            ),
            array(
                'id'       => 'mt_header_main_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Main Header texts color', 'eaglewp'), 
                'subtitle' => esc_html__('Default color: #FFFFFF', 'eaglewp'),
                'default'  => '#FFFFFF',
                'validate' => 'color',
                'output'    => array(
                    'color' => 'header',
                ),
            )
        ),
    ) );
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Fixed Sidebar Menu', 'eaglewp' ),
        'id'         => 'mt_header_fixed_sidebar_menu',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_fixed_headerstatus',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Status</h3>' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_status',
                'type'     => 'switch',
                'title'    => esc_html__( 'Burger Sidebar Menu Status', 'eaglewp' ),
                'subtitle' => esc_html__( 'Enable/Disable Burger Sidebar Menu Status', 'eaglewp' ),
                'desc'     => esc_html__( 'This Option Will Enable/Disable The Navigation Burger + Sidebar Menu triggered by the burger menu', 'eaglewp' ),
                'default'  => 1,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),

            array(
                'id'   => 'mt_divider_fixed_header',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Other Options</h3>' )
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_bgs',
                'type'     => 'color_rgba',
                'title'    => esc_html__( 'Sidebar Menu Background', 'eaglewp' ),
                'subtitle' => esc_html__( 'Default: rgba(255, 255, 255, 0.95) - #ffffff - Opacity: 0.95', 'eaglewp' ),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => '.95'
                ),
                'output' => array(
                    'background-color' => '.fixed-sidebar-menu'
                ),
                // These options display a fully functional color palette.  Omit this argument
                // for the minimal color picker, and change as desired.
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_text_color',
                'type'     => 'color',
                'title'    => esc_html__('Texts Color', 'eaglewp'), 
                'default'  => '#000000',
                'validate' => 'color'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar_menu_site_title_status',
                'type'     => 'button_set',
                'title'    => esc_html__( 'Show Title or Logo', 'eaglewp' ),
                'subtitle' => esc_html__( 'Choose what to show on fixed sidebar', 'eaglewp' ),
                'desc'     => esc_html__( 'Choose Between Site Title or Site Logo', 'eaglewp' ),
                //Must provide key => value pairs for radio options
                'options'  => array(
                    'site_title' => 'Title',
                    'site_logo' => 'Logo',
                    'site_nothing' => 'Disable This Feature'
                ),
                'default'  => 'site_title'
            ),
            array(
                'id'       => 'mt_header_fixed_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Fixed Sidebar Menu - Sidebar', 'eaglewp' ),
                'subtitle' => esc_html__( 'Select Sidebar.', 'eaglewp' ),
                'default'   => 'sidebar-1',
            ),

        ),
    ) );

    /**

    ||-> SECTION: Footer Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Footer Settings', 'eaglewp' ),
        'id'    => 'mt_footer',
        'icon'  => 'el el-icon-arrow-down'
    ) );


    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Top Rows', 'eaglewp' ),
        'id'         => 'mt_footer_top',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_footer_top',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Top Rows</h3>' )
            ),
            array(         
                'id'       => 'mt_footer_top_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (top) - background', 'eaglewp'),
                'subtitle' => esc_html__('Footer background with image or color.', 'eaglewp'),
                'output'      => array('footer .footer-top'),
                'default'  => array(
                    'background-color' => '#232331',
                )
            ),
            array(
                'id'        => 'mt_footer_top_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Top Text Color', 'eaglewp' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'eaglewp' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'eaglewp' ),
                'output'    => array('color' => 'footer .footer-top h1.widget-title, footer .footer-top h3.widget-title, footer .footer-top .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
            array(
                'id'   => 'mt_divider_footer_row1',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #1</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_1',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #1 - Status', 'eaglewp' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 1', 'eaglewp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_1_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'eaglewp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'eaglewp'),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),
                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_1', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_1_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Padding', 'eaglewp'),
                'subtitle'       => esc_html__('Choose the spacing for the first row from footer.', 'eaglewp'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '80px', 
                    'padding-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_1margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-1'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #1 - Margin', 'eaglewp'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'eaglewp'),
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '20px', 
                    'margin-bottom'  => '40px', 
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_1border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #1 - Borders', 'eaglewp'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'eaglewp'),
                'output'   => array('.footer-row-1'),
                'all'      => false,
                'required' => array( 'mt_footer_row_1', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row2',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #2</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_2',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #2 - Status', 'eaglewp' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 2', 'eaglewp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_2_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #1 - Layout', 'eaglewp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_2', '=', '1' ),
            ),
            array(
                'id'             => 'footer_row_2_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Padding', 'eaglewp'),
                'subtitle'       => esc_html__('Choose the spacing for the second row from footer.', 'eaglewp'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    // 'padding-right'   => '0px', 
                    'padding-bottom'  => '40px', 
                    // 'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_2margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-2'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #2 - Margin', 'eaglewp'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'eaglewp'),
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    // 'margin-right'   => '0px', 
                    'margin-bottom'  => '40px', 
                    // 'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_2border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #2 - Borders', 'eaglewp'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'eaglewp'),
                'output'   => array('.footer-row-2'),
                'all'      => false,
                'required' => array( 'mt_footer_row_2', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            ),
            array(
                'id'   => 'mt_divider_footer_row3',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Footer Rows - Row #3</h3>' )
            ),
            array(
                'id'       => 'mt_footer_row_3',
                'type'     => 'switch',
                'title'    => esc_html__( 'Footer Row #3 - Status', 'eaglewp' ),
                'subtitle' => esc_html__( 'Enable/Disable Footer ROW 3', 'eaglewp' ),
                'default'  => 0,
                'on'       => 'Enabled',
                'off'      => 'Disabled',
            ),
            array(
                'id'       => 'mt_footer_row_3_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Footer Row #3 - Layout', 'eaglewp' ),
                'options'  => array(
                    '1' => array(
                        'alt' => esc_html__('Footer 1 Column', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_1.png'
                    ),
                    '2' => array(
                        'alt' => esc_html__('Footer 2 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_2.png'
                    ),
                    '3' => array(
                        'alt' => esc_html__('Footer 3 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_3.png'
                    ),
                    '4' => array(
                        'alt' => esc_html__('Footer 4 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_4.png'
                    ),
                    '5' => array(
                        'alt' => esc_html__('Footer 5 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_5.png'
                    ),
                    '6' => array(
                        'alt' => esc_html__('Footer 6 Columns', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_6.png'
                    ),
                    'column_half_sub_half' => array(
                        'alt' => esc_html__('Footer 6 + 3 + 3', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_half_sub_half.png'
                    ),
                    'column_sub_half_half' => array(
                        'alt' => esc_html__('Footer 3 + 3 + 6', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_half_half.png'
                    ),
                    'column_sub_fourth_third' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 2 + 4', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_fourth_third.png'
                    ),
                    'column_third_sub_fourth' => array(
                        'alt' => esc_html__('Footer 4 + 2 + 2 + 2 + 2', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_third_sub_fourth.png'
                    ),
                    'column_sub_third_half' => array(
                        'alt' => esc_html__('Footer 2 + 2 + 2 + 6', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half.png'
                    ),
                    'column_half_sub_third' => array(
                        'alt' => esc_html__('Footer 6 + 2 + 2 + 2', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/footer_columns/column_sub_third_half2.png'
                    ),

                ),
                'default'  => '4',
                'required' => array( 'mt_footer_row_3', '=', '1' ),
            ),
            array(
                'id'             => 'mt_footer_row_3_spacing',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'padding',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Padding', 'eaglewp'),
                'subtitle'       => esc_html__('Choose the spacing for the third row from footer.', 'eaglewp'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'padding-top'     => '0px', 
                    // 'padding-right'   => '0px', 
                    'padding-bottom'  => '40px', 
                    // 'padding-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array(
                'id'             => 'mt_footer_row_3margin',
                'type'           => 'spacing',
                'output'         => array('.footer-row-3'),
                'mode'           => 'margin',
                'units'          => array('em', 'px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Footer Row #3 - Margin', 'eaglewp'),
                'subtitle'       => esc_html__('Choose the margin for the first row from footer.', 'eaglewp'),
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'            => array(
                    'margin-top'     => '0px', 
                    // 'margin-right'   => '0px', 
                    'margin-bottom'  => '20px', 
                    // 'margin-left'    => '0px',
                    'units'          => 'px', 
                )
            ),
            array( 
                'id'       => 'mt_footer_row_3border',
                'type'     => 'border',
                'title'    => esc_html__('Footer Row #3 - Borders', 'eaglewp'),
                'subtitle' => esc_html__('Only color validation can be done on this field', 'eaglewp'),
                'output'   => array('.footer-row-3'),
                'all'      => false,
                'required' => array( 'mt_footer_row_3', '=', '1' ),
                'default'  => array(
                    'border-color'  => '#515b5e', 
                    'border-style'  => 'solid', 
                    'border-top'    => '0', 
                    'border-right'  => '0', 
                    'border-bottom' => '2', 
                    'border-left'   => '0'
                )
            )
        ),
    ));



    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Footer Bottom Bar', 'eaglewp' ),
        'id'         => 'mt_footer_bottom',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_footer_text',
                'type' => 'editor',
                'title' => esc_html__('Footer Text', 'eaglewp'),
                'default' => 'Copyright by ModelTheme. All Rights Reserved.',
            ),
            array(         
                'id'       => 'mt_footer_bottom_background',
                'type'     => 'background',
                'title'    => esc_html__('Footer (bottom) - background', 'eaglewp'),
                'subtitle' => esc_html__('Footer background with image or color.', 'eaglewp'),
                'output'      => array('footer .footer'),
                'default'  => array(
                    'background-color' => '#232331',
                )
            ),
            array(
                'id'        => 'mt_footer_bottom_texts_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__( 'Footer Bottom Text Color', 'eaglewp' ),
                'subtitle'  => esc_html__( 'Set color and alpha channel', 'eaglewp' ),
                'desc'      => esc_html__( 'Set color and alpha channel for footer texts (Especially for widget titles)', 'eaglewp' ),
                'output'    => array('color' => 'footer .footer h1.widget-title, footer .footer h3.widget-title, footer .footer .widget-title'),
                'default'   => array(
                    'color'     => '#ffffff',
                    'alpha'     => 1
                ),
                'options'       => array(
                    'show_input'                => true,
                    'show_initial'              => true,
                    'show_alpha'                => true,
                    'show_palette'              => true,
                    'show_palette_only'         => false,
                    'show_selection_palette'    => true,
                    'max_palette_size'          => 10,
                    'allow_empty'               => true,
                    'clickout_fires_change'     => false,
                    'choose_text'               => 'Choose',
                    'cancel_text'               => 'Cancel',
                    'show_buttons'              => true,
                    'use_extended_classes'      => true,
                    'palette'                   => null,  // show default
                    'input_text'                => 'Select Color'
                ),                        
            ),
        ),
    ));



    /**

    ||-> SECTION: Contact Settings
    
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Contact Settings', 'eaglewp' ),
        'id'    => 'mt_contact',
        'icon'  => 'el el-icon-map-marker-alt'
    ));
    // GENERAL
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Contact', 'eaglewp' ),
        'id'         => 'mt_contact_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_contact_phone',
                'type' => 'text',
                'title' => esc_html__('Phone Number', 'eaglewp'),
                'subtitle' => esc_html__('Contact phone number displayed on the contact us page.', 'eaglewp'),
                'default' => ' +1 777 3321 2312'
            ),
            array(
                'id' => 'mt_contact_email',
                'type' => 'text',
                'title' => esc_html__('Email', 'eaglewp'),
                'subtitle' => esc_html__('Contact email displayed on the contact us page., additional info is good in here.', 'eaglewp'),
                'validate' => 'email',
                'msg' => 'custom error message',
                'default' => 'hello@eaglewp.tld'
            ),
            array(
                'id' => 'mt_contact_address',
                'type' => 'text',
                'title' => esc_html__('Address', 'eaglewp'),
                'subtitle' => esc_html__('Enter your contact address', 'eaglewp'),
                'default' => '321 Education Street, New York, NY, USA'
            )
        ),
    ));
    // MAILCHIMP
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Mailchimp', 'eaglewp' ),
        'id'         => 'mt_contact_mailchimp',
        'subsection' => true,
        'fields'     => array(
            array(
                'id' => 'mt_mailchimp_apikey',
                'type' => 'text',
                'title' => esc_html__('Mailchimp apiKey', 'eaglewp'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your apiKey', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id' => 'mt_mailchimp_listid',
                'type' => 'text',
                'title' => esc_html__('Mailchimp listId', 'eaglewp'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your listId', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id' => 'mt_mailchimp_data_center',
                'type' => 'text',
                'title' => esc_html__('Mailchimp form datacenter', 'eaglewp'),
                'subtitle' => esc_html__('To enable Mailchimp please type in your form datacenter', 'eaglewp'),
                'default' => ''
            )
        ),
    ));


    /**
    ||-> SECTION: Blog Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Settings', 'eaglewp' ),
        'id'    => 'mt_blog',
        'icon'  => 'el el-icon-comment'
    ));
    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blog Archive', 'eaglewp' ),
        'id'         => 'mt_blog_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog List Layout</h3>' )
            ),
            array(
                'id'       => 'mt_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Blog List Layout', 'eaglewp' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'eaglewp' ),
                'options'  => array(
                    'mt_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_blog_right_sidebar'
            ),
            array(
                'id'       => 'mt_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Blog List Sidebar', 'eaglewp' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'eaglewp' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_blog_layout', '!=', 'mt_blog_fullwidth'),
            ),
            array(
                'id'        => 'mt_blog_display_type',
                'type'      => 'select',
                'title'     => esc_html__('How to display posts', 'eaglewp'),
                'subtitle'  => esc_html__('Select how you want to display post on blog list.', 'eaglewp'),
                'options'   => array(
                        'list'   => 'List',
                        'grid'   => 'Grid'
                    ),
                'default'   => 'list',
            ),

            array(
                'id'        => 'mt_blog_grid_columns',
                'type'      => 'select',
                'title'     => esc_html__('Grid columns', 'eaglewp'),
                'subtitle'  => esc_html__('Select how many columns you want.', 'eaglewp'),
                'options'   => array(
                        '2'   => '2',
                        '3'   => '3'
                    ),
                'default'   => '3',
                'required' => array('mt_blog_display_type', 'equals', 'grid'),
            ),
            array(
                'id'   => 'mt_divider_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog List Elements</h3>' )
            ),
            array(
                'id'       => 'mt_enable_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Posts', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable "sticky posts" section on blog page', 'eaglewp'),
                'default'  => true,
            ),
            array(
                'id' => 'mt_sticky_post_title',
                'type' => 'text',
                'title' => esc_html__('Sticky Post Title', 'eaglewp'),
                'subtitle' => esc_html__('Enter the text you want to display as sticky post title.', 'eaglewp'),
                'default' => 'Sticky Posts',
                'required' => array( 'mt_enable_sticky', '=', '1' ),

            ),
            array(
                'id' => 'mt_blog_post_title',
                'type' => 'text',
                'title' => esc_html__('Blog Post Title', 'eaglewp'),
                'subtitle' => esc_html__('Enter the text you want to display as blog post title.', 'eaglewp'),
                'default' => 'All Blog Posts',
                'required' => array( 'mt_enable_sticky', '=', '1' ),

            )
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Author Archive', 'eaglewp' ),
        'id'         => 'mt_blog_author_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_author_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Author Posts Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_author_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Author Posts Archive Header Image', 'eaglewp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_author_page_img_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Categories Archive', 'eaglewp' ),
        'id'         => 'mt_blog_categories_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_categories_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog Categories Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_categories_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Blog Categories Archive Header Image', 'eaglewp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_author_page_img_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tags Archive', 'eaglewp' ),
        'id'         => 'mt_blog_tags_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_tags_posts_header_image',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blog Tags Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_tags_posts_header_image',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Blog Tags Archive Header Image', 'eaglewp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_author_page_img_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Search Archive', 'eaglewp' ),
        'id'         => 'mt_blog_search_posts_archive',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_search_posts_header_img',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Search Archive Header Image</h3>' )
            ),
            array(
                'id' => 'mt_search_posts_header_img',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Search Archive Header Image', 'eaglewp'),
                'compiler' => 'true',
                'default' => array('url' => get_template_directory_uri().'/images/mt_search_archive_500.jpg'),
            ),
        ),
    ));

    // SIDEBARS
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Single Post', 'eaglewp' ),
        'id'         => 'mt_blog_single_pos',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_single_blog_layout',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog List Layout</h3>' )
            ),
            array(
                'id'       => 'mt_single_blog_layout',
                'type'     => 'image_select',
                'compiler' => true,
                'title'    => esc_html__( 'Single Blog List Layout', 'eaglewp' ),
                'subtitle' => esc_html__( 'Select Blog List layout.', 'eaglewp' ),
                'options'  => array(
                    'mt_single_blog_left_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Left sidebar', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-left.jpg'
                    ),
                    'mt_single_blog_fullwidth' => array(
                        'alt' => esc_html__('1 Column - Full width', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-no.jpg'
                    ),
                    'mt_single_blog_right_sidebar' => array(
                        'alt' => esc_html__('2 Columns - Right sidebar', 'eaglewp' ),
                        'img' => get_template_directory_uri().'/redux-framework/assets/sidebar-right.jpg'
                    )
                ),
                'default'  => 'mt_single_blog_fullwidth'
            ),
            array(
                'id'       => 'mt_single_blog_layout_sidebar',
                'type'     => 'select',
                'data'     => 'sidebars',
                'title'    => esc_html__( 'Single Blog List Sidebar', 'eaglewp' ),
                'subtitle' => esc_html__( 'Select Blog List Sidebar.', 'eaglewp' ),
                'default'   => 'sidebar-1',
                'required' => array('mt_single_blog_layout', '!=', 'mt_single_blog_fullwidth'),
            ),
            array(
                'id'   => 'mt_divider_single_blog_typo',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Single Blog Post Font family</h3>' )
            ),
            array(
                'id'          => 'mt_single_post_typography',
                'type'        => 'typography', 
                'title'       => esc_html__('Blog Post Font family', 'eaglewp'),
                'subtitle'    => esc_html__( 'Default color: #454646; Font-size: 18px; Line-height: 29px;', 'eaglewp' ),
                'google'      => true, 
                'font-size'   => true,
                'line-height' => true,
                'color'       => true,
                'font-backup' => false,
                'text-align'  => false,
                'letter-spacing'  => false,
                'font-weight'  => false,
                'font-style'  => false,
                'subsets'     => false,
                'output'      => array('.single article .article-content p'),
                'units'       =>'px',
                'default'     => array(
                    'color' => '#454646', 
                    'font-size' => '18px', 
                    'line-height' => '29px', 
                    'font-family' => 'Lato', 
                    'google'      => true
                ),
            ),
            array(
                'id'   => 'mt_divider_single_blog_elements',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Other Single Post Elements</h3>' )
            ),
            array(
                'id'       => 'mt_post_featured_image',
                'type'     => 'switch', 
                'title'    => esc_html__('Single post featured image.', 'eaglewp'),
                'subtitle' => esc_html__('Show or Hide the featured image from blog post page.".', 'eaglewp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_related_posts',
                'type'     => 'switch', 
                'title'    => esc_html__('Related Posts', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable related posts', 'eaglewp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_post_navigation',
                'type'     => 'switch', 
                'title'    => esc_html__('Post Navigation', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable post navigation', 'eaglewp'),
                'default'  => true,
            ),
            array(
                'id'       => 'mt_enable_authorbio',
                'type'     => 'switch', 
                'title'    => esc_html__('About Author', 'eaglewp'),
                'subtitle' => esc_html__('Enable or disable "About author" section on single post', 'eaglewp'),
                'default'  => true,
            ),
            // Author Bio Default Placeholder
            array(
                'id' => 'mt_author_default_placeholder',
                'type' => 'media',
                'url' => true,
                'title' => esc_html__('Author Default Placeholder Thumbnail', 'eaglewp'),
                'compiler' => 'true',
                'subtitle' => esc_html__('Use the upload button to import media.', 'eaglewp'),
                'default' => array('url' => 'http://placehold.it/128x128'),
                'required' => array( 'mt_enable_authorbio', '=', '1' ),
            ),
        ),
    ));


    /**
    ||-> SECTION: Error 404 Page Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( '404 Page Settings', 'eaglewp' ),
        'id'    => 'mt_error404',
        'icon'  => 'el el-icon-error'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( '404 Page', 'eaglewp' ),
        'id'         => 'error404-settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'mt_404_page',
                'type'     => 'select',
                'title'    => esc_html__('Select page', 'eaglewp'), 
                'data'     => 'page'
            )
        ),
    ));


    /**
    ||-> SECTION: Elements
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Elements', 'eaglewp' ),
        'id'    => 'mt_elements',
        'icon'  => 'el el-puzzle'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Tabs', 'eaglewp' ),
        'id'         => 'mt_elements_tabs',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_tabs_normal',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Tabs - Normal State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_tabs_normal_color',
                'type'     => 'color',
                'title'    => esc_html__('Tabs Text Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #666666', 'eaglewp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_tabs_background',
                'type'     => 'color',
                'title'    => esc_html__('Tabs Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f8f8f8', 'eaglewp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_tabs_border',
                'type'     => 'color',
                'title'    => esc_html__('Tabs Border Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f0f0f0', 'eaglewp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels, 
                                        .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels::after, 
                                        .vc_tta-color-grey.vc_tta-style-classic.vc_tta-tabs .vc_tta-panels::before,
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a'
                ),
                'default'  => '#f0f0f0',
            ),
            array(
                'id'   => 'mt_divider_elements_tabs_hover',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Tabs - Hover State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_hover_tabs_normal_color',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Text Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #666666', 'eaglewp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a' ),
                'default'  => '#666666',
            ),
            array(         
                'id'       => 'mt_elements_hover_tabs_background',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Background', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ebebeb', 'eaglewp'),
                'default'  => '#ebebeb',
                'output' => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a'
                )
            ),
            array(         
                'id'       => 'mt_elements_hover_tabs_border',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Border Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #e3e3e3', 'eaglewp'),
                'default'  => '#e3e3e3',
                'output' => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab > a'
                )
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Blockquotes', 'eaglewp' ),
        'id'         => 'mt_elements_blockquotes',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_blockquotes',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Blockquotes Styling</h3>' )
            ),
            array(
                'id'       => 'mt_elements_blockquotes_background',
                'type'     => 'color',
                'title'    => esc_html__('Blockquotes Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f6f6f6', 'eaglewp'),
                'output'    => array(
                    'background-color' => 'blockquote',
                ),
                'default'  => '#f6f6f6',
            ),
            array(         
                'id'       => 'mt_elements_blockquotes_border',
                'type'     => 'color',
                'title'    => esc_html__('Blockquotes Border Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #ec1d23', 'eaglewp'),
                'default'  => '#ec1d23',
                'output' => array(
                    'border-color' => 'blockquote'
                )
            )
        ),
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Accordions', 'eaglewp' ),
        'id'         => 'mt_elements_accordions',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_elements_accordions_normal',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Accordions - Normal State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_accordions_normal_color',
                'type'     => 'color',
                'title'    => esc_html__('Accordions Text Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #666666', 'eaglewp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-title > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_accordions_background',
                'type'     => 'color',
                'title'    => esc_html__('Accordions Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f8f8f8', 'eaglewp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_accordions_border',
                'type'     => 'color',
                'title'    => esc_html__('Accordions Border Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f0f0f0', 'eaglewp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading'
                ),
                'default'  => '#f0f0f0',
            ),
            array(
                'id'   => 'mt_divider_elements_accordions_hover',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Accordions - Active&Hover State</h3>' )
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_color',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Text Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #666666', 'eaglewp'),
                'output'   => array( '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active > a' ),
                'default'  => '#666666',
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_background',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Background Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f8f8f8', 'eaglewp'),
                'output'    => array(
                    'background-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body,
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:focus, 
                                            .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-heading:hover',
                ),
                'default'  => '#f8f8f8',
            ),
            array(
                'id'       => 'mt_elements_accordions_hover_border',
                'type'     => 'color',
                'title'    => esc_html__('Active and Hover Tabs Border Color', 'eaglewp'), 
                'subtitle' => esc_html__('Default: #f0f0f0', 'eaglewp'),
                'output'    => array(
                    'border-color' => '.vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-heading,
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body, 
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body::after, 
                                        .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel .vc_tta-panel-body::before'
                ),
                'default'  => '#f0f0f0',
            ),
        ),
    ));


    /**
    ||-> SECTION: Social Media Settings
    */
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Social Media Settings', 'eaglewp' ),
        'id'    => 'mt_social_media',
        'icon'  => 'el el-icon-myspace'
    ));
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Social Media', 'eaglewp' ),
        'id'         => 'mt_social_media_settings',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'   => 'mt_divider_global_social_links',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Global Social Links</h3>' )
            ),
            array(
                'id' => 'mt_social_fb',
                'type' => 'text',
                'title' => esc_html__('Facebook URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Facebook url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://facebook.com'
            ),
            array(
                'id' => 'mt_social_tw',
                'type' => 'text',
                'title' => esc_html__('Twitter username', 'eaglewp'),
                'subtitle' => esc_html__('Type your Twitter username.', 'eaglewp'),
                'default' => 'envato'
            ),
            array(
                'id' => 'mt_social_pinterest',
                'type' => 'text',
                'title' => esc_html__('Pinterest URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Pinterest url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://pinterest.com'
            ),
            array(
                'id' => 'mt_social_skype',
                'type' => 'text',
                'title' => esc_html__('Skype Name', 'eaglewp'),
                'subtitle' => esc_html__('Type your Skype username.', 'eaglewp'),
                'default' => 'eaglewp'
            ),
            array(
                'id' => 'mt_social_instagram',
                'type' => 'text',
                'title' => esc_html__('Instagram URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Instagram url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://instagram.com'
            ),
            array(
                'id' => 'mt_social_youtube',
                'type' => 'text',
                'title' => esc_html__('YouTube URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your YouTube url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://youtube.com'
            ),
            array(
                'id' => 'mt_social_dribbble',
                'type' => 'text',
                'title' => esc_html__('Dribbble URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Dribbble url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://dribbble.com'
            ),
            array(
                'id' => 'mt_social_linkedin',
                'type' => 'text',
                'title' => esc_html__('LinkedIn URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your LinkedIn url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://linkedin.com'
            ),
            array(
                'id' => 'mt_social_deviantart',
                'type' => 'text',
                'title' => esc_html__('Deviant Art URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Deviant Art url.', 'eaglewp'),
                'validate' => 'url',
                'default' => 'http://deviantart.com'
            ),
            array(
                'id' => 'mt_social_digg',
                'type' => 'text',
                'title' => esc_html__('Digg URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Digg url.', 'eaglewp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_flickr',
                'type' => 'text',
                'title' => esc_html__('Flickr URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Flickr url.', 'eaglewp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_stumbleupon',
                'type' => 'text',
                'title' => esc_html__('Stumbleupon URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Stumbleupon url.', 'eaglewp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_tumblr',
                'type' => 'text',
                'title' => esc_html__('Tumblr URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Tumblr url.', 'eaglewp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id' => 'mt_social_vimeo',
                'type' => 'text',
                'title' => esc_html__('Vimeo URL', 'eaglewp'),
                'subtitle' => esc_html__('Type your Vimeo url.', 'eaglewp'),
                'validate' => 'url',
                'default' => ''
            ),
            array(
                'id'   => 'mt_divider_twitter_keys',
                'type' => 'info',
                'class' => 'mt_divider',
                'desc' => wp_kses_post( '<h3>Twitter Keys - Necessary for Tweets Feed Shortcode</h3>' )
            ),
            array(
                'id' => 'mt_tw_consumer_key',
                'type' => 'text',
                'title' => esc_html__('Twitter Consumer Key', 'eaglewp'),
                'subtitle' => esc_html__('Type your Twitter Consumer key.', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id' => 'mt_tw_consumer_secret',
                'type' => 'text',
                'title' => esc_html__('Twitter Consumer Secret key', 'eaglewp'),
                'subtitle' => esc_html__('Type your Twitter Consumer Secret key.', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id' => 'mt_tw_access_token',
                'type' => 'text',
                'title' => esc_html__('Twitter Access Token', 'eaglewp'),
                'subtitle' => esc_html__('Type your Access Token.', 'eaglewp'),
                'default' => ''
            ),
            array(
                'id' => 'mt_tw_access_token_secret',
                'type' => 'text',
                'title' => esc_html__('Twitter Access Token Secret', 'eaglewp'),
                'subtitle' => esc_html__('Type your Twitter Access Token Secret.', 'eaglewp'),
                'default' => ''
            )
        ),
    ));
    /*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'eaglewp' ),
                'desc'   => esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options', 'eaglewp' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }


