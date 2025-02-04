<?php
    include("dbconfig.php");

    $username = "root";
    $password = "root";

    if(isset($_POST['adminBtn'])){
        $inputUsername = $_POST["username"];
        $inputPwd = $_POST["pwd"];


    if($username == $inputUsername && $password == $inputPwd ){
        header("location: adminPage.php");
    }else{
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Your userName and Password are not correct</strong> You can't proceed further!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    echo "<br/>";
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
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your Username</label>
                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label class="form-label">Enter your Password</label>
                <input type="password" name="pwd" class="form-control">
            </div>

            <button type="submit" name="adminBtn" value="login" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>