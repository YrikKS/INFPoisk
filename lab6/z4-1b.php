<!DOCTYPE html>
<html>
<head>
  <title>Результат</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
  // Получение значения горизонтального расположения текста
  $align = $_POST['align'];
  // Получение значений вертикального расположения текста
  $valign = $_POST['valign'];

  echo '<table border="1" cellspacing="0" cellpadding="10">';
  echo '<tr>';
  echo '<td width="100" height="100" align="' . $align . '" valign="' . implode(' ', $valign) . '">Текст</td>';
  echo '</tr>';
  echo '</table>';
}
?>

<a href="z4-1a.htm">Назад</a>

</body>
</html>