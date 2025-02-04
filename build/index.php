<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        include("./bootstrapScript.php")
    ?>
</head>
<body>
    <?php
        include("./Navbar.php")
    ?>
    <?php
        session_start();
        if(isset($_SESSION['userName'])){
            echo "<h1>This is a Home page</h1>".$_SESSION['userName'];
        } else{
            echo "If you have an existing account then please click on the given link to login <a href='login.php'>login</a>"; 
            echo "<br/>";
            echo "create account using given link <a href='register.php'>Register</a>";
        }   
    ?>
    
</body>
</html>