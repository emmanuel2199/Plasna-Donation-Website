<?php
session_start();
    include("connection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    //something was posted
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $comment = $_POST['comment'];
        
        
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($comment) && 
        !is_numeric($name))
        {
            //save to database
            $query = "INSERT INTO `feedback` (name,email,phone,comment) VALUES ('$name','$email','$phone','$comment')";

            mysqli_query($con, $query);

            header("Location: account.php");
            die;
        }else
        {?>
        <script>alert("Please enter some valid information!");</script>
        <?php
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <?php include 'links.php';?>


    <link rel="stylesheet" href="css/feedback.css">

</head>

<body>

    <section id="form-section">
        <h1 class="h1-tag">Your Feedback Is important For Us</h1>
        <form class="form-content-section" method="POST" onsubmit="return myfun()">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                <span id="namee" class="text-danger font-weight-bold"></span>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">
                    We'll never share your email with anyone else.</small>
                    <span id="emaill" class="text-danger font-weight-bold"></span>
            </div>
            <div class="form-group">
                <label for="phone">Contact Number</label>
                <input type="text" class="form-control" name="phone" id="phone">
                <span id="phonee" class="text-danger font-weight-bold"></span>
            </div>
            <div class="form-group">
                <label for="comments">Comments</label>
                <textarea class="form-control" name="comment" id="comments" rows="4" required></textarea>
            </div>
            <div class="button">
                    <input type="submit" name="submit" value="submit" class="btn btn-primary" >
                </div>
        </form>
    </section>
<script>
     function myfun() {
        const name = document.getElementById('name');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone');

        if (name.value == "") {
            document.getElementById('namee').innerHTML = "**Name cannot be empty";
            return false;
        } else if (name.value.length < 3) {
            document.getElementById('namee').innerHTML = "**Name cannot be less than 3 letters";
            return false;
        } else if (!isNaN(name.value)) {
            document.getElementById('namee').innerHTML = "**Name cannot contain number";
            return false;
        }
        //email validation//

        if (email.value == "") {
            document.getElementById('emaill').innerHTML = "**email id cannot be empty";
            return false;
        } else if (email.value.indexOf('@') <= 0) {
            document.getElementById('emaill').innerHTML = "**invalid @ position";
            return false;
        } else if (email.value.indexOf('@') < 3 || email.value.lastIndexOf('.') >= email.value.length - 2) {
            document.getElementById('emaill').innerHTML = "**invalid . position";
            return false;
        }

        if (phone.value == "") {
            document.getElementById('phonee').innerHTML = "**phone number cannot be empty";
            return false;
        } else if (isNaN(phone.value)) {
            document.getElementById('phonee').innerHTML = "**phone number cannot contain letters";
            return false;
        } else if (phone.value.length != 10) {
            document.getElementById('phonee').innerHTML = "**phone number must be 10 digits";
            return false;
        }
    }
</script>
</body>

</html>