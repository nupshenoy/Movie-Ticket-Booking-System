<?php

include("dbcon.php");
session_start();
if (isset($_POST['submit'])) {
    //$s_id =  $_POST['s_id'];
    $s_screenno = $_POST['s_screenno'];
    $s_cinema = $_POST['s_cinema'];
    $s_time = $_POST['s_time'];
    $s_date = $_POST['s_date'];
    $s_price = $_POST['s_price'];
    $s_capacity = $_POST['s_capacity'];
    $m_id = $_POST['m_id'];


    $stmt = mysqli_prepare($conn, "INSERT into shows(m_id, s_screenno, s_cinema, s_time, s_date, s_price, s_capacity) values(?, ?, ?, ?, ?, ?, ?);");
    mysqli_stmt_bind_param($stmt, "iisssii", $m_id, $s_screenno, $s_cinema, $s_time, $s_date, $s_price, $s_capacity);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['message'] = "Record has been saved!";
        $_SESSION['msg_type'] = "Success!";


        header('Location:showsad.php');
    } else {
        echo mysqli_error($conn);
        echo '<script> alert("Could not add show")</script>';
    }
}
if (isset($_GET['delete'])) {
    $s_id = $_GET['delete'];
    mysqli_query($conn, "DELETE from shows where s_id= $s_id");

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "Danger!";

    header('Location:showsad.php');
}
