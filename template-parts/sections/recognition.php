

<section class="recognition">
    <div class="container-boxed flex column">
        <?php
        $title = get_sub_field('title');
        if ($title) : ?>
            <h2 class="general"> <?php echo $title; ?></h2>
        <?php endif; ?>
        <?php
        // check if the nested repeater field has rows of data
        if (have_rows('recognition_list')):?>

            <div class="recognition-main recognition-slider">
                <?php while (have_rows('recognition_list')): the_row();
                    $title = get_sub_field('text');
                    $link = get_sub_field('link');
                    ?>
                    <div class="recognition-item slick-slid flex column justify-between ">

                        <h3> <?php echo $title; ?></h3>
                        <?php
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ? $link['target'] : '_blank';
                            ?>
                            <a class=""
                               href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>">
                                <?php echo esc_html($link_title); ?>
                                <svg width="13" height="14" viewBox="0 0 13 14" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.631423 12.6621C0.444827 12.8657 0.458578 13.182 0.662138 13.3686C0.865697 13.5552 1.18198 13.5414 1.36858 13.3379L0.631423 12.6621ZM12.4995 0.978281C12.4875 0.7024 12.2542 0.488477 11.9783 0.500472L7.48253 0.695939C7.20665 0.707934 6.99272 0.941304 7.00472 1.21719C7.01671 1.49307 7.25008 1.70699 7.52597 1.695L11.5222 1.52125L11.6959 5.51747C11.7079 5.79335 11.9413 6.00728 12.2172 5.99528C12.4931 5.98329 12.707 5.74992 12.695 5.47403L12.4995 0.978281ZM1.36858 13.3379L12.3686 1.33786L11.6314 0.662138L0.631423 12.6621L1.36858 13.3379Z"
                                          fill="#83303A"/>
                                </svg>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endwhile;
                ?>
            </div>
        <?php endif; ?>
        <div class="arrows flex justify-between align-center show-on-xs">
            <!-- Next page -->
            <button class="arrow prev-button flex align-center" >
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.08062 6.99999L18 6.99999C18.5523 6.99999 19 6.55228 19 5.99999C19 5.44771 18.5523 4.99999 18 4.99999L3.08062 4.99999L5.78087 1.62469C6.12588 1.19343 6.05596 0.564135 5.62469 0.219125C5.19343 -0.125885 4.56414 -0.0559635 4.21913 0.375299L0.469009 5.06295C0.422319 5.12131 0.380603 5.18229 0.343861 5.24533C0.133177 5.42867 0 5.69878 0 5.99999C0 6.30121 0.133177 6.57132 0.343861 6.75465C0.380603 6.81769 0.422319 6.87867 0.469009 6.93704L4.21913 11.6247C4.56414 12.056 5.19343 12.1259 5.62469 11.7809C6.05596 11.4359 6.12588 10.8066 5.78087 10.3753L3.08062 6.99999Z"
                          fill="#83303A"/>
                </svg>
                Back
            </button>
            <button class="arrow next-button flex align-center">
                Next
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M15.9194 6.99999L1 6.99999C0.447716 6.99999 0 6.55228 0 5.99999C0 5.44771 0.447716 4.99999 1 4.99999L15.9194 4.99999L13.2191 1.62469C12.8741 1.19343 12.944 0.564135 13.3753 0.219125C13.8066 -0.125885 14.4359 -0.0559635 14.7809 0.375299L18.531 5.06295C18.5777 5.12131 18.6194 5.18229 18.6561 5.24533C18.8668 5.42867 19 5.69878 19 5.99999C19 6.30121 18.8668 6.57132 18.6561 6.75465C18.6194 6.81769 18.5777 6.87867 18.531 6.93704L14.7809 11.6247C14.4359 12.056 13.8066 12.1259 13.3753 11.7809C12.944 11.4359 12.8741 10.8066 13.2191 10.3753L15.9194 6.99999Z"
                          fill="#83303A"/>
                </svg>
            </button>
        </div>
    </div>
</section>