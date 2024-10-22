<?php
session_start();
include('dbcon.php');

if (isset($_POST['delete_student'])) {
    $student_id = $_POST['delete_student'];

    try {
        $query = "DELETE FROM student WHERE id=:stud_id";
        $statement = $conn->prepare($query);
        $data = [':stud_id' => $student_id];

        $query_execute = $statement->execute($data);
        if ($query_execute) {
            $_SESSION['message'] = "Elimino Correctamente";
            header('Location:index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "No elimino";
            header('Location:index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['actualizar_student_btn'])) {
    $student_id = $_POST['stundt_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    try {

        $query = "UPDATE student SET fullname=:fullname,email=:email,phone=:phone,course=:course WHERE id=:stud_id LIMIT 1";
        $statement = $conn->prepare($query);
        $data = [
            ':fullname' => $fullname,
            ':email' => $email,
            ':phone' => $phone,
            ':course' => $course,
            ':stud_id' => $student_id,
        ];
       
        $query_execute =  $statement->execute($data);

        if ($query_execute) {
            $_SESSION['message'] = "Actualizo Correctamente";
            header('Location:index.php');
            exit(0);
        } else {
            $_SESSION['message'] = "No Actualizo Correctamente";
            header('Location:index.php');
            exit(0);
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

if (isset($_POST['save_student_btn'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $query = "INSERT INTO student (fullname,email,phone,course) VALUES (:fullname,:email,:phone,:course)";
    $query_run = $conn->prepare($query);


    $data = [
        ':fullname' => $fullname,
        ':email' => $email,
        ':phone' => $phone,
        ':course' => $course,
    ];

    $query_execute =  $query_run->execute($data);

    if ($query_execute) {
        $_SESSION['message'] = "Inserto Correctamente";
        header('Location:index.php');
        exit(0);
    } else {
        $_SESSION['message'] = "No Inserto Correctamente";
        header('Location:index.php');
        exit(0);
    }
}
