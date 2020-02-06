<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="delete rows from eoi table" />
    <meta name="Keywords" content="delete, job reference" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <title>Delete by Job reference number</title>
</head>
<body>
<h1>Delete By Job Reference Number</h1> 


<?php
if(!isset($_POST["deletejobref"])){
    echo "<p>Please enter reference number</p>";
    header ("location:manage.php");
    exit;
} else if(isset($_POST["deletejobref"])){
    $jobRefNum = $_POST["deletejobref"];

    require_once ("settings.php"); //connection info;
    $sql_table = "eoi";

    $conn = mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    if(!$conn){
        echo"<p>Connection to database is fail </p>";
    } else{
        $query = "DELETE FROM eoi WHERE PositionReferenceNumber Like '$jobRefNum'";

        $result = mysqli_query($conn, $query);

        if($result){ // when deletion is successful;
            header ("location:manage.php");        
        } else {
            echo "<p>Please try again. Deletion is not successful! </p>";
        }
    }
    mysqli_close ($conn); // connection ends 
} 

?>

</body>
</html>