<?php
include 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Update</title>

</head>

<body>
    <?php
   include 'layout.php';
  ?>
    <div class="container">
        <!--<div class="row">
		<div class="col-sm-3">
		
		</div>-->
        <div class="col-sm-9">
            <h3 class='text-primary'><i class="fa fa-bed"></i> Patient Details </h3>
            <hr>
            <div class="row">
                <?php 
		
			if(isset($_POST["submit"]))
			{
				$id=$_GET['id'];
				
				$status=$_POST["status"];
				if($status=="")
				{
					
					$status=1;
				}
        $sql="UPDATE request SET status='{$status}' WHERE ID='{$id}'";
				if($con->query($sql))
				{
					
					$s= "<div class='alert alert-success fade in' ><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Success : </strong> Status Updated Success.</div>";
				}
			
			}

      if(isset($_GET["id"]))
		{
			$sql="SELECT * FROM request WHERE ID=".$_GET["id"];
			$result=$con->query($sql);
			if($result->num_rows>0)
			{
				$row=$result->fetch_assoc();
				
		?>
                <div class="col-md-4">
                    <div class="panel">
                        <div class="panel-body">
                            <!--<img src="<?php echo $row["PIC"];?>" class="image-rounded" height="300px" width="100%">-->
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <table class="table table-striped">
                        <tr>
                            <th>Request_id</th>
                            <td><?php echo $row["request_id"];?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $row["full_name"];?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row["email_id"];?></td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td><?php echo $row["phone_number"];?></td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td><?php echo $row["age"];?></td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td><?php echo $row["blood_group"];?></td>
                        </tr>
                        <tr>
                            <th>City</th>
                            <td><?php echo $row["city"];?></td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td><?php 
                            if($row["status"]==0)
                            {
                              echo "<b>Pending</b>";
                            }
                            else if($row["status"]==1)
                            {
                              echo "<b>Not Completed</b>";
                            }	
                            else if($row["status"]==2)
                            {
                              echo "<b>Completed</b>";
                            }
                              
                              
                              ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <h3 class='text-primary'>Any Updation</h3>
                    <hr>
                    <?php if(isset($s)){echo $s;}?>
                    <form method='post' action="<?php echo $_SERVER['PHP_SELF']."?id=".$_GET["id"];?>">
                        <div class="form-group">
                            <label for="status">status</label>
                            <select name="status" required id="status" class="form-control">
                                <option value="">Select Status</option>
                                <option value="0">Pending</option>
                                <option value="1">Not Completed</option>
                                <option value="2">Completed</option>
                            </select>
                        </div>
                        <button type='submit' class='btn btn-success ' name='submit'><i class='fa fa-edit'></i> Update
                            Now</button>
                        <a href='adminrequest.php' class='btn btn-primary '>Back Page</a>
                    </form>
                </div>
                <?php
                  }
                }	
               /*/ else
                {
                echo "<script>window.open('admin_donor.php','_self');</script>";
                }/*/

                ?>

            </div>
        </div>
    </div>
    </div>






    <?php include 'adminscript.php';?>

</body>

</html>