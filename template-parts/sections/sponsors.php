
<section class="sponsors wrapper">
    <div class="sponsors-main container-boxed ">

        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('sponsors_list')):?>
            <div class="div w-100">
                <?php while (have_rows('sponsors_list')): the_row();
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $images = get_sub_field('gallery');
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    ?>
                    <div class="sponsors-list flex column align-center ">
                        <div class="sponsors-title">
                            <?php
                            $title = get_sub_field('title');
                            if ($title): ?>
                                <h2 class="general text-center"> <?php echo $title; ?></h2>
                            <?php endif; ?>

                            <?php
                            $subtitle = get_sub_field('subtitle');
                            if ($subtitle): ?>
                                <h5 class="text-center"><?php echo $subtitle; ?></h5>
                            <?php endif; ?>
                        </div>
                        <?php
                        if ($images): ?>
                            <div class="sponsors-gallery flex flex-wrap justify-center w-100">
                                <?php foreach ($images as $image): ?>
                                    <div class="sponsor">
                                        <img src="<?php echo esc_url($image['url']); ?>"
                                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                ?>
            </div>
        <?php endif; ?>

    </div>
</section>