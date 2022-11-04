<?php
/**
 * Template Name: Boards
 */
get_header(); ?>
    <main id="primary" class="site-main">
        <div class="boards wrapper">
            <div class="container-boxed  flex column">

                <?php
                // Get the taxonomy's terms
                $terms = get_terms(

                    array(
                        'post_type' => 'employees',
                        'taxonomy' => 'boards',
                        'orderby' => 'description',
                        'order' => 'ASC',
                        'hide_empty' => true,
                        'childless' => false,
                        'parent' => 0,

                    ),


                );

                // Check if any term exists
                if (!empty($terms) && is_array($terms)):
                    // add links for each category
                    $calc_i = 1;
                    foreach ($terms

                             as $term):

                        $term_child = get_terms('boards', array(
                            'hide_empty' => 0,
                            'parent' => $term->term_id,
                        ));
                        $iso_grid = $calc_i === 1 ? "js-team-grid" : "";
                        $gutter = $calc_i === 1 ? '<div class="gutter-sizer"></div>' : '';
                        #get_term_link($term)
                        echo '<div class=" board board-' . $calc_i . '"  ><div class="board-title flex w-100"><h2 class="secondary"><a href="#"> ' . $term->name . ' </a></h2></div><div class="board-main ' . $iso_grid . ' ">' . $gutter;
                        $ourteam = new WP_Query(
                            array(
                                'post_type' => 'employees',
                                'posts_per_page' => -1,
                                'tax_query' => array(

                                    array(
                                        'taxonomy' => 'boards',
                                        'field' => 'slug',
                                        'terms' => $term->slug,
                                        'include_children' => false,

                                    ),

                                ),

                                'order' => 'ASC',
                            )
                        );

                        if ($ourteam->have_posts()) :
                            $b = 1;
                            while ($ourteam->have_posts()) :
                                $ourteam->the_post();
                                $city = get_field('city');
                                $emeritus = get_field('emeritus');
                                $packery_item = $i = 1 ? 'js-person filter-box__item' : '';

                                ?>
                                <?php if ($calc_i === 1): ?>

                                <div class="flex js-person filter-box__item js-team-grid-item flex-column employee <?php if ($b % 2 == 0) {
                                    echo "even";
                                } ?>">


                                    <?php
                                    if (has_post_thumbnail()):?>
                                        <div class="employee-image flex justify-center align-center">
                                            <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="employee-main">
                                        <p class="employee-name">
                                            <?php the_title(); ?>
                                        </p>
                                        <?php
                                        $positions = get_the_terms(get_the_ID(), 'positions');
                                        get_the_terms(get_the_ID(), 'positions'); ?>
                                        <?php
                                        if ($positions):?>
                                            <div class="employee-position flex">
                                                <?php foreach ($positions as $position): ?>
                                                    <p>
                                                        <?php echo $position->name; ?>
                                                    </p>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($city = get_field('city')): ?>
                                            <p class="employee-city"><?php echo $city; ?></p>
                                        <?php endif; ?>

                                        <span class="js-open-details">Learn more...</span>


                                    </div>

                                </div>
                                <div class="filter-box__item--full-width js-team-grid-item person-details employee-content flex column">

                                    <div class="flex employee-wrap justify-between flex-sm-column ">
                                        <div class="flex">
                                            <?php
                                            if (has_post_thumbnail()):?>
                                                <div class="employee-image flex justify-center align-center">
                                                    <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="employee-title">
                                                <h5 class="bold"><?php the_title(); ?></h5>
                                                <?php
                                                if ($positions):?>
                                                    <div class="employee-position flex">
                                                        <?php foreach ($positions as $position): ?>
                                                            <p>
                                                                <?php echo $position->name; ?>
                                                            </p>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>

                                            </div>
                                        </div>
                                        <div class="employee-text">
                                            <?php the_content(); ?>
                                        </div>
                                    </div>
                                </div>

                                <?php $b++; ?>
                            <?php else: ?>
                                <div class="flex   flex-column employee">

                                    <div class="employee-image flex justify-center align-center">

                                        <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>

                                    </div>
                                    <div class="employee-main">
                                        <p class="employee-name">
                                            <?php the_title(); ?>
                                            <?php if ($emeritus = get_field('emeritus')): ?>
                                                <span> <?php echo $emeritus; ?></span>
                                            <?php endif; ?>
                                        </p>
                                        <?php
                                        $positions = get_the_terms(get_the_ID(), 'positions');
                                        get_the_terms(get_the_ID(), 'positions'); ?>
                                        <?php
                                        if ($positions):?>
                                            <div class="employee-position flex">
                                                <?php foreach ($positions as $position): ?>
                                                    <p>
                                                        <?php echo $position->name; ?>
                                                    </p>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if ($city = get_field('city')): ?>
                                            <p class="employee-city"><?php echo $city; ?></p>
                                        <?php endif; ?>
                                        <span>Learn more...</span>
                                    </div>

                                </div>
                            <?php endif; ?>
                            <?php
                            endwhile;

                        endif;
                        wp_reset_postdata();
                        echo '</div>';

                        if ($term_child):

                            foreach ($term_child as $term_ch) :
                                #get_term_link($term)
                                echo '<div class=" board-child"><div class="board-title flex w-100"><h2 class="secondary"><a href="#"> ' . $term_ch->name . ' </a></h2></div><div class="board-main ">';
                                $ourteam_ch = new WP_Query(
                                    array(
                                        'post_type' => 'employees',
                                        'posts_per_page' => -1,
                                        'tax_query' => array(
                                            array(
                                                'taxonomy' => 'boards',
                                                'field' => 'slug',
                                                'terms' => $term_ch->slug,
                                                'include_children' => false,
                                            )
                                        ),

                                        'order' => 'ASC',
                                    )
                                );

                                if ($ourteam_ch->have_posts()) :
                                    while ($ourteam_ch->have_posts()) : $ourteam_ch->the_post(); ?>

                                        <div class="flex flex-column employee">

                                            <div class="employee-image flex justify-center align-center">

                                                <?php the_post_thumbnail('small', array('class' => 'img-responsive')); ?>

                                            </div>
                                            <div class="employee-main">
                                                <p class="employee-name">
                                                    <?php the_title(); ?>
                                                </p>
                                                <?php
                                                $positions = get_the_terms(get_the_ID(), 'positions');
                                                get_the_terms(get_the_ID(), 'positions'); ?>
                                                <?php
                                                if ($positions):?>
                                                    <div class="employee-position flex">
                                                        <?php foreach ($positions as $position): ?>
                                                            <p>
                                                                <?php echo $position->name; ?>
                                                            </p>
                                                        <?php endforeach; ?>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($city = get_field('city')): ?>
                                                    <p class="employee-city"><?php echo $city; ?></p>
                                                <?php endif; ?>

                                            </div>

                                        </div>
                                        <div class="filter-box__item--full-width js-team-grid-item person-details employee-content">

                                            <div class="employee-content">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                    <?php
                                    endwhile;
                                endif;
                                wp_reset_postdata();
                                echo '</div></div>';
                            endforeach;
                        endif;

                        echo '</div>';
                        $calc_i++;

                    endforeach;


                endif;
                ?>

            </div>
        </div>
    </main>
<?php
get_footer();