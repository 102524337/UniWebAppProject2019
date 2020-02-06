<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="eoi table" />
    <meta name="Keywords" content="applicants, table" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <title>Applicants Table</title>
</head>
<body>
<h1>List all EOIs</h1> 
<?php
require_once ("settings.php"); //connection info;

$conn = mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
);

if(!$conn){
    echo "<p>Database connection failure!</p>";
} else {
    $sql_table = "eoi";

    //set sql query comment
    $query = "SELECT * FROM eoi"; //select entire eoi

    //assign executed value of query
    $result = mysqli_query($conn, $query);
    
    if(!$result){
        echo "<p> Something wrong with ", $query, "</p>";
    } else {
        //display result
        echo "<table border = \"1\">\n";
        echo "<tr>\n"
            ."<th scope = \"col\">EOInumber</th>"
            ."<th scope = \"col\">PositionReferenceNumber</th>"
            ."<th scope = \"col\">FirstName</th>"
            ."<th scope = \"col\">LastName</th>"
            ."<th scope = \"col\">StreetAddress</th>"
            ."<th scope = \"col\">Suburb</th>"
            ."<th scope = \"col\">State</th>"
            ."<th scope = \"col\">Postcode</th>"
            ."<th scope = \"col\">EmailAddress</th>"
            ."<th scope = \"col\">PhoneNumber</th>"
            ."<th scope = \"col\">Skills</th>"
            ."<th scope = \"col\">otherSkills</th>"
            ."<th scope = \"col\">Status</th>"
            ."</tr>\n";

            //retrieve current record pointed by the result pointer;

            while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>\n";
                    echo "<td>", $row["EOInumber"], "</td>\n" ;
                    echo "<td>", $row["PositionReferenceNumber"], "</td>\n" ;
                    echo "<td>", $row["FirstName"], "</td>\n" ;
                    echo "<td>", $row["LastName"], "</td>\n" ;
                    echo "<td>", $row["StreetAddress"], "</td>\n" ;
                    echo "<td>", $row["Suburb"], "</td>\n" ;
                    echo "<td>", $row["State"], "</td>\n" ;
                    echo "<td>", $row["Postcode"], "</td>\n" ;
                    echo "<td>", $row["EmailAddress"], "</td>\n" ;
                    echo "<td>", $row["PhoneNumber"], "</td>\n" ;
                    echo "<td>", $row["Skills"], "</td>\n" ;
                    echo "<td>", $row["otherSkills"], "</td>\n" ;
                    echo "<td>", $row["Status"], "</td>\n" ;
                echo "</tr>\n";
            }
            echo"</table>\n ";

        //frees up the memory;
        mysqli_free_result($result);

    }// else statement ends 

    //close the database connection;
    mysqli_close($conn);

}// else statement ends 

?>
<h3>Search by Job Reference Number</h3>
    <form action="search.php" method = "post">
        <input type="text" name = "jobref" placeholder = "search">
        <input type="submit" value="search by job reference number">
    </form>
<p>==============================================================</p>
<h3>Search by FirstName or LastName</h3>
    <form action="searchbynames.php" method = "post">
        <input type="text" name = "firstName" placeholder = "first name">
        <input type="text" name = "lastName" placeholder = "last name">
        <input type="submit" value = "search by Names">
    </form>
<p>=================================================================</p>
<h3>Delete by Job Reference Number</h3>
    <form action="delete.php" method = "post">
        <input type="text" name = "deletejobref" placeholder = "enter job reference number">
        <input type="submit" value = "delete records by job ref number">
    </form>
<p>==================================================================</p>
<h3>Update Status by EOI ID</h3>

    <h4>Update New to Current By ID</h4>
        <form action="updateCurrentStatus.php" method = "post">
            <input type="text" name = "idForCurrentStatus" placeholder = "enter id">
            <input type="submit" value = "update">
        </form>
<p>-----------------------------------------------------------------------------------------------------</p>
    <h4>Update New to Final by ID</h4>
        <form action="updateFinalStatus.php" method = "post">
            <input type="text" name = "idForFinalStatus" placeholder = "enter id">
            <input type="submit" value = "update">
        </form>
</body>
</html>
