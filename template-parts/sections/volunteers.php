<?php
$columns = get_sub_field('columns');
?>
<section class="volunteers wrapper">
    <div class="volunteers-main container-boxed column">
        <div class="volunteers-wrap flex column">
            <?php if ($field = get_sub_field('title')): ?>
                <h2 class="general"><?php echo $field; ?></h2>
            <?php endif; ?>
            <?php
            $featured_posts = get_sub_field('volunteers_list');
            if ($featured_posts): ?>

                <div class="volunteers-list">
                    <?php foreach ($featured_posts as $post):
                        $position = get_field('position');
                        $link = get_field('link');
                        ?>

                        <div class="volunteer flex align-center">

                            <div class="volunteer-title flex column">
                                <h5 class="bold"> <?php echo the_title(); ?></h5>
                                <?php if ($position): ?>
                                    <p><?php echo $position; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>

                    <?php endforeach;
                    ?>
                </div>

                <?php
                wp_reset_postdata();
            else: ?>
                <p class="no-volunteers">Coming soon.</p>
            <?php endif; ?>
        </div>

        <?php
        $text = get_sub_field('text');
        if (!empty($text)): ?>
        <div class="volunteers-text flex justify-center align-center">
            <h5> <?php echo $text; ?></h5>
            <?php endif; ?>
            <?php
            $link = get_sub_field('link');
            if (!empty($link)):
            ?>
            <a class="volunteers-link btn" href="<?php echo esc_url($link['url']); ?>">
                <?php echo esc_html($link['title']); ?>
            </a>
        </div>
    <?php endif; ?>

    </div>
</section>