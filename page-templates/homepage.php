<?php
/**
 *
 * Template Name: Homepage Template
 *
 *
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package agency
 */

get_header();


?>

<?php if (is_front_page() && is_home()) : ?>
    <?php get_template_part('global-templates/hero'); ?>
<?php endif; ?>

<div class="wrapper" id="wrapper-index">


    <main class="site-main" id="main">

        <?php

        // check if the flexible content field has rows of data
        if (have_rows('flexible_content')):

            // loop through the rows of data
            while (have_rows('flexible_content')) : the_row();

                if (get_row_layout() == 'hero'): ?>
                    <section>
                        <?php
                        $bg_url = '';
                        $bg_img = get_sub_field('hero_image');
                        if ($bg_img != 'false' && strlen($bg_img) > 0) {
                            $bg_url = 'style="' . 'background-image:url(' . $bg_img . ')"';
                        }
                        ?>

                        <!-- ==== HEADERWRAP ==== -->
                        <div class="headerwrap" <?php echo $bg_url; ?>>
                            <header>
                                <?php the_sub_field('hero_text'); ?>

                                <?php $selected = get_sub_field('display_cta_button'); ?>

                                <?php if (in_array(true, [$selected])) { ?>
                                    <a class="btn btn-primary" role="button"
                                       href="<?php the_sub_field('hero_cta_button_url') ?>"><?php the_sub_field('hero_button_text'); ?></a>
                                <?php } ?>

                            </header>

                        </div><!-- /headerwrap -->

                    </section>
                <?php elseif (get_row_layout() == 'divider_banner'): ?>
                    <?php
                    $bg_url = '';

                    $bg_img = get_sub_field('background_image');
                    if ($bg_img != 'false' && strlen($bg_img) > 0) {
                        $bg_url = 'style="' . 'background-image:url(' . $bg_img . ')"';
                    }
                    ?>

                    <!-- ==== SECTION DIVIDER3 -->
                    <section class="section-divider textdivider divider3 darken-pseudo" <?php echo $bg_url; ?>>
                        <div class="container lighten">
                            <?php the_sub_field('banner_text'); ?>
                        </div><!-- container -->
                    </section><!-- section -->
                <?php elseif (get_row_layout() == 'services'): ?>
                    <section>
                        <!-- ==== GREYWRAP ==== -->
                        <div class="greywrap">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    // the query
                                    $the_query = new WP_Query(array('post_type' => 'service', 'posts_per_page' => 3)); ?>

                                    <?php if ($the_query->have_posts()) : ?>
                                        <!-- the loop -->
                                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>


                                            <?php get_template_part('loop-templates/content', 'service'); ?>

                                        <?php endwhile; ?>
                                        <!-- end of the loop -->
                                        <?php wp_reset_postdata(); ?>

                                    <?php else : ?>
                                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                                    <?php endif; ?>
                                </div><!-- row -->
                            </div>
                        </div><!-- greywrap -->
                    </section>
                <?php elseif (get_row_layout() == 'portfolio'): ?>
                    <section>
                        <!-- ==== PORTFOLIO ==== -->
                        <div class="container wrap-section">

                            <h1 class="centered"><?php the_sub_field('title'); ?></h1>

                            <div class="row">
                                <?php
                                // the query
                                $the_query = new WP_Query(array('post_type' => 'portfolio', 'posts_per_page' => 6)); ?>

                                <?php if ($the_query->have_posts()) : ?>
                                    <!-- the loop -->
                                    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                        <div class="col-sm-6 col-md-4 item">
                                            <?php get_template_part('loop-templates/content', 'portfolio'); ?>
                                        </div> <!--.col-sm-6 .col-md-4 -->

                                    <?php endwhile; ?>
                                    <!-- end of the loop -->
                                    <?php wp_reset_postdata(); ?>

                                <?php else : ?>
                                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                                <?php endif; ?>
                            </div><!-- row -->

                        </div>
                    </section>
                <?php elseif (get_row_layout() == 'two_column_editor'): ?>
                    <section>
                        <!-- ==== ABOUT ==== -->
                        <div class="container wrap-section">
                            <div class="row">
                                <div class="col-lg-12">
                                <h1 class="text-center"><?php the_sub_field('title'); ?></h1>
                                    <hr>
                                </div><!-- col-lg-12 -->
                            </div><!-- row -->
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php the_sub_field('left_column'); ?>
                                </div><!-- col-lg-6 -->

                                <div class="col-lg-6">
                                    <?php the_sub_field('right_column'); ?>
                                </div><!-- col-lg-6 -->
                            </div><!-- row -->
                        </div><!-- container -->
                    </section>
                <?php endif;

            endwhile;

        else :

            // no layouts found

        endif;

        ?>


    </main><!-- #main -->


</div><!-- Wrapper end -->

<?php get_footer(); ?>
