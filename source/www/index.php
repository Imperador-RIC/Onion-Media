<!DOCTYPE html>
<html lang="en" dir="ltr">
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

                <li hidden>All Media</li>
                <li hidden>Search Media</li>
                <li hidden>Modify Media</li>
                <li hidden>Dark/Light</li>

            </ul>

        </nav>

    </header>

    <main>

    <div>

        <h3>Main media without folders:</h3>

    </div>

        <div class="content">

            <?php

                require_once "modules.php";

                $dir = "media";

                view_media ($dir);

            ?>

        </div>

    </main>

</body>
</html>
