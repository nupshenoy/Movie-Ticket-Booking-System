<?php

include 'dbcon.php';
session_start();
$c_id = $_SESSION['c_id'];


?>


<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" initial-scale=1>
    <!---<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" href= "stylinghomepage.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family-Roboto:300,400,500,700&display=swap">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js">
    </script>
    <style>

    </style>


    <style>
        .container {
            height: max-content;
            padding: 20px;
        }

        label {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .mname {
            font-weight: 500;
            font-size: 20px;
            font-weight: bold;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }


        /* Style the accordion panel. Note: hidden by default */
        .accordion {
            background-color: #042331;
            color: #f78555;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 20px;
            font-weight: 500;
            transition: 0.4s;
        }

        .active,
        .accordion:hover {
            background-color: #FFD580;
        }

        .panel {
            padding: 0 18px;
            background-color: white;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        .card-img-top {
            width: 13vw !important;
            margin: 0;
            height: 40vh;
        }

        h3 {
            font-size: 25px;
            font-weight: bold;
        }
    </style>
</head>

<body style="background-color:#f78555;">
    <?php include "header.php" ?>

    <div class="container">
        <button class="accordion">Recent Bookings</button>


        <div class="panel">
            <?php $q = "SELECT * from customer C, movie M, booking B, shows S where C.c_id = B.c_id and B.m_id = M.m_id and S.s_id = B.s_id and B.c_id = '$c_id'; ";
            $r = mysqli_query($conn, $q);
            while ($row = mysqli_fetch_assoc($r)) {
            ?>
                <!---ticket-->
                <div class="row mt-4 mb-4 mr-2 ml-2" style="height:22vw; border:2px solid lightgrey; border-radius:4px;">
                    <div class="col-3 mt-4 ">
                        <a href="">
                            <img class="card-img-top " src="<?php echo 'img/' . $row['m_img'] ?>">
                        </a>
                    </div>
                    <div class="col-6 mt-5">
                        <h3><?php echo $row['m_name']; ?></h3>
                        <h6><?php echo $row['m_genre']; ?> | <?php echo $row['s_cinema']; ?> | <?php echo $row['m_language']; ?></h4>
                            <br>
                            <div class="row">
                                <div class="col-4">
                                    <h5>Date: <?php echo date("d-m-Y", strtotime($row['s_date'])); ?>
                                    </h5>
                                    <br>
                                    <h5>Screen: <?php echo $row['s_screenno']; ?></h5>
                                </div>
                                <div class="col-4">
                                    <h5>Time: <?php echo date("g:i a", strtotime($row['s_time']));; ?></h5>
                                    <br>
                                    <br>
                                    <h5>Seats: <?php echo $row['b_seats']; ?></h5>
                                </div>
                            </div>
                    </div>
                    <div class="col-3 mt-5">
                        <img src="qrcode.png" style="width:200px; height:200px;">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php
        $q = "SELECT * from customer where c_id='$c_id'";
        $r = mysqli_query($conn, $q);
        while ($row = mysqli_fetch_assoc($r)) {
        ?>
            <button class="accordion">Settings</button>
            <div class="panel">
                <div class="myinfo">
                    <div class="card-body">

                        <div class="row">
                            <div class="col">
                                <p><i class="fas fa-user" style="color:chocolate; font-size:25px"> </i> <?php echo $row['c_name']; ?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><i class="fa fa-envelope" style="color:chocolate; font-size:25px;"></i> <?php echo $row['c_email']; ?> </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p><i class="fa fa-phone" style="color:chocolate; font-size:25px;"> </i> <?php echo $row['c_phno']; ?></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn mt-3" data-bs-toggle="modal" data-bs-target="#editprof">Edit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="editprof">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="modal-title text-center w-100 font-weight-bold">Edit</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">&times;</button>
                </div>
                <form action="soprofile.php" method="post">
                    <div class="modal-body mx-3">

                        <div class="md-form mb-2">
                            <i class="fas fa-user prefix grey-text"></i>
                            <label data-error="wrong" data-success="right">Name</label>
                            <input type="text" name="c_name" class="form-control validate" value=" <?php echo $row['c_name']; ?>">

                        </div>
                        <div class="md-form mb-2">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label data-error="wrong" data-success="right">Email</label>
                            <input type="email" name="c_email" class="form-control validate" value="<?php echo $row['c_email']; ?>">

                        </div>
                        <div class="md-form mb-2">
                            <i class="fas fa-phone-alt prefix grey-text"></i>
                            <label data-error="wrong" data-success="right">Contact</label>
                            <input type="text" name="c_phno" class="form-control validate" value="<?php echo $row['c_phno']; ?>">

                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" name="save" class="btn btn-dark" data-bs-dismiss="modal" value="Save">
                    </div>
                </form>
            </div>
        </div>

    </div>

    </div>
<?php
        }

?>

<!---Accordion JS-->
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }
</script>

<?php
if (isset($_POST['save'])) {
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_phno = $_POST['c_phno'];

    $q = "UPDATE customer set c_name='$c_name', c_email='$c_email', c_phno='$c_phno' where c_id='$c_id'";
    mysqli_query($conn, $q);

    echo '<script type="text/javascript">
            window.location = "soprofile.php";
        </script>';
}

?>