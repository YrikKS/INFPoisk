<html>

<head>
    <title>z2-2.php</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>

    <?php

    $lang = isset($_GET['lang']) ? $_GET['lang'] : '';

    if ($lang == 'ru') {
        echo 'Русский';
    } elseif ($lang == 'en') {
        echo 'Английский';
    } elseif ($lang == 'fr') {
        echo 'Французский';
    } elseif ($lang == 'de') {
        echo 'Немецкий';
    } else {
        echo 'Язык неизвестен';
    }

    ?>
</body>

</html>