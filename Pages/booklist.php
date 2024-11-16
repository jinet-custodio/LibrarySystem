<?php
require '../config/dbcon.php';
session_start();
//$userID = mysqli_real_escape_string($conn, $_GET['id']);
//$_SESSION['userID'] =  $userID;
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
        h1,
        h3 {
            text-align: center !important;
            width: 100%;
        }

        .container {
            width: 90% !important;
            background-color: rgba(206, 206, 206, 0.842);
            border-radius: 2vw;
            display: grid;
            margin-bottom: 2vw !important;
        }

        .btn {
            width: 40% !important;
            margin: 10px auto;
        }

        .books {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .card {
            padding: 10px;
            border: 2px solid black !important;
            text-align: center;
            width: 30% !important;
            border-radius: 1vw;
            margin: 1vw;
            font-size: 1.5vw !important;
        }

        .pic img {
            margin: 0.4vw;
            width: 110px !important;
            aspect-ratio: 1/1.5;
            border: 4px solid rgb(201, 200, 200);
            object-fit: cover;
        }

        .custom-btn {
            background-color: rgb(239, 143, 0);
            border-color: rgb(21, 20, 20);
            color: rgb(234, 231, 231);
            border-radius: 3vw !important;
            margin: 0.5vw !important;
            padding: 3px 6px !important;
            font-size: 1.3vw;
        }

        input {
            margin: 0.4vw;
            width: 90%;
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
        <?php
        //add userID to redirect link
        $query = "SELECT * FROM category WHERE abbrev ='$category'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            $fetch = mysqli_fetch_assoc($result)
        ?>
            <h3> <?= $fetch['name'] ?> Books</h3>
        <?php

        } else {
            echo "<h5> No Record Found </h5>";
        }
        ?>
        <div class="books">
            <?php
            //add userID to redirect link
            $query = "SELECT * FROM books WHERE category = '$category'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $book) {
            ?>

                    <div class="card">
                        <div class="pic">
                            <?php
                            if ($book['cover'] == '') {
                                echo '<img src="../assets/images/no-cover.png" alt="No Cover Found">';
                            } else {
                                echo '<img src="../assets/images/books/' . $book['category'] . '/' . $book['cover'] . '" alt="Book Cover">';
                            }
                            ?>
                        </div>
                        <input type="text" class="text bold" value="<?= $book['name'] ?>" readonly />
                        <input type="text" class="text bold" value="Author/s: <?= $book['author'] ?>" readonly />
                        <input type="text" class="text bold" value="Date Published: <?= $book['date_published'] ?>" readonly />
                        <div class="buttons">
                            <a type="button" class="btn custom-btn" href="/pages/bookInfo.php?bookID=<?= $book['book_id'] ?>&category=<?= $category ?>"> Read</a>

                        </div>

                    </div>
            <?php
                }
            } else {
                echo "<h5> No Books Found </h5>";
            }
            ?>
        </div>
    </div>

</body>

</html>