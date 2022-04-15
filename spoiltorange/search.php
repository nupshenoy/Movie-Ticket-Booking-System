<?php
include "dbcon.php";

if (isset($_POST['go'])) {

    $search_value = $_POST['search'];
    echo $search_value;

    $q = "SELECT m_id, m_name from movie where m_name LIKE '%{$search_value}%'";
    $res = mysqli_query($conn, $q);
    $row = mysqli_fetch_assoc($res);
    echo '<script>window.location="movie.php?m_id=' . $row['m_id'] . '"</script>';
}
