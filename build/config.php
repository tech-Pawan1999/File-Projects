<?php
// $servername = "localhost";
// $userName = "root";
// $password = null;  
// $databaseName = "studentsinfo";
// $connEstab = mysqli_connect($servername,$userName,$password,$databaseName);

// if($connEstab){
//     echo "database connection successfull";
// }else{
//     echo "database connection failed ".mysqli_connect_error();
// }

// print_r($_POST['fname']);

$fname = $_POST['fname'];
$number = $_POST['number'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$cpwd = $_POST['cpwd'];

echo "My name is".$fname."and my number is".$number.$email.$pwd.$cpwd;


$servername = "localhost";
$userName = "root";
$password = null; 
$databaseName = "batch79";


$conn = mysqli_connect($servername,$userName,$password,$databaseName);

if($conn){
    echo "connection successfully";
}else{
    echo "connection not success".mysqli_connect_error();
}

// $query1 = "create table info(id int auto_increment, name varchar(255), number varchar(255), email varchar(255), password varchar(255), cpassword varchar(255))"; 
// $query = "select * from info"; 

$query = "select * from info"; 
$result = mysqli_query($conn,$query);

if($result){
    echo "query successfull";
}else{
    echo "query not successfull";
}

$getData = mysqli_fetch_all($result, MYSQLI_ASSOC);
// echo "<pre>";
//     print_r($getData);
// echo "</pre>";
echo "<table border='1px solid black'>";
    echo "<tr>";
        echo "<th>";
            echo "Name";
        echo "</th>";
        echo "<th>";
            echo "Email";
        echo "</th>";
        echo "<th>";
            echo "Number";
        echo "</th>";
    echo "</tr>";
    foreach($getData as $data){
        echo "<tr>";
            echo "<td>";
                echo $data['name'];
            echo "</td>";
            echo "<td>";
                echo $data['email'];
            echo "</td>";
            echo "<td>";
                echo $data['number'];    
            echo "</td>";
        echo "</tr>";
    }
echo "</table>";



?>