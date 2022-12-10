<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Account</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="css/account.css">
</head>

<body>
    <div class="wrapper">
        <nav>
            <div class="logo">
                IMMUNEALIFE
            </div>
            <input type="checkbox" id="click">
            <label for="click" class="menu-btn">
                <i class="fas fa-bars"></i>
            </label>
            <ul>
                <li><a class="active" href="account.php">ACCOUNT</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
                <li><a href="status.php">STATUS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>

            </ul>
        </nav>
        <section>
            <div class="text-box1">
                <h1>HELP US SAVE LIVES</h1>
                <h1>From a COVID Survivor to a COVID Warrior.</h1>


            </div>
            <div class="text-box2">
                <h1>Be a COVID Warrior, Donate your Plasma</h1><br>
                <a href="donor.php" class="donate-btn">CLICK TO DONATE</a>

            </div>
            <div class="text-box3">
                <h1>Request Plasma</h1><br>
                <a href="request.php" class="request-btn">CLICK TO REQUEST</a>

            </div>
        </section>
        <footer>
            <footer class="footer-distributed">

                <div class="footer-left">
                    <h3><span>IMMUNEALIFE</span></h3>


                    <p class="footer-links">
                        <a href="account.php">Home</a> |
                        <a href="feedback.php">Feedback</a>

                    </p>

                    <p class="footer-company-name">Copyright © 2021 <strong>IMMUNEALIFE</strong> All rights reserved</p>
                </div>

                <div class="footer-center">
                    <div>
                        <i class="fa fa-map-marker"></i>
                        <p><span>Mumbai</span> Maharashtra
                        </p>
                    </div>

                    <div>
                        <i class="fa fa-phone"></i>
                        <p>+91 92**28*648</p>
                    </div>
                    <div>
                        <i class="fa fa-envelope"></i>
                        <p><a href="https://mail.google.com/">emmanuel@gmail.com</a></p>
                    </div>
                </div>
                <div class="footer-right">
                    <p class="footer-company-about">
                        <span>About the Website</span>
                        <strong>Developed By Emmanuel Anthony</strong>
                    </p>
                    <div class="footer-icons">
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://twitter.com/login"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/accounts/login/"><i class="fab fa-instagram"></i></a>

                    </div>
                </div>
            </footer>
</body>

</html>