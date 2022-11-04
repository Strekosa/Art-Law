<?php
$layout = get_sub_field('wrapper_theme');
$image = get_sub_field('image');
$mediaside = get_sub_field('image_side');
$style = get_sub_field('style');
$width = get_sub_field('width');
$height = get_sub_field('height');
$title = get_sub_field('title');
?>
<section class="side-by-side wrapper ">
    <div class="container-boxed flex column">
        <?php if (!empty($title)): ?>
            <h2 class="general"><?php echo $title; ?></h2>
        <?php endif; ?>
        <div class="flex flex-wrap justify-center  flex-sm-column <?php echo $mediaside; ?> <?php echo $style; ?> <?php echo $width; ?> <?php echo $height; ?>">

            <?php
            // Check value exists.
            if (have_rows('content')):
                // Loop through rows.
                while (have_rows('content')) : the_row();
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $contacts = get_sub_field('contacts');
                    $description = get_sub_field('description');
                    $button_left = get_sub_field('button_left');
                    $button_right = get_sub_field('button_right');
                    $link = get_sub_field('link');
                    $form = get_sub_field('form');
                    $mobile = get_sub_field('mobile');
                    ?>
                    <div class="content-side flex column w-100-sm  <?php echo $mobile; ?>">
                        <div class="fuse-block flex column align-start">
                            <?php if (!empty($title)): ?>
                                <h2><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <?php if (!empty($subtitle)): ?>
                                <h4><?php echo $subtitle; ?></h4>
                            <?php endif; ?>

                            <div class="content-contacts flex align-center">
                                <?php if (have_rows('socials')): ?>
                                    <div class="socials-list">
                                        <?php while (have_rows('socials')): the_row();
                                            $icon = get_sub_field('icon');
                                            $link = get_sub_field('link');
                                            ?>
                                            <div class="flex align-center">
                                                <?php if (($icon) && ($link)): ?>

                                                    <a class="flex" href="<?php echo $link['url']; ?>"><img
                                                                src="<?php echo $icon['sizes']['thumbnail'] ?>"
                                                                alt=""></a>

                                                <?php endif; ?>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                // check if the nested repeater field has rows of data
                                if (have_rows('contacts')):?>
                                    <div class="contacts-list">
                                        <?php while (have_rows('contacts')): the_row();
                                            $email = get_sub_field('email');
                                            $phone = get_sub_field('phone');
                                            ?>
                                            <div class=" flex align-center ">

                                                <?php
                                                if ($email): ?>
                                                    <a class="email-btn"
                                                       href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                                                <?php endif; ?>

                                                <?php if ($phone): ?>
                                                    <a href="tel:<?php echo($phone); ?>">
                                                        <?php echo $phone; ?></a>
                                                <?php endif; ?>

                                            </div>
                                        <?php endwhile;
                                        ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <?php if (!empty($description)): ?>
                                <div class="description"><?php echo $description; ?></div>
                            <?php endif; ?>

                            <div class="buttons flex flex-sm-column ">
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

                            <div class="link flex flex-sm-column w-100-sm">
                                <?php
                                $link = get_sub_field('link');
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="button flex align-center justify-center w-100-sm"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                                <?php endif; ?>
                            </div>

                            <div class="form flex align-center flex-md-column flex-sm-column w-100-md w-100-sm">
                                <?php
                                if ($form):
                                    foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
                                        $cf7_id = $p->ID;
                                        echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
                                    endforeach;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>

                <?php
                    // End loop.
                endwhile;
            endif; ?>
            <?php
            if (have_rows('media')):
                // Loop through rows.
                while (have_rows('media')) : the_row();
                    ?>
                    <div class="image-side  pos-rel flex column w-100-sm ">

                        <?php
                        if (get_row_layout() == 'image'):
                            $image = get_sub_field('image');
                            $text = get_sub_field('text');
                            ?>

                            <img src="<?php echo esc_url($image['url']); ?>"
                                 alt="<?php echo esc_attr($image['alt']); ?>"/>
                            <div class="image-side__text">
                                <?php echo $text; ?>
                            </div>

                        <?php
                        elseif (get_row_layout() == 'image_gallery'):
                            $images = get_sub_field('images');
                            ?>
                            <div class="gallery flex">
                                <?php
                                $i = 1;
                                ?>
                                <?php foreach ($images as $image):
                                    ?>

                                    <div class="gallery-item">
                                        <img src="<?php echo esc_url($image['url']); ?>"
                                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                                    </div>

                                    <?php
                                    $i++;
                                    if ($i > 3) {
                                        break;
                                    }
                                endforeach; ?>
                            </div>

                        <?php
                        elseif (get_row_layout() == 'text'):
                            $title = get_sub_field('title');
                            ?>
                            <div class="image-side__text">
                                <?php
                                if (!empty($title)):?>
                                    <h2><?php echo $title; ?></h2>
                                <?php endif; ?>
                            </div>
                        <?php
                        elseif
                        (get_row_layout() == 'form'):
                            $form = get_sub_field('form');
                            if ($form):
                                foreach ($form as $p): // variable must NOT be called $post (IMPORTANT)
                                    $cf7_id = $p->ID;
                                    echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
                                endforeach;
                            endif;
                        endif; ?>
                    </div>
                <?php
                    // End loop.
                endwhile;
            endif; ?>
        </div>
    </div>
</section>