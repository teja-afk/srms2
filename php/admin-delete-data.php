<?php
    session_start();
    if (isset($_POST['submit'])) {
        $regno = $_POST['regno'];

        $con = mysqli_connect('localhost', 'root', '', 'srms');
        if ($con == false) {
            echo "Error in connection";
        } else {
            $select = "DELETE FROM `student_info` WHERE `regno`='$regno'";
            $query = mysqli_query($con, $select);
            echo "Details Deleted Successfully.";
        }
      }
    ?>