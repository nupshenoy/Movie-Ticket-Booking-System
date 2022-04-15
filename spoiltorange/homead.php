<?php
include "dbcon.php";
include "addmovie.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
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

        .topnav {
            overflow: hidden;
            height: 70px;
            align-items: center;
            background-color: #042331;
        }

        .topnav a {
            float: left;
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav .search-container {
            float: left;
            margin-top: 8px;

        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            border: lightgrey;
            border-radius: 4px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            width: 300px;
            vertical-align: center;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;

        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (max-width: 600px) {
            .topnav .search-container {
                float: none;
            }

            .topnav a,
            .topnav input[type=text],
            .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;
            }

            .topnav input[type=text] {
                border: 1px solid #ccc;
            }
        }

        .nav-item {
            float: right;
            margin-right: 80px;
        }
    </style>
</head>

<body style="background-color:#f78555">
    <div class="topnav">
        <a href="homeso.php" style="margin-left:150px; font-size:25px; color: #f78555; text-decoration: none; font-weight: 600;">spoiltorange</a>
        <div class="search-container">
            <form action="/action_page.php">
                <input type="text" placeholder="Search for Movies" name="search" autocomplete="off">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="nav-item mt-3">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <a class="myprof mt-2 mr-5" href="homeso.php" style="float:right; color:white; font-size:20px;">Dashboard</a>
                    <a class="myprof  mr-5  pt-1 pb-1" href="signout.php" style="border:1px solid white; cursor:pointer; float:right; color:white; font-size:20px;">Sign Out</a>

                </div>
            </div>
            <!--movies cards-->
            <div class="container">
                <h2 class="text mb-3">Movies</h2>
                <div class="row">

                    <!---php to insert card needed-->
                    <?php
                    $query = "SELECT * from movie";

                    $r = mysqli_query($conn, $query);

                    if ($r->num_rows > 0) {
                        while ($row = mysqli_fetch_assoc($r)) {
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
                    <?php }
                    } ?>

                </div>
            </div>






</body>

</html>