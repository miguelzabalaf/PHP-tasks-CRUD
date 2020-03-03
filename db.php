<?php

session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'php_crud'
)or die(mysqli_erro($mysqli));

// Si existe este objeto de conexión entonces..
// if (isset($conn)) {
//     echo "La base de datos está conectada";
// }

?>