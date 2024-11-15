<?php
require '../Config/dbcon.php';

if (isset($_POST['signUp-button'])) {
    $idNumber = mysqli_real_escape_string($conn, $_POST['idNumber']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    if ($role != 'none') {
        if ($idNumber != '' && $password != '') {
            $insert_query = "INSERT INTO userinfo(idNumber, password, role) 
            VALUES('$idNumber', '$password', '$role')";
            $result = mysqli_query($conn, $insert_query);
            if ($result) {
                header('Location:../Pages/home.php');
                exit();
            }
        }
    } else {
        echo 'Please select a role!';
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
        echo 'may error1';
    }
} else {
    echo 'may error';
}
