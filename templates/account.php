<?php
/**
 * Template Name: Account
 */
get_header(); ?>


    <script>
        $(document).ready(function () {

        });
    </script>

    <main id="primary" class="site-main">
        <div class="account wrapper">
            <div class="account-main container-boxed  flex flex-sm-column ">
                <div class="account-resources w-100-sm">
                    <div class="account-resources-title ">
                    <?php the_content(); ?>
                    </div>
                    <?php
                    // check if the nested repeater field has rows of data
                    if (have_rows('resources_list')):?>

                        <div class="account-resources-list">
                            <?php while (have_rows('resources_list')): the_row();
                                $text = get_sub_field('resources_item');
                                $link = get_sub_field('resources_link');
                                ?>
                                <?php
                                if ($link):
                                    $link_url = $link['url'];
                                    $link_title = $link['title'];
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                    ?>
                                    <a class="account-resources-item flex column justify-between"
                                       href="<?php echo esc_url($link_url); ?>"
                                       target="<?php echo esc_attr($link_target); ?>">


                                        <div class="account-resources-text">
                                            <h3> <?php echo esc_html($link_title); ?></h3>
                                            <?php echo $text; ?>
                                        </div>
                                        <svg width="53" height="16" viewBox="0 0 53 16" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path d="M52.0234 8.70711C52.4139 8.31658 52.4139 7.68342 52.0234 7.29289L45.6594 0.928932C45.2689 0.538408 44.6357 0.538408 44.2452 0.928932C43.8547 1.31946 43.8547 1.95262 44.2452 2.34315L49.9021 8L44.2452 13.6569C43.8547 14.0474 43.8547 14.6805 44.2452 15.0711C44.6357 15.4616 45.2689 15.4616 45.6594 15.0711L52.0234 8.70711ZM0.585938 9H51.3163V7H0.585938V9Z"
                                                  fill="#83303A"/>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            <?php endwhile;
                            ?>
                        </div>

                    <?php endif; ?>
                    <div class="account-resources-info">
                        <?php
                        $text = get_field('account_info');
                        if ($text) : ?>
                            <?php echo $text; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div>

                </div>

            </div>
        </div>
    </main>
<?php
get_footer();