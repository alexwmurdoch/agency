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

<div class="wrapper" id="archive-portfolio-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
        <main class="site-main" id="main">

            <header class="page-header">
		        <?php
		        the_archive_title( '<h1 class="page-title">', '</h1>' );
		        the_archive_description( '<div class="taxonomy-description">', '</div>' );
		        ?>
            </header><!-- .page-header -->




	        <?php
		        $terms = get_terms("portfolio_tags");
		        $count = count($terms);
		        echo '<ul id="filters" class="list-inline">';
		        echo '<li><button type="button" class="btn btn-link" data-filter="*">' . __('All', 'badlands') . '</button></li>';
		        if ($count > 0) {
			        foreach ($terms as $term) {
				        $termname = strtolower($term->name);
				        $termname = str_replace(' ', '-', $termname);
				        echo '<li><button type="button" class="btn btn-link" data-filter=".' . $termname . '">' . $term->name . '</button></li>';
			        }
		        }
		        echo "</ul>";
	        ?>



		<div class="row" id="portfolio-items">

				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
						$terms = get_the_terms($post->ID, 'portfolio_tags');
						if ($terms && !is_wp_error($terms)) :
							$links = array();
							foreach ($terms as $term) {
								$links[] = $term->name;
							}
							$links = str_replace(' ', '-', $links);
							$tax = join(" ", $links);
						else :
							$tax = '';
						endif;
						?>

                        <div class="col-sm-6 col-md-4 item <?php echo strtolower($tax); ?>">
						    <?php get_template_part( 'loop-templates/content', 'portfolio' ); ?>
                        </div> <!--.col-sm-6 .col-md-4 -->

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
