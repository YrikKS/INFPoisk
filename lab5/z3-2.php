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
    $plusColor = 'red';
    $simplaDigitColor = 'blue';
    echo '<table>';
    $i = 1;
    while ($i <= 10) {
        echo '<tr>';
        $j = 1;
        while ($j <= 10) {
            echo '<td';
            if ($i == 1 && $j == 1) {
                echo ' style="color:' . $plusColor . ' "';
                echo '> + </td>';
            } else if ($j == 1) {
                echo ' style="color:' . $simplaDigitColor . ' "';
                echo '>' . ($i) . '</td>';
            } else if ($i == 1) {
                echo ' style="color:' . $simplaDigitColor . ' "';
                echo '>' . ($j) . '</td>';
            } else {
                echo '>' . ($i + $j) . '</td>';
            }
            $j++;
        }
        echo '</tr>';
        $i++;
    }
    echo '</table>';
    ?>
</body>

</html>