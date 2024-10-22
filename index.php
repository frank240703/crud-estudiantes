<?php
session_start();
include('dbcon.php');
?>
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
            <div class="col-md-12 mt-4">
                <?php
                if (isset($_SESSION['message'])) : ?>

                    <h5 class="alert alert-success"><?= $_SESSION['message'] ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif
                ?>
                <div class="card">
                    <div class="card-header">
                        <h3>PHP PDO CRUD
                            <a href="student-add.php" class="btn btn-primary float-end">Agregar Estudiante</a>
                        </h3>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombres</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Curso</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM student";
                                $statemen = $conn->prepare($query);
                                $statemen->execute();
                                $statemen->setFetchMode(PDO::FETCH_OBJ); //PDO::FETCH_ASSOC
                                $result = $statemen->fetchAll();
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row->id; ?></td>
                                            <td><?= $row->fullname; ?></td>
                                            <td><?= $row->email; ?></td>
                                            <td><?= $row->phone; ?></td>
                                            <td><?= $row->course; ?></td>
                                            <td>
                                                <a href="student-edit.php?id=<?= $row->id ?>" class="btn btn-primary">Editar</a>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <button type="submit" name="delete_student" value="<?= $row->id; ?>" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </td>

                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="4">No se encontro nigun registro</td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>