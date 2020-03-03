<?php

include("db.php");


if (empty($_POST['title'])) {

    $_SESSION['message'] = "Asigne un título a la tarea.";
    $_SESSION['message_type'] = "warning";

    header("Location: index.php");

  } elseif (is_numeric($_POST['title']) or is_numeric($_POST['description'])) {

    $_SESSION['message'] = "No se permiten sólo números en los parámetros";
    $_SESSION['message_type'] = "warning";

    header("Location: index.php");

  } else {

    if (isset($_POST['save_task'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];

        // INSERTE DENTRO DE LA TABLA TASKT UN TÍTULO Y UNA DESCRIPCIÓN CON LOS VALORES TITLE Y DESCRIPTION
        $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query Failed");
        }

        $_SESSION['message'] = "Se ha guardado la tarea";
        $_SESSION['message_type'] = "success";

        header("Location: index.php");

  } else {
    $_SESSION['message'] = "Ha ocurrido un error";
    $_SESSION['message_type'] = "danger";

    header("Location: index.php");
  }
}



?>