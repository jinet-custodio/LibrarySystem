</html>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../Assets/CSS/home.css" />
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
            <?php
            //add userID to redirect link
            $query = "SELECT * FROM category ORDER BY `category`.`id` ASC";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $category) {
                    //add userid get variable to the href using & (example href="../index.php?category=<?= $category['abbrev']?greaterthan & userID =<?= $userID ? =greaterthan)
            ?>
                    <a href="booklist.php?category=<?= $category['abbrev'] ?>" type="button"><?= $category['name'] ?> </a>
            <?php
                }
            } else {
                echo "<h5> No Record Found </h5>";
            }
            ?>
        </div>

        <h1>Welcome, Bookworms!</h1>

        <div class="count-container">
            <h3>Registered Accounts</h3>
            <?php
            $student_count_query = "SELECT COUNT(*) AS studentNumber FROM userinfo WHERE role = 'student'";
            $student_count_result = mysqli_query($conn, $student_count_query);
            if ($student_count_result) {
                $student_count = mysqli_fetch_assoc($student_count_result);
                $studentNumber = $student_count['studentNumber'];
            }
            ?>
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="../Assets/Images/student.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>
                    <div class="numbers"><?= $studentNumber ?> </div>
                </div>
            </div>
            <?php
            $faculty_count_query = "SELECT COUNT(*) AS facultyNumber FROM userinfo WHERE role = 'faculty'";
            $faculty_count_result = mysqli_query($conn, $faculty_count_query);
            if ($faculty_count_result) {
                $faculty_count = mysqli_fetch_assoc($faculty_count_result);
                $facultyNumber = $faculty_count['facultyNumber'];
            }
            ?>
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="../Assets/Images/faculty.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Faculty</h5>
                    <div class="numbers"><?= $facultyNumber ?> </div>
                </div>
            </div>
            <?php
            $staff_count_query = "SELECT COUNT(*) AS staffNumber FROM userinfo WHERE role = 'staff'";
            $staff_count_result = mysqli_query($conn, $staff_count_query);
            if ($staff_count_result) {
                $staff_count = mysqli_fetch_assoc($staff_count_result);
                $staffNumber = $staff_count['staffNumber'];
            }
            ?>
            <div class="card" style="width: 15rem;">
                <img class="card-img-top" src="../Assets/Images/employee.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Staff</h5>
                    <div class="numbers"><?= $staffNumber ?> </div>
                </div>
            </div>
        </div>

        <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>