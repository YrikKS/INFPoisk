<?php
include("mysql_fun.php");
echo "<form method='GET' action='ex42.php'>\n";

$result = getRows();

echo "<table>\n";
getDesc();

while ($a_row = mysqli_fetch_assoc($result)) {
    $id_1 = &$a_row['id'];
    echo "<tr>\n";
    foreach ($a_row as $field) {
        echo "<td>$field</td>\n";
    }
    echo "<td>";
    echo "<input type='radio' name='id' value='$id_1'>";
    echo "</td>";
    echo "</tr>\n";

    echo "<br>";
}
echo "</table>\n";
echo "<br><button type='submit'>Заменить</button>";
echo "</form>";
