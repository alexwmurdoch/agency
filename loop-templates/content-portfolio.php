<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agency
 */

?>



    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <div class="entry-content">

            <div class="grid mask">
                <?php if (has_post_thumbnail()){ ?>
                    <figure>
                        <?php
                        $thumb_id = get_post_thumbnail_id();
                        $thumb_url = wp_get_attachment_image_src($thumb_id,'full', false); ?>

                        <img src='<?php echo $thumb_url[0] ?>' class='img-fluid'>

                        <figcaption>
                            <h5><?php the_title(); ?></h5>
                            <a href="<?php the_permalink(); ?>" rel="bookmark">Take a Look</a>
                        </figcaption>
                    </figure>
                <?php } ?>
            </div><!-- .grid mask -->

        </div><!-- .entry-content -->

    </article><!-- #portfolio item-## -->
