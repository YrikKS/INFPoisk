<?php
function vid_structure($conn, $table)
{
  $sql = "DESC $table";
  $result = mysqli_query($conn, $sql);

  echo "<h4>Структура таблицы $table:</h4>";
  echo "<ul>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>{$row['Field']} ({$row['Type']})</li>";
  }
  echo "</ul>";
}

function vid_content($conn, $table)
{
  $sql = "SELECT * FROM $table";
  $result = mysqli_query($conn, $sql);

  echo "<h4>Содержимое таблицы $table:</h4>";
  echo "<table>";
  addTableHeaders($conn, $table);
  // Вывод строк таблицы
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    foreach ($row as $value) {
      echo "<td>$value</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}

function addTableHeaders($conn, $table) {
  global $rus_names;

  $rus_names = array(
    "snum" => "Номер продавца",
    "sname" => "Имя продавца",
    "city" => "Город",
    "comm" => "комиссионные продавца",

    "cnum" => "номер покупателя",
    "cname" => "имя покупателя",
    "rating" => "рейтинг покупателя",

    "onum" => "номер заказа",
    "amt" => "сумма заказа",
    "odate" => "дата заказа",
  );
  $sql = "DESC $table";
  $result = mysqli_query($conn, $sql);

  echo "<tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    $newName = $rus_names[$row['Field']];
    $columName = $row['Field'];
    echo "<th>$newName<br>$columName</th>";
  }
  echo "</tr>";
}
?>