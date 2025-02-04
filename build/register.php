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

if(isset($_POST['btn']) && isset($_POST['fname'])){

    $fname = $_POST['fname'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    if($fname != "" && $number != "" && $email!="" && $pwd!="" && $cpwd!=""){
        // $Emailquery = "select * from info where email = '$email'";
        // $resultEmail = mysqli_query($conn, $Emailquery) or die("problem");

        // $emailRows = mysqli_num_rows($resultEmail);
        // echo $emailRows;
        // if($emailRows > 0){
            if($pwd == $cpwd){
                $query = "INSERT INTO `info`(`name`, `number`, `email`, `pass`, `cpassword`) VALUES (' $fname','$number','$email','$pwd','$cpwd')";
            
                $result = mysqli_query($conn, $query);
                if($result){
                    // `<script>alert("User Register succcessfully")</script>`;
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                    <strong>User Register succcessfull</strong> Now you can proceed further
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    // echo "<br/>";
                    session_start();
                    $_SESSION['userName'] = $_POST['fname'];
                    header("location:index.php");
                }else{
                    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>query not run successfully</strong> You can't proceed further!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                    echo "<br/>";
                }
            }else{
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Your password and confirm password are mismatch</strong> You can't proceed further!
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                echo "<br/>";
            }
        // }
        // else{
        //     echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        //     <strong>This Email is already Exists Please use Different email for Registration</strong> You can't proceed further!
        //     <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        //     </div>";
        //     echo "<br/>";
        // }

        
    }else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Please fill all the fields</strong> until you can't proceed further
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
        echo "<br/>";
    }

    

}else{
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
    <strong>Error</strong> You can't proceed further!
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
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
                <label class="form-label">Enter Your Name</label>
                <input type="text" name="fname" class="form-control" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 ">
                <label class="form-label">Enter your Number</label>
                <input type="number" name="number" class="form-control" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label class="form-label">Enter your Password</label>
                <input type="password" name="pwd" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Enter your confirm Password</label>
                <input type="text" name="cpwd" class="form-control" >
            </div>

            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>