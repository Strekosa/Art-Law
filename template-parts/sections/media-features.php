<section class="media-features">
    <div class="media-features-main container-boxed flex column">
        <?php
        $title = get_sub_field('title');
        if ($title) : ?>
            <h2 class="general"> <?php echo $title; ?></h2>
        <?php endif; ?>
        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('repeater')):?>

            <div class="media-features-list">
                <?php while (have_rows('repeater')): the_row();
                    $text = get_sub_field('text'); ?>
                    <div class="media-features-item ">
                        <?php echo $text; ?>
                    </div>
                <?php endwhile;
                ?>
            </div>

        <?php endif;
        $file = get_sub_field('download'); ?>
        <?php
        if ($file): ?>
            <div class="download pos-rel flex column w-100-sm ">
                <a class="download-link flex "
                   href="<?php echo $file['url']; ?> " download="">Press Release (PDF)</a>
            </div>
        <?php endif; ?>
        <div class="buttons flex flex-xs-column">
            <?php
            $button = get_sub_field('button_left');
            if ($button):
                $button_url = $button['url'];
                $button_title = $button['title'];
                $button_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <a class="button flex align-center justify-center "
                   href="<?php echo esc_url($button_url); ?>"
                   target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
            <?php endif; ?>

            <?php
            $button = get_sub_field('button_right');
            if ($button):
                $button_url = $button['url'];
                $button_title = $button['title'];
                $button_target = $button['target'] ? $button['target'] : '_self';
                ?>
                <a class="button btn flex align-center justify-center "
                   href="<?php echo esc_url($button_url); ?>"
                   target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
            <?php endif; ?>

        </div>
    </div>
</section>