<?php

define('DB_SERVER', "localhost");
define('DB_USERNAME', "root");
define('DB_PASSW0RD', "");
define('DB_DATABASE', "library");

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSW0RD, DB_DATABASE);

if (!$conn) {
    die("connection failed!" . mysqli_error());
}
