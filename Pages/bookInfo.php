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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/CSS/bookinfo.css" />


</head>

<body>
    <form action="../function/logOut.php" method="POST">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: rgb(248, 238, 238);">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Pages/home.php">
                    <img src="../Assets/Images/library.png" alt="Logo" width="80" height="auto" class="d-inline-block">
                    BASC LIBRARY
                </a>

                <nav class="navbar bg-body-tertiary">
                    <form class="container-fluid justify-content-start">
                        <button class="btn btn-outline-success me-2" type="submit" id="logOut" value="logOut"
                            name="logOut">Log Out</button>

                    </form>
                </nav>
            </div>
        </nav>
    </form>

    <div class="sidebar">
        <a class="home" href="../Pages/home.php"> <img src="../Assets/Images/homeicon.png" class="homeicon">Home</a>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $query = "SELECT * FROM category ORDER BY `category`.`id` ASC";
        $result = mysqli_query($conn, $query);
        $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

        if (mysqli_num_rows($result) > 0) {
            while ($cat = mysqli_fetch_assoc($result)) {
                $isActive = ($cat['abbrev'] == $selectedCategory) ? 'active' : '';
        ?>
        <a href="booklist.php?category=<?= $cat['abbrev'] ?>" class="<?= $isActive ?>"><?= $cat['name'] ?></a>
        <?php
            }
        } else {
            echo "<h5>No Record Found</h5>";
        }
        ?>
    </div>


    <div class="container">
        <?php
    //add userID to redirect link
    $query = "SELECT * FROM books WHERE book_ID ='$bookID'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $book = mysqli_fetch_assoc($result)
    ?>

        <div class="pic">
            <?php
                if ($book['cover'] == '') {
                    echo '<img src="../assets/images/no-cover.png" alt="No Cover Found">';
                } else {
                    echo '<img src="../assets/images/books/' . $book['category'] . '/' . $book['cover'] . '" alt="Book Cover">';
                }
                ?>
        </div>
        <div class="title">
            <h3> <?= $book['name'] ?></h3>
        </div>

        <div class="info">
            <h5>Author/s: <?= $book['author'] ?></h5>
            <h5> Publication Date: <?= $book['date_published'] ?></h5>

        </div>

        <div class="description">
            <p><?= $book['description'] ?> </p>
        </div>

        <div class="readnow">
            <a type="button" class="btn btn-success"
                href="/pages/bookInfo.php?bookID=<?= $bookID ?>&category=<?= $category ?>" target="_blank">
                Start
                Reading! </a>

            <a type="button" class="btn btn-warning" href="/pages/booklist.php?category=<?= $category ?>"> Go back</a>
        </div>



        <?php

    } else {
        echo "<h5> No Record Found </h5>";
    }
    ?>

        <div class="buttons">

        </div>
    </div>
</body>

</html>