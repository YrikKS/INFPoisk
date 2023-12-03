<!DOCTYPE html>
<html>

<head>
    <title>Выбор расположения текста в таблице</title>
</head>
<style>
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    form {
        width: 300px;
    }

    .text-center {
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <?php
        // Задаем значения по умолчанию
        $align = "left";
        $valign = array("top");

        // Проверяем, если форма была отправлена
        if (isset($_POST['submit'])) {
            // Получаем значения из формы
            $align = $_POST['align'];
            $valign = isset($_POST['valign']) ? $_POST['valign'] : array();
        }
        ?>

        <h2 class="text-center">Выберите расположение текста:</h2>
        <form action="z4-2.php" method="post" class="text-center">
            <input type="radio" name="align" value="left" <?php if ($align == "left") echo "checked"; ?>> Слева<br>
            <input type="radio" name="align" value="center" <?php if ($align == "center") echo "checked"; ?>> По центру<br>
            <input type="radio" name="align" value="right" <?php if ($align == "right") echo "checked"; ?>> Справа<br>
            <h2>Выберите вертикальное расположение текста:</h2>
            <input type="checkbox" name="valign[]" value="top" <?php if (in_array("top", $valign)) echo "checked"; ?>> Верх<br>
            <input type="checkbox" name="valign[]" value="middle" <?php if (in_array("middle", $valign)) echo "checked"; ?>> По центру<br>
            <input type="checkbox" name="valign[]" value="bottom" <?php if (in_array("bottom", $valign)) echo "checked"; ?>> Низ<br>
            <br>
            <input type="submit" name="submit" value="Выполнить">
        </form>

        <br>

        <?php
        echo '<table border="1" cellspacing="0" cellpadding="10">';
        echo '<tr>';
        echo '<td width="100" height="100" align="' . $align . '" valign="' . implode(' ', $valign) . '">Текст</td>';
        echo '</tr>';
        echo '</table>';
        ?>
    </div>
</body>

</html>