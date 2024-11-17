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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/CSS/booklist.css" />

</head>

<body>
    <form action="../function/logOut.php" method="POST">
        <nav class="navbar navbar-expand-lg bg-body-tertiary" style="background-color: rgb(248, 238, 238);">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
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

        <div class="sidebar">
            <a class="home" href="../Pages/home.php"> <img src="../Assets/Images/homeicon.png" class="homeicon">Home</a>
            <?php
    $query = "SELECT * FROM category ORDER BY `category`.`id` ASC";
    $result = mysqli_query($conn, $query);
    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : '';

    if (mysqli_num_rows($result) > 0) {
        // You can either use mysqli_fetch_assoc() inside a while loop
        while ($category = mysqli_fetch_assoc($result)) {
            $isActive = ($category['abbrev'] == $selectedCategory) ? 'active' : '';
    ?>
            <a href="booklist.php?category=<?= $category['abbrev'] ?>"
                class="<?= $isActive ?>"><?= $category['name'] ?></a>
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
                    <input type="text" class="text bold" value="Date Published: <?= $book['date_published'] ?>"
                        readonly />
                    <div class="buttons">
                        <a type="button" class="btn custom-btn"
                            href="/pages/bookInfo.php?bookID=<?= $book['book_id'] ?>&category=<?= $category ?>">
                            Read</a>

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