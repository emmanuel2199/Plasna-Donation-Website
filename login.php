<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Email_id = $_POST['email_id'];
        $Password = $_POST['password'];

		if(!empty($Email_id) && !empty($Password) && !is_numeric($Email_id))
		{

			//read from database
			$query = "SELECT * from users where Email = '$Email_id' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['Password'] === $Password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: account.php");
						die;
					}
				}
			}
			?>
<script>
alert("wrong username or password!");
</script>
<?php
        }else
		{
			echo "wrong username or password!";
		}
	}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Login Form</title>
</head>

<body>

    <div class="login-wrapper">
        <form action="login.php" class="form" method="POST">

            <h2>Login</h2>
            <div class="input-group">
                <input id="text" type="text" name="email_id">

                <label for="email_id">Email Id</label>
            </div>
            <div class="input-group">
                <input id="text" type="password" name="password">
                <label for="password">Password</label>
            </div>
            <input id="button" type="submit" value="Login" class="submit-btn">
           <!-- <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a>-->

            <div class="reg">
                <a href="reg.php">Don't have an account register here</a>
            </div>
        </form>

        <div id="forgot-pw">
            <form action="" class="form">
                <a href="#" class="close">&times;</a>
                <h2>Reset Password</h2>
                <div class="input-group">
                    <input type="email" name="email" id="email" required>
                    <label for="email">Email</label>
                </div>
                <input id="button" type="submit" value="Login" class="submit-btn">
            </form>
        </div>
    </div>
    <footer>
        <footer class="footer-distributed">

            <div class="footer-left">
                <h3><span>IMMUNEALIFE</span></h3>


                <p class="footer-links">
                    <a href="index.php">Home</a> |
                    <a href="about.php">About</a> |
                    <a href="donate.php">Donate</a> |
                    <a href="login.php">Login</a> |
                    <a href="blog.php">Blog</a>
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
                    <p><a href="emmanuel.c.anthony2199@gmail.com">emmanuel@gmail.com</a></p>
                </div>
            </div>
            <div class="footer-right">
                <p class="footer-company-about">
                    <span>About the Website</span>
                    <strong>Developed By Emmanuel Anthony</strong>
                </p>
                <div class="footer-icons">
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                    <a href=""><i class="fab fa-instagram"></i></a>

                </div>
            </div>
        </footer>
</body>

</html>