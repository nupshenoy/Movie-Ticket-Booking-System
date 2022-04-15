<?php

include "dbcon.php";
session_start();

if (isset($_POST['submit'])) {
    if (isset($_POST['c_email']) && isset($_POST['c_pwd'])) {
        $c_email = $_POST['c_email'];
        $c_pwd = $_POST['c_pwd'];

        if (empty($c_email)) {
            header("Location: homeso.php?error=User Name is required");
            exit();
        } else if (empty($c_pwd)) {
            header("Location: homeso.php?error=Password is required");
            exit();
        } else {
            if (($c_email == "admin@gmail.com") && ($c_pwd === "admin")) {
                header("Location: dashboard.php");
            } else {
                $sql = "SELECT * FROM customer WHERE c_email='$c_email' AND c_pwd='$c_pwd'";

                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['c_email'] === $c_email && $row['c_pwd'] === $c_pwd) {
                        $_SESSION['c_name'] = $row['c_name'];
                        $_SESSION['c_id'] = $row['c_id'];
                        $_SESSION['c_phno'] = $row['c_phno'];
                        $_SESSION['c_email'] = $row['c_email'];

                        header("Location: homeso.php");
                        exit();
                    } else {
                        header("Location: homeso.php?error=Incorect User name or password");
                        exit();
                    }
                } else {
                    header("Location: homeso.php?error=Incorect User name or password");
                    exit();
                }
            }
        }
    } else {
        header("Location: homeso.php");
        exit();
    }
}
