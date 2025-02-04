<?php
    $id = $_GET['id'];

    if(isset($_GET['id'])){
        include("dbconfig.php");

        $query = "select * from info where id = '$id'";
        $result = mysqli_query($conn, $query) or die("query failed");

        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($data);
        if($result){
            echo "query successful";
        }else{
            echo "query unsuccessful";
        }
    }
    if(isset($_POST['editBtn'])){
        $name = $_POST['fname'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $passwor = $_POST['passw'];
        $cpassword = $_POST['cpass'];

        include("dbconfig.php");

        $updatequery = "UPDATE `info` SET `id`='$id',`name`='$name',`number`='$number',`email`='$email',`pass`='$passwor',`cpassword`='$cpassword' WHERE id = '$id'";
        $updateResult = mysqli_query($conn, $updatequery) or die("query failed");
        if($updateResult){
            echo "update query success";
        }else{
            
            echo "update query unsuccess";
        }
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
        <h1 class='text-center' >Edit Page</h1>
        <div class="register_container">
            <div class="mb-3 ">
                <label class="form-label">Enter Your Name</label>
                <input type="text" name="fname" value=<?php echo $data[0]['name'] ?> class="form-control" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 ">
                <label class="form-label">Enter your Number</label>
                <input type="number" name="number" value=<?php echo $data[0]['number'] ?>  class="form-control" aria-describedby="emailHelp">
            </div>

            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label">Enter your Email address</label>
                <input type="email" name="email" value=<?php echo $data[0]['email'] ?>  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

            <!-- <div class="mb-3">
                <label class="form-label">Enter your Password</label>
                <input type="text" value=name="pwd"  class="form-control">
            </div> -->

            <div class="mb-3">
                <label class="form-label">Enter your Password</label>
                <input type="text" name="passw" value=<?php echo $data[0]['pass'] ?> class="form-control"  >
            </div>

            <div class="mb-3">
                <label class="form-label">Enter your confirm Password</label>
                <input type="text" name="cpass" value=<?php echo $data[0]['cpassword'] ?> class="form-control" >
            </div>

            <button type="submit" name="editBtn" class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>
</html>