<?php
    include('dbconfig.php');

   if(isset($_POST['forgotBtn'])) {
    $email = $_POST['forgotEmail'];
    // $oldPwd = $_POST['oldPwd'];
    $newPwd = $_POST['newPwd'];
    echo $email;

    $query = "select * from info where email = '$email'";

    $result = mysqli_query($conn , $query) or die('there is some problem in query');

    $rows = mysqli_num_rows($result);
    echo $rows;
        if($rows > 0 ){
            $query = "UPDATE `info` SET `pass`='$newPwd' where email = '$email'";
            $result = mysqli_query($conn , $query) or die('there is some problem in update query');

            if($result){
                echo "update succesfully";
            }else{
                echo "update not succesfully";
                
            }
        }
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
            <h1 class='text-center'>Forgot password</h1>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your Email address</label>
                <input type="email" name="forgotEmail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <!-- <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Enter your old Password</label>
                <input type="text" name="oldPwd" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div> -->
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your new Password</label>
                <input type="text" name="newPwd" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <button type="submit" name="forgotBtn" value="forgot" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>