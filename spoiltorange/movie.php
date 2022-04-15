<?php
include "dbcon.php";
session_start();
if (isset($_SESSION['c_id'])) {
    $c_id = $_SESSION['c_id'];
}
$m_id = $_GET['m_id'];
$sql = "SELECT * from movie where m_id=$m_id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $m_id = $row['m_id'];
        $m_name =  $row['m_name'];
        $m_genre = $row['m_genre'];
        $m_language = $row['m_language'];
        $m_director = $row['m_director'];
        $m_duration = $row['m_duration'];
        $m_rdate = $row['m_rdate'];
        $m_description = $row['m_description'];
?>

        <!DOCTYPE html>
        <html>

        <head>
            <title>Welcome</title>
            <?php include "header.php" ?>
            <style>
                * {
                    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                }

                .card-img-top {
                    width: 35vh;
                    height: 50vh;
                    object-fit: cover;
                    border-radius: 5px;
                    margin-left: 10vw;

                }

                img {
                    margin: 10px;
                    border-radius: 5px;

                }

                h4,
                h5,
                h6,
                .btn {
                    margin-left: 10px;
                }

                h4 {
                    font-size: 38px;
                }

                h5 {
                    font-size: 20px;
                }

                h6 {
                    font-size: 20px;
                }

                input[type=number]::-webkit-inner-spin-button {
                    width: 14px;
                    height: 30px;
                }

                label {
                    font-weight: 500;
                    font-size: 20px;
                }
            </style>
        </head>

        <body>

            <!---movie card-->
            <div class="container-fluid bg-dark text-light">
                <br>
                <div class="row">
                    <div class="col-4 d-flex justify-content-center ">
                        <img class="card-img-top mb-2" src="<?php echo 'img/' . $row['m_img'] ?>" alt="Card image">
                        <div class="card-body">
                        </div>
                    </div>

                    <div class="col-8">
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <h4><?php echo $m_name; ?></h4>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <?php $r = mysqli_query($conn, "SELECT * from shows where m_id='$m_id'");
                                $row = mysqli_fetch_assoc($r) ?>
                                <h5><?php echo $row['s_cinema'] ?></h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <h5><?php echo $m_language; ?></h5>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <h6><?php echo $m_duration ?> · <?php echo $m_genre ?> · <?php echo $m_rdate ?></h6>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <h6>Director: <?php echo $m_director; ?></h6>
                            </div>
                        </div>
                        <br>

                    </div>
                </div>
                <br>
            </div>
            <br>
            <div class="container">
                <h2>Plot Summary</h2>
                <h6 style="height: max-content; font-weight:normal;"><?php echo $m_description ?></h6>
            </div>
            <br>
            <div class="container">
                <h2 class="text mb-3">Shows</h2>
                <table id="example" class="table table-striped data-table" style="width: 100%">
                    <thead>
                        <th>Date</th>
                        <th>Time</th>
                        <th></th>
                    </thead>
                    <?php
                    $q = "SELECT s_date, s_time, s_id from shows where m_id='$m_id'";
                    $r = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_assoc($r)) {
                        $s_id = $row['s_id'];
                        $s_date = date("d-m-Y", strtotime($row['s_date']));
                        $s_time = date("g:i a", strtotime($row['s_time']));
                    ?>


                        <tbody>
                            <tr>
                                <td><?php echo $s_date ?></td>
                                <td><?php echo $s_time ?></td>
                                <?php if (isset($_SESSION['c_id'])) { ?>
                                    <td><a href="booking.php?s_id=<?php echo $row['s_id'] ?>&c_id=<?php echo $c_id ?>" class="btn btn-info">Book</a></td>
                                <?php
                                } else {
                                ?>
                                    <td>Sign in to book tickets</td>
                            <?php
                                }
                            }
                            ?>
            </div>


    <?php
    }
}
    ?>
        </body>

        </html>