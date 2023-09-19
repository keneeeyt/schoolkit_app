<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "student_system";


$connect = new mysqli ($host, $username, $password, $database);

if($connect -> connect_error){
    echo $connect -> connect_error;
} 

$sql = "SELECT * FROM student_list";
$students = $connect->query($sql) or die ($connect->error);
$row = $students->fetch_assoc();

// do{

//     echo $row['first_name'] . " " . $row['last_name']. "<br />";

// }while($row = $students->fetch_assoc()); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>

    <style>
    body{
        font-family: "Arial"; 
    }
    h1 {
        text-align: center;
    }
    table {
        border: 1px solid black;
       border-collapse: collapse;
       width: 100%;
    }
    th, td {
        border-bottom: 1px solid #ddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){
        background-color: #f2f2f2;
    }
    </style>

</head>
<body>

    <h1>Student Management System</h1>
    <br />
    <br />
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?>
                <tr>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                </tr>
            <?php }while($row = $students->fetch_assoc()) ?>    
        </tbody>
    </table>
    
</body>
</html>