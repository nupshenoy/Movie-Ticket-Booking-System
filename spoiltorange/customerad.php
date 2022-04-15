<?php
include("dbcon.php");
include "sidebar.php";
?>


<!DOCTYPE html>
<html>

<head>
    <title>Booking</title>

    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #F78555;

        }

        .logout a {
            width: 130px;
            height: 100%;
            color: white;
            font-size: 20px;
            border: 1px solid white;
            text-decoration: none;
            padding: 9px;
            padding-left: 8px;
            float: right;
            border-radius: 2px;
            text-align: center;
        }


        .logout a:hover {
            color: orange;
        }

        .card {
            box-shadow: 5px 5px 15px grey;
            ;
        }
    </style>
</head>

<body>
    <div class="col-9">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="font-weight-bold py-3">Customers</h1><br>
            </div>
        </div>
        <div class="row justify-content-right ">
            <div class="col-md-11 mb-3 mt-5 ">
                <div class="card">
                    <div class="card-header">
                        <span><i class="bi bi-table me-2"></i></span> Customer Details
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped data-table" style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>Customer id</th>
                                            <th>Customer Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            $query = "select * from customer except(Select * from customer where c_id=0) ";

                                            $r = mysqli_query($conn, $query);
                                            if (mysqli_num_rows($r) > 0) {
                                                while ($row = mysqli_fetch_assoc($r)) {
                                                    $c_id = $row['c_id'];
                                                    $c_name = $row['c_name'];
                                                    $c_email = $row['c_email'];
                                                    $c_phno = $row['c_phno'];
                                                    $c_pwd = $row['c_pwd'];





                                            ?>
                                                    <td><?php echo $c_id; ?></td>
                                                    <td><?php echo $c_name; ?></td>
                                                    <td><?php echo $c_phno; ?></td>
                                                    <td><?php echo $c_email; ?></td>
                                        </tr>

                                <?php
                                                }

                                                //echo '<script>alert("ok")</script>';
                                                exit();
                                            }

                                ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    </div>

    </div>






</body>

</html>