<?php
require '../config/dbcon.php';
session_start();
$bookID = mysqli_real_escape_string($conn, $_GET['bookID']);
$category = mysqli_real_escape_string($conn, $_GET['category']);
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
    <style>
        h1 {
            text-align: center !important;
            width: 100%;
            font-size: 3.5vw;

        }

        h3 {
            margin-left: 2vw;
            font-size: 2.5vw;

        }

        .container {
            width: 80% !important;
            border: 2px solid black;
            display: grid;
            margin-bottom: 2vw !important;
            padding: 5px;
        }

        .books {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .info {
            width: 50%;
            margin-left: 3vw;

        }

        .pic img {
            width: 15vw !important;
            aspect-ratio: 1/1.5;
            object-fit: contain;
            margin: auto !important;
        }

        .pic {
            float: right;
            width: 20vw;
            aspect-ratio: 1/1.5;
            padding: 0 !important;
            display: flex;
            align-items: center;
        }

        .custom-btn {
            background-color: rgb(239, 143, 0);
            padding: 3px 6px !important;
            width: 30% !important;
        }

        .custom {
            background-color: #137901;
            padding: 5px 10px !important;
            float: right !important;
        }

        .custom,
        .custom-btn {
            color: rgb(234, 231, 231);
            border-color: rgb(21, 20, 20);
            border-radius: 3vw !important;
            font-size: 1.5vw;
        }

        .toprow {
            width: 95%;
            display: flex;
            flex-wrap: nowrap;
            height: 25vw;
            justify-content: space-around;
        }

        p {
            font-size: 1.5vw;
        }

        h5 {
            margin-left: 2vw;
            font-size: 1.8vw;
        }

        .buttons {
            width: 30%;
            margin: 1.5vw auto;
        }

        .readnow {
            margin-right: 3vw;
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
    <?php
    //add userID to redirect link
    $query = "SELECT * FROM books WHERE book_ID ='$bookID'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result)
    ?>
        <div class="toprow">
            <div class="pic">
                <?php
                if ($book['cover'] == '') {
                    echo '<img src="../assets/images/no-cover.png" alt="No Cover Found">';
                } else {
                    echo '<img src="../assets/images/books/' . $book['category'] . '/' . $book['cover'] . '" alt="Book Cover">';
                }
                ?>
            </div>
            <div class="info">
                <h3> <?= $book['name'] ?></h3>
                <h5>by <?= $book['author'] ?></h5>
                <h5> Year Published: <?= $book['date_published'] ?></h5>
                <div class="readnow">
                    <a type="button" class="btn custom" href="/pages/bookInfo.php?bookID=<?= $bookID ?>&category=<?= $category ?>" target="_blank"> Start Reading! </a>
                </div>
            </div>

        </div>
        <div class="container">
            <p><?= $book['description'] ?> </p>
        </div>
    <?php

    } else {
        echo "<h5> No Record Found </h5>";
    }
    ?>

    <div class="buttons">
        <a type="button" class="btn custom-btn" href="/pages/booklist.php?category=<?= $category ?>"> Go back</a>
    </div>
</body>

</html>