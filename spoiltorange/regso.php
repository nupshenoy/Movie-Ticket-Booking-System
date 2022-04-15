<?php
include "dbcon.php";

if (isset($_POST['submit'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pwd = $_POST['c_pwd'];
    $c_phno = $_POST['c_phno'];

    //$q = "INSERT into customer(c_name, c_email, c_phno, c_pwd) values $c_name, $"

    $stmt = mysqli_prepare($conn, "INSERT into customer(c_name, c_email, c_phno, c_pwd) values(?,?,?,?)");
    mysqli_stmt_bind_param($stmt, "ssis", $c_name, $c_email, $c_phno, $c_pwd);

    if (mysqli_stmt_execute($stmt)) {
        echo '<script>window.location="regsuccess.php"</script>';
    } else {
        echo '<script> alert("Could not register you")</script>';
    }
}
