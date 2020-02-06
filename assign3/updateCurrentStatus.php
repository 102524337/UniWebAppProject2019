<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="eoi record change" />
    <meta name="Keywords" content="status, new, current" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <title>Update from New to Current</title>
</head>
<body>
<?php
require_once ("settings.php"); //connection info;

$conn = mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
);

if(isset($_POST["idForCurrentStatus"])){//if id exists 
    $id = $_POST["idForCurrentStatus"]; // initialize it assigning to id variable
} else {
    echo "<p>!ID does not exist!</p>";
}

if(!$conn){//if not connected
    echo "<p>Database is not connected. There might be something wrong. </p>"; 
} else {
    $query = "UPDATE eoi SET Status = 'current' WHERE EOInumber LIKE '$id%'";

    $result = mysqli_query($conn, $query);//execute

    if(!$result){
        echo "<p>!!Update not succesful</p>";
    } else {
        echo "<p>Update Successful</p>";
    }
    mysqli_close ($conn); //close connection;
}



?>


</body>
</html> 