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
        <section class="single-case-law-corner wrapper">
            <div class="single-case-law-corner-main container-boxed column">
                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '
 <span> 
 <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.08062 6.99996L18 6.99996C18.5523 6.99996 19 6.55225 19 5.99996C19 5.44768 18.5523 4.99996 18 4.99996L3.08062 4.99996L5.78087 1.62466C6.12588 1.1934 6.05596 0.564104 5.62469 0.219094C5.19343 -0.125916 4.56414 -0.055994 4.21913 0.375268L0.469009 5.06292C0.422319 5.12128 0.380603 5.18226 0.343861 5.2453C0.133177 5.42864 0 5.69875 0 5.99996C0 6.30118 0.133177 6.57129 0.343861 6.75462C0.380603 6.81766 0.422319 6.87864 0.469009 6.93701L4.21913 11.6247C4.56414 12.0559 5.19343 12.1258 5.62469 11.7808C6.05596 11.4358 6.12588 10.8065 5.78087 10.3753L3.08062 6.99996Z" fill="#1F2E45"/>
</svg>

</span><span class="nav-subtitle">' . esc_html__('Back', 'example-theme') . '</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next', 'example-theme') . '</span>
<span> 
 <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M3.08062 6.99996L18 6.99996C18.5523 6.99996 19 6.55225 19 5.99996C19 5.44768 18.5523 4.99996 18 4.99996L3.08062 4.99996L5.78087 1.62466C6.12588 1.1934 6.05596 0.564104 5.62469 0.219094C5.19343 -0.125916 4.56414 -0.055994 4.21913 0.375268L0.469009 5.06292C0.422319 5.12128 0.380603 5.18226 0.343861 5.2453C0.133177 5.42864 0 5.69875 0 5.99996C0 6.30118 0.133177 6.57129 0.343861 6.75462C0.380603 6.81766 0.422319 6.87864 0.469009 6.93701L4.21913 11.6247C4.56414 12.0559 5.19343 12.1258 5.62469 11.7808C6.05596 11.4358 6.12588 10.8065 5.78087 10.3753L3.08062 6.99996Z" fill="#1F2E45"/>
</svg>

</span>',
                    )
                );
                ?>

                <?php
                while (have_posts()) :
                    the_post(); ?>

                    <div class="single-case-law-corner-block">
                        <?php the_content(); ?>
                    </div>


                <?php endwhile; // End of the loop.
                ?>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();