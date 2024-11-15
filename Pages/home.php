<?php
require '../config/dbcon.php';
session_start();
//$userID = mysqli_real_escape_string($conn, $_GET['id']);
//$_SESSION['userID'] =  $userID;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link rel="icon" type="image/x-icon" href="../Assets/Images/bookshelf.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/assets/css/index.css" />
    <style>
        h1,
        h3 {
            text-align: center !important;
            width: 100%;
        }

        .container {
            width: 40% !important;
            background-color: rgba(206, 206, 206, 0.842);
            border-radius: 2vw;
            float: left;
            display: grid;
            margin-left: 2vw !important;
            margin-bottom: 2vw !important;
        }

        .btn {
            width: 40% !important;
            margin: 10px auto;
        }

        .count {
            float: right !important;
            margin-right: 2vw !important;
            display: block;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .card {
            padding: 10px;
            border: 2px solid black !important;
            text-align: center;
            height: 120px !important;
            width: 40% !important;
            border-radius: 1vw;
            margin: 1vw;
            font-size: 1.5vw !important;
        }

        .numbers {
            background-color: white;
            width: 50%;
            padding: 10px 0;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-primary">
        <span class="navbar-text">
            Dashboard
        </span>
        <a type="button" id="logout">Log Out</a>
        <!-- <a class="navbar-brand fixed-top py-lg-0 padding" href="#"> -->
        <!-- <img src=" ../Assets/Images/logo.jpg" alt="basc-logo" class="d-inline-block align-top img-circle"> -->
        </a>
    </nav>

    <h1>BASC Library System</h1>

    <div class="container">
        <h3>Books</h3>
        <?php
        //add userID to redirect link
        $query = "SELECT * FROM category ORDER BY `category`.`id` ASC";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            foreach ($result as $category) {
                //add userid get variable to the href using & (example href="../index.php?category=<?= $category['abbrev']?greaterthan & userID =<?= $userID ? =greaterthan)
        ?>
                <a href="booklist.php?category=<?= $category['abbrev'] ?>" type="button" class="btn btn-primary"><?= $category['name'] ?> </a>
        <?php
            }
        } else {
            echo "<h5> No Record Found </h5>";
        }
        ?>
    </div>
    <div class="count container">
        <h3>Accounts</h3>
        <div class="cards">
            <div class="card">
                <p> Students </p>
                <div class="numbers"><?= 22 ?> </div>
            </div>
            <div class="card">
                <p> Faculty </p>
                <div class="numbers"><?= 12 ?> </div>
            </div>
            <div class="card">
                <p> Staff </p>
                <div class="numbers"><?= 4 ?> </div>
            </div>
        </div>
    </div>
</body>

</html>
