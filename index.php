<?php
$insert=false;
if(isset($_POST['name']))
{
$server="localhost";
$username="root";
$password="root";
$con=mysqli_connect($server,$username,$password);
if(!$con)
{
die("Connection to database failed".mysqli_connect_error());
}
// echo "success connecting to db";

//name, gender, age, email, phone, other
$name=$_POST['name'];
$gender=$_POST['gender'];
$age=$_POST['age'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$other=$_POST['desc'];


$sql="INSERT INTO `demo`.`demo`(`name`,`gender`,`age`,`email`,`phone`,`other`)
VALUES ('$name','$gender','$age','$email','$phone','$other')";
//echo $sql;

if($con->query($sql) == true)
{
    $insert=true;
    //  echo "successfully insert data in database";
}
else{
    echo "error=$sql <br> $con->error";
   }
$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to travel form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
</head>

<body>
    <img class="bg"src="bg.jpg" alt="image form google">
    <div class="container">
        <h1>Welcome to Amrutvahini college visit Form</h1>
        <p>Enter the details and submit the form to comfirm the seat</p>
        <?php
        if($insert==true){
            
            echo "<p>Thank for submit form to comfirm the seat to visit</p>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter the name">
            <input type="text" name="age" id="age" placeholder="Enter the age">
            <input type="text" name="gender" id="gender" placeholder="Enter the gender">
            <input type="email" name="email" id="email" placeholder="Enter the Email">
            <input type="phone" name="phone" id="phone" placeholder="Enter the  phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter the  Description"></textarea>
            <button class="btn">submit</button>
            

        </form>

    </div>


    <script src="index.js"></script>
</body>

</html>