<?php

// Check value exists.
if( have_rows('page_engine') ):

    // Loop through rows.
    while ( have_rows('page_engine') ) : the_row();

        // Case: Side by Side layout.
        if( get_row_layout() == 'side_by_side' ):
            get_template_part('template-parts/sections/side_by_side');

        // Case: Spacer layout.
        elseif( get_row_layout() == 'spacer' ):
            get_template_part('template-parts/sections/spacer');
        // Do something...

        // Case: Hero layout.
        elseif( get_row_layout() == 'hero' ):
            get_template_part('template-parts/sections/hero');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'events' ):
            get_template_part('template-parts/sections/events');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'articles' ):
            get_template_part('template-parts/sections/articles');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'sponsors' ):
            get_template_part('template-parts/sections/sponsors');
        // Do something...

        // Case: Slider layout.
        elseif( get_row_layout() == 'half_and_half' ):
            get_template_part('template-parts/sections/half_and_half');
        // Do something...



        // Case: Contact layout.
        elseif( get_row_layout() == 'table_block' ):
            get_template_part('template-parts/sections/table_block');
        // Do something...


        // Case: Text Block layout.
        elseif( get_row_layout() == 'text' ):
            get_template_part('template-parts/sections/text_block');


        // Case: Repeater layout.
        elseif( get_row_layout() == 'repeater' ):
            get_template_part('template-parts/sections/repeater');

        // Case: Blockquote layout.
        elseif( get_row_layout() == 'blockquote' ):
            get_template_part('template-parts/sections/blockquote');

        // Case: Info_block layout.
        elseif( get_row_layout() == 'info_block' ):
            get_template_part('template-parts/sections/info_block');

        // Case: Publications layout.
        elseif( get_row_layout() == 'publications' ):
            get_template_part('template-parts/sections/publications');

        // Case: Testimonialslayout.
        elseif( get_row_layout() == 'testimonials' ):
            get_template_part('template-parts/sections/testimonials');

        // Case: Recognition layout.
        elseif( get_row_layout() == 'recognition' ):
            get_template_part('template-parts/sections/recognition');

        // Case: Form layout.
        elseif( get_row_layout() == 'form' ):
            get_template_part('template-parts/sections/form');

        // Case: Reports layout.
        elseif( get_row_layout() == 'reports' ):
            get_template_part('template-parts/sections/reports');

        // Case: Clinics layout.
        elseif( get_row_layout() == 'clinics' ):
            get_template_part('template-parts/sections/clinics');

        // Case: Volunteers layout.
        elseif( get_row_layout() == 'volunteers' ):
            get_template_part('template-parts/sections/volunteers');

        // Case: Faq layout.
        elseif( get_row_layout() == 'faq' ):
            get_template_part('template-parts/sections/faq');

        // Case: Clinic Events layout.
        elseif( get_row_layout() == 'clinic_events' ):
            get_template_part('template-parts/sections/clinic_events');

        // Case: Programming layout.
        elseif( get_row_layout() == 'programming' ):
            get_template_part('template-parts/sections/programming');

        // Case: Text-Text layout.
        elseif( get_row_layout() == 'text_text' ):
            get_template_part('template-parts/sections/text-text');

        // Case: Media Features layout.
        elseif( get_row_layout() == 'media_features' ):
            get_template_part('template-parts/sections/media-features');

        // Case: Supporting Staff layout.
        elseif( get_row_layout() == 'supporting_staff' ):
            get_template_part('template-parts/sections/supporting_staff');

        // Case: Interns layout.
        elseif( get_row_layout() == 'interns' ):
            get_template_part('template-parts/sections/interns');

        // Case: Team layout.
        elseif( get_row_layout() == 'team' ):
            get_template_part('template-parts/sections/team');

        // Case: Newsletter layout.
        elseif( get_row_layout() == 'newsletter_block' ):
            get_template_part('template-parts/sections/newsletter_block');

        // Case: Sponsors List layout.
        elseif( get_row_layout() == 'sponsors_list' ):
            get_template_part('template-parts/sections/sponsors_list');

        // Case: All Events layout.
        elseif( get_row_layout() == 'events_all' ):
            get_template_part('template-parts/sections/events_all');

        // Case: All Events layout.
        elseif( get_row_layout() == 'events_archive' ):
            get_template_part('template-parts/sections/events_archive');

        // Case: All Events layout.
        elseif( get_row_layout() == 'calendar' ):
            get_template_part('template-parts/sections/calendar');

        // Case: All Events layout.
        elseif( get_row_layout() == 'fellowship' ):
            get_template_part('template-parts/sections/fellowship');

        endif;

        // End loop.
    endwhile;

// No value.
else :
    // Do something...
endif;


