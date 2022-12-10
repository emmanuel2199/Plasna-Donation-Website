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
    <title>Feedback</title>
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
            
            <h1 class="text-warning text-center"> User Feedback </h1>
            <br>
            <table id="tabledata" class=" table table-striped table-hover table-bordered">

                <tr class="bg-dark text-white text-center">

                    <th> Id </th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Phone Number </th>
                    <th> Comment </th>
    
                </tr>

                <?php

 
 $q = "SELECT * from feedback ";

 $query = mysqli_query($con,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
                <tr class="text-center">
                    <td> <?php echo $res['id'];  ?> </td>
                    <td> <?php echo $res['name'];  ?> </td>
                    <td> <?php echo $res['email'];  ?> </td>
                    <td> <?php echo $res['phone'];  ?> </td>
                    <td> <?php echo $res['comment'];  ?> </td>
                    
                    
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

</body>

</html>