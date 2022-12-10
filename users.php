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

    <title>user</title>
</head>

<body>
    <form action="#" method="POST">
        <?php include 'layout.php';?>

        <div class="container">
            <style>
            .container {
                padding-top: 90px;
            }
            </style>
            <div class="col-lg-12">
                <br><br>
                <h1 class="text-warning text-center">User Data </h1>
                <br>
                <table id="tabledata" class=" table table-striped table-hover table-bordered">

                    <tr class="bg-dark text-white text-center">

                        <th> Id </th>
                        <th> User Id </th>
                        <th> Username </th>
                        <th> Email </th>
                        <th> Date </th>
                        <th> Delete </th>
                        

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
                        <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>"
                                    class="text-white"> Delete </a> </button> </td>


                    </tr>

                    <?php 
 }
  ?>

                </table>
                <td> <button class="btn-primary btn"> <a href="insert.php" class="text-white"> Insert </a> </button> </td>
            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function() {
            $('#tabledata').DataTable();
        })
        </script>
        </section>
    </form>
    <?php include 'adminscript.php';?>
</body>

</html>