<?php

$servername = "localhost";
$userName = "root";
$password = null; 
$databaseName = "batch79";


$conn = mysqli_connect($servername,$userName,$password,$databaseName);

if($conn){
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>connection successfully</strong> Now you can proceed further
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    echo "<br/>";
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>connection not success</strong> You can't proceed further!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>".mysqli_connect_error();
    echo "<br/>";
}

if(isset($_POST['loginBtn'])){
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // echo  $email;
    // echo  $pwd;
    

    $query = "select * from info where email = '{$email}' and pass = '{$pwd}'";
    $result = mysqli_query($conn, $query);

    // print_r($result);
    
    $getDetails = mysqli_fetch_assoc($result);
    $rows = mysqli_num_rows($result);
    echo $rows;
    echo "<br/>";
    
    if($rows>0){
        print_r($getDetails);
        session_start();
        $_SESSION['userName'] = $getDetails['name'];
        echo "<br/>";
        echo $getDetails['name'];
        header("location:index.php");
        echo "data get";
    }else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>data not get</strong> You can't proceed further!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            echo "<br/>";
    }
}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>data not get</strong> You can't proceed further!
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
            echo "<br/>";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <?php
        include("./bootstrapScript.php")
    ?>
</head>
<body>
    <?php
        include("./Navbar.php")
    ?>

<form action="" method="post">
        <div class="register_container">
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label class="form-label">Enter your Password</label>
                <input type="password" name="pwd" class="form-control">
            </div>
            
            <div class="mb-3">
                <a href="forgotpassword.php">Forgot Password</a>
            </div>


            <button type="submit" name="loginBtn" value="login" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>