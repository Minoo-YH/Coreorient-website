<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

get_header(); 

$class_row = "col-md-9";
if ( eaglewp_redux('mt_blog_layout') == 'mt_blog_fullwidth' ) {
    $class_row = "row";
}elseif ( eaglewp_redux('mt_blog_layout') == 'mt_blog_right_sidebar' or eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') {
    $class_row = "col-md-9";
}
$sidebar = eaglewp_redux('mt_blog_layout_sidebar');

?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo eaglewp_header_title_breadcrumbs(); ?>

    <!-- Page content -->
    <div class="high-padding">
        <!-- Blog content -->
        <div class="container blog-posts">
            <div class="row">

                <?php if ( eaglewp_redux('mt_blog_layout') != '' && eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                    <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( $sidebar ); ?></div>
                <?php } ?>

                <div class="<?php echo esc_attr($class_row); ?> main-content">
                    <?php if ( have_posts() ) : ?>
                        <div class="row">

                            <?php $j = 0; ?>
                            <?php /* Start the Loop */ ?>
                            <?php while ( have_posts() ) : the_post(); ?>
                                <?php
                                    $j++;
                                    $class = "";
                                    if ($j%2 == 0) {
                                        $class = "even-post clear_both_class";
                                        echo '<div class="'.esc_attr($class).'">';
                                            get_template_part( 'content', 'right' );
                                        echo '</div>';
                                    } else { 
                                        $class = "odd-post clear_both_class";
                                        echo '<div class="'.esc_attr($class).'">';
                                            get_template_part( 'content', 'left' );
                                        echo '</div>';
                                    }
                                ?>
                            <?php endwhile; ?>
                            
                            <div class="modeltheme-pagination-holder col-md-12">             
                                <div class="modeltheme-pagination pagination">             
                                    <?php eaglewp_pagination(); ?>
                                </div>
                            </div>
                        </div>

                    <?php else : ?>
                        <?php get_template_part( 'content', 'none' ); ?>
                    <?php endif; ?>
                </div>

                <?php if ( function_exists('modeltheme_framework')) { ?>

                    <?php if ( eaglewp_redux('mt_blog_layout') != '' && eaglewp_redux('mt_blog_layout') == 'mt_blog_left_sidebar') { ?>
                        <?php if (is_active_sidebar('sidebar-1')) { ?>
                            <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( 'sidebar-1' ); ?></div>
                        <?php } ?>
                    <?php } ?>

                <?php } else { ?>
                    <?php if (is_active_sidebar('sidebar-1')) { ?>
                            <div class="col-md-3 sidebar-content"><?php  dynamic_sidebar( 'sidebar-1' ); ?></div>
                        <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>