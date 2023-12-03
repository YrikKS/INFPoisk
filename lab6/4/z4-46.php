<html>

<head>
    <title> Листинг 10-3. HTML-форма с выбором из списка
    </title>
</head>

<body>

    <!--
Здесь в скрипт ls10-4.php передаются:
1) переменная $user
2) массив hobby[] со значениями, которые были выбраны
   в форме
-->

    <form action="ls10-6.php" method="post">

        <p>Введите ваше имя

        <p><input type="text" name="user">

        <p>Что вы любите делать в свободное время <br>
            (можно выбрать несколько вариантов)

        <p><input type="checkbox" name="hobby[]" value="слушать музыку">слушать музыку

        <p><input type="checkbox" name="hobby[]" value="читать книгу">читать книгу

        <p><input type="checkbox" name="hobby[]" value="смотреть телевизор">смотреть телевизор

        <p><input type="checkbox" name="hobby[]" value="гулять на улице">гулять на улице


        <p><input type="submit" value="Выбор сделан">

    </form>
</body>

</html>