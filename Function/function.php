<?php
session_start();
require '../Config/dbcon.php';

if (isset($_POST['signUp-button'])) {
    $idNumber = mysqli_real_escape_string($conn, $_POST['idNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    if ($role != 'none') {
        if ($idNumber != '' && $password != '') {
            $check_query = "SELECT * FROM userinfo WHERE idNumber = '$idNumber'";
            $check_result = mysqli_query($conn, $check_query);
            if (mysqli_num_rows($check_result) == 0) {
                $insert_query = "INSERT INTO userinfo(idNumber, password, role) 
                VALUES('$idNumber', '$password', '$role')";
                $result = mysqli_query($conn, $insert_query);
                if ($result) {
                    header('Location:../Pages/home.php');
                    exit();
                }
            } else {
                $_SESSION['message'] = "The user already exists!";
                header('Location:../index.php');
                exit();
            }
        }
    } else {
        $_SESSION['message'] = "Please select an occupation!";
        header('Location:../index.php');
    }
}

if (isset($_POST['logIn-button'])) {
    $idNumber = mysqli_real_escape_string($conn, $_POST['idNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // $role = mysqli_real_escape_string($conn, $_POST['role']);

    $select_query = "SELECT * FROM userinfo WHERE idNumber = '$idNumber' AND password = '$password'";
    $result = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($result) > 0) {
        header('Location:../Pages/home.php');
        exit();
    } else {
        $_SESSION['message'] = "Incorrect ID Number or password!";
        header('Location:../index.php?error=true');
    }
}
