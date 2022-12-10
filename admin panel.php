<?php
include 'adminlogout.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php';?>
</head>

<body>
    <form action="#" method="POST">

        <?php include 'layout.php'?>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Users</div>
                        <div class="number">
                            <?php
                                $selectquery = "SELECT * FROM `users`";
                                $query = mysqli_query($con,$selectquery);
                                $nums = mysqli_num_rows($query);
                                echo $nums;
                                ?>
                        </div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='fas fa-user-edit cart one'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Plasma Donors</div>
                        <div class="number">
                            <?php
                                $selectquery = "SELECT * FROM `donor`";
                                $query = mysqli_query($con,$selectquery);
                                $nums = mysqli_num_rows($query);
                                echo $nums;
                                ?>
                        </div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bx-donate-blood cart two'></i>

                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Plasma Requests</div>
                        <div class="number">
                            <?php
                                $selectquery = "SELECT * FROM `request`";
                                $query = mysqli_query($con,$selectquery);
                                $nums = mysqli_num_rows($query);
                                echo $nums;
                                ?>
                        </div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='fas fa-procedures cart three'></i>
                </div>

            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Users</div>
                    <div class="sales-details">
                        <div class="container">
                            <div class="col-lg-12">
                                <br>
                               
                                
                                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                                    <tr class="bg-dark text-white text-center">

                                        <th> Id </th>
                                        <th> User Id </th>
                                        <th> Username </th>
                                        <th> Email </th>
                                        <th> Date </th>
                                        
                                    </tr>

                                    <?php

 
 $q = "SELECT * from users ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
                                    <tr class="text-center">
                                        <td> <?php echo $res['id'];  ?> </td>
                                        <td> <?php echo $res['user_id'];  ?> </td>
                                        <td> <?php echo $res['User_name'];  ?> </td>
                                        <td> <?php echo $res['Email'];  ?> </td>
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


                    </div>
                    
                </div>

            </div>
        </div>
        </section>
    </form>

    <?php include 'adminscript.php';?>

</body>

</html>