<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">

    <title>Onion Media</title>

</head>

<body>

    <header>

        <h1>Onion Media</h1>
        <h2>Your multimedia sharing center, directly from the onion network</h2>

        <nav>

            <ul type="none">
    
                <a href="index.php" target="_self"><li>Main Media</li></a>
                <!-- These functions will be implemented in the future -->
                <li hidden>Hidden Media</li>
                <li hidden>All Media</li>
                <li hidden>Search Media</li>
                <li hidden>Dark/Light</li>

            </ul>

        </nav>

    </header>

    <main>

        <?php

            $dir = "media";

            $items = scandir($dir);

            foreach($items as $item) {

                if ($item != "." && $item != ".." && $item != ".gitkeep") {

                    if (is_file($dir . '/' . $item) && substr($item, 0, 1) != '.') {

                        echo <<< EXIT

                            <a href="media/$item">
                                <p>$item</p>
                            </a>

                        EXIT;

                    };

                };

            };

        ?>

    </main>

</body>
</html>
