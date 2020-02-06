<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="eoi table" />
    <meta name="Keywords" content="search, job reference" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <title>Search by job reference number with eoi Table</title>
</head>
<body>
<h1>Search by Job reference number</h1> 

<?php
require_once ("settings.php"); //connection info;

    $conn = mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );

    if(!$conn){
        echo"<p>Connection to database is fail </p>";
    } else {

        $sql_table = "eoi";

        $input = $_POST['jobref'];
        $query = "SELECT * FROM eoi WHERE PositionReferenceNumber like '$input%'";

        $result = mysqli_query($conn, $query);

        if(!$result){
            echo"<p>Something is wrong with", $query, "</p>";
        } else if(mysqli_num_rows($result) == 0){ // if there is no rows found;
            echo"<p>There is no such a record in the database</p>";
        } else {

            echo"<p>We Found! </p>";
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
    
    } 
?>
</body>
</html>