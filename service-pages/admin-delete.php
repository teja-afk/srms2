<html>
  <head>
    <title>PHCET - Student Result Management System</title>
  </head>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="IE=7" />
  <link
    rel="shortcut icon"
    href="../asset/images/mes-favicon.png"
    type="image/x-icon"
  />

  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk"
    crossorigin="anonymous"
  />

  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet"
  />

  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
    crossorigin="anonymous"
  />

  <link rel="stylesheet" href="../css/navbar.css" />

  <link rel="stylesheet" href="../css/common-navbar-style.css" />

  <link rel="stylesheet" href="../css/footer.css" />

  <style>
    form {
      margin: 2% 15%;
    }

    @media (max-width: 767px) {
      form {
        margin: 5%;
      }
    }
  </style>

  <body>


    <?php
    session_start();
    if (isset($_POST['submit'])) {
        $emailid = $_POST['emailid'];
        $regno = $_POST['regno'];

        $con = mysqli_connect('localhost', 'root', '', 'srms');
        if ($con == false) {
            echo "Error in connection";
        } else {
            $select = "SELECT * FROM `student_info` WHERE `emailid`='$emailid'  AND `regno`='$regno'";
            $query = mysqli_query($con, $select);
            $row = mysqli_num_rows($query);
            if ($row == 1) {
                $data = mysqli_fetch_assoc($query);

                $_SESSION['name'] = $data['name'];
                if ($_SESSION['name']) {
                    echo '<script>alert("Hello ' . $_SESSION['name'] . '");</script>';
                } else {
                    echo "Error";
                }
                $total_int = (int)$data["total"];
                $sgpa = ($total_int / 250) * 10;

                echo "<div class='container jumbotron' style='padding: 8%;'>";

                echo "<div class='row'>";
                echo "<div class='col-lg-2'>";
                echo "<img class='student-image' src='" . $data["image"] . "' alt='Student image' />";
                echo "</div>";
                echo " <div class='col-lg-6 content'>";
                echo "<h6><b>Name</b> - " . $data["name"] . "</h6>";
                echo "<h6><b>Section</b> - " . $data["section"] . "</h6>";
                echo "<h6><b>Email address</b> - " . $data["emailid"] . "</h6>";
                echo "<h6><b>RollNo</b> - " . $data["rollno"] . "</h6>";
                echo "<h6><b>RegNo</b> - " . $data["regno"] . "</h6>";
                echo "<h6><b>SGPA</b> - " . $sgpa . "</h6>";
                echo "</div>";
                echo "</div>";

                echo "<br /><br />";

                echo "<table class='table'>";

                echo " <thead class='thead-dark'>";
                echo "<tr>";
                echo " <th scope='col'>#</th>";
                echo " <th scope='col'>Subject</th>";
                echo " <th scope='col'>Mark Obtained</th>";
                echo " <th scope='col'>Total Mark</th>";
                echo "</tr>";
                echo "</thead>";

                echo "<tbody>";

                echo "<tr>";
                echo "<th scope='row'>1</th>";
                echo "<td>Mathematics - II</td>";
                echo "<td>" . $data['math_2'] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>2</th>";
                echo "<td>Data Structure & Algorithm</td>";
                echo "<td>" . $data["dsa"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>3</th>";
                echo "<td>Basic Electronics</td>";
                echo "<td>" . $data["be"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>4</th>";
                echo "<td>Chemistry</td>";
                echo "<td>" . $data["chemistry"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'>5</th>";
                echo "<td>Communicative English & Technical Commuincation</td>";
                echo "<td>" . $data["cetc"] . "</td>";
                echo "<td>/ 50</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th scope='row'></th>";
                echo "<td><b>Subtotal</b></td>";
                echo "<td>" . $data["total"] . "</td>";
                echo "<td><b>/ 250</b></td>";
                echo "</tr>";

                echo "</tbody>";
                echo "</table>";

                if ($data["status"] == 'Pass')
                    echo "<h3><b>Status</b> - <span style='color: #21bf73;'>Pass</span></h3>";
                else
                    echo "<h3><b>Status</b> - <span style='color: #ff0000;'>Fail</span></h3>";

                echo '<button onclick="printPage()" class="print_btn">Print</button>';


                echo "</div>";
            } else {
    ?>



    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="../index.html">
        <img
          class="logo-one"
          src="../asset/images/phcetlogo-400x53.png"
          alt="Navbar logo"
        />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="true"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="../index.html">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../service-pages/result-form.html"
              >Result</a
            >
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../index.html#about">About Us</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact Us</a>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link btn btn-primary"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              <span>Login</span>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../service-pages/admin-login.html"
                >As Admin</a
              >
              <a class="dropdown-item" href="../php/logout.php">Logout</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <h1 class="head text-center">
      Fill the Result Details Here
    </h1>

    <form
      class="jumbotron"
      method="POST"
      action="../php/admin-delete-data.php"
      onsubmit="return validation()"
      enctype="multipart/form-data"
    >

    Enter student Reg No.:<input type="text"/>
    <button type="submit" class="btn btn-dark" name="submit">Submit</button>

  
  
  </form>
    
      

    
    <footer id="contact">
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <a href="../index.html">
                <img
                  class="logo2"
                  src="../asset/images/MESLogo.png"
                  alt="logo2"
                />
              </a>
              <p class="content1">
                The MES group after establishing its name in the field of education with the experience of around 30 years, ventured into the field of Engineering education with the establishment of PIIT in the year 1999 in Panvel. Subsequently, after successfully running PIIT for more than a decade, MES set up the Pillai HOC College of Engineering and Technology (PHCET) at Rasayani. PHCET offers both undergraduate (Bachelor of Engineering) and postgraduate (Master in Engineering) programs.                
              </p>
            </div>

            <div class="col-lg-4 col-md-6">
              <h6 class="content2">CONTACT US</h6>
              <div class="social-icons">
                <a
                  class="icon-link"
                  href="https://www.facebook.com/groups/494989947209764/"
                  ><i class="fa fa-facebook" aria-hidden="true"></i
                ></a>
                <a
                  class="icon-link"
                  href="https://www.instagram.com/pillaihoccollege/"
                  ><i class="fa fa-instagram" aria-hidden="true"></i
                ></a>
                <a class="icon-link" href="https://twitter.com/csiphcet/status/1428214532741152772"
                  ><i class="fa fa-twitter" aria-hidden="true"></i
                ></a>
                <a
                  class="icon-link"
                  href="https://www.linkedin.com/company/tpc-phcet/?originalSubdomain=in"
                  ><i class="fa fa-linkedin" aria-hidden="true"></i
                ></a>
                <a
                  class="icon-link"
                  href="https://www.youtube.com/"
                  ><i class="fa fa-youtube" aria-hidden="true"></i
                ></a>
                <a
                  class="icon-link"
                  href="https://api.whatsapp.com/"
                  ><i class="fa fa-whatsapp" aria-hidden="true"></i
                ></a>

                <br /><br />
                <p class="contact-details">
                  <i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;
                  <a
                    href="mailto:enquiry@giet.edu"
                    style="color: #fff; text-decoration: none;"
                  >
                    enquiry@phcet.edu</a
                  >
                  <br /><br />
                  <i class="fa fa-phone" aria-hidden="true"></i> &nbsp; +91
                  9876543210, 7894561230 <br /><br />
                  <i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp;
                  Pillai HOC College of Engineering Rasayani Khalapur
                </p>
              </div>
            </div>

            <div class="col-lg-4 mt-3">
              <h4>PHCET Rasayani</h4>
              <div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.841484326477!2d73.17426727471644!3d18.89411215765839!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e6af4a9b7a47%3A0x30dbd3b0d3c14416!2sPillai%20HOC%20College%20Of%20Engineering%20%26%20Technology!5e0!3m2!1sen!2sin!4v1711473240223!5m2!1sen!2sin" width="500" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>              </div>
              </div>
            </div>
          </div>
        </div>

        <div class="footer2">
          PHCET Rasayani&nbsp;&copy;&nbsp;2024 All Rights Reserved.
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="../javascript/index.js"></script>

    <script src="../javascript/result-form-validation.js"></script>
  </body>
</html>
