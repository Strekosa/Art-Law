<?php
$mobile = get_sub_field('mobile');
?>
<section class="sponsors-section  <?php echo $mobile; ?>">
    <div class="sponsors-section-wrap container-boxed flex column align-center">
        <?php
        $maintitle = get_sub_field('main_title');
        if ($maintitle) : ?>
            <h2 class="general"> <?php echo $maintitle; ?></h2>
        <?php endif; ?>
        <?php
        $subtitle = get_sub_field('subtitle');
        if ($subtitle) : ?>
            <h5 class="text-center"> <?php echo $subtitle; ?></h5>
        <?php endif; ?>

        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('title')):?>
            <div class="sponsors-section-titles flex w-100 ">
                <div class="sponsors-section-container flex justify-center ">
                    <?php
                    $i =1;
                    while (have_rows('title')): the_row();
                        $title = get_sub_field('text'); ?>
                        <div class="sponsors-section-title <?php echo $i; ?>">
                            <h3 class="secondary"> <?php echo $title; ?></h3>
                        </div>
                    <?php
                    $i++;
                    endwhile; ?>
                </div>
            </div>
        <?php
        $i++;
        endif; ?>

        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('logotype_row')):?>
            <div class="sponsors-section-main">
                <?php while (have_rows('logotype_row')): the_row();
                    $alignment = get_sub_field('alignment');
                    $logos = get_sub_field('logos'); ?>
                    <div class="sponsors-section-container ">
                        <div class="sponsors-section-row ">
                            <?php
                            // check if the nested repeater field has rows of data
                            if (have_rows('logos')):?>

                                <div class="sponsors-logo-main flex  <?php echo $alignment; ?>">
                                    <?php while (have_rows('logos')): the_row();
                                        $title = get_sub_field('sponsor_title');
                                        $image = get_sub_field('image');
                                        ?>
                                        <div class="sponsors-logo-item ">
                                            <?php
                                            $title = get_sub_field('sponsor_title');
                                            if ($title) : ?>
                                                <h6> <?php echo $title; ?></h6>
                                            <?php endif; ?>
                                            <div class="sponsors-logo-image ">
                                                <img src="<?php echo esc_url($image['url']); ?>"
                                                     alt="<?php echo esc_attr($image['alt']); ?>"/>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>