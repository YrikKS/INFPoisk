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
    function En() { return "Hello!"; }
    function Fr() { return "Bonjour!"; }
    function De() { return "Guten Tag!"; }
    function Ru() { return "Здравствуйте!"; }
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'Ru';
    $color = isset($_GET['color']) ? $_GET['color'] : 'Black';
    
    echo '<p style="color: ' . $color . '">'. $lang() .'</p>';
    ?>
</body>

</html>