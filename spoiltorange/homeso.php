<?php
include "dbcon.php";
include "addmovie.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <?php include "header.php";
    //MyProfile appears when session started
    ?>
    <style>
        .container {
            height: max-content;
            background-color: #f78555;
            padding-top: 20px;
        }

        .container .card-carousel {
            justify-self: center;
            margin-top: 5%;
            display: grid;
            grid-template-columns: calc((100% - 128px) / 5);
            grid-template-rows: 1, 1fr;
            grid-auto-flow: column;
        }

        .card-img-top {
            width: 230px;
            margin: 0;
            height: 20vw;
        }

        label {
            margin-bottom: 20px;
            font-size: 20px;
            font-weight: bold;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .m_name {
            font-weight: 500;
            font-size: 20px;
            font-weight: bold;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .card-body {
            color: black;
            text-decoration: none;
        }

        p:hover {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body style="background-color:#f78555">

    <!--movies cards-->
    <div class="container">
        <h2 class="text mb-3">Movies</h2>
        <div class="row">

            <!---php to insert card needed-->
            <?php
            $q = "SELECT * from movie ";
            if (isset($_REQUEST['subfilter'])) {

                $genre = $_POST['genre'];
                $language = $_POST['language'];

                if (($language != "All") && ($genre != "All")) {
                    $q .= "WHERE m_genre='$genre' AND m_language='$language'";
                } else if (($language == "All") && ($genre != "All")) {
                    $q .= "WHERE m_genre = '$genre'";
                } else if (($genre == "All") && ($language != "All")) {
                    $q .= "WHERE m_language = '$language'";
                }
            }

            $result = mysqli_query($conn, $q);
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $m_id = $row['m_id'];
                    $m_name =  $row['m_name'];
                    $m_genre = $row['m_genre'];
                    $m_language = $row['m_language'];
            ?>
                    <div class="col-3 d-flex justify-content-center mb-3">
                        <a href="movie.php?m_id=<?php echo $m_id ?>">
                            <img class="card-img-top" src="<?php echo 'img/' . $row['m_img'] ?>">
                            <div class="card-body">
                                <p class="m_name"><?php echo $m_name; ?></label>
                                <p><?php echo $m_genre; ?> | <?php echo $m_language; ?></p>
                            </div>
                        </a>
                    </div>
            <?php

                }
            } else {
                echo '<script>alert("No results")</script>';
                echo '<script>window.location="homeso.php"</script>';
            }
            ?>

        </div>
    </div>






</body>

</html>