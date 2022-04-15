<?php
include("dbcon.php");
include "sidebar.php";
session_start();

?>


<!DOCTYPE html>
<html>

<head>
    <title>Shows</title>
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

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="font-weight-bold py-3">Shows</h1><br>
                </div>
            </div>
            <div class="d-flex justify-content-left">
                <div class="text-center mr-5">
                    <span style="font-size:25px;">Add a new movie here: </span><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addmovie">Add here</button><br>
                </div>
            </div>
            <div class="modal fade" id="addmovie">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header text-center">
                            <h4 class="modal-title text-center w-100 font-weight-bold">Add a new show</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">&times;</button>
                        </div>
                        <form action="addshow.php" method="post">
                            <div class="modal-body mx-3">

                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-film prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Movie id</label>
                                        <input type="text" class="form-control validate" name="m_id">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="lg-form mb-5">
                                        <i class="fas fa-sliders-h prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Screen no</label>
                                        <input type="text" class="form-control validate" name="s_screenno">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-camera-retro prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Cinema</label>
                                        <input type="text" class="form-control validate" name="s_cinema">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-clock prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Show Timings</label>
                                        <input type="time" class="form-control validate" name="s_time">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-table prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Date</label>
                                        <input type="date" class="form-control validate" name="s_date">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="far fa-file-alt prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Price</label>
                                        <input type="text" class="form-control validate" name="s_price">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="far fa-file-alt prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Capacity</label>
                                        <input type="text" class="form-control validate" name="s_capacity">

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                                <input type="submit" name="submit" id="submit" class="btn btn-warning" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-10 mb-3 mt-5 ">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Current Shows
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width:900px">
                                        <thead>
                                            <tr>
                                                <th>Show id</th>
                                                <th>Movie id</th>
                                                <th>Movie</th>
                                                <th>Screen no</th>
                                                <th>Cinemas</th>
                                                <th>Show Timings</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Capacity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $query = "select * from shows S, movie M where S.m_id=M.m_id";
                                                $r = mysqli_query($conn, $query);
                                                if ($r->num_rows > 0) {


                                                    while ($row = mysqli_fetch_assoc($r)) {
                                                        $s_id = $row['s_id'];
                                                        $s_screenno = $row['s_screenno'];
                                                        $s_cinema = $row['s_cinema'];
                                                        $s_time = date("g:i a", strtotime($row['s_time']));
                                                        $s_date = date("d-m-Y", strtotime($row['s_date']));
                                                        $s_price = $row['s_price'];
                                                        $m_id = $row['m_id'];
                                                        $m_name = $row['m_name'];
                                                        $s_capacity = $row['s_capacity'];


                                                ?>
                                                        <td><?php echo $s_id; ?></td>
                                                        <td><?php echo $m_id; ?></td>
                                                        <td><?php echo $m_name; ?></td>
                                                        <td><?php echo $s_screenno; ?></td>
                                                        <td><?php echo $s_cinema; ?></td>
                                                        <td><?php echo $s_time; ?></td>
                                                        <td><?php echo $s_date; ?></td>
                                                        <td><?php echo $s_price; ?></td>
                                                        <td><?php echo $s_capacity; ?></td>
                                                        <td><a href="editshow.php?s_id=<?php echo $row['s_id'] ?>" class="btn btn-warning mb-2 ">Edit</a>
                                                            <a href="addshow.php?delete=<?php echo $row['s_id']; ?>" class="btn btn-danger">Delete</a>
                                                        </td>
                                            </tr>
                                    <?php
                                                    }
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






</body>

</html>