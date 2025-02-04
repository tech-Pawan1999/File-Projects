

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
        include("./Navbar.php");

        include("dbconfig.php");

        $query = "select * from info";
    
        $result = mysqli_query($conn, $query) or exit("There is a problem in query or connection, Please check it");
    
        $rows = mysqli_num_rows($result) or die("Problem in num rows method");
    
        // echo $rows;
    
        if($rows > 0){
            $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
            // $data = mysqli_fetch_assoc($result);
            // print_r($data);
            echo "<table border='1px solid black' style='width:80%; margin:auto'>" ;
            echo "<tr>";
                    echo "<th>";
                        echo "Id";
                    echo "</th>";
                    echo "<th>";
                        echo "Name";
                    echo "</th>";
                    echo "<th>";
                        echo "Number";
                    echo "</th>";
                    echo "<th>";
                        echo "Email";
                    echo "</th>";
                    echo "<th>";
                        echo "Password";
                    echo "</th>";
                    echo "<th>";
                        echo "CPassword";
                    echo "</th>";
                echo "</tr>";
            for($i=0; $i<=count($data)-1; $i++){
                echo "<tr>";
                    echo "<td>";
                        echo $data[$i]['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $data[$i]['name'];
                    echo "</td>";
                    echo "<td>";
                        echo $data[$i]['number'];
                    echo "</td>";
                    echo "<td>";
                        echo $data[$i]['email'];
                    echo "</td>";
                    echo "<td>";
                        echo $data[$i]['pass'];
                    echo "</td>";
                    echo "<td>";
                        echo $data[$i]['cpassword'];
                    echo "</td>";
                    // echo "<a href='Edit.php?id=" . htmlspecialchars($data[$i]['id']) . "'><button>Edit</button></a> ";
                    echo "<td>";
                        echo "<a href='Edit.php?id=" .$data[$i]['id']. "'><button>Edit</button></a>";
                    echo "</td>";
                    echo "<td>";
                        echo "<button>Delete</button>";
                    echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>