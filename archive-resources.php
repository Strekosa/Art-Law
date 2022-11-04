<?php
/*
Template Name: Resources
*/
get_header(); ?>

<section class="resources wrapper">
    <div class="resources-main container-boxed flex column align-center">
        <div class="resources-title text-center xs-text-start">
            <?php if ($title = get_field('resources_title ', 'options')): ?>
                <h2 class="general"><?php echo $title; ?></h2>
            <?php endif; ?>

            <?php if ($subtitle = get_field('resources_subtitle ', 'options')): ?>
                <h5> <?php echo $subtitle; ?></h5>
            <?php endif; ?>
        </div>

        <div class="resources-posts flex">
            <?php
            add_filter('pre_get_posts', 'number_of_posts_on_archive');
            function number_of_posts_on_archive($query)
            {

                $query->set('posts_per_page', 999);

                return $query;
            }

            $args = array(
                'post_type' => 'resources',
                'orderby' => 'description',
                'order' => 'ASC',
                'post_per_page' => -1,
                'post_status' => 'publish',
                'hide_empty' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'classes',
                        'terms' => 'special',
                        'field' => 'slug',
                        'operator' => 'NOT IN'
                    )
                ),

            );
            $the_query = new WP_Query($args);
            ?>
            <?php if ($the_query->have_posts()) : ?>

                <?php while ($the_query->have_posts()) :
                    $the_query->the_post();
                    $do_not_duplicate = $post->ID;
                    $link = get_field('resources_link')
                    ?>

                    <div class="resources-item">
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_self';
                            ?>
                            <a class="" href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                            </a>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div>

        <div class="resources-special-title ">
            <?php if ($title_special = get_field('special_resources_title', 'options')): ?>
                <h2 class="general"><?php echo $title_special; ?></h2>
            <?php endif; ?>

        </div>

        <div class="resources-special flex">
            <?php
            $args = array(
                'post_type' => 'resources',
                'orderby' => 'description',
                'order' => 'DESC',
                'post_per_page' => -1,
                'post_status' => 'publish',
                'hide_empty' => true,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'classes',
                        'terms' => 'special',
                        'field' => 'slug',

                    )
                ),

            );
            $the_query2 = new WP_Query($args);
            ?>
            <?php if ($the_query2->have_posts()) : ?>

                <?php while ($the_query2->have_posts()) :
                    $the_query2->the_post();
                    $do_not_duplicate = $post->ID;

                    ?>

                    <a href="<?php the_permalink(); ?>" class="resources-special-item">
                        <div class="resources-special-img">
                            <?php the_post_thumbnail(); ?>
                        </div>
                        <h2> <?php the_title(); ?></h2>
                    </a >

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div>

    </div>
</section>
<script>

    $(document).ready(function () {


    });
</script>

<?php get_footer(); ?>

