<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
    //something was posted
    $full_name = $_POST['full_name'];
    $email_id = $_POST['email_id'];
    $phone_number = $_POST['phone_number'];
    $age = $_POST['age'];
    $blood_group = $_POST['blood_group'];
    $city = $_POST['city'];
    

    if(!empty($full_name) && !empty($email_id) && !empty($phone_number) && !empty($age) && !empty($blood_group)
    && !empty($city) && !is_numeric($full_name))
    {
        //save to database
        $donor_id = random_num(11);
        $query = "INSERT INTO donor (donor_id,full_name,email_id,phone_number,age,blood_group,city) VALUES ('$donor_id','$full_name','$email_id','$phone_number','$age',
        '$blood_group','$city')";

            ?>
<script>
alert("successful");
</script>
<?php
            mysqli_query($con, $query);


            header("Location: account.php");
            die;
        }else
        {
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css\donor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="title">Plasma Donation</div>
        <div class="content">
            <form action="#" method="POST" onsubmit="return myfun()">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="full_name" id="full_name" placeholder="Enter your name">
                        <span id="fullname" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Email Id</span>
                        <input type="text" name="email_id" id="email_id" placeholder="Enter your email">
                        <span id="email" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone_number" id="phone_number" placeholder="Enter your number">
                        <span id="phone" class="text-danger font-weight-bold"></span>

                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="age" id="age" placeholder="Enter your age">
                        <span id="ag" class="text-danger font-weight-bold"></span>
                    </div>
                    <div class="input-box">
                        <label for="">Blood Group</label>
                        <select name="blood_group" id="blood_group"
                            class="form-control demo-default text-center margin10px">
                            <option value="">-- Select --</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>

                        </select>
                    </div>

                    <div class="input-box">
                        <label for="">City</label>
                        <select name="city" id="city" class="form-control demo-default text-center margin10px">
                            <option value="">-- Select City --</option>
                            <option value="Badlapur">Badlapur</option>
                            <option value="Ambernath">Ambernath</option>
                            <option value="Ulhasnagar">Ulhasnagar</option>
                            <option value="Vithalwadi">Vithalwadi</option>
                            <option value="Kalyan">Kalyan</option>
                            <option value="Thakurli">Thakurli</option>
                            <option value="Dombivli">Dombivli</option>
                            <option value="Thane">Thane</option>
                            <option value="Mulund">Mulund</option>
                            <option value="Bhandup">Bhandup</option>
                            <option value="Kanjur Marg">Kanjur Marg</option>
                            <option value="Ghatkopar">Ghatkopar</option>

                        </select>
                    </div>
                </div>

                <div class="button">
                    <input type="submit" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
    <script>
    function myfun() {
        const username = document.getElementById('full_name');
        const email = document.getElementById('email_id');
        const phone_number = document.getElementById('phone_number');
        var age = document.getElementById('age').value;
        const blood_group = document.getElementById('blood_group');
        const city = document.getElementById('city');

        if (username.value == "") {
            document.getElementById('fullname').innerHTML = "**Name cannot be empty";
            return false;
        } else if (username.value.length < 3) {
            document.getElementById('fullname').innerHTML = "**Name cannot be less than 3 letters";
            return false;
        } else if (!isNaN(username.value)) {
            document.getElementById('fullname').innerHTML = "**Name cannot contain number";
            return false;
        }
        //email validation//

        if (email.value == "") {
            document.getElementById('email').innerHTML = "**email id cannot be empty";
            return false;
        } else if (email.value.indexOf('@') <= 0) {
            document.getElementById('email').innerHTML = "**invalid @ position";
            return false;
        } else if (email.value.indexOf('@') < 3 || email.value.lastIndexOf('.') >= email.value.length - 2) {
            document.getElementById('email').innerHTML = "**invalid . position";
            return false;
        }

        if (phone_number.value == "") {
            document.getElementById('phone').innerHTML = "**phone number cannot be empty";
            return false;
        } else if (isNaN(phone_number.value)) {
            document.getElementById('phone').innerHTML = "**phone number cannot contain letters";
            return false;
        } else if (phone_number.value.length != 10) {
            document.getElementById('phone').innerHTML = "**phone number must be 10 digits";
            return false;
        }

        if (age == "") {
            document.getElementById('ag').innerHTML = "**age cannot be empty";
            return false;
        }
        age = parseInt(age, 10);
        if (isNaN(age) || age < 18 || age > 65) {
            document.getElementById('ag').innerHTML = "**age must be between 18 and 65";
            return false;
        }
    }
    </script>
</body>

</html>