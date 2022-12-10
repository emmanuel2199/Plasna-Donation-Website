<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    //something was posted
        $User_name = $_POST['user_name'];
        $Email_id = $_POST['email_id'];
        $Password = $_POST['password'];
        $Confirm_password = $_POST['cf_password'];
        
        
        if(!empty($User_name) && !empty($Email_id) && !empty($Password) && !empty($Confirm_password) && 
        !is_numeric($User_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "INSERT INTO users (user_id,User_name,Email,Password,Confirm_password) VALUES ('$user_id','$User_name','$Email_id','$Password','$Confirm_password')";

            mysqli_query($con, $query);

            header("Location: users.php");
            die;
        }else
        {?>
        <script>alert("Please enter some valid imformation!");</script>
        <?php
        }
    }
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>form validation</title>
    <link rel="stylesheet" href="">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <style>
    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    body {
        background-image: linear-gradient(rgba(0, 0, 0, 1.0), rgba(0, 0, 0, 0.1)), url('images/f1.jpg');
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-blend-mode: darken;
        opacity: 0.98;
        height: 100vh;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: 'Ubuntu', sans-serif;
    }

    .container {
        background-color: white;
        border-radius: 7px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        width: 437px;
        max-width: 100%;

    }

    .header {
        text-align: center;
        padding: 20px;
        background-color: #19519b;
    }

    .header h2 {
        margin: 0;
        font-size: 30px;
    }

    .main-form {
        padding: 30px 40px;
    }

    .form {
        padding-bottom: 20px;
        margin-bottom: 10px;
        position: relative;
    }

    .form input {
        border: 2px solid #f0f0f0;
        border-radius: 4px;
        font-family: inherit;
        width: 100%;
        padding: 12px;
        display: block;
        font-size: 14px;
    }

    .form i {
        position: absolute;
        top: 32px;
        right: 10px;
        visibility: hidden;
    }

    .form small {
        position: absolute;
        bottom: 0;
        left: 5px;
        visibility: hidden;
    }

    button {
        width: 100%;
        font-family: inherit;
        font-size: 18px;
        padding: 10px;
        border-radius: 7px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        cursor: pointer;
        color: white;
        background-color: #19519b;
        outline: none;
    }

    button:hover {
        background-color: black;
        color: white;
    }

    .login {
        padding-top: 10px;
    }

    @media(max-width:998px) {
        .container {
            width: calc(100vw - 10vw);

            max-width: 100%;



        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Registration Form</h2>
            <div><i style='font-size:24px' class='fas'>&#xf2bd;</i></div>
        </div>
        <form action="" class="main-form" onsubmit="return myfun()" method='POST'>
            <div class="form">
                <label for="">Username</label>
                <input type="text" placeholder="Enter your full-name" name="user_name" id="username" autocomplete="off">
                <i class="fas sucess">&#xf058;</i>
                <i class="fas error">&#xf06a;</i>
                <small class="message">error message</small>
            </div>
            <div class="form">
                <label for="">Email</label>
                <input type="email" placeholder="Enter your valid email" name="email_id" id="email" autocomplete="off">
                <i class="fas sucess">&#xf058;</i>
                <i class="fas error">&#xf06a;</i>
                <small class="message">error message</small>
            </div>
            <div class="form">
                <label for="">Password</label>
                <input type="password" placeholder="Enter your password" name="password" id="password1"
                    autocomplete="off">
                <i class="fas sucess">&#xf058;</i>
                <i class="fas error">&#xf06a;</i>
                <small class="message">error message</small>
            </div>
            <div class="form">
                <label for="">Confirm Password</label>
                <input type="password" placeholder="Please re-enter your password" name="cf_password" id="password2"
                    autocomplete="off">
                <i class="fas sucess">&#xf058;</i>
                <i class="fas error">&#xf06a;</i>
                <small class="message">error message</small>
            </div>



            <button type="submit" value="Register" name="submit" class="btn">Register</button>



        </form>

    </div>
    <script>
    function myfun() {
        const username = document.getElementById('username');
        const email = document.getElementById('email');
        const password1 = document.getElementById('password1');
        const password2 = document.getElementById('password2');
        const city = document.getElementById('city');
        const blood_group = document.getElementById('blood_group');
        const message = document.getElementsByClassName('message');
        const icon = document.querySelector('i');
        const sucess = document.getElementsByClassName('sucess');
        const error = document.getElementsByClassName('error');

        //submit sucess variable//
        let u = 0;
        let e = 0;
        let p1 = 0;
        let p2 = 0;



        //validation for username//
        if (username.value == "") {
            username.style.borderColor = 'red';
            message[0].style.visibility = 'visible';
            message[0].style.color = 'red';
            message[0].innerText = "Username cannot be blank";
            error[0].style.visibility = 'visible';
            error[0].style.color = 'red';
            u = 0;
        } else if (username.value.length < 3 && username.value.length > 0) {
            username.style.borderColor = 'red';
            message[0].style.visibility = 'visible';
            message[0].style.color = 'red';
            message[0].innerText = "Username have atleast 3 character";
            error[0].style.visibility = 'visible';
            error[0].style.color = 'red';
            u = 0;
        } else if (username.value.length > 3 && (isNaN(parseFloat(username.value)))) {
            username.style.borderColor = 'green';
            error[0].style.visibility = 'hidden';
            message[0].style.visibility = 'hidden';
            sucess[0].style.visibility = 'visible';
            sucess[0].style.color = 'green';
            u = 1;


        } else {
            username.style.borderColor = 'red';
            message[0].style.visibility = 'visible';
            message[0].style.color = 'red';
            message[0].innerText = "Number is not allowed in the beggining";
            error[0].style.visibility = 'visible';
            error[0].style.color = 'red';
            u = 0;

        }
        //email validation//

        if (email.value == "") {
            email.style.borderColor = 'red';
            message[1].style.visibility = 'visible';
            message[1].style.color = 'red';
            message[1].innerText = "Email cannot be blank";
            error[1].style.visibility = 'visible';
            error[1].style.color = 'red';
            e = 0;
        } else if (email.value.indexOf('@') < 3 || email.value.lastIndexOf('.') >= email.value.length - 2) {
            email.style.borderColor = 'red';
            message[1].style.visibility = 'visible';
            message[1].style.color = 'red';
            message[1].innerText = "Invalid email";
            error[1].style.visibility = 'visible';
            error[1].style.color = 'red';
            e = 0;
        } else {
            email.style.borderColor = 'green';
            error[1].style.visibility = 'hidden';
            message[1].style.visibility = 'hidden';
            sucess[1].style.visibility = 'visible';
            sucess[1].style.color = 'green';
            e = 1;
        }
        //validation of password//

        var numbers = /[0-9]/g;
        if (password1.value == "") {
            password1.style.borderColor = 'red';
            message[2].style.visibility = 'visible';
            message[2].style.color = 'red';
            message[2].innerText = "Password cannot be blank";
            error[2].style.visibility = 'visible';
            error[2].style.color = 'red';
            p1 = 0;
        } else if (password1.value.length < 9) {
            password1.style.borderColor = 'red';
            message[2].style.visibility = 'visible';
            message[2].style.color = 'red';
            message[2].innerText = "Password must be minimum 8 character";
            error[2].style.visibility = 'visible';
            error[2].style.color = 'red';
            p1 = 0;
        } else if (!(password1.value.match(numbers))) {
            password1.style.borderColor = 'red';
            message[2].style.visibility = 'visible';
            message[2].style.color = 'red';
            message[2].innerText = "Password have atleast a number";
            error[2].style.visibility = 'visible';
            error[2].style.color = 'red';
            p1 = 0;
        } else {
            password1.style.borderColor = 'green';
            error[2].style.visibility = 'hidden';
            message[2].style.visibility = 'hidden';
            sucess[2].style.visibility = 'visible';
            sucess[2].style.color = 'green';
            p1 = 1;
        }

        //password check//
        if (password2.value == "") {
            password2.style.borderColor = 'red';
            message[3].style.visibility = 'visible';
            message[3].style.color = 'red';
            message[3].innerText = "Password cannot be blank";
            error[3].style.visibility = 'visible';
            error[3].style.color = 'red';
            p2 = 0;
        } else if (password1.value != password2.value) {
            password2.style.borderColor = 'red';
            message[3].style.visibility = 'visible';
            message[3].style.color = 'red';
            message[3].innerText = "Password doesnot match";
            error[3].style.visibility = 'visible';
            error[3].style.color = 'red';
            p2 = 0;
        } else {
            password2.style.borderColor = 'green';
            error[3].style.visibility = 'hidden';
            message[3].style.visibility = 'hidden';
            sucess[3].style.visibility = 'visible';
            sucess[3].style.color = 'green';
            p2 = 1;
        }

        //return condition//

        if (u == 1 && e == 1 && p1 == 1 && p2 == 1) {
            return true;
        } else
            return false;

    }
    </script>
</body>

</html>