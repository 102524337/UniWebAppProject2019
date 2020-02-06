<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="apply form" />
    <meta name="Keywords" content="apply, form" /> 
    <meta name="author" content="Junhyek Hyun"/>
    <link rel="stylesheet" href="styles/style.css" />
    <script src="script/apply.js"></script>
    <title>Position Available Melbourne Red Cross</title>
</head>

<body id="applySite" class="container">

    <?php
        include("header.inc");
        include("menu.inc");
    ?>
        <!--menu bar ends-->
        <img src="styles/images/postion_header_img.jpg" alt="header_img" id="postion.html_frontimg" class="front_img"/>
        <h2 class="intro_application">Application Form</h2>
        <h3 class="intro_application">below is an application form. Please complete and submit it.</h3>
        <!--form starts-->
        <form action="processEOI.php" method="post" id="form" novalidate = "novalidate">
            <!--field_1-->
            <fieldset class="fieldset">
                <legend>Position Reference Number</legend>
                <p>
                    <label for="refnum">Position Reference Number</label>
                        <input type="text" autofocus name="refnum" id="refnum" maxlength="5" required ="required" pattern="\w{5}" readonly>
                </p>
            </fieldset>
            <!--field_1-->
            <!--field_2-->
            <fieldset class="fieldset">
                <legend>Personal Details</legend>
                <p>
                    <label for="firstname">First Name</label>
                        <input type="text"  name="firstname" id="firstname" required="required" maxlength="20" pattern="^[a-zA-Z ]+$" >
                    <label for="lastname">Last Name</label>
                        <input type="text" name="lastname" id="lastname" required="required" pattern="^[a-zA-Z ]+$">
                </p>
                <p>
                    <label for="dob">Date of Birth</label>
                        <input type="text"  name="dob" id="dob" required="required" placeholder="dd-mm-yyyy" pattern="\d{1,2}-\d{1,2}-\d{4}">
                </p>
            </fieldset>
            <fieldset class="fieldset">
                <legend>Gender</legend>
                <p>
                    <input type="radio" name="gender" id="male" required="required" value="Male">
                        <label for="male">Male</label>
                    <input type="radio" name="gender" id="female" value="Female">
                        <label for="female">Female</label>
                    <input type="radio" name="gender" id="refused"  value="refused">
                        <label for="refused">Rather not enter</label>
                </p>
            </fieldset>
            <!--field_2-->
            <!--filed_3-->
                <fieldset class="fieldset">
                    <legend>Address</legend>
                    <p>
                        <label for="staddress">Street Address</label>
                            <input type="text"  name="staddress" id="staddress" required = "required" maxlength="40" pattern="^[a-zA-Z0-9_ ]*$">
                    </p>   
                    <P>
                            <label for="suburb">Suburb/town</label>
                        <input type="text"  name="suburb" id="suburb" required ="required" maxlength="40" pattern="^[a-zA-Z]+$">
                    </P> 
                    <p>
                        <label for="state">State</label>
                            <select name="state" id="state" required="required">
                                <option value="">Please Select</option>
                                <option value="QLD">QLD</option>
                                <option value="NT">NT</option>
                                <option value="WA">WA</option>
                                <option value="SA">SA</option>
                                <option value="VIC">VIC</option>
                                <option value="NSW">NSW</option>
                                <option value="TAS">TAS</option>
                                <option value="ACT">ACT</option>
                            </select>
                    </p>
                    <p>
                            <label for="postcode">Postcode</label>
                                <input type="text" name="postcode" id="postcode" required="required" maxlength="4" pattern="\d{4}">
                                <!--pattern check needed for the exact 4 digits.-->
                    </p>
                </fieldset>
            <!--filed_3-->
            <!--field_4-->
                <fieldset class="fieldset">
                    <legend>Contact Details</legend>
                    <p>
                        <label for="email">Email Address</label>
                            <input type="email" name="email" id="email" required="required">
                    </p>
                    <p>
                        <label for="phonenum">Mobile Number</label>
                            <input type="tel" name="phonenum" id="phonenum" required="required" pattern="\d{8,12}">
                    </p>
                </fieldset>
            <!--field_4-->
            <!--field_5-->
                <fieldset class="fieldset">
                    <legend>Skills List</legend>
                    <h4>Community Leader Position</h4>
                    <p>
                        <label for="efflistening">Effective and Active Listening</label>
                            <input type="checkbox" name="category[]" id="efflistening" class="clskills" value="efflistening" checked="checked" >
                        <label for="ielts">IELTS 7.0</label>
                            <input type="checkbox" name="category[]" id="ielts" class="clskills" value="ielts">
                        <label for="exp">3-year experience</label>
                            <input type="checkbox" name="category[]" id="exp" class="clskills" value="exp">
                        <label for="degree">University Degree in Public Health or relavant</label>
                            <input type="checkbox" name="category[]" id="degree" class="clskills" value="degree">
                        <label for="other_comleader">Other skills</label>
                            <input type="checkbox" name="category[]" id="other_comleader" class="clskills" value="other_comleader">
                    </p>
                    <h4>Registered Nurse Position</h4>
                    <p>
                        <label for="med">Management skills(S4,S8 management)</label>
                            <input type="checkbox" name="category[]" class="rnskills" id="med" value="med" checked="checked"/>
                        <label for="bsc">Blood Sample Collection Skills</label>
                            <input type="checkbox" name="category[]" class="rnskills" id="bsc" value="bsc"/>
                        <label for="expn">3-year Experience</label>
                            <input type="checkbox" name="category[]" class="rnskills" id="expn" value="expn"/>
                        <label for="deg">Bachelor's Degree in Nursing</label>
                            <input type="checkbox" name="category[]" class="rnskills" id="deg" value="deg"/>
                        <label for="other_rn">Other skills</label>
                            <input type="checkbox" name="category[]" class="rnskills" id="other_rn" value="other_rn"/>
                    </p>
                    <p>
                        <h4><label for="written_skills">Other Skills(For those who checked other skills)</label></h4>
                        <textarea id="written_skills" name="written_skills" rows="10" cols="50" placeholder="write your skills here...."></textarea>
                    </p>
                </fieldset>
                <!--fieldset_5-->
                <!--button-->
                <input type="submit" name="Apply" class="button"/>
                <input type="reset" name="reset" class="button"/>
                <p id="warningMessage"></p>
                <!--button-->
        </form>
        <footer>
            <h4>Melbourne Red Cross</h4>
            <h5>copywrite: Junhyek Hyun</h5>
        </footer>
    
</body>

</html>