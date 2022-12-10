<?php
include 'adminlogout.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Donation</title>
</head>

<body>
    <form action="#" method="POST">
        <?php include 'layout.php'?>
    </form>
    <div class="container">
        <style>
        .container {
            padding-top: 50px;
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
                    <th> Phone Number </th>
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
                    <td> <?php echo $res['phone_number'];  ?> </td>
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
        <style>
        .container {
            padding-top: 60px;
        }
        </style>
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
                    <th> Phone Number </th>
                    <th> Age </th>
                    <th> Blood Group </th>
                    <th> City </th>
                    <th> Date </th>


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
                    <td> <?php echo $res['phone_number'];  ?> </td>
                    <td> <?php echo $res['age'];  ?> </td>
                    <td> <?php echo $res['blood_group'];  ?> </td>
                    <td> <?php echo $res['city'];  ?> </td>
                    <td> <?php echo $res['date'];  ?> </td>
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

    <div class="type" style="padding: 40px 150px">
        <label style="color: #032B41"><u></u></label>
        <br><br>
        <form class="" action="" method="post">
            <label style="font-size:20px">Enter ID of Donor:</label>
            <input type="text" name="did" placeholder="ID of Donor"
                style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
            &nbsp;<label style="font-size:20px"> Enter ID of Patient:</label>
            <input type="text" name="pid" placeholder="ID of Patient"
                style="font-size: 22px; width: 220px; height: 40px; border-radius: 10px;">
            <br>
            <input name="sub" type="submit" value="Proceed"
                style="font-weight:bold;font-size: 12px; width: 90px; height: 35px;border-radius:10px;background-color:#F9054B;font-size:18px;">
            <br></br>
        </form>
    </div>

    
</body>

</html>