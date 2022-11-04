<section class="info-block wrapper ">
    <div class="container-boxed flex column">

        <div class="info-block-main flex-sm-column">

            <?php
            // Check value exists.
            if (have_rows('download_side')):
                // Loop through rows.
                while (have_rows('download_side')) : the_row();
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $file = get_sub_field('download_file');

                    ?>
                    <div class="download-side pos-rel flex column w-100-sm ">
                        <img src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                        <div class="download-text">
                            <h2><?php echo $title; ?></h2>
                            <?php
                            if ($file): ?>
                                <a class="download-link btn flex align-center justify-center"
                                   href="<?php echo $file['url']; ?> " download="">Download</a>

                            <?php endif; ?>

                        </div>
                    </div>

                <?php
                    // End loop.
                endwhile;
            endif; ?>

            <?php
            if (have_rows('read_side')):
                // Loop through rows.
                while (have_rows('read_side')) : the_row();
                    $title = get_sub_field('title');
                    $image = get_sub_field('image');
                    $link = get_sub_field('button');
                    ?>
                    <div class="read-side pos-rel flex column w-100-sm ">
                        <img src="<?php echo esc_url($image['url']); ?>"
                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                        <div class="read-text">
                            <h2><?php echo $title; ?></h2>
                            <?php
                            if (!empty($link)):
                                ?>
                                <a class="read-link btn flex align-center justify-center"
                                   href="<?php echo esc_url($link['url']); ?>">
                                    <?php echo esc_html($link['title']); ?>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php
                    // End loop.
                endwhile;
            endif;
            ?>
        </div>
    </div>
</section>