<?php
$servername = "localhost";
$username = "root";
$dbname = "sample";

$conn = mysqli_connect($servername, $username, null, $dbname);
if (!$conn) {
  die("Connection not connect" . mysqli_connect_error());
}

$query = "INSERT INTO notebook (name, city, address, birthday, mail) VALUES
  ('Марина', 'Москва', '123', '1990-01-01', 'marina@example.com'),
  ('Катя', 'Рим', '456', '1995-02-15', 'kate@example.com'),
  ('Боб', 'Новосибирск', '789', '1985-07-10', 'bob@example.com')";

mysqli_query($conn, $query);

mysqli_close($conn);

echo "Три записи успешно добавлены в таблицу notebook.";
?>