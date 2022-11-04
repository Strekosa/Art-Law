<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Example
 */

get_header();
?>

	<main id="primary" class="site-main">
		<section class="wrapper">
			<div class="container column">
				<?php
		while ( have_posts() ) :
			the_post();

			echo '<div class="single-post-block">
				<h3>'.get_the_title().'</h3>
				<div class="description">'.get_the_content().'</div>
			</div>';

			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'example-theme' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'example-theme' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
		endwhile; // End of the loop.
		?>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
