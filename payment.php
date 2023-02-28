<?php include "includes/db.php"; ?>


<?php ob_start(); ?>
<?php session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Projectworlds Bus - Book Your Bus Ticket Online</title>

    <link href="css/main.css" rel="stylesheet">
    <link href="css/payment.css" rel="stylesheet">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-with-map.css">






</head>

<body style="background-color:#eff2f8">


    <!-- Navigation -->


        <nav class="navbar navbar-inverse navbar-fixed-top" style="background-color: #182c39;" role="navigation">
            <div class="container" style="padding-top:8px; padding-bottom:8px;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php" style="font-weight:bold; color:#fff; padding-right:200px;">BusIT.com - Online Bus Ticket Booking</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php

                            $query = "SELECT *  FROM  categories";
                            $select_all_categories_query = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                                $cat_title = $row['cat_title'];
                                $cat_id = $row['cat_id'];
                                echo "<li> <a href='category.php?category=$cat_id'> {$cat_title} </a></li>";
                            }
                         ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <?php
                        if(isset($_SESSION['s_username'])) {
                            if ($_SESSION['s_role']=='admin') {
                                ?>
                                <li>
                                    <a href="admin/index.php"><i class="fa fa-fw fa-child"></i>Admin</a>
                                </li>
                        }
                        <?php } } ?>
                      <!--  <li>
                           <a href="#">About</a>
                       </li> -->

                       <?php

                           if (!isset($_SESSION['s_username'])) {
                               ?><li><a onclick="loginShow()" style="color:#fff;font-weight:bold;background-color:rgba(66, 193, 42, 0.81);
                               border-radius:10px;padding:10px 23px 10px 23px;margin-top:5px;" href="index.php">Login</a></li>
                            <?php } ?>
                        <li>
                            <a href="registration.php"><i class="fa fa-fw fa-desktop"></i>Register Here!</a>
                        </li>



                        <?php
                            if (isset($_SESSION['s_username'])) {
                                # code...
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php

                                    if(isset($_SESSION['s_username']))
                                    echo ucfirst($_SESSION['s_username']); ?> <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                        </li>
                                    </ul>
                                </li>

                        <?php    }
                        ?>


                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>






        <div class="row" style="margin-top: 10%;">
      <div class="col-lg-8">
        <div class="container pay">
          <form action="">

            <div class="row">


              <div class="container col-lg-7" style="padding-left:20%;padding-bottom:100px;">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container pay">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="Raviendra Dev">
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="5211-2222-3333-4444">
                <label for="expmonth">Exp Month/Year</label>
                <input style="width:30%;"type="text" id="expmonth" name="expmonth" placeholder="MM/YY">



                    <label style="padding-left:70px;" for="cvv">CVV</label>
                    <input style="width:20%;" type="text" id="cvv" name="cvv" placeholder="352">


                <label>
                  <input type="checkbox" checked="checked" name="sameadr"> Accept Terms and Conditions
                </label>

                <a href="profile.php" class="btn">Make Payment</a>

              </div>

            </div>

          </form>
        </div>
      </div>


    </div>
</div>





<footer id="myFooter" >
<div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6">
        <div class="footer-info">
          <h3 style="font-size: 30px;padding: 2px 0 10px 0;
          font-weight: 300;font-family: "Poppins", sans-serif;">BusIT.com</h3>
          <p>
            17th Street, Mysore <br>
            MY- 571122, Karnataka, India.<br><br>
            <strong>Phone:</strong> +91 88 22 334455<br>
            <strong>Email:</strong> BusIT@example.com<br>
          </p>

        </div>
      </div>

        <div class="col-sm-3">
            <h5>Get started</h5>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="registration.php">Sign up</a></li>
                <li><a href="#">Log in</a></li>
            </ul>
        </div>

        <div class="col-sm-3">
            <h5>Support</h5>
            <ul>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Help desk</a></li>
                <li><a href="#">Forums</a></li>
                <li><a href="#">Contact us</a></li>
            </ul>
        </div>
        <div class="col-sm-3">
            <h5>Legal</h5>
            <ul>
                <li><a href="#">Terms of Service</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#">Privacy Policy</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="social-networks">
     <class="twitter"><i class="fa fa-twitter" style=" color: #00aced;"></i>
     <class="facebook"><i class="fa fa-facebook" style="color: #2b55ff;"></i>
     <class="google"><i class="fa fa-google-plus" style="color: red;"></i>
     <class="instagram"><i class="fa fa-instagram" style="color: rgba(255, 0, 96, 1);"></i>
     <class="linkedin"><i class="fa fa-linkedin" style="color: #0077b5;"></i>
</div>
<div class="footer-copyright">
  <p>  &copy; Copyright <a href="#" style="color:#fff;"><strong><span>BusIT.com</span></strong></a>. All Rights Reserved </p>
</div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

function myBooked() {
alert("Your Tickets are Successfully Booked");
}
function myComment() {
alert("Your Reviews were Successfully Submitted");
}
function myReg() {
alert("Your Successfully Registered");
}
</script>


<!-- jQuery -->
<!-- <script src="js/jquery.js"></script> -->

<!-- Bootstrap Core JavaScript -->
<!-- <script src="js/bootstrap.min.js"></script>  -->

</body>

</html>
