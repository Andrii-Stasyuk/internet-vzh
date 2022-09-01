<?php
   $mysqli = new mysqli('ys467864.mysql.tools', 'ys467864_db', '4F33ayhN', 'ys467864_db');
    if (mysqli_connect_errno()) {
        printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
        exit;
     }
  ?> 