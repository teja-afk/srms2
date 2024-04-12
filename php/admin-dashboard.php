<html>

<head>
    <title>PHCET - Student Result Management System</title>
</head>

<body>

    <?php

    session_start();
    if ($_SESSION['username']) {
        echo '<script>alert("Hello ' . $_SESSION['username'] . '");</script>';
    ?>

        <script>
            window.open('../service-pages/admin-access-page.html', '_self');
        </script>

    <?php

    } else {
        echo "error!!";
    }

    ?>

</body>

</html>