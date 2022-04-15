<?php
include "dbcon.php";
?>

<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
</head>
<style>
    body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
    }

    h1 {
        color: #88B04B;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-weight: 900;
        font-size: 40px;
        margin-bottom: 10px;
    }

    p {
        color: #404F5E;
        font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
        font-size: 20px;
        margin-bottom: 25px;
    }

    i {
        color: green;
        font-size: 100px;
        line-height: 200px;
        margin-left: -15px;
    }

    .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 5px 5px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
    }

    a {
        margin-top: 18px;
        margin-bottom: 10px;
        background-color: white;
        border: 1px solid black;
        border-radius: 5px;
        padding: 10px;
        text-decoration: none;
        color: green;
    }

    a:hover {
        background-color: green;
        color: white;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<body>
    <?php
    $b_id = $_GET['b_id'];
    $q = "SELECT b_amt from booking where b_id = '$b_id'";
    $r = mysqli_query($conn, $q);
    while ($row = mysqli_fetch_assoc($r)) {
        $b_amt = $row['b_amt'];
    }
    ?>

    <div class="card">
        <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF6; margin:0 auto;">
            <i class="checkmark">✓</i>
        </div>
        <h1>Success</h1>
        <p>Your booking was successful.<br /> Your total amount is Rs. <?php echo $b_amt ?></p>
        <a href="soprofile.php" id="contBtn">Continue</a>
    </div>
</body>

</html>