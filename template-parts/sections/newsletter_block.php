<section class="newsletter-block wrapper ">
    <div class="container-boxed flex column">
        <div class="newsletter-block-main flex flex-md-column flex-sm-column">
            <div class="newsletter-block-image w-100-sm">
                <?php
                $image = get_sub_field('image');
                if ($image): ?>
                <img src="<?php echo esc_url($image['url']); ?>"
                     alt="<?php echo esc_attr($image['alt']); ?>"/>
                <?php endif; ?>
            </div>

            <div class="newsletter-block-content w-100-sm">
                <?php
                $text = get_sub_field('content');
                if ($text): ?>
                    <?php echo $text; ?>
                <?php endif; ?>
                <?php
                $link = get_sub_field('link');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                    <a class="button flex align-center justify-center "
                       href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>