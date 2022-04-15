<?php
include "dbcon.php";
@session_start();
?>

<!DOCTYPE html>
<html>

<head>
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

        .modal-text {
            font-size: 20px;
            font-weight: bold;
            display: inline-block;
        }
    </style>

</head>

<body>
    <!---navigation bar-->
    <nav>
        <div class="topnav">
            <a href="homeso.php" style="margin-left:150px; font-size:25px; color: #f78555; text-decoration: none; font-weight: 600;">spoiltorange</a>

            <div class="nav-item mt-3">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <button type="button" class="btn mr-3" data-bs-toggle="modal" data-bs-target="#filter">Filter Movies</button>
                        <?php if ((!isset($_SESSION['c_id']))) { ?>
                            <button type="button" class="btn mr-3" data-bs-toggle="modal" data-bs-target="#signupPage">Register</button>
                            <button type="button" class="btn mr-3" data-bs-toggle="modal" data-bs-target="#signinPage">Sign In</button>
                        <?php } else { ?>
                            <?php if ($_SESSION["c_email"] === "admin@gmail.com") { ?>
                                <a class="myprof mt-2 mr-5" href="homeso.php" style="float:right; color:white; font-size:20px;">Dashboard</a>
                            <?php } else { ?>
                                <a class="myprof mr-5 pt-1 pb-1" href="soprofile.php" style="float:right; color:white; font-size:20px;">MyProfile</a>
                            <?php } ?>
                            <a class="myprof  mr-2  pt-1 pb-1" href="signout.php" style="cursor:pointer; float:right; color:white; font-size:20px;">Sign Out</a>
                        <?php  } ?>
                    </div>
                </div>
    </nav>
    <!---Register Modal-->

    <div class="modal fade" id="signupPage">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="modal-title text-center w-100 font-weight-600">Register</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close">&times;</button>
                </div>

                <form action="regso.php" method="post">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-2">

                            <i class="fas fa-user prefix grey-text"></i>
                            <label class="modal-text" data-error="wrong" data-success="right">Name</label>
                            <input type="text" name="c_name" style="padding: 6px;
                                                                margin-top: 8px;
                                                                font-size: 17px;
                                                                border: 1px solid #ccc;
                                                                border-radius: 4px; 
                                                                width:100%;" class="form-control validate">
                        </div>
                        <div class="md-form mb-2">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label class="modal-text" data-error="wrong" data-success="right">Email</label>
                            <input type="email" name="c_email" class="form-control validate">

                        </div>
                        <div class="md-form mb-2">
                            <i class="fas fa-key prefix grey-text"></i>
                            <label class="modal-text" data-error="wrong" data-success="right">Password</label>
                            <input type="password" name="c_pwd" class="form-control validate">

                        </div>
                        <div class="md-form mb-2">
                            <i class="fas fa-phone-alt prefix grey-text"></i>
                            <label class="modal-text" data-error="wrong" data-success="right">Contact</label>
                            <input type="text" name="c_phno" style="padding: 6px;
                                                                margin-top: 8px;
                                                                font-size: 17px;
                                                                border: 1px solid #ccc;
                                                                border-radius: 4px; 
                                                                width:100%;" class="form-control validate">
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <input type="submit" name="submit" class="btn btn-dark" data-bs-dismiss="modal" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>

    </div>

    <!---Sign In Modal-->

    <div class="modal fade" id="signinPage">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="modal-title text-center w-100 font-weight-600">Sign In</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-lable="close">&times;</button>
                </div>
                <form action="signinso.php" method="post">
                    <div class="modal-body mx-4">
                        <div class="md-form">
                            <i class="fas fa-envelope prefix grey-text"></i>
                            <label class="modal-text" data-error="wrong" data-success="right"> Email</label>
                            <input type="email" name="c_email" class="form-control validate">
                        </div>
                        <br>
                        <div class="md-form">
                            <i class="fas fa-key prefix grey-text"></i>
                            <label class="modal-text" data-error="wrong" data-success="right">Password</label>
                            <input type="password" name="c_pwd" class="form-control validate">
                        </div>
                        <br>

                        <div class="text-center mb-3">
                            <input type="submit" name="submit" class="btn btn-dark" data-bs-dismiss="modal" value="Sign In">
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    </div>

    <!---Filter modal-->

    <div class="modal fade" id="filter">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">

                <div class="modal-header text-center">
                    <h4 class="modal-title text-left w-100 font-weight-600">Choose Your Preferences</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-lable="close">&times;</button>
                </div>
                <div class="modal-body mx-4">
                    <form action="homeso.php" method="POST">
                        <div class="md-form">
                            <label class="modal-text" data-error="wrong" data-success="right"> Genre</label>
                            <select class="form-control validate" name="genre" required>
                                <option value=0 selected disabled hidden></option>
                                <option value="All" selected>All</option>
                                <option value="Action">Action</option>
                                <option value="Romance">Romance</option>
                                <option value="Family">Family</option>
                            </select>
                        </div>
                        <br>
                        <div class="md-form">
                            <label class="modal-text" data-error="wrong" data-success="right">Language</label>
                            <select class="form-control validate" name="language" required>
                                <option value="All" selected>All</option>
                                <option value="English">English</option>
                                <option value="Hindi">Hindi</option>
                                <option value="Kannada">Kannada</option>
                            </select>
                        </div>

                        <br>
                        <div class="text-center mb-3">
                            <input type="submit" name="subfilter" class="btn btn-dark btn-block z-depth-la" value="Submit">
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</body>

</html>