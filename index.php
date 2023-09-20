<?php 

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['UserLogin'])){
    echo 'Welcome '.$_SESSION['UserLogin'];
} else {
    echo 'Welcome Guest';
}

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
    <?php if(isset($_SESSION['UserLogin'])) { ?>
        <a href="logout.php">Logout</a>
    <?php } else { ?>
        <a href="login.php">Login</a>
    <?php } ?>
    <a href="add.php">Add new</a>
    
    <table>
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php do{ ?>
                <tr>
                    <td><?php echo $row['first_name'] ?></td>
                    <td><?php echo $row['last_name'] ?></td>
                    <td><a href="details.php?ID=<?php echo $row['id'] ?>">View</a></td>
                </tr>
            <?php }while($row = $students->fetch_assoc()) ?>    
        </tbody>
    </table>
    
</body>
</html>