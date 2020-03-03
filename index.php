<?php include("includes/header.php");?>
<!-- AQUÍ VA TODO EL CÓDIGO DEL CONTENIDO -->

<div class="container">
    <div class="container__form">
        <form action="save_task.php" method="POST" class="form">
            <div class="container__form__title">
                <h6>Título</h6>
                <input type="text" name="title" class="container__form--title" placeholder="Título de la tarea" autofocus>
            </div>

            <div class="container__form__description">
                <h6>Descripción</h6>
                <textarea name="description" id="" cols="30" rows="5" placeholder="Descripción de la tarea" class="container__form--description" maxlength="125"></textarea>
            </div>

            <div class="button">
                <input type="submit" value="Guardar tarea" class="button--button" name="save_task">
            </div>
        </form>

    </div>

    <div class="container__tasks">

    <?php if(isset($_SESSION['message'])) { ?>
            <div class="container">    
                <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show w-100" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            
    <?php session_unset(); } ?>

        <?php
        $query = "SELECT * FROM task";
        $result_tasks = mysqli_query($conn, $query);
        
        while($row = mysqli_fetch_array($result_tasks)) { ?>


            <div class="task">

            <div class="task__container">
                <div class="task__title">
                    <span><?php echo $row['title']; ?></span>
                </div>

                <div class="task__description">
                    <span><?php echo $row['description']; ?></span>
                </div>

                <div class="task__timestamp">
                    <span><?php echo $row['created_at'] ?></span>
                </div>
            </div>  

            <div class="task__options">
                <div class="task__options__delete">
                    <a href="delete_task.php?id=<?php echo $row['id'] ?>"><i class="fas fa-trash-alt"></i></a>
                </div>
                <div class="task__options__edit">
                    <a href="edit.php?id=<?php echo $row['id'] ?>"><i class="fas fa-marker"></i></a>
                </div>
            </div>

            </div>

        <?php } ?>
        

        

        


    </div>
</div>

<!-- AQUÍ VA TODO EL CÓDIGO DEL CONTENIDO -->
<?php include("includes/footer.php");?>
    
