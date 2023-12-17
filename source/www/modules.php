<?php

    function view_media ($dir) {

        $items = scandir ($dir);
        $items = array_diff ($items, array ('.', '..', '.gitkeep'));

        foreach($items as $item) {

            if (is_file ($dir . '/' . $item)) {

                echo <<< EXIT

                    <a href="media/$item">
                        <p>$item</p>
                    </a>

                EXIT;

            };

        };

    };

?>
