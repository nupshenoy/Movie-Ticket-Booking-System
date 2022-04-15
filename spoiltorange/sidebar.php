<!DOCTYPE html>
<html>
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
    * {
        margin: 0;
        padding: 0;
        list-style: none;
        text-decoration: none;
    }

    .sidebar {
        position: fixed;
        left: 0;
        width: 250px;
        background: #042331;
        height: 100%;
    }

    .sidebar header {
        font-size: 22px;
        color: white;
        text-align: center;
        line-height: 70px;
        background: #063146;
        user-select: none;

    }

    .sidebar ul a,
    h2 {
        display: block;
        height: 300%;
        width: 100%;
        line-height: 65px;
        color: white;
        padding-left: 40px;
        box-sizing: border-box;
        border-top: 1px solid rgba(255, 255, 255, .1);
        border-bottom: 1px solid black;
    }

    ul li:hover a {
        padding-left: 50px;
    }

    .sidebar ul a i {
        margin-right: 16px;
    }
</style>
</head>

<body>
    <div class="row">
        <div class="col-3">
            <div class="sidebar">

                <ul>
                    <li>
                        <h2 style="font-weight:bold; font-size:25px; color:#F78555">spoiltorange</h2>
                    </li>
                    <li> <a href="dashboard.php"> <i class="fas fa-eye"></i>Dashboard</a></li>
                    <li> <a href="showsad.php"> <i class="fas fa-sliders-h"></i>Shows</a></li>
                    <li> <a href="adminmovie.php"> <i class="fas fa-video"></i>Movie</a></li>
                    <li> <a href="bookingad.php"> <i class="far fa-bookmark"></i>Bookings</a></li>
                    <li> <a href="customerad.php"> <i class="fas fa-user-alt"></i>Customer</a></li>
                    <li><a href="signout.php" style="font-weight:bold; color:#F78555">Sign Out</a></li>
                </ul>
            </div>

        </div>


        </head>

</html>