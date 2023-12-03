<?php
include("mysql_fun.php");

$id = isset($_POST['id']) ? $_POST['id'] : ""; // Получаем значение переменной $id из скрытого поля формы
$field_name = isset($_POST['field_name']) ? $_POST['field_name'] : ""; // Получаем значение переменной $field_name из выпадающего списка
$field_value = isset($_POST['field_value']) ? $_POST['field_value'] : ""; // Получаем значение переменной $field_value из текстового поля

// Если заданы значения $id и $field_name, обновляем значение поля $field_name на $field_value
if (!empty($id) && !empty($field_name)) {
    updateField($id, $field_name, $field_value);
    header("Location: ex3.php"); // Перенаправляем на страницу ex3.php после обновления данных
    exit();
}


echo "<form method='POST' action='ex4.php'>\n";

$result = getRows();

echo "<table>\n";
getDesc();

while ($a_row = mysqli_fetch_row($result)) {
    $id = $a_row[0];
    echo "<tr>\n";
    foreach ($a_row as $field) {
        echo "<td>$field</td>\n";
    }
    echo "<td>";
    echo "<input type='radio' name='id' value='$id'>";
    echo "</td>";
    echo "</tr>\n";

    echo "<br>";
}
echo "</table>\n";

// Если есть выбранная строка, выводим выпадающий список и текстовое поле для редактирования
if (!empty($id)) {
    echo "<select name='field_name'>
    <option value='name'>name</option>
    <option value='city'>city</option>
    <option value='address'>address</option>
    <option value='birthday'>birthday</option>
    <option value='mail'>mail</option>
  </select>";

    echo "<input type='text' name='field_value' placeholder='Новое значение'>";

    echo "<input type='hidden' name='id' value='$id'>";

    echo "<br><button type='submit'>Заменить</button>";
}

echo "</form>";
