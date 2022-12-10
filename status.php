<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>status</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8"
        src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
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
                <li><a href="account.php">ACCOUNT</a></li>
                <li><a href="feedback.php">FEEDBACK</a></li>
                <li><a class="active" href="status.php">STATUS</a></li>
                <li><a href="logout.php">LOGOUT</a></li>

            </ul>
        </nav>
    
        <div class="container">
            <style>
            .container {
                padding-top: 0px;
            }
            </style>
            <div class="col-lg-12">
                <br><br>
                <h1 class="text-warning text-center">Donor Data </h1>
                <br>
                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">

                        <th> Id </th>
                        <th> Donor Id </th>
                        <th> Name </th>
                        <th> Email </th>
                       
                        <th> Age </th>
                        <th> Blood Group </th>
                        <th> City </th>
                        <th> Date </th>

                    </tr>

                    <?php

 
 $q = "SELECT * from donor ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
                    <tr class="text-center">
                        <td> <?php echo $res['id'];  ?> </td>
                        <td> <?php echo $res['donor_id'];  ?> </td>
                        <td> <?php echo $res['full_name'];  ?> </td>
                        <td> <?php echo $res['email_id'];  ?> </td>
                       
                        <td> <?php echo $res['age'];  ?> </td>
                        <td> <?php echo $res['blood_group'];  ?> </td>
                        <td> <?php echo $res['city'];  ?> </td>
                        <td> <?php echo $res['Date'];  ?> </td>

                    </tr>


                    <?php 
 }
  ?>

                </table>
            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#tabledata').DataTable();
        })
        </script>

        <div class="container">


            <div class="col-lg-12">

                <br><br>

                <h1 class="text-warning text-center"> Plasma Request Data </h1>
                <br>
                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">

                        <th> Id </th>
                        <th> Request Id </th>
                        <th> Name </th>
                        <th> Email </th>
                        
                        <th> Age </th>
                        <th> Blood Group </th>
                        <th> City </th>
                        <th> Date </th>
                        <th> Status </th>



                    </tr>

                    <?php

 
 $q = "SELECT * from request ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
                    <tr class="text-center">
                        <td> <?php echo $res['id'];  ?> </td>
                        <td> <?php echo $res['request_id'];  ?> </td>
                        <td> <?php echo $res['full_name'];  ?> </td>
                        <td> <?php echo $res['email_id'];  ?> </td>
                        
                        <td> <?php echo $res['age'];  ?> </td>
                        <td> <?php echo $res['blood_group'];  ?> </td>
                        <td> <?php echo $res['city'];  ?> </td>
                        <td> <?php echo $res['date'];  ?> </td>
                        <td> <?php if ($res["status"]==0)
                        {

                        echo "<a href='#' class='btn btn-danger btn-xs'><i class='fa fa-bed'></i> Pending</a>";

                    }
                    else if($res["status"]==2)
                    {

                    echo "<a href='#' class='btn btn-success btn-xs'><i class='fa fa-bed'></i> Completed</a>";

                    }
                    else if($res["status"]==1)
                    {

                    echo "<a href='#' class='btn btn-warning btn-xs'><i class='fa fa-bed'></i> Not Completed</a>
                    ";

                    }?>
                        </td>
                    </tr>
                    <?php  
}
  ?>
                </table>


            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#tabledata').DataTable();
        })
        </script>


        <?php include 'adminscript.php';?>

        
        <footer>
            <footer class="footer-distributed">

                <div class="footer-left">
                    <h3><span>IMMUNEALIFE</span></h3>


                    <p class="footer-links">
                        <a href="account.php">Home</a> |
                        <a href="feedback.php">Feedback</a> |
                        <a href="feedback.php">Status</a>
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