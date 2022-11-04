<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Example
 */

get_header();
?>

	<main id="primary" class="site-main flex align-center">

		<section class="error-404 not-found wrapper">
			<div class="container column">
				<header class="page-header">
				<h1 class="page-title"><?php esc_html_e( 'Page not found - 404', 'example-theme' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Nothing was found. Please try to search what you was looking for:', 'example-theme' ); ?></p>

					<?php
						get_search_form();
					?>

			</div><!-- .page-content -->
			</div>
			
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
