<?php
$style = get_sub_field('style');
$width = get_sub_field('width');
$shadow = get_sub_field('box_shadow');
?>
<section class="text-block wrapper <?php echo $style; ?> <?php echo $width; ?>">
    <div class="text-main container-boxed flex column align-center text-center sm-text-start <?php echo $shadow; ?>">
        <div class="text-fuse flex column">
            <?php
            $title = get_sub_field('title');
            if ($title): ?>
                <?php echo $title; ?>
            <?php endif; ?>

                <?php
                $text = get_sub_field('text');
                if (!empty($text)):?>
                <div class="text-text pos-rel">
                    <?php echo $text; ?>
                </div>
                <?php endif; ?>


            <div class="buttons flex  justify-center flex-sm-column w-100-sm">
                <?php
                $link = get_sub_field('button_left');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="button flex align-center justify-center w-100-sm" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

                <?php
                $link = get_sub_field('button_right');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="button btn flex align-center justify-center w-100-sm"
                       href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>