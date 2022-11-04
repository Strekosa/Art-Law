<section class="table-block wrapper s">
    <div class="table-main container-boxed flex flex-sm-column ">


        <div class="table-description flex align-start column  w-100-sm ">

            <?php
            $desc = get_sub_field('text');
            if ($desc): ?>
                <?php echo $desc; ?>
            <?php endif; ?>

        </div>
        <div class="table w-100-sm">

            <?php
            $table = get_sub_field('table');


            if (!empty ($table)) {

                echo '<table border="0">';

                if (!empty($table['caption'])) {

                    echo '<caption>' . $table['caption'] . '</caption>';
                }

                if (!empty($table['header'])) {

                    echo '<thead>';

                    echo '<tr>';

                    foreach ($table['header'] as $th) {

                        echo '<th>';
                        echo $th['c'];
                        echo '</th>';
                    }

                    echo '</tr>';

                    echo '</thead>';
                }

                echo '<tbody>';

                foreach ($table['body'] as $tr) {

                    echo '<tr>';

                    foreach ($tr as $td) {

                        echo '<td>';
                        echo $td['c'];
                        echo '</td>';
                    }

                    echo '</tr>';
                }

                echo '</tbody>';

                echo '</table>';
            }
            ?>
            <?php
            $text = get_sub_field('footnotes');
            if ($text): ?>
                <?php echo $text; ?>
            <?php endif; ?>
        </div>
    </div>
</section>