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
    <title>request</title>
</head>

<body>
    <form action="#" method="POST">
        <?php include 'layout.php'?>
    </form>
    <div class="container">
        <style>
        .container {
            padding-top: 90px;
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
                    <th> Status </th>
                    <th> Update </th>
                    <th> Delete </th>


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
                    <td> <button class="btn-primary btn"> <a href="adminview.php?id=<?php echo $res['id']; ?>"
                        class="text-white"> Edit </a> </button> </td>
                    <td> <button class="btn-danger btn"> <a href="requestdel.php?id=<?php echo $res['id']; ?>"
                                class="text-white"> Delete </a> </button> </td>

                </tr>


                <?php 
     
}

  ?>

            </table>

            <button class="btn-primary btn"> <a href="requestinsert.php" class="text-white"> Insert </a> </button>
        </div>
    </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#tabledata').DataTable();
        })
        </script>

        <?php include 'adminscript.php';?>

</body>

</html>