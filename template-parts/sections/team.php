
<script>
    $(document).ready(function() {
        let $selector = $('.read-more-container');
        if ($selector.length) {
            $selector.each(function () {
                let $showChar = 620;
                let $firstTag = $(this).children(":first");
                let $content = $firstTag.html();
                if ($firstTag.length) {
                    if ($content.length > $showChar) {
                        let c = $content.substr(0, $showChar);
                        let h = $content.substr($showChar, $content.length - $showChar);

                        let html = c + '<span class="morecontent">' + h + '</span><span class="morecontent_container">...<a href="#" class="morelink-btn">Learn More...</a></span>';

                        $firstTag.html(html);
                    }
                    $(this).children().not(":eq(0)").wrapAll('<div class="hiden-wrap" />');
                }

            })

        }

        $(document).on('click','.morelink-btn', function (e) {
            e.preventDefault();
            $(this).hide().parents('.read-more-container').addClass('open')
        })
    });
</script>

<section class="team wrapper">
    <div class=" container-boxed flex column ">

        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $arg = array(
            'post_type' => 'employees',
            'orderby' => 'description',
            'order' => 'ASC',
            'hide_empty' => true,
            'tax_query' => array(
                array(
                    'taxonomy' => 'team', // Taxonomy, in my case I need default post categories
                    'field' => 'slug',
                    'terms' => 'team', // Your category slug (I have a category 'interior')
                ),
            )
        );

        $the_query = new WP_Query($arg);
        $counter = $the_query->found_posts;
        if ($the_query->have_posts()) : ?>

            <div class="team-main">
                <?php while ($the_query->have_posts()) :
                $the_query->the_post();
                $do_not_duplicate = $post->ID;
                $position = get_field('position');
                $field = get_field('footnote');
                ?><!-- BEGIN of Post -->

                <div class="team-item flex column pos-rel">
                    <div class="team-header flex align-end">
                        <div class="team-image">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <div class="team-name flex column">
                          <h3><?php the_title(); ?></h3>
                         <p> <?php echo $position; ?></p>
                        </div>
                    </div>
                    <div class="team-content hide-medium-down">
                        <?php the_content(); ?>
                        <?php if ($field ): ?>
                            <div class="footnote">
                                <?php echo $field; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="team-content show-medium-down read-more-container">
                        <?php the_content(); ?>
                        <?php if ($field ): ?>
                            <div  class="footnote"><?php echo $field; ?></div >
                        <?php endif; ?>
                    </div>
                </div>
                <?php
                endwhile; ?><!-- END of Post -->
            </div><!-- END of .post-type -->
        <?php endif;
        wp_reset_query(); ?>
    </div>
</section>
