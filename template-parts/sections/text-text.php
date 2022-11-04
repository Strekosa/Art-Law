<?php
$style = get_sub_field('style');

?>
<section class="text-text wrapper ">
    <div class="container-boxed flex column">

        <div class="text-text-main <?php echo $style; ?>">

            <?php
            // Check value exists.
            if (have_rows('left_side')):
                // Loop through rows.
                while (have_rows('left_side')) : the_row();
                    ?>
                    <div class="left-side flex column w-100-sm">

                        <?php
                        if (get_row_layout() == 'left_content'):
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $button = get_sub_field('button_left');
                            ?>
                            <div class="fuse-block flex column align-start">
                                <div>
                                    <?php if (!empty($title)): ?>
                                        <?php echo $title; ?>
                                    <?php endif; ?>
                                    <?php if (!empty($text)): ?>
                                        <?php echo $text; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="buttons flex ">
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
                        <?php endif; ?>
                    </div>

                <?php
                    // End loop.
                endwhile;
            endif;

            ?>


            <?php
            if (have_rows('right_side')):
                // Loop through rows.
                while (have_rows('right_side')) : the_row();
                    ?>
                    <div class="right-side  pos-rel flex column w-100-sm ">

                        <?php
                        if (get_row_layout() == 'right_content'):
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $button_left = get_sub_field('button_left');
                            $button_right = get_sub_field('button_right');
                            ?>

                            <div class="fuse-block flex column align-start">
                                <div>
                                    <?php if (!empty($title)): ?>
                                        <?php echo $title; ?>
                                    <?php endif; ?>
                                    <?php if (!empty($text)): ?>
                                        <?php echo $text; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="buttons flex ">
                                    <?php
                                    $button = $button_left;
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
                                    $button = $button_right;
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

                        <?php endif; ?>
                    </div>
                <?php
                    // End loop.
                endwhile;

            endif;

            ?>

        </div>
    </div>
</section>