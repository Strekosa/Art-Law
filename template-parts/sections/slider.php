<?php 
$slider = get_sub_field('slider');
?>

<section class="slider">
    <div class="container">
        <?php
                
        // check if the nested repeater field has rows of data
        if( have_rows('slider') ):
                echo '<div class="notare-slider">';
                
                // loop through the rows of data
                foreach($slider as $slide){
                    echo '<div class="slide"><img src="'.$slide['url'].'" alt="'.$slide['alt'].'"></div>';
                }
                echo '</div>';
        ?>

        <button class="prev">
            
        </button>
        <button class="next">

        </button>

        <?php endif; ?>

        <script>
        $(document).ready(function(){
            $('.notare-slider').slick({
                    arrows: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    prevArrow: $('.prev'),
                    nextArrow: $('.next'),
            });
        });
        </script>
    </div>
</section>