<?php 

include_once('connections/connection.php');

$connect = connection();

if(isset($_POST['submit'])){
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $bday = $_POST['birthdate'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `student_list`(`first_name`, `last_name`,`birth_day`,`gender`) VALUES ('$fname','$lname','$bday','$gender')";

    $connect->query($sql) or die ($connect->error);

    echo header("location: index.php");
}
 
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
    <form action="" method="post">
        <label>First Name:</label>
        <input type="text" name="firstname" id="firstname" />

        <label>Last Name:</label>
        <input type="text" name="lastname" id="lastname" />

        <label>Birth Date:</label>
        <input type="date" name="birthdate" id="birthdate" />

        <label>Gender: </label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>

        <input type="submit" name="submit" value="Submit" />
    </form>
</body>
</html>