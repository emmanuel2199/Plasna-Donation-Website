<?php
include ("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="login-wrapper">
        <form action="" class="form" method="POST">

            <h2>Admin Login</h2>
            <div class="input-group">
                <input type="text" name="admin" id="admin">
                <label for="admin">Admin Name</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="password">
                <label for="password">Password</label>
            </div>
            <input type="submit" value="Login" name="login" class="submit-btn">

        </form>

        <?php
    
    if(isset($_POST['login']))
    {
      $admin = $_POST['admin'];
      $password = $_POST['password'];

      $query = "SELECT * FROM `admin` WHERE admin = '$admin' && password = '$password'";
      $data = mysqli_query($con,$query);

      $total = mysqli_num_rows($data);
      if ($total == 1)
      {
        session_start();
        $_SESSION['adminloginid']=$_POST['admin'];
        header ('Location: admin panel.php'); 
      }
      else
      {
        ?>
        <script>
        alert("incorrect name or password!");
        </script>
        <?php
      }
      
      }
    
    ?>
    </div>
</body>

</html>