<?php
include "dbcon.php";
include "sidebar.php";

$m_id = $_GET['m_id'];

if (isset($_POST['submit'])) {

    $m_name = $_POST['m_name'];
    $m_genre = $_POST['m_genre'];
    $m_language = $_POST['m_language'];
    $m_director = $_POST['m_director'];
    $m_duration = $_POST['m_duration'];
    $m_description = $_POST['m_description'];

    $m_img = $_FILES["m_img"]["name"];
    $type = $_FILES["m_img"]["type"];
    $size = $_FILES["m_img"]["size"];

    if ($size > 4194304) {
        echo "File is too big";
    }

    if (!file_exists("img/" . $_FILES['m_img']['name'])) {

        $q = "UPDATE movie set m_name='$m_name', m_genre='$m_genre', m_language='$m_language', m_director='$m_director', m_duration='$m_duration', m_img = '$m_img' where m_id='$m_id';";
        $result = (mysqli_query($conn, $q));

        if ($result) {
            move_uploaded_file($_FILES['m_img']['tmp_name'], "img/" . $_FILES['m_img']['name']);
            echo '<script type="text/javascript">window.location = "adminmovie.php";</script>';
        }
    } else {
        $q = "UPDATE movie set m_name='$m_name', m_genre='$m_genre', m_language='$m_language', m_director='$m_director', m_duration='$m_duration' where m_id='$m_id';";
        $result = (mysqli_query($conn, $q));
        echo '<script type="text/javascript">window.location = "adminmovie.php";</script>';
    }
}

$q = "SELECT * from movie where m_id='$m_id'";
$r = mysqli_query($conn, $q);

while ($row = mysqli_fetch_assoc($r)) {

?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            body {

                font-family: 'Roboto', sans-serif;
                background-color: #F78555;
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

            input[type=text],
            [type=file],
            textarea {
                width: 350px;
                padding: 5px;
                padding-left: 6px;
                font-size: 15px;
                border-radius: 4px;
                border: 1px solid darkgrey;

            }

            input[type=submit] {
                text-align: center;
            }

            textarea {
                vertical-align: top;
                height: 150px;
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

            .card {
                box-shadow: 5px 5px 15px grey;

            }
        </style>
    </head>

    <body>
        <div class="col-9 mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="font-weight-bold ">Edit Movie</h1><br>
                </div>
            </div>

            <div class="card" style="width: 42rem; padding-top:2rem; margin-bottom:5rem;">
                <div class="card-body">
                    <form action="editmovie.php?m_id=<?php echo $m_id ?>" method="post" class="editmovie" enctype="multipart/form-data">
                        <div class="details">
                            <label class="em" for="mname">Movie Name: </label>
                            <input type="text" name="m_name" value="<?php echo $row['m_name'] ?>">
                            <br>
                            <label class="em" for="mgenre">Genre: </label>
                            <input type="text" name="m_genre" value="<?php echo $row['m_genre'] ?>">
                            <br>
                            <label class="em" for="mlang">Language: </label>
                            <input type="text" name="m_language" value="<?php echo  $row['m_language'] ?>">
                            <br>
                            <label class="em" for="mdir">Director: </label>
                            <input type="text" name="m_director" value="<?php echo $row['m_director'] ?>">
                            <br>
                            <label class="em" for="mdur">Duration: </label>
                            <input type="text" name="m_duration" value="<?php echo $row['m_duration'] ?>">
                            <br>
                            <label class="em" for="mphoto">Poster: </label>
                            <input type="file" name="m_img">
                            <br>

                            <label class="em" for="mdescp">Description: </label>
                            <textarea name="m_description"><?php echo $row['m_description'] ?></textarea>
                            <br>
                        </div>
                        <div class="btn ">
                            <label class="em" for="btn"></label>
                            <input type="submit" name="submit" value="Save Changes">
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