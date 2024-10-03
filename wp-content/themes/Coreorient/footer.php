<?php
/**
 * The template for displaying the footer.
 *
 */
?>

<?php include_once(ABSPATH . 'wp-admin/includes/plugin.php'); ?>

<?php
// Ensure Elementor is active and the footer template ID is correct
if (class_exists('Elementor\Plugin')) {
    // Replace 123 with your actual Elementor footer template ID
    $footer_template_id = 123;

    // Fetch and display Elementor footer template content
    $elementor = \Elementor\Plugin::$instance;
    $footer_content = $elementor->frontend->get_builder_content_for_display($footer_template_id);

    // Output Elementor footer content
    if (!empty($footer_content)) {
        echo $footer_content;
    } else {
        echo '<!-- Elementor footer content not found or empty -->';
    }
} else {
    echo '<!-- Elementor plugin not active -->';
}
?>

<?php
    if (is_single() || is_page()) {
        $mt_page_preloader = get_post_meta(get_the_ID(), 'mt_page_preloader', true);
        $mt_page_preloader_bg_color = get_post_meta(get_the_ID(), 'mt_page_preloader_bg_color', true);
        if (isset($mt_page_preloader) && $mt_page_preloader == 'enabled' && isset($mt_page_preloader_bg_color)) {
            echo '<div class="eaglewp_preloader_holder ' . eaglewp_redux('mt_preloader_animation') . '">' . eaglewp_loader_animation() . '</div>';
        }
    } else {
        if (eaglewp_redux('mt_preloader_status')) {
            echo '<div class="eaglewp_preloader_holder ' . eaglewp_redux('mt_preloader_animation') . '">' . eaglewp_loader_animation() . '</div>';
        }
    }
?>

<?php wp_footer(); ?>
</body>
</html>
