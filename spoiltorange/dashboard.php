<?php
include "dbcon.php";
include "sidebar.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F78555;
        }

        .card {
            background-color: darkgreen;
            color: white;
            border: none;
            border-radius: 5px;
            height: 120px;
            width: 80%;
            border: 1px solid black;
            height: 220px;
            text-align: center;

            box-shadow: 5px 5px 20px 0 rgba(0, 0, 0, 0.2);
        }

        label {
            margin-left: 20px;
            margin-top: 20px;
            font-size: 45px;
            font-weight: 600;
        }

        p {
            font-size: 60px;
            margin-left: 20px;
            color: white
        }

        h1 {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="col-8 mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Welcome, Admin</h1>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <div class="card mb-5" style="background-color: #6278DC;">
                    <label for="movies">Movies</label>
                    <?php
                    $q = "SELECT count(m_id) as mov from movie";
                    $r = (mysqli_query($conn, $q));
                    while ($row = mysqli_fetch_array($r)) {
                    ?>
                        <p><?php echo $row[0] ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style=" background-color:  #DACC28;">
                    <label for="bookings">Bookings</label>
                    <?php
                    $q = "SELECT count(b_id) from booking";
                    $r = (mysqli_query($conn, $q));
                    while ($row = mysqli_fetch_array($r)) {
                    ?>
                        <p><?php echo $row[0] ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style="background-color: #3AC799; ">
                    <label for="customers">Customers</label>
                    <?php
                    $q = "SELECT count(distinct c_id) from customer";
                    $r = (mysqli_query($conn, $q));
                    while ($row = mysqli_fetch_array($r)) {
                    ?>
                        <p><?php echo $row[0] ?></p>
                    <?php } ?>
                </div>
            </div>
            <div class="col-6">
                <div class="card" style=" background-color:  #A162DC;">
                    <label for="shows">Shows</label>
                    <?php
                    $q = "SELECT count(s_id) from shows";
                    $r = (mysqli_query($conn, $q));
                    while ($row = mysqli_fetch_array($r)) {
                    ?>
                        <p><?php echo $row[0] ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!--row end-->
</body>

</html>