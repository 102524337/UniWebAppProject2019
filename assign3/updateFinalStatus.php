<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="eoi record change" />
    <meta name="Keywords" content="status, new, final" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <title>Update from New to Final</title>
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

if(isset($_POST["idForFinalStatus"])){//if id exists 
    $id = $_POST["idForFinalStatus"]; // initialize it assigning to id variable
   
    $query = "UPDATE eoi SET Status = 'final' WHERE EOInumber LIKE '$id%'";
    $result = mysqli_query($conn, $query);//execute

} else {
    echo "<p>!ID does not exist!</p>";
}

if(!$conn){//if not connected
    echo "<p>Database is not connected. There might be something wrong. </p>"; 
} else {//set query and execute
    
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
