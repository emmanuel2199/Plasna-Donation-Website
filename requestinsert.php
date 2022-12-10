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
        $query = "INSERT INTO request (request_id,full_name,email_id,phone_number,age,blood_group,city) VALUES ('$donor_id','$full_name','$email_id','$phone_number','$age',
        '$blood_group','$city')";

            ?>
<script>
alert("successful");
</script>
<?php
            mysqli_query($con, $query);


            header("Location: adminrequest.php");
            die;
        }else
        {
            echo "Please enter some valid imformation!";
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="col-lg-6 m-auto">

        <form method="post">

            <br><br>
            <div class="card">

                <div class="card-header bg-dark">
                    <h1 class="text-white text-center"> Plasma Request Record Insert </h1>
                </div><br>

                <label> Name: </label>
                <input type="text" name="full_name" class="form-control"> <br>

                <label> Email: </label>
                <input type="text" name="email_id" class="form-control"> <br>

                <label> Phone Number: </label>
                <input type="text" name="phone_number" class="form-control"> <br>

                <label> Age: </label>
                <input type="text" name="age" class="form-control"> <br>


                <label for="">Blood Group</label>
                <select name="blood_group" id="blood_group" class="form-control demo-default text-center margin10px">

                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>

                </select>

                <label for="">City</label>
                <select name="city" id="city" class="form-control demo-default text-center margin10px" required>
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
                <br>
                <button class="btn btn-success" type="submit" name="done"> Submit </button><br>
            </div>
    </div>
    </form>
    </div>
</body>

</html>