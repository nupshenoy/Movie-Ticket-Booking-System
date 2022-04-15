<?php
include "dbcon.php";
include "header.php";
@session_start();
$c_id = $_SESSION['c_id'];
$s_id = $_GET['s_id'];




$sql = "SELECT * from shows where s_id=$s_id ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $m_id = $row['m_id'];
        $s_time =   date("g:i a", strtotime($row['s_time']));
        $s_price = $row['s_price'];
        $s_date = date("d-m-Y", strtotime($row['s_date']));
        $s_cinema = $row['s_cinema'];
        $s_screenno = $row['s_screenno'];
?>


        <!DOCTYPE html>
        <html>

        <head>
            <title>Book Tickets</title>
            <style>
                body {
                    background-image: url("seats1.jpg");
                    background-position: center;
                }

                h4,
                h2 {
                    color: white;
                }

                .em {
                    margin-bottom: 20px;
                    display: inline-block;
                    width: 150px;
                    text-align: right;
                    font-family: sans-serif;
                    color: #f78555;
                    font-size: 20px;
                }

                input[type=number] {
                    width: 250px;
                }

                .book {
                    cursor: pointer;
                    background-color: white;
                    color: #f78555;
                    border-radius: 5px;
                    padding: 10px;
                }

                .book:hover {
                    color: white;
                    background-color: #f78555;
                }

                .card-img-top {
                    width: 35vh;
                    height: 50vh;
                    object-fit: cover;
                    border-radius: 5px;
                    margin-left: 10vw;

                }
            </style>

        </head>

        <body>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-8">
                        <div class="row" style="height: fit-content;">
                            <div class="col-8 mt-4 mb-4 ">
                                <div class="row justify-content-center">
                                    <div class="col-10 ml-3">
                                        <?php $r = mysqli_query($conn, "SELECT * from movie where m_id='$m_id'");
                                        $row = mysqli_fetch_assoc($r) ?>
                                        <label class="em" for="mname">Movie: </label> </label> <label style="color:white; font-size: 25px;"><?php echo $row['m_name'] ?> </label>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-10 ml-3">
                                        <label class="em" for="mname">Time: </label> <label style="color:white; font-size: 25px;"><?php echo $s_time; ?></label>
                                    </div>
                                </div>


                                <div class="row justify-content-center">
                                    <div class="col-10 ml-3">
                                        <label class="em" for="mname">Show Date: </label> </label> <label style="color:white; font-size: 25px;"> <?php echo $s_date; ?> </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-10 ml-3">
                                        <label class="em" for="mname">Ticket Price: </label> </label> <label style="color:white; font-size: 25px;"> Rs.<?php echo $s_price; ?> </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-10 ml-3">
                                        <label class="em" for="mname">Cinema: </label> </label> <label style="color:white; font-size: 25px;"><?php echo $s_cinema; ?> </label>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-10 ml-3">
                                        <label class="em" for="mname">Screen: </label> </label> <label style="color:white; font-size: 25px;"><?php echo $s_screenno; ?> </label>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <img class="card-img-top mb-2" src="<?php echo 'img/' . $row['m_img'] ?>" alt="Card image">
                                    <div class="card-body" style>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <?php $q = "SELECT * from shows where s_id = '$s_id'";
                    $r = mysqli_query($conn, $q);
                    while ($row = mysqli_fetch_assoc($r)) {
                        if ($row['s_capacity'] == 0) {
                    ?>
                            <div class="col-4 mt-4">
                                <form action="" method="post">
                                    <label style="font-size: 25px; color: white;"> Sorry! This show is fully booked.</label>
                                </form>
                            <?php } else { ?>
                                <div class="col-4 mt-4">
                                    <form action="" method="post">
                                        <label style="font-size: 25px; color: white;"> Select the number of seats :</label>
                                        <h4><input type="number" name="s_seats" min=1 max=10></h4>
                                        <input type="submit" name="submit" class="book" value="Book">
                                    </form>

                            <?php }
                    } ?>



                    <?php
                    if (isset($_REQUEST['submit'])) {
                        $seats = $_POST['s_seats'];
                        $b = $seats * $s_price;
                        $q = "INSERT into booking(s_id, m_id, c_id, b_seats) values ('$s_id','$m_id','$c_id','$seats')";;
                        $res = mysqli_query($conn, $q);

                        $s = "SELECT * from booking";
                        $res2 = mysqli_query($conn, $s);
                        while ($row = mysqli_fetch_assoc($res2)) {
                            $b_id = $row['b_id'];
                            $b_amt = $row['b_amt'];
                        }
                        $q2 = "UPDATE booking set b_amt = (select sum(B.b_seats * S.s_price) from booking B, shows S where B.s_id = S.s_id and B.b_id ='$b_id') where b_id='$b_id'";
                        $r = mysqli_query($conn, $q2);
                        $q3 = "SELECT b_amt from booking where b_id = '$b_id'";
                        $r3 = mysqli_query($conn, $q3);
                        while ($row = mysqli_fetch_assoc($r3)) {
                            $b_amt = $row['b_amt'];

                            echo "<p style='font-size:20px; color:white'>Your booking was successful! Your total amount is Rs." . $b_amt . "<p>";
                        }
                        $q4 = "SELECT * from shows where s_id = '$s_id'";
                        $result = mysqli_query($conn, $q4);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $s_capacity = $row['s_capacity'];

                            $c = "UPDATE shows set s_capacity = (select (S.s_capacity - B.b_seats) from booking B , shows S  where B.s_id = S.s_id and B.b_id ='$b_id') where s_id='$s_id'";
                            mysqli_query($conn, $c);
                        }
                        echo '<script>window.location="booksuccess.php?b_id=' . $b_id . '"</script>';
                    }
                }
            }
                    ?>

                                </div>
                            </div>
        </body>

        <?php


        ?>

        </html>