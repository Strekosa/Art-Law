<?php
$style = get_sub_field('style');

?>
<section class="fellowship wrapper ">
    <div class="container-boxed flex column">
        <div class="fellowship-main ">

            <div class="left-side flex column w-100-sm">
                <?php $text = get_sub_field('left_side'); ?>
                <div class="left-side-content flex column align-start">
                    <?php if (!empty($text)): ?>
                        <?php echo $text; ?>
                    <?php endif; ?>
                </div>
            </div>


            <div class="right-side  pos-rel flex column w-100-sm ">
                <?php $image = get_sub_field('image');
                $text_right = get_sub_field('text');
                ?>
                <div class="right-side-content flex column ">
                    <div class="right-side-image">
                        <img src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>

                    </div>
                    <div class="right-side-text">
                    <?php if (!empty($text_right)): ?>
                        <?php echo $text_right; ?>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>