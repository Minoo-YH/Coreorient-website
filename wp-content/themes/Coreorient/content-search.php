<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */

$excerpt = get_post_field('post_content', get_the_ID());
$thumbnail_src      = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'eaglewp_related_post_pic500x300' );
$author_id = $post->post_author;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row single-post'); ?>>
    <div class="col-md-4 post-thumbnail">
        <a href="<?php the_permalink(); ?>" class="relative">
            <?php if($thumbnail_src) { 
                echo '<img src="'. esc_url($thumbnail_src[0]) . '" alt="'.get_the_title().'" />';
            }else{ 
                echo '<img src="http://placehold.it/500x300" alt="'.get_the_title().'" />'; 
            } ?>
            <div class="thumbnail-overlay absolute">
                <i class="fa fa-plus absolute"></i>
            </div>
        </a>
    </div>
    <div class="col-md-8 post-details">
        <h3 class="post-name row">
            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                <span class="post-type">
                    <i class="fa <?php echo esc_attr($post_icon); ?>"></i>
                </span><?php the_title() ?>
            </a>
        </h3>
        <div class="post-category-comment-date row">
            <span class="post-author"><?php echo esc_html_e('by ', 'eaglewp') . get_the_author(); ?></span>   /   
            <span class="post-comments"><a href="<?php the_permalink(); ?>"><?php comments_number( 'No Comments', '1 Comment', '% Comments' ); ?></a></span>   /   
            <span class="post-date"><?php echo get_the_date(get_option( 'date_format' )); ?></span>
        </div>
        <div class="post-excerpt row">
        <?php
            /* translators: %s: Name of current post */
            the_excerpt();
        ?>
        <p><a href="<?php echo esc_url(get_the_permalink()); ?>" class="more-link"><?php echo esc_html__( 'Read More', 'eaglewp' ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
         <div class="clearfix"></div>

        <?php
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'eaglewp' ),
                'after'  => '</div>',
            ) );
        ?>
        </div>
    </div>
</article>