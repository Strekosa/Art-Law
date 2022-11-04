<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Example
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="wrapper">
			<div class="container">
				<div class="all-posts flex flex-wrap">		
				<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo '<div class="single-post-card">
					<h3 class="title">'.get_the_title().'</h3>
					<div class="content"><p>'.wp_trim_words(get_the_content(),25,'...').'</p></div>
					<div class="singe-post-date">Date posted: <time>'.get_the_date().'</time></div>
					<a href="'.get_post_permalink().'" class="btn">Read More</a>
				</div>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?></div>
			</div>
		</section>
		

	</main><!-- #main -->

<?php
get_footer();
