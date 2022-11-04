<script type="text/javascript">


</script>

<section class="articles wrapper">
    <div class="container-boxed flex column">

        <?php
        $title = get_sub_field('title');
        if ($title) : ?>
            <h2 class="general"> <?php echo $title; ?></h2>
        <?php endif; ?>


        <?php
        $subtitle = get_sub_field('subtitle');
        if ($subtitle) : ?>
            <h6 class="flex justify-between"> <?php echo $subtitle; ?><span class="next-filter-arrow flex align-center justify-center ">
               <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd" clip-rule="evenodd"
                       d="M15.9194 7.00004L1 7.00004C0.447716 7.00004 0 6.55232 0 6.00004C0 5.44775 0.447716 5.00004 1 5.00004L15.9194 5.00004L13.2191 1.62473C12.8741 1.19347 12.944 0.56418 13.3753 0.219171C13.8066 -0.125839 14.4359 -0.0559177 14.7809 0.375344L18.531 5.063C18.5777 5.12136 18.6194 5.18234 18.6561 5.24538C18.8668 5.42871 19 5.69882 19 6.00004C19 6.30125 18.8668 6.57136 18.6561 6.7547C18.6194 6.81774 18.5777 6.87872 18.531 6.93708L14.7809 11.6247C14.4359 12.056 13.8066 12.1259 13.3753 11.7809C12.944 11.4359 12.8741 10.8066 13.2191 10.3753L15.9194 7.00004Z"
                       fill="#E5E5E5"/>
               </svg>
        </span></h6>
        <?php endif; ?>

        <div class="articles-filter filter-slider">
            <?php foreach (filterGetFilteredItems() as $item) : ?>
                <button data-filter-tag="<?php echo $item->id; ?>" class="button filter-button slick-slid">
                    <?php echo sprintf('%s <span>(%d)</span>', $item->name, $item->count); ?>
                </button>
            <?php endforeach; ?>
        </div>

        <?php
        $args = filterGetDefaultQueryArgs();
        $the_query = new WP_Query($args);
        $current_page = $the_query->query_vars['paged'];
        ?>
        <div class=" ">
            <?php
            if ($the_query->have_posts()) : ?>
                <div class="articles-main">
                    <?php

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        get_template_part('template-parts/content');
                    }

                    ?>
                </div>
            <?php endif;
            wp_reset_postdata(); ?>
        </div>

        <div class="articles-arrows flex justify-between align-center">
            <!-- Next page -->
            <button class="prev-arrow flex align-center" <?php echo $the_query->found_posts <= $args['posts_per_page'] ? 'disabled' : ''; ?>
                    data-filter-paged="+">
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M3.08062 6.99999L18 6.99999C18.5523 6.99999 19 6.55228 19 5.99999C19 5.44771 18.5523 4.99999 18 4.99999L3.08062 4.99999L5.78087 1.62469C6.12588 1.19343 6.05596 0.564135 5.62469 0.219125C5.19343 -0.125885 4.56414 -0.0559635 4.21913 0.375299L0.469009 5.06295C0.422319 5.12131 0.380603 5.18229 0.343861 5.24533C0.133177 5.42867 0 5.69878 0 5.99999C0 6.30121 0.133177 6.57132 0.343861 6.75465C0.380603 6.81769 0.422319 6.87867 0.469009 6.93704L4.21913 11.6247C4.56414 12.056 5.19343 12.1259 5.62469 11.7809C6.05596 11.4359 6.12588 10.8066 5.78087 10.3753L3.08062 6.99999Z"
                          fill="black"/>
                </svg>
                Older posts
            </button>
            <button class="next-arrow flex align-center" <?php echo $args['paged'] === 1 ? 'disabled' : ''; ?>
                    data-filter-paged="-">
                Newer posts
                <svg width="19" height="12" viewBox="0 0 19 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M15.9194 6.99999L1 6.99999C0.447716 6.99999 0 6.55228 0 5.99999C0 5.44771 0.447716 4.99999 1 4.99999L15.9194 4.99999L13.2191 1.62469C12.8741 1.19343 12.944 0.564135 13.3753 0.219125C13.8066 -0.125885 14.4359 -0.0559635 14.7809 0.375299L18.531 5.06295C18.5777 5.12131 18.6194 5.18229 18.6561 5.24533C18.8668 5.42867 19 5.69878 19 5.99999C19 6.30121 18.8668 6.57132 18.6561 6.75465C18.6194 6.81769 18.5777 6.87867 18.531 6.93704L14.7809 11.6247C14.4359 12.056 13.8066 12.1259 13.3753 11.7809C12.944 11.4359 12.8741 10.8066 13.2191 10.3753L15.9194 6.99999Z"
                          fill="black"/>
                </svg>
            </button>
        </div>
    </div>
</section>