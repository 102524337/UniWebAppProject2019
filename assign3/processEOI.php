<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="apply form" />
    <meta name="Keywords" content="apply, form" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <link rel="stylesheet" href="styles/style.css" />
    <title>Position Available Melbourne Red Cross</title>
</head>
<body>
<?php

	//redirect to apply.php when being directly accessed with url;
	if (!isset($_POST["refnum"])) {
        
        header("location:apply.php");
		exit;
    }
    
//sanitise function
function sanitise_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

require_once ("settings.php"); //connection info;

$conn = mysqli_connect(
    $host,
    $user,
    $pwd,
    $sql_db
);

//set up query;
$sql_table = "eoi";



    //get data from html form and initialize them;
    $refNum = sanitise_input($_POST["refnum"]);//position reference number
    $firstName = sanitise_input($_POST["firstname"]);//first name
    $lastName = sanitise_input($_POST["lastname"]);//last name
    $streetAddress = sanitise_input($_POST["staddress"]); // streetAddress
    $suburb = sanitise_input($_POST["suburb"]);//suburb
    $state = $_POST["state"]; //state - do not need to sanitize data due to selection given with a drop box
    $postcode = sanitise_input($_POST["postcode"]); //postcode
    $email = sanitise_input($_POST["email"]); //email address
    $phonenum = sanitise_input($_POST["phonenum"]); //phone number
    $dob = $_POST["dob"]; // date of birth

    $skills = $_POST['category']; //a number of skills
    $skills_string = implode(" ,", $skills);//All skills become seperated strings; !!!!!!!!MAYBE convert into array using (array) if error occurs;

    $otherSkills = sanitise_input($_POST["written_skills"]); //other skills

    //data validation
    $errMsg = ""; // error message

    if ($firstName == "") { //first name
        $errMsg .= "<p>You must enter your first name.</p>";
    } else if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstName)) {
        $errMsg .= "<p>Only Max 20 alpha letters allowed in your first name.</p>";
    }

    if ($lastName == "") {//last name 
        $errMsg .= "<p>You must enter your last name</p>";
    } else if (!preg_match("/^[a-zA-Z -]{1,20}$/", $lastName)) {
        $errMsg .= "<p>Only alpha letters and hyphen allowed in your last name.</p>";
    }

    $currentYear = date("Y");
    $userInputYear = (int)substr($dob,6,9);
    $age = $currentYear - $userInputYear;

    if ($dob == "") {//date of birth
        $errMsg .= "<p>You Must enter date of birth</p>";
    } else if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)) { 
        $errMsg .= "<p>Write your date of birth as DD/MM/YYYY</p>";
    } else if($age <15 || $age>80){
        $errMsg .= "<p>Your age should be between 15 or 80</p>";
    }

    if ($streetAddress == "") {//street address
        $errMsg .= "<p>You must enter street address</p>";
    } else if (preg_match("/^[a-zA-Z]{40}$/", $streetAddress)) {
        $errMsg .= "<p>Only Max 40 alpha-numeric characters can be allowed.</p>";
    }

    if ($suburb == "") {//suburb
        $errMsg .= "<p>you must enter suburb</p>";
    } else if (preg_match("/^[a-zA-Z]{40}$/", $suburb)) {
        $errMsg .= "<p>Only Max 40 alpha-numeric characters can be allowed.</p>";
    }

    if($state == ""){//state
        $errMsg .= "<p>you must choose state</p>";
    } else {
        
    }

    
    $firstPostcodeNum = substr($postcode, 0, 1); //get sliced int value of postcode
    //echo "<p>", $postcode, "</p>";
    //echo "<p>", $firstPostcodeNum, "</p>";

    if($postcode == ""){//postcode validator 
        $errMsg .= "<p>You must enter postcode</p>";
    } else if(!preg_match("/^[0-9]{4}$/",$postcode )){
        $errMsg .= "<p>You must enter 4 digits only.</p>";
    }
    else if($state =="VIC" && ($firstPostcodeNum != "3" && $firstPostcodeNum != "8")){
        $errMsg .= "<p>You must enter postcode of victoria</p>";
    } 
    else if ($state == "NSW" && ($firstPostcodeNum != "1" && $firstPostcodeNum != "2")){
        $errMsg .= "<p>State NSW is successfully added</p>";
    } 
    else if ($state == "QLD" && ($firstPostcodeNum != "4" && $firstPostcodeNum != "9")){
        $errMsg .= "<p>You must enter postcode of QLD</p>";
    }  
    else if ($state == "NT" && $firstPostcodeNum != "0"){
        $errMsg .= "<p>You must enter postcode of NT</p>";
    } 
    else if ($state == "WA" && $firstPostcodeNum != "6"){
        $errMsg .= "<p>You must enter postcode of WA</p>";
    } 
    else if ($state == "SA" && $firstPostcodeNum != "5"){
        $errMsg .= "<p>Enter postcode of SA </p>";
    } 
    else if ($state == "TAS" && $firstPostcodeNum != "7"){
        $errMsg .= "<p>You must enter postcode of TAS</p>";
    } 
    else if ($state == "ACT" && $firstPostcodeNum != "0"){
        $errMsg .= "<p>You must enter postcode of ACT</p>";
    }

    if($email == ""){ //email 
        $errMsg .= "<p>You must enter email address</p>";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errMsg .= "<p>Enter standard email format.</p>";
    }

    if($phonenum == ""){//phone number 
        $errMsg .= "<p>You must enter phone number</p>";
    } else if(!preg_match("/^[0-9 ]{8,10}$/", $phonenum)){
        $errMsg .= "<p>Phone number format is not valid</p>";
    } 

    foreach($skills as $value){// textarea validation if others boxes are checked. 
        //echo "<p>", $value, "</p>";
        if ((strcmp($value, "other_comleader") == 0 || strcmp($value, "other_rn") == 0) && empty($otherSkills)){
            $errMsg .= "<p>!!You must enter text area if you choose others</p>";
        } 
    }

    if ($errMsg!=""){//error message printer 
		echo $errMsg;
	} else { // if there is no validation error, then proceed query

            if(!$conn){// if not connected to db
                echo"<p>Connection to database is fail </p>";
            } else {    
                    //query statement
                    $query = "insert into $sql_table (PositionReferenceNumber, FirstName, LastName, StreetAddress, Suburb, State, Postcode, EmailAddress, PhoneNumber, Skills, otherSkills, Status) 
                    values ('$refNum', '$firstName', '$lastName', '$streetAddress', '$suburb','$state', '$postcode', '$email', '$phonenum','$skills_string', '$otherSkills', 'New')";

                    //execute query;
                    $result = mysqli_query($conn, $query);
                    
                    //if table does not exist 
                    if (!$result) {
                    echo "<p>Database does not exist! Created automatically</p>";
                        
                    //create table programmatically if table does not exist.
                    $sql_tb = "CREATE TABLE eoi (
                        EOInumber INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                        PositionReferenceNumber varchar (255),
                        FirstName varchar (255),
                        LastName varchar(255),
                        StreetAddress varchar(255),
                        Suburb varchar(255),
                        State varchar(255),
                        Postcode INT,
                        EmailAddress  varchar(255),
                        PhoneNumber INT,
                        Skills varchar(255),
                        otherSkills varchar(255), 
                        Status varchar(255)
                        )";

                        //execute to create table
                        $CreateTableResult = mysqli_query($conn, $sql_tb);

                        if(!$CreateTableResult){
                            echo "<p>Table Creation failed</p>";
                        }else{ //create table if none, and add up the values entered
                            $result = mysqli_query($conn, $query);
                            echo "<p>Table Created and value added.The candidate id is: ", mysqli_insert_id($conn),"</p>";
                        } 
                    } else if($result){// if table exist, print out eoi number (primary key)
                        echo "<p class = \"ok\">Successfully added candidates' info. The candidate id is:  </p>" . mysqli_insert_id($conn) . ".</p>"; //should also show eoi primary number
                    }

                    //connection close;
                    mysqli_close($conn);
                }// inner else statement ends;

        }//outer else statement ends;
?>
</body>
</html>