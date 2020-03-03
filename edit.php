<?php

include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $title = $row['title'];
            $description = $row['description'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        
        if (empty($title) or is_numeric($title) or is_numeric($description)) {
            header('Location: index.php');

            $_SESSION['message'] = "No se pudo actualizar, recuerda, el título no puede estar vacío y evita Títulos/descipciones con sólo números.";
            $_SESSION['message_type'] = "danger";
        } else {
            
            $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
            mysqli_query($conn, $query);
            header('Location: index.php');
    
            $_SESSION['message'] = "Se ha actualizado correctamente";
            $_SESSION['message_type'] = "success";
        }

    }

?>

<?php include("includes/header.php"); ?>

<div class="container">
    <div class="container__form">
        <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST" class="form">
            <div class="container__form__title">
                <h6>Título</h6>
                <input type="text" name="title" class="container__form--title" placeholder="Título de la tarea" autofocus value="<?php echo $title; ?>">
            </div>

            <div class="container__form__description">
                <h6>Descripción</h6>
                <textarea name="description" id="" cols="30" rows="5" placeholder="Descripción de la tarea" class="container__form--description" maxlength="125"><?php echo $description; ?></textarea>
            </div>

            <button class="btn btn-success" name="update" type="submit">
                Actualizar Tarea
            </button>
        </form>

    </div>
</div>

<?php include("includes/footer.php"); ?>