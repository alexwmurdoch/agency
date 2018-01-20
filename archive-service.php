<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package agency
 */

get_header();
?>

<?php
$container   = get_theme_mod( 'agency_container_type' );
?>

<div class="wrapper" id="archive-service-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <main class="site-main" id="main">

            <header class="page-header">
		        <?php
		        the_archive_title( '<h1 class="page-title">', '</h1>' );
		        the_archive_description( '<div class="taxonomy-description">', '</div>' );
		        ?>
            </header><!-- .page-header -->

		<div class="row">

				<?php if ( have_posts() ) : ?>



					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', 'service' );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>



			<!-- The pagination component -->
			<?php agency_pagination(); ?>


	</div> <!-- .row -->
        </main><!-- </main>-->
</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
