<?php
$style = get_sub_field('style');
?>
<section class="repeater <?php echo $style; ?>">


    <?php
    // check if the nested repeater field has rows of data
    if (have_rows('repeater_list')):
        while (have_rows('repeater_list')) :
            the_row();
            ?>


            <?php
            if (get_row_layout() == 'cards'):
                $title = get_sub_field('title');
                $cards_list = get_sub_field('cards');

                ?>
                <div class="container-boxed flex column">
                    <div class="cards-title">
                        <?php if ($field = get_sub_field('title')): ?>
                            <h2 class="general"><?php echo $field; ?></h2>
                        <?php endif; ?>

                        <?php if ($field = get_sub_field('subtitle')): ?>
                            <?php echo $field; ?>
                        <?php endif; ?>

                    </div>

                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('cards')):?>

                        <div class="cards-main">
                            <?php while (have_rows('cards')): the_row();
                                $title = get_sub_field('title');
                                $text = get_sub_field('text');
                                $link = get_sub_field('link');

                                ?>
                                <div class="cards-item flex column pos-rel">
                                    <div class="cards-text">
                                        <h3> <?php echo $title; ?></h3>
                                        <?php echo $text; ?>
                                        <p><?php echo $desc; ?></p>
                                    </div>


                                    <?php
                                    if ($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="cards-link pos-abs static-state"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="<?php echo esc_attr($link_target); ?>">
                                            <svg class="" width="61" height="16" viewBox="0 0 61 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M60.7071 8.70711C61.0976 8.31658 61.0976 7.68342 60.7071 7.29289L54.3431 0.928932C53.9526 0.538408 53.3195 0.538408 52.9289 0.928932C52.5384 1.31946 52.5384 1.95262 52.9289 2.34315L58.5858 8L52.9289 13.6569C52.5384 14.0474 52.5384 14.6805 52.9289 15.0711C53.3195 15.4616 53.9526 15.4616 54.3431 15.0711L60.7071 8.70711ZM0 9H60V7H0V9Z"
                                                      fill="#A3303A"/>
                                            </svg>
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                        <a class="cards-link pos-abs  hover-state"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="<?php echo esc_attr($link_target); ?>">

                                            <svg width="31" height="16" viewBox="0 0 31 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M30.7071 8.70711C31.0976 8.31659 31.0976 7.68342 30.7071 7.2929L24.3431 0.928934C23.9526 0.53841 23.3195 0.53841 22.9289 0.928934C22.5384 1.31946 22.5384 1.95262 22.9289 2.34315L28.5858 8L22.9289 13.6569C22.5384 14.0474 22.5384 14.6805 22.9289 15.0711C23.3195 15.4616 23.9526 15.4616 24.3431 15.0711L30.7071 8.70711ZM-8.74228e-08 9L30 9L30 7L8.74228e-08 7L-8.74228e-08 9Z"
                                                      fill="#A3303A"/>
                                            </svg>
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>

                    <?php endif; ?>

                </div>
            <?php
            elseif
            (get_row_layout() == 'internship_programs'):
                $title = get_sub_field('title');
                $description = get_sub_field('desc');
                $programs = get_sub_field('internship_programs_list');
                ?>
                <div class="internship-programs-wrap container-boxed flex column ">
                    <div class="internship-programs-title justify-between">
                        <?php if ($field = get_sub_field('title')): ?>
                            <?php echo $field; ?>
                        <?php endif; ?>

                        <?php if ($description = get_sub_field('desc')): ?>
                            <div class="internship-programs-desc">  <?php echo $description; ?></div>
                        <?php endif; ?>

                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('internship_programs_list')):?>
                        <div class="internship-programs-main">
                            <?php while (have_rows('internship_programs_list')): the_row();
                                $title = get_sub_field('title');
                                $description = get_sub_field('description');
                                ?>
                                <div class="internship-programs-item justify-between">

                                    <h3> <?php echo $title; ?></h3>
                                    <div><?php echo $description; ?></div>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            elseif
            (get_row_layout() == 'programs'):
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $programs = get_sub_field('programs');
                ?>
                <div class="container-boxed flex flex-md-column flex-sm-column">
                    <div class="programs-title">
                        <?php if ($field = get_sub_field('title')): ?>
                            <h2 class="general"><?php echo $field; ?></h2>
                        <?php endif; ?>

                        <?php if ($field = get_sub_field('subtitle')): ?>
                            <?php echo $field; ?>
                        <?php endif; ?>

                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('programs')):?>
                        <div class="programs-main">
                            <?php while (have_rows('programs')): the_row();
                                $title = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                $link = get_sub_field('link');
                                ?>
                                <div class="programs-item flex column justify-between">

                                    <h3> <?php echo $title; ?></h3>
                                    <p><?php echo $subtitle; ?></p>


                                    <?php
                                    if ($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="programs-link"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="<?php echo esc_attr($link_target); ?>">
                                            <svg class="" width="61" height="16" viewBox="0 0 61 16" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M60.7071 8.70711C61.0976 8.31658 61.0976 7.68342 60.7071 7.29289L54.3431 0.928932C53.9526 0.538408 53.3195 0.538408 52.9289 0.928932C52.5384 1.31946 52.5384 1.95262 52.9289 2.34315L58.5858 8L52.9289 13.6569C52.5384 14.0474 52.5384 14.6805 52.9289 15.0711C53.3195 15.4616 53.9526 15.4616 54.3431 15.0711L60.7071 8.70711ZM0 9H60V7H0V9Z"
                                                      fill="#A3303A"/>
                                            </svg>
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            elseif
            (get_row_layout() == 'sessions'):
                $title = get_sub_field('title');
                $programs = get_sub_field('sessions_list');
                ?>
                <div class="container-boxed flex column">
                    <div class="sessions-title">
                        <?php if ($field = get_sub_field('title')): ?>
                            <h2 class="general"><?php echo $field; ?></h2>
                        <?php endif; ?>

                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('sessions_list')):?>
                        <div class="sessions-main">
                            <?php while (have_rows('sessions_list')): the_row();
                                $icon = get_sub_field('icon');
                                $text = get_sub_field('text');
                                ?>
                                <div class="sessions-item flex align-center">

                                    <div class="sessions-img flex justify-center align-center">
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                             alt="<?php echo esc_attr($icon['alt']); ?>"/>
                                    </div>
                                    <div class="sessions-text">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            elseif
            (get_row_layout() == 'reports'):
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $reports = get_sub_field('reports_list');
                ?>
                <div class="container-boxed flex column">
                    <div class="reports-list-title text-center xs-text-start">
                        <?php if ($title): ?>
                            <h2 class="general"><?php echo $title; ?></h2>
                        <?php endif; ?>
                        <?php if ($subtitle): ?>
                            <?php echo $subtitle; ?>
                        <?php endif; ?>

                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('reports_list')):?>
                        <div class="reports-list-main">
                            <?php while (have_rows('reports_list')): the_row();
                                $icon = get_sub_field('icon');
                                $text = get_sub_field('text');
                                ?>
                                <div class="reports-list-item flex column ">
                                    <?php if ($icon) : ?>

                                        <div class="reports-list-icon">
                                            <img src="<?php echo esc_url($icon['url']); ?>"
                                                 alt="<?php echo esc_attr($icon['alt']); ?>"/>
                                        </div>
                                    <?php endif; ?>
                                    <h3> <?php echo $text; ?></h3>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            elseif
            (get_row_layout() == 'sponsors'):
                $title = get_sub_field('title');
                $sponsors = get_sub_field('sponsors_list');
                ?>
                <div class="container-boxed flex column">
                    <div class="sponsors-list-title text-center xs-text-start">
                        <?php if ($title): ?>
                            <h2 class="general"><?php echo $title; ?></h2>
                        <?php endif; ?>

                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('sponsors_list')):?>
                        <div class="sponsors-list-main">
                            <?php while (have_rows('sponsors_list')): the_row();
                                $image = get_sub_field('image');
                                $text = get_sub_field('text');
                                ?>
                                <div class="sponsors-list-item flex  ">
                                    <div class="sponsors-list-image">
                                        <img src="<?php echo esc_url($image['url']); ?>"
                                             alt="<?php echo esc_attr($image['alt']); ?>"/>
                                    </div>
                                    <?php echo $text; ?>

                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            elseif

            (get_row_layout() == 'team'):
                $sponsors = get_sub_field('team_list');
                ?>
                <div class="container-boxed flex column">

                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('team_list')):?>
                        <div class="team-list-main hide-on-mobile">
                            <?php while (have_rows('team_list')): the_row();
                                $image = get_sub_field('image');
                                $name = get_sub_field('name');
                                $text = get_sub_field('content');
                                ?>
                                <div class="team-list-item flex column ">
                                    <div class="team-list-header flex align-end">
                                        <div class="team-list-image">
                                            <img src="<?php echo esc_url($image['url']); ?>"
                                                 alt="<?php echo esc_attr($image['alt']); ?>"/>
                                        </div>
                                        <div class="team-list-name flex column">
                                            <?php echo $name; ?>
                                        </div>
                                    </div>
                                    <div class="team-list-content">
                                        <?php echo $text; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                        <div class="team-list-main show-on-mobile">
                            <?php while (have_rows('team_list')): the_row();
                                $image = get_sub_field('image');
                                $name = get_sub_field('name');
                                $text = get_sub_field('content');
                                ?>
                                <div class="team-list-item flex column ">
                                    <div class="team-list-header flex align-end">
                                        <div class="team-list-image">
                                            <img src="<?php echo esc_url($image['url']); ?>"
                                                 alt="<?php echo esc_attr($image['alt']); ?>"/>
                                        </div>
                                        <div class="team-list-name flex column">
                                            <?php echo $name; ?>
                                        </div>
                                    </div>
                                    <div class="team-list-content">
                                        <p class="excerpt"> <?php echo wp_trim_words($text, 90); ?></p>
                                        <p class="full-text"> <?php echo $text; ?></p>
                                        <button id="btn-show">
                                            Learn more
                                        </button>

                                        <script>

                                            $(document).ready(function () {
                                                updateContainer();
                                                $(window).resize(function () {
                                                    updateContainer();

                                                });
                                            });

                                            function updateContainer() {
                                                var $containerWidth = $(window).width();
                                                if ($containerWidth <= 768) {
                                                    $('.full-text').hide();
                                                    $('#btn-show').click((e) => {
                                                        e.preventDefault();
                                                        $('.text-text').removeClass('overlay');

                                                        $('#btn-show').hide();

                                                    })
                                                }
                                            }
                                        </script>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>

                </div>

            <?php
            elseif
            (get_row_layout() == 'involve'):
                $title = get_sub_field('title');
                $involve = get_sub_field('involve');
                ?>
                <div class="container-boxed flex column">
                    <div class="involve-title">
                        <?php if ($field = get_sub_field('title')): ?>
                            <h2 class="general"><?php echo $field; ?></h2>
                        <?php endif; ?>


                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('involve_list')):?>
                        <div class="involve-main">
                            <?php while (have_rows('involve_list')): the_row();
                                $title = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                $link = get_sub_field('link');
                                ?>
                                <div class="involve-item flex column align-start">

                                    <h3> <?php echo $title; ?></h3>
                                    <p class="hide-on-mobile"><?php echo $subtitle; ?></p>
                                    <p class="show-on-mobile"> <?php echo wp_trim_words($subtitle, 9); ?></p>

                                    <?php
                                    if ($link):
                                        $link_url = $link['url'];
                                        $link_title = $link['title'];
                                        $link_target = $link['target'] ? $link['target'] : '_self';
                                        ?>
                                        <a class="button involve-link flex align-center justify-center"
                                           href="<?php echo esc_url($link_url); ?>"
                                           target="<?php echo esc_attr($link_target); ?>">
                                            <?php echo esc_html($link_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>


        <?php
        endwhile;
    endif; ?>


</section>