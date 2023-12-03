<?php
function connect($servername = "localhost", $username = "root", $dbname = "sample")
{
  $conn = mysqli_connect($servername, $username, null, $dbname);
  if (!$conn) {
    die("Подключиться не удалось" . mysqli_connect_error());
  }
  return $conn;
}

function addRow($name, $mail, $city, $address, $birthday)
{
  $conn = connect();
  $query = "INSERT INTO notebook (name, city, address, birthday, mail) VALUES ('$name', '$city', '$address', '$birthday', '$mail')";
  mysqli_query($conn, $query);
  mysqli_close($conn);

  echo 'Запись успешно добавлена в таблицу notebook.';
}

function getRows($table = "notebook")
{
  $conn = connect();
  $result = mysqli_query($conn, "SELECT * FROM $table");
  $num_rows = mysqli_num_rows($result); // количество записей в запросе

  echo "<p>В таблице $table содержится $num_rows строк";
  mysqli_close($conn);
  return $result;
}

function getDesc($table = "notebook")
{
  $conn = connect();
  $sql = "DESC $table";
  $result = mysqli_query($conn, $sql);

  echo "<tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    $columName = $row['Field'];
    echo "<th>$columName</th>";
  }
  echo "</tr>";
  mysqli_close($conn);
}

function updateField($id, $field_name, $field_value)
{
  $conn = connect();
  $field_value = mysqli_real_escape_string($conn, $field_value);
  $query = "UPDATE notebook SET $field_name = '$field_value' WHERE id = $id";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}
