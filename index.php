<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $w = new WP_Query( 
                array(
                    'post_type' => 'post',
                    'posts_per_page' => 3,
                    'orderby'=>'date',
                    'order' => 'ASC',
                    'paged' => $paged
                    )
                );
        
                if( $w->have_posts() ) :
                    while( $w->have_posts() ) : $w->the_post();
                        

                       echo '<div class="single-post-card">
					<h3 class="title">'.get_the_title().'</h3>
					<div class="content"><p>'.wp_trim_words(get_the_content(),25,'...').'</p></div>
					<div class="singe-post-date">Date posted: <time>'.get_the_date().'</time></div>
					<a href="'.get_post_permalink().'" class="btn">Read More</a>
				</div>';
                    endwhile;
                else:
                    echo '<p class="no-results">No results found. Comeback again later.</p>';
                endif;?>

<div class="pagination w-100 flex justify-center">
    <?php 
        echo paginate_links( array(
            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
            'total'        => $w->max_num_pages,
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'type'         => 'plain',
            'end_size'     => 2,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous Post', 'text-domain' ) ),
            'next_text'    => sprintf( '%1$s <i></i>', __( 'Next Post', 'text-domain' ) ),
            'add_args'     => false,
            'add_fragment' => '',
        ) );
    ?>
</div>

<?php
            wp_reset_postdata();        
            ?>
</div>
			</div>
		</section>
	</main><!-- #main -->

<?php
get_footer();
