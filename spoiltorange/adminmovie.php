<?php
include("dbcon.php");
include "sidebar.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Movies</title>

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
            <div class="row ">
                <div class="col-md-12 mr-5">
                    <br>
                    <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="font-weight-bold py-3">Movies</h1><br>
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
                            <h4 class="modal-title text-center w-100 font-weight-bold">Add a new movie</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">&times;</button>
                        </div>
                        <form action="addmovie.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body mx-3">

                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-film prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Name</label>
                                        <input type="text" class="form-control validate" name="m_name">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="lg-form mb-5">
                                        <i class="fas fa-sliders-h prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Genre</label>
                                        <input type="text" class="form-control validate" name="m_genre">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-camera-retro prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Director</label>
                                        <input type="text" class="form-control validate" name="m_director">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-clock prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Duration</label>
                                        <input type="text" class="form-control validate" name="m_duration">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-table prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Language</label>
                                        <input type="text" class="form-control validate" name="m_language">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-calendar-week prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Release Date</label>
                                        <input type="date" class="form-control validate" name="m_rdate">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="fas fa-ticket-alt prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Poster</label>
                                        <input type="file" class="form-control validate" name="m_img">

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="md-form mb-5">
                                        <i class="far fa-file-alt prefix grey-text"></i>
                                        <label data-error="wrong" data-success="right">Description</label>
                                        <textarea class="form-control validate" name="m_description"></textarea>

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








            <div class="row justify-content-right ">
                <div class="col-md-11 mb-3 mt-5 ">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="bi bi-table me-2"></i></span> Current Movies
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped data-table" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th>Movie id</th>
                                                <th>Name</th>
                                                <th>Genre</th>
                                                <th>Director</th>
                                                <th>Duration</th>
                                                <th>Language</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                                $query = "select * from movie";
                                                $r = mysqli_query($conn, $query);
                                                if ($r->num_rows > 0) {


                                                    while ($row = mysqli_fetch_assoc($r)) {
                                                        $m_id = $row['m_id'];
                                                        $m_name = $row['m_name'];
                                                        $m_genre = $row['m_genre'];
                                                        $m_director = $row['m_director'];
                                                        $m_duration = $row['m_duration'];
                                                        $m_language = $row['m_language'];
                                                        $m_description = $row['m_description'];
                                                        $m_img = $row['m_img'];
                                                        $m_rdate = $row['m_rdate'];

                                                ?>
                                                        <td><?php echo $m_id; ?></td>
                                                        <td><?php echo $m_name; ?></td>
                                                        <td><?php echo $m_genre; ?></td>
                                                        <td><?php echo $m_director; ?></td>
                                                        <td><?php echo $m_duration; ?></td>
                                                        <td><?php echo $m_language; ?></td>
                                                        <td><?php echo $m_description; ?></td>
                                                        <td><?php echo $m_rdate; ?></td>
                                                        <td><a href="editmovie.php?m_id=<?php echo $row['m_id'] ?>" class="btn btn-warning mr-2 mb-2">Edit</a>
                                                            <a href="addmovie.php?delete=<?php echo $row['m_id']; ?>" class="btn btn-danger">Delete</a>
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

    </div>

    <?php
    if (isset($_POST['submit1'])) {
        $query = "delete * from movie where m_id=200";
        $r = mysqli_query($conn, $query);
    }
    ?>




</body>

</html>