<?php
session_start();
if (isset($_POST['login'])) {
    $emailid = $_POST['emailid'];
    $password = $_POST['password'];

    $con = mysqli_connect("localhost", "root", "", "srms");
    if ($con == false) {
        echo "Error in connection";
    } else {
        $select = "SELECT * FROM admin_info WHERE emailid='$emailid' AND password='$password'";
        $query = mysqli_query($con, $select);
        $row = mysqli_num_rows($query);
        if ($row == 1) {
            $data = mysqli_fetch_assoc($query);
            $_SESSION['username'] = $data['username'];
            header("Location:../php/admin-dashboard.php");
            exit(); // Ensure script stops executing after redirection
        } else {
            echo "<script>alert('Wrong Emailid or Password!! Please Try Again');</script>";
            echo "<script>window.open('../service-pages/admin-login.html', '_self');</script>";
        }
    }
}
?>
