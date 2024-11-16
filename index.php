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
    <!-- CSS Link -->
    <link rel="stylesheet" href="Asset/CSS/index.css">
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
    <div class="form-container">
        <div class="title">
            <h1>WELCOME</h1>
        </div>
        <div class="message-container">
            <?php
            if (isset($_SESSION['message'])) {
                echo htmlspecialchars($_SESSION['message']);
                unset($_SESSION['message']); // aalisin after ma display
            }
            ?>
        </div>
        <form action="Function/function.php" method="POST">
            <!-- Sign Up Form -->
            <div class="sign-up-container">
                <div class="input-container">
                    <label for="idNumber">ID Number: </label>
                    <input type="text" name="idNumber" id="idNumber" placeholder="2022000423" pattern="[0-9]{10}" title="Please input number only." required>
                </div>
                <div class="input-container">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" pattern="(?=.*[a-zA-Z])(?=.*[0-9]).{8,}" title="Please input at least 8 alphanumeric characters." required>
                </div>
                <div class="option-container">
                    <label for="role">Role:</label>
                    <select name="role" id="role">
                        <option value="none" class="options">Choose Here</option>
                        <option value="student" class="options">Student</option>
                        <option value="faculty" class="options">Faculty</option>
                        <option value="staff" class="options">Staff</option>
                    </select>
                </div>
                <div class="button-container">
                    <button class="button" type="submit" name="signUp-button">Sign Up</button>
                    <p>Already have an account?<button class="log-in" id="logIn" onclick="showLogIn()">Log In</button></p>
                </div>
            </div>
        </form>
        <form action="Function/function.php" method="POST">
            <!-- Log In Form -->
            <div class="log-in-container">
                <div class="input-container">
                    <label for="idNumber">ID Number: </label>
                    <input type="text" name="idNumber" id="idNumber" placeholder="2022000423" pattern="[0-9]{10}" title="Please input number only." required>
                </div>
                <div class="input-container">
                    <label for="password">Password: </label>
                    <input type="password" name="password" id="password" pattern="(?=.*[a-zA-Z])(?=.*[0-9]).{8,}" title="Please input at least 8 alphanumeric characters." required>
                </div>
                <div class="button-container">
                    <button class="button" type="submit" name="logIn-button">Log In</button>
                    <p>Don't have an account?<button class="sign-up" id="signUp" onclick="showSignUp()">Sign Up</button></p>
                </div>
            </div>
        </form>
    </div>
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


</body>

</html>