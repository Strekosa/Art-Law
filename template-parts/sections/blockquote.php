<section class="blockquote">
    <div class="container-boxed">

        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('blockquote_list')): ?>

        <div class="blockquote-main flex justify-center"
        ">
        <?php while (have_rows('blockquote_list')): the_row();
            $name = get_sub_field('name');
            $image = get_sub_field('image');
            $text = get_sub_field('text');

            ?>
            <div class="blockquote-item flex flex-sm-column">
                <div class="blockquote-text ">
                    <?php echo $text; ?>
                </div>
                <div class="flex justify-center">
                    <div class="blockquote-image">
                        <img src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                    </div>
                    <div class="blockquote-name flex column">
                        <?php echo $name; ?>
                    </div>
                </div>
            </div>
        <?php endwhile;
        ?>
    </div>

    <?php endif; ?>


    </div>
</section>