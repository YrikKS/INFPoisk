<?php
include("mysql_fun.php");
echo "<form method='POST' action='ex42.php'>\n";
$id = isset($_GET['id']) ? $_GET['id'] : "";

$id_2 = isset($_POST['id_2']) ? $_POST['id_2'] : "";
$field_name = isset($_POST['field_name']) ? $_POST['field_name'] : ""; 
$field_value = isset($_POST['field_value']) ? $_POST['field_value'] : ""; 

if (!empty($id_2) && !empty($field_name)) {
    updateField($id_2, $field_name, $field_value);
    header("Location: ex3.php"); 
    exit();
}


echo "<select name='field_name'>
<option value='name'>name</option>
<option value='city'>city</option>
<option value='address'>address</option>
<option value='birthday'>birthday</option>
<option value='mail'>mail</option>
</select>";

echo "<input type='text' name='field_value' placeholder='Новое значение'>";

echo "<input type='hidden' name='id_2' value='$id'>";

echo "<br><button type='submit'>Заменить</button>";
echo "</form>";