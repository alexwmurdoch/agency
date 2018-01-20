<?php
/**
 * Single post partial template.
 *
 * @package agency
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

    <header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <div class="entry-meta">

			<?php agency_posted_on(); ?>

        </div><!-- .entry-meta -->

    </header><!-- .entry-header -->


    <div class="entry-content">

		<?php $slider = get_field( 'gallery_images' ); ?>
		<?php if ( $slider )  : ?>
            <div class="portfolio-featured">
                <div id="portfolio-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
						<?php $slider = get_field( 'gallery_images' ); ?>
						<?php if ( $slider ) {
							$index = 0;
							foreach ( $slider as $image ) {
								echo '<li data-target="#portfolio-carousel" data-slide-to="' . $index . '"></li>';
								$index ++;
							}
						} ?>
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
						<?php $slider = get_field( 'gallery_images' ); ?>
						<?php if ( $slider ) {
							foreach ( $slider as $image ) {
								echo '<div class="carousel-item">';
								echo '<img src="' . $image['sizes']['large'] . '" class="d-block w-100" >';
								echo '</div>';
							}
						} ?>
                    </div>
                    <!-- Controls -->
                    <a class="carousel-control-prev" href="#portfolio-carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#portfolio-carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <! --/Carousel -->
            </div>
		<?php else: agency_post_thumbnail(); endif; ?>

        <script>
            jQuery('#portfolio-carousel .carousel-indicators li:first').addClass("active");
            jQuery('#portfolio-carousel .carousel-inner .carousel-item:first').addClass("active");
        </script>

        <div class="row">
			<?php if ( get_field( 'sidebar_content' ) != '' )  : ?>
                <div class="col-lg-8">
					<?php the_content(); ?>
                </div>
                <div class="col-lg-4">
					<?php the_field( 'sidebar_content' ); ?>
                </div>
			<?php endif; ?>

			<?php if ( get_field( 'sidebar_content' ) == '' )  : ?>
                <div class="col-lg-12">
					<?php the_content(); ?>
                </div>
			<?php endif; ?>
        </div>

		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'agency' ),
			'after'  => '</div>',
		) );
		?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">

		<?php agency_entry_footer(); ?>

    </footer><!-- .entry-footer -->

</article><!-- #post-## -->
