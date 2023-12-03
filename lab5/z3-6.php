<!DOCTYPE html>
<html>

<head>
    <title>z3-1.php</title>
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
    $cust = array(
        "cnum"=> 2001,
        "cname"=> "Hoffman",
        "city"=> "London",
        "snum"=> 1001,
        "rating"=> 100,
    );
    echo "Массив<br>";
    foreach ($cust as $key => $value) {
        echo "key = ". $key ." & value = ". $value ."<br>";   
    }
    echo "<br><br>";

    asort($cust);  
    echo "Массив сортированный по значениям<br>";
    foreach ($cust as $key => $value) {
        echo "key = ". $key ." & value = ". $value ."<br>";   
    }
    echo "<br><br>";


    ksort($cust);  
    echo "Массив сортированный по названиям<br>";
    foreach ($cust as $key => $value) {
        echo "key = ". $key ." & value = ". $value ."<br>";   
    }
    echo "<br><br>";

    sort($cust);  
    echo "Массив сортированный с помощью sort()<br>";
    foreach ($cust as $key => $value) {
        echo "key = ". $key ." & value = ". $value ."<br>";   
    }
    echo "<br><br>";
    ?>
</body>

</html>