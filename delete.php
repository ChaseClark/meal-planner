<?php
    include('mysqli_connect.php');
    session_start();

    $sql = "DELETE FROM meals WHERE meals_id = '{$_GET['delete_id']}'";
    $result = mysqli_query($db,$sql);
    if ($result) {
        header("Location: home.php");
        exit;
    }
    else {
        echo '<div class="container center">
        <h1>Everything is broke. Please go back and try again.</h1>
        <a class="btn" href="home.php">Take Me Back</a>
        </div>';
        exit();
    }
?>