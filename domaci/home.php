<?php

require 'db_connection.php';
require 'model/user.php';
require 'model/member_membership.php';

session_start();

if (!isset($_SESSION['UserID'])) {
  header('Location: index.php');
  exit();
}

// $result = MemberMembership::getAll($conn);

// if (!$result) {
//   echo "An error occured while reading the database!";
//   die();
// }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

  <title>Gym Membership Management System - Home Page</title>
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo"><a href="home.php">Gym Membership Management System</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scr ollto active" href="">Home</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>

          <li><a class="getstarted scrollto">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <br><br><br><br>

  <section id="login-section" class="d-flex align-items-center">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">member_id</th>
          <th scope="col">membership_id</th>
          <th scope="col">start_date</th>
          <th scope="col">status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = MemberMembership::getAll($conn);
        if ($result != null) {
          foreach ($result as $row) {
        ?>
            <tr>
              <td><?php echo $row->member_id; ?></td>
              <td><?php echo $row->membership_id; ?></td>
              <td><?php echo $row->start_date ?></td>
              <td><?php echo $row->status; ?></td>
            </tr>
        <?php
          }
        }
        ?>
      </tbody>
    </table>
    <?php
    $conn->close();
    ?>
  </section>


</body>

</html>