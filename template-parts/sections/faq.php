<?php
$style = get_sub_field('style');
?>
<section class="faq <?php echo $style ; ?>">
    <div class="faq-main container-boxed column">
        <div class="faq-wrap ">
            <?php if ($field = get_sub_field('title')): ?>
                <h2 class="secondary text-center sm-text-start"><?php echo $field; ?></h2>
            <?php endif; ?>
            <?php if (have_rows('faq')): ?>

                <ul class="accordion-list ">

                    <?php while (have_rows('faq')): the_row();

                        $title = get_sub_field('question');
                        $text = get_sub_field('answer');
                        ?>

                        <li class="">

                            <div class="question flex align-center justify-between">
                                <div class="div">
                                    <h5><?php echo $title; ?></h5>
                                </div>
                                <svg class="style-initial close" width="14" height="14" viewBox="0 0 14 14"
                                     fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7 0V14M0 7H14" stroke="#A3303A" stroke-width="2"/>
                                </svg>
                                <svg class="style-initial open" width="14" height="2" viewBox="0 0 14 2" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 1H14" stroke="#A3303A" stroke-width="2"/>
                                </svg>
                                <svg class="style-red" width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7 4.64696L2.35304 0L0 2.35304L5.82348 8.17652C6.47325 8.82629 7.52675 8.82629 8.17652 8.17652L14 2.35304L11.647 0L7 4.64696Z" fill="#83303A"/>
                                </svg>
                            </div>
                            <div class="answer">
                                <?php echo $text; ?>
                            </div>
                        </li>
                    <?php
                    endwhile; ?>
                </ul>

            <?php endif; ?>
        </div>
        <div class="faq-text flex justify-center align-center">
            <?php
            $text = get_sub_field('text');
            if (!empty($text)):?>
                <h5> <?php echo $text; ?></h5>
            <?php endif; ?>
            <?php
            $link = get_sub_field('link');
            if (!empty($link)):
                ?>
                <a class="faq-link btn" href="<?php echo esc_url($link['url']); ?>">
                    <?php echo esc_html($link['title']); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--breadcrumbs-->