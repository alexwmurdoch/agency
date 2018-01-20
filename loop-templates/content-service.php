<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package agency
 */

?>


<div class="col-lg-4 callout">

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

        <div class="entry-content">

            <?php the_field('service_icon'); ?>
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>

        </div><!-- .entry-content -->

    </article><!-- #service -## -->

</div><!-- col-lg-4 -->


