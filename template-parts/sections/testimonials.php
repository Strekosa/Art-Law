<script type="text/javascript">

    jQuery(document).ready(function () {
        jQuery('.testimonials-slider').slick({
            dots: false,
            arrows: true,
            autoplay: false,
            autoplaySpeed: 2000,
            infinite: true,
            speed: 500,
            slidesToShow: 4,
            slidesToScroll: 1,
            prevArrow: $('.prev'),
            nextArrow: $('.next'),
            responsive: [
                {
                    breakpoint: 1500,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },
                {
                    breakpoint: 599,
                    settings: {

                        variableWidth: true,
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                },

            ]

        });


        $('.testimonials-main .slick-slide').each(function () {
            if (!$(this).hasClass('slick-current')) {
                $(this).hover(function () {
                    $('.testimonials-main').addClass('hover-testimonial')
                }, function () {
                    $('.testimonials-main').removeClass('hover-testimonial')
                })
            }

        });


        // $('.testimonials-main .slick-slide.slick-active').mouseenter(function (event) {
        //     $('.testimonials-main .slick-slide.slick-current').removeClass('hover');
        //
        // });
        // $('.testimonials-main .slick-slide.slick-active').mouseleave(function (event) {
        //
        //
        // });

    });
</script>

<script>
    $(document).ready(function () {
        let $selector = $('.read-more-container');
        if ($selector.length) {
            $selector.each(function () {
                let $showChar = 283;
                let $firstTag = $(this).children(":first");
                let $content = $firstTag.html();
                if ($firstTag.length) {
                    if ($content.length > $showChar) {
                        let c = $content.substr(0, $showChar);
                        let h = $content.substr($showChar, $content.length - $showChar);

                        let html = c + '<span class="morecontent">' + h + '</span><span class="morecontent_container"><span class="dots">...</span><a href="#" class="morelink-btn">View More...</a></span>';

                        $firstTag.html(html);
                    }
                    $(this).children().not(":eq(0)").wrapAll('<div class="hiden-wrap" />');
                }

            })

        }

        $(document).on('click', '.morelink-btn', function (e) {
            e.preventDefault();

            if ($(this).parents('.read-more-container').hasClass('open')) {
                $(this).text('View More...').parents('.read-more-container').removeClass('open')
            } else {
                $(this).text('Closed').parents('.read-more-container').addClass('open');

            }

        })
    });
</script>
<section class="testimonials">
    <div class="container-boxed flex column">

        <?php
        $title = get_sub_field('title');
        if ($title): ?>
            <h2 class="general"> <?php echo $title; ?></h2>
        <?php endif; ?>

        <?php
        $subtitle = get_sub_field('subtitle');
        if ($subtitle): ?>
            <h5> <?php echo $subtitle; ?></h5>
        <?php endif; ?>

        <?php
        $featured_posts = get_sub_field('testimonials_list');
        if ($featured_posts): ?>
            <div class="testimonials-main testimonials-slider">
                <?php
                $i = 1;
                foreach ($featured_posts as $post):

                    // Setup this post for WP functions (variable must be named $post).
                    setup_postdata($post); ?>

                    <div class="testimonial pos-rel slick-slid flex column justify-between">
                        <div class="testimonial-content flex column">
                            <svg width="27" height="25" viewBox="0 0 27 25" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 19.7561V25C8.46083 22.439 10.4516 17.0732 10.4516 10.2439V0H0V10.2439H5.10138C5.22581 16.0976 3.98157 18.2927 0 19.7561ZM16.5484 25C25.0092 22.439 27 17.0732 27 10.2439V0H16.5484V10.2439H21.6498C21.7742 16.0976 20.53 18.2927 16.5484 19.7561V25Z"
                                      fill="#83303A"/>
                            </svg>

                            <div class="testimonial-text read-more-container">
                                <?php the_content(); ?>
                                <!--                                     --><?php //echo wp_trim_words(get_the_content(), 44);
                                ?>
                            </div>

                        </div>
                        <div class="testimonial-title">
                            <h6><?php the_title(); ?></h6>
                            <p>
                                <?php
                                $position = get_field('position');
                                if (!empty($position)):?>
                                    <?php echo $position; ?>
                                <?php endif; ?>
                            </p>

                        </div>
                    </div>

                    <?php
                    $i++;
                endforeach; ?>
            </div>
            <?php
            // Reset the global post object so that the rest of the page works correctly.
            wp_reset_postdata(); ?>
        <?php endif; ?>
        <div class="arrows flex justify-between align-center">
            <!-- Next page -->
            <button class="arrow prev flex align-center" <?php echo $the_query->found_posts <= $args['posts_per_page'] ? 'disabled' : ''; ?>
                    data-filter-paged="+">
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.08062 6.99999L18 6.99999C18.5523 6.99999 19 6.55228 19 5.99999C19 5.44771 18.5523 4.99999 18 4.99999L3.08062 4.99999L5.78087 1.62469C6.12588 1.19343 6.05596 0.564135 5.62469 0.219125C5.19343 -0.125885 4.56414 -0.0559635 4.21913 0.375299L0.469009 5.06295C0.422319 5.12131 0.380603 5.18229 0.343861 5.24533C0.133177 5.42867 0 5.69878 0 5.99999C0 6.30121 0.133177 6.57132 0.343861 6.75465C0.380603 6.81769 0.422319 6.87867 0.469009 6.93704L4.21913 11.6247C4.56414 12.056 5.19343 12.1259 5.62469 11.7809C6.05596 11.4359 6.12588 10.8066 5.78087 10.3753L3.08062 6.99999Z"
                          fill="#83303A"/>
                </svg>
                Previos
            </button>
            <button class="arrow next flex align-center" <?php echo $args['paged'] === 1 ? 'disabled' : ''; ?>
                    data-filter-paged="-">
                Next
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M15.9194 6.99999L1 6.99999C0.447716 6.99999 0 6.55228 0 5.99999C0 5.44771 0.447716 4.99999 1 4.99999L15.9194 4.99999L13.2191 1.62469C12.8741 1.19343 12.944 0.564135 13.3753 0.219125C13.8066 -0.125885 14.4359 -0.0559635 14.7809 0.375299L18.531 5.06295C18.5777 5.12131 18.6194 5.18229 18.6561 5.24533C18.8668 5.42867 19 5.69878 19 5.99999C19 6.30121 18.8668 6.57132 18.6561 6.75465C18.6194 6.81769 18.5777 6.87867 18.531 6.93704L14.7809 11.6247C14.4359 12.056 13.8066 12.1259 13.3753 11.7809C12.944 11.4359 12.8741 10.8066 13.2191 10.3753L15.9194 6.99999Z"
                          fill="#83303A"/>
                </svg>
            </button>
        </div>
    </div>
</section>

