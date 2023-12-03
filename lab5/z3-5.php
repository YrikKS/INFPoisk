<!DOCTYPE html>
<html>

<head>
    <title>z3-1.php</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <?php
    $treug = array();

    for ($n = 1; $n <= 10; $n++) {
        $treug[] = $n * ($n + 1) / 2;
    }
    echo 'Массив треугольник n(n+1)/2 <br>';
    foreach ($treug as $value) {
        echo $value . ' ';
        print("     ");
    }
    echo '<br><br>';
    $kvd = array();
    for ($n = 1; $n <= 10; $n++) {
        $kvd[] = $n * $n;
    }
    echo 'Массива квадратов<br>';
    foreach ($kvd as $value) {
        echo $value;
    }
    echo '<br><br>';

    $rez = array_merge($treug, $kvd);
    echo 'Два массива вместе<br>';
    foreach ($rez as $value) {
        echo $value . ' ';
    }
    echo '<br><br>';


    echo 'Два отсортированых массива<br>';
    sort($rez);
    echo implode(' ', $rez);
    echo '<br><br>';

    echo 'С удаленным первым элементом<br>';
    array_shift($rez); 
    echo implode(' ', $rez);
    echo '<br><br>';


    echo 'С уникальными элементами<br>';
    $rez1 = array_unique($rez);
    echo implode(' ', $rez1);
    echo '<br><br>';
    ?>
</body>

</html>
