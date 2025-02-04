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
?>