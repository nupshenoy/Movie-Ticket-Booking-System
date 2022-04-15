<?php

include("dbcon.php");
if (isset($_POST['submit'])) {
    $m_name =  $_POST['m_name'];
    $m_genre = $_POST['m_genre'];
    $m_director = $_POST['m_director'];
    $m_duration = $_POST['m_duration'];
    $m_language = $_POST['m_language'];
    $m_description = $_POST['m_description'];
    $m_rdate = $_POST['m_rdate'];

    $m_img = $_FILES["m_img"]["name"];
    $type = $_FILES["m_img"]["type"];
    $size = $_FILES["m_img"]["size"];

    if ($size > 4194304) {
        echo "File is too big";
    }

    if (!file_exists("img/" . $_FILES['m_img']['name'])) {

        $stmt = mysqli_prepare($conn, "INSERT into movie(m_name, m_genre, m_director, m_duration, m_language, m_description, m_rdate, m_img) values(?, ?, ?, ?, ?, ?, ?, ?);");
        mysqli_stmt_bind_param($stmt, "ssssssss", $m_name, $m_genre, $m_director, $m_duration, $m_language, $m_description, $m_rdate, $m_img);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            move_uploaded_file($_FILES['m_img']['tmp_name'], "img/" . $_FILES['m_img']['name']);
            header('Location:adminmovie.php');
        } else {
            echo '<script> alert("Could not add movie")</script>';
        }
    } else {
        $stmt = mysqli_prepare($conn, "INSERT into movie(m_name, m_genre, m_director, m_duration, m_language, m_description, m_rdate) values(?, ?, ?, ?, ?, ?, ?);");
        mysqli_stmt_bind_param($stmt, "sssssss", $m_name, $m_genre, $m_director, $m_duration, $m_language, $m_description, $m_rdate);
        $result = mysqli_stmt_execute($stmt);
        header('Location:adminmovie.php');
    }
}

if (isset($_GET['delete'])) {
    $m_id = $_GET['delete'];
    mysqli_query($conn, "DELETE from movie where m_id= $m_id");
    header('Location:adminmovie.php');
}
