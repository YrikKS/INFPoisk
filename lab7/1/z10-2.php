<!DOCTYPE html>
<html>

<head>
    <title>Результаты запроса к БД</title>
    <style>
       <?php include('z10-3.css'); ?>
    </style>
    <?php
    include('z10-4.php');
    include('z10-5.php');
    include('z10-6.php');
    ?>
</head>

<body>
    <h1>Результаты запроса к БД</h1>
    <?php
    $conn = connect();
    foreach ($_POST as $key => $value) {  #1
        if (gettype($value) == "array") {  #2
            if($key == 'structure') {
                foreach ($value as $val) {
                    vid_structure($conn, $val);
                }
            }
            if($key == 'content') {
                foreach ($value as $val) {
                    vid_content($conn, $val);
                }
            }
        }
    }
    disconnect($conn)
    ?>
    <a href="z10-1.html">Возврат к выбору таблицы</a>
</body>

</html>