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
        <h1 style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;" class="font-weight-bold py-3">Bookings</h1><br>
      </div>
    </div>
    <div class="row justify-content-right ">
      <div class="col-md-11 mb-3 mt-5 ">
        <div class="card">
          <div class="card-header">
            <span><i class="bi bi-table me-2"></i></span> Booking Details
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Booking id</th>
                      <th>Customer id</th>
                      <th>Movie id</th>
                      <th>Show id</th>
                      <th>Seats</th>
                      <th>Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
                      $query = "select * from booking B, shows S where B.s_id=S.s_id; ";

                      $r = mysqli_query($conn, $query);
                      if (mysqli_num_rows($r) > 0) {
                        while ($row = mysqli_fetch_assoc($r)) {
                          $b_id = $row['b_id'];
                          $c_id = $row['c_id'];
                          $m_id = $row['m_id'];
                          $s_id = $row['s_id'];
                          $b_seats = $row['b_seats'];
                          $b_amt = $row['b_amt'];
                          $s_price = $row['s_price'];





                      ?>
                          <td><?php echo $row['b_id']; ?></td>
                          <td><?php echo $c_id; ?></td>
                          <td><?php echo $m_id; ?></td>
                          <td><?php echo $s_id; ?></td>
                          <td><?php echo $b_seats; ?></td>
                          <td><?php echo $b_amt; ?></td>
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