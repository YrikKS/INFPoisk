<?php

/* Заменить цикл foreach в листинге ls10-4.php
   Листинг 10-6. Чтение данных произвольной формы
           с проверкой типов
*/

foreach ($_POST as $key => $value) {  #1
    if (gettype($value) == "array") {  #2
        print "$key = <br>\n";
        foreach ($value as $v) {
            print "$v<br>";
        }
    }  #2

    else {
        print "$key = $value<br>\n";
    }
}  #1
