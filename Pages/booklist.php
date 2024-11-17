<?php
// require 'Config/dbcon.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS Link -->
    <link rel="stylesheet" href="Assets/CSS/index.css">
    <!-- font link -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Wendy+One&display=swap');
    </style>
    <!-- ito naman para mahide muna yung log in -->
    <style>
        .log-in-container {
            display: none;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="logo">
            <img src="Assets/Images/BASClogo.png" alt="Basc Logo" class="logo1">
            <img src="Assets/Images/library.png" alt="Basc Library Logo" class="logo2">
        </div>



        <div class="error-message">
            <?php
            if (isset($_SESSION['message'])) {
                echo htmlspecialchars($_SESSION['message']);
                unset($_SESSION['message']); // aalisin after ma display
            }
            ?>
        </div>

        <!-- Sign Up Form -->
        <form action="Function/function.php" method="POST">

            <div class="sign-up-container">


                <div class="input">
                    <input type="text" class="form-control" name="idNumber" id="idNumber"
                        placeholder="ID NUMBER (e.g. 2022000423)" pattern="[0-9]{10}" title="Please input number only."
                        required>

                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        pattern="(?=.*[a-zA-Z])(?=.*[0-9]).{8,}"
                        title="Please input at least 8 alphanumeric characters." required>
                </div>

                <div class="mb-3">
                    <select name="role" id="role" class="form-select">
                        <option value="none" selected>Select an Occupation</option>
                        <option value="student" class="options">Student</option>
                        <option value="faculty" class="options">Faculty</option>
                        <option value="staff" class="options">Staff</option>
                    </select>
                </div>

                <div class="button-container">
                    <button class="btn btn-primary" type="submit" name="signUp-button">Sign Up</button>

                </div>

                <p>Already have an account?<button class="btn btn-success" id="logIn" onclick="showLogIn()">Log
                        In</button>
                </p>
            </div>
        </form>
        <!-- Log In Form -->
        <form action="Function/function.php" method="POST">
            <div class="log-in-container">
                <div class="input">
                    <input type="text" class="form-control" name="idNumber" id="idNumber"
                        placeholder="ID NUMBER (e.g. 2022000423)" pattern="[0-9]{10}" title="Please input number only."
                        required>

                    <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                        pattern="(?=.*[a-zA-Z])(?=.*[0-9]).{8,}"
                        title="Please input at least 8 alphanumeric characters." required>
                </div>


                <div class="button-container">
                    <button class="btn btn-primary" type="submit" name="logIn-button">Log In</button>

                </div>

                <p>Don't have an account?<button class="btn btn-success" id="signUp" onclick="showSignUp()">Sign
                        Up</button>
                </p>

            </div>
        </form>

        <!-- ito para magshow and maghide yung sign up and log in -->
        <script>
            function showSignUp() {
                document.querySelector('.sign-up-container').style.display = 'block';
                document.querySelector('.log-in-container').style.display = 'none';
            }

            function showLogIn() {
                document.querySelector('.sign-up-container').style.display = 'none';
                document.querySelector('.log-in-container').style.display = 'block';
            }
            //  para hindi mag redirect sa sign up pag ishoshow yung error message para sa log in
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('error')) {
                showLogIn();
            }
        </script>
    </div>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>