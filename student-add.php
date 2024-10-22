<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Insertar datos en la tabla usando PHP PDO</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mt-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message'] ?></h5>
                <?php
                    unset($_SESSION['message']);
                    endif;
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3>Insertar datos en la tabla usando PHP PDO
                            <a href="index.php" class="btn btn-danger float-end">Atras</a>
                        </h3>

                    </div>
                    <div class="card-body">

                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label for="">Nombres</label>
                                <input type="text" name="fullname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="">Course</label>
                                <input type="text" name="course" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student_btn" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>