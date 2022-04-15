<?php
include "dbcon.php";
include "sidebar.php";
$s_id = $_GET['s_id'];

if (isset($_POST['submit'])) {

    $m_id = $_POST['m_id'];
    $s_screenno = $_POST['s_screenno'];
    $s_cinema = $_POST['s_cinema'];
    $s_time = $_POST['s_time'];
    $s_date = $_POST['s_date'];
    $s_price = $_POST['s_price'];
    $s_capacity = $_POST['s_capacity'];

    $q = "UPDATE shows set m_id='$m_id', s_screenno='$s_screenno', s_cinema='$s_cinema', s_time='$s_time', s_date='$s_date', s_capacity='$s_capacity' where s_id='$s_id';";


    if (mysqli_query($conn, $q)) {
        echo '<script>window.location="showsad.php"</script>';
    } else {
        echo mysqli_error($conn);
        echo "Not updated";
    }
}

$q = "SELECT * from shows where s_id='$s_id'";
$r = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($r)) {

?>


    <!DOCTYPE html>
    <html>

    <head>
        <title>Edit Show</title>

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

            .editmovie {
                font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                font-size: 20px;

            }

            .em {
                margin-bottom: 20px;
                display: inline-block;
                width: 150px;
                text-align: right;
                font-family: sans-serif;
                font-weight: 400;
            }

            .logout a:hover {
                color: orange;
            }

            .card {
                box-shadow: 5px 5px 15px grey;

            }

            input[type=text],
            [type=date],
            [type=time] {
                width: 350px;
                padding: 5px;
                padding-left: 6px;
                font: size 14px;
                border-radius: 4px;
                border: 1px solid darkgrey;

            }

            input[type=submit] {
                text-align: center;
            }


            input[type=submit] {
                width: auto;
                height: max-content;
                padding: 6px;
                background-color: pink;
                color: black;
                font-weight: 400;
                border: none;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: lightpink;
            }
        </style>
    </head>

    <body>

        <div class="col-9 mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="font-weight-bold py-3">Edit Show</h1><br>
                </div>
            </div>


            <div class="card" style="width: 42rem; padding-top:2rem; margin-bottom:5rem;">
                <div class="card-body">
                    <form action="editshow.php?s_id=<?php echo $s_id ?>" method="post" class="editmovie">
                        <div class="details">
                            <label class="em" for="mname">Movie id: </label>
                            <input type="text" name="m_id" value="<?php echo $row['m_id'] ?>">
                            <br>
                            <label class="em" for="mgenre">Screen no: </label>
                            <input type="text" name="s_screenno" value="<?php echo $row['s_screenno'] ?>">
                            <br>
                            <label class="em" for="mlang">Cinema: </label>
                            <input type="text" name="s_cinema" value="<?php echo  $row['s_cinema'] ?>">
                            <br>
                            <label class="em" for="mdir">Show Timings: </label>
                            <input type="time" name="s_time" value="<?php echo $row['s_time'] ?>">
                            <br>
                            <label class="em" for="mdur">Date: </label>
                            <input type="date" name="s_date" value="<?php echo $row['s_date'] ?>">
                            <br>

                            <label class="em" for="mdescp">Ticket Price: </label>
                            <input type="text" name="s_price" value="<?php echo $row['s_price'] ?>">
                            <br>
                            <label class="em" for="mdescp">Seat Capacity: </label>
                            <input type="text" name="s_capacity" value="<?php echo $row['s_capacity'] ?>">
                            <br>
                        </div>
                        <div class="btn ">
                            <label class="em" for="btn"></label>
                            <input type="submit" class="btn btn-primary" name="submit" value="Save Changes">
                        </div>

                    </form>
                </div>
            </div>

        </div>
        </div>
    </body>
<?php
} ?>


    </html>