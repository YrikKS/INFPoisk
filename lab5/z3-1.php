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

        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php
    $diagonalColor = 'blue';
    $diagoanlTextColor = 'white';
    echo '<table>';
    $i = 1;
    while ($i <= 10) {
        echo '<tr>';
        $j = 1;
        while ($j <= 10) {
            echo '<td';
            if ($i == $j) {
                echo ' style="background-color:' . $diagonalColor . '; color:' . $diagoanlTextColor . ' "';
            }
            echo '>' . ($i * $j) . '</td>';
            $j++;
        }
        echo '</tr>';
        $i++;
    }
    echo '</table>';
    ?>
</body>

</html>