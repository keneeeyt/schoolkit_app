<?php 

include_once('connections/connection.php');

$connect = connection();


$sql = "SELECT * FROM student_list ORDER BY id DESC";
$students = $connect->query($sql) or die ($connect->error);
$row = $students->fetch_assoc();
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Student Management System</h1>
    <br />
    <br />
    
    <a href="add.php">Add new</a>
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