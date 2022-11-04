<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Example
 */

?>

<footer id="colophon" class="site-footer ">
    <div class="footer-main">
        <div class="footer-wrap container-boxed flex">

            <div class="footer-socials flex">
                <div class="instagram">
                    <h5>Instagram</h5>
                    <div class="instagram-posts">

                        <div class="instagram-post ">
                            <img src="/wp-content/uploads/2022/07/Rectangle-25.png" alt="">
                        </div>
                        <div class="instagram-post">
                            <img src="/wp-content/uploads/2022/07/Rectangle-26.png" alt="">
                        </div>
                        <div class="instagram-post ">
                            <img src="/wp-content/uploads/2022/07/Rectangle-27.png" alt="">
                        </div>
                        <div class="instagram-post ">
                            <img src="/wp-content/uploads/2022/07/Rectangle-28.png" alt="">
                        </div>
                        <div class="instagram-post">
                            <img src="/wp-content/uploads/2022/07/Rectangle-29.png" alt="">
                        </div>
                        <div class="instagram-post">
                            <img src="/wp-content/uploads/2022/07/Rectangle-30.png" alt="">
                        </div>
                        <div class="instagram-post">
                            <img src="/wp-content/uploads/2022/07/Rectangle-31.png" alt="">
                        </div>
                        <div class="instagram-post">
                            <img src="/wp-content/uploads/2022/07/Rectangle-32.png" alt="">
                        </div>
                        <div class="instagram-post">
                            <img src="/wp-content/uploads/2022/07/Rectangle-33.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="twitter">
                    <h5>Twitter</h5>
                    <div class="twitter-post">
                        <img src="/wp-content/uploads/2022/07/image-1.png" alt="">
                    </div>
                </div>
            </div>

            <div class="disclaimer">
                <div class="disclaimer-text">
                    <?php if ($copyright = get_field('disclamer', 'options')): ?>
                        <?php echo $copyright; ?>
                    <?php endif; ?>
                </div>
                <div class="footer-search pos-rel">
                    <?php echo get_search_form(); ?>
                </div>
                <div class="conditions">
                    <?php if ($copyright = get_field('privacy_policy', 'options')): ?>
                        <?php echo $copyright; ?>
                    <?php endif; ?>
                </div>
            </div>

        </div>


    </div>
    <div class="copyright">
        <div class="copyright-wrap flex container-boxed">
            <?php if ($copyright = get_field('copyright', 'options')): ?>
                <?php echo $copyright; ?>
            <?php endif; ?>
        </div>
    </div>


</footer><!-- #colophon -->
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<?php wp_footer(); ?>


