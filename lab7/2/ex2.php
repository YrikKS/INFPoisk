<?php
// Проверяем, была ли отправлена форма
include("mysql_fun.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $birthday = $_POST['birthday'];

    if (!empty($name) && !empty($mail)) {
        addRow($name, $mail, $city, $address, $birthday);
    } else {
        echo 'Поля "name" и "mail" являются обязательными для заполнения.';
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Форма для заполнения таблицы notebook</title>
</head>

<body>
    <h2>Заполните данные для таблицы notebook</h2>
    <form method="POST" action="ex2.php">
        <label for="name">Имя:</label>
        <input type="text" name="name" required><br>
        <label for="mail">Электронная почта:</label>
        <input type="email" name="mail" required><br>
        <label for="city">Город:</label>
        <input type="text" name="city"><br>
        <label for="address">Адрес:</label>
        <input type="text" name="address"><br>
        <label for="birthday">Дата рождения:</label>
        <input type="date" name="birthday"><br>
        <button type="submit">Отправить</button>
    </form>
</body>

</html>