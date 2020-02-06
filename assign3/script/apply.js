/**
*Author: Junhyek Hyun 102524337
*Target: validate apply.html file using javascript and store input data to various web storages.
*Purpose: This file is to validate apply.html and store input data from users using session and local storages
*Created: 24/09/2019
*Last updated: 29/09/2019
*
*/

"use strict";

var debug = true;

//*********************  setter and getter for data ******************
function setDataDetails(fName, lName, dobElement, gender, stAddress, subUrb, stateSelectionElement, postCodeElement, emailAddress, phoneNum, textAreaText) {
    if (typeof (Storage) !== "undefined") {
        sessionStorage.setItem("firstName", fName);
        sessionStorage.setItem("lastName", lName);
        sessionStorage.setItem("dob", dobElement);
        sessionStorage.setItem("gender", gender);
        sessionStorage.setItem("stAddress", stAddress);
        sessionStorage.setItem("subUrb", subUrb);
        sessionStorage.setItem("state", stateSelectionElement);
        sessionStorage.setItem("postcode", postCodeElement);
        sessionStorage.setItem("email", emailAddress);
        sessionStorage.setItem("phoneNumber", phoneNum);
        sessionStorage.setItem("textArea", textAreaText);
    }
}

//*********************  getter for details ******************
function getDataDetails() {
    if (typeof (Storage) !== "undefined") {

        if (sessionStorage.getItem("firstName") !== null) {
            document.getElementById("firstname").value = sessionStorage.getItem("firstName");
        }
        if (sessionStorage.getItem("lastName") !== null) {
            document.getElementById("lastname").value = sessionStorage.getItem("lastName");
        }
        if (sessionStorage.getItem("dob") !== null) {
            document.getElementById("dob").value = sessionStorage.getItem("dob");
        }
        if (sessionStorage.getItem("gender") !== null) {
            if (sessionStorage.getItem("gender") == "Male") {
                document.getElementById("male").checked = true;
            } else if (sessionStorage.getItem("gender") == "Female") {
                document.getElementById("female").checked = true;
            } else if (sessionStorage.getItem("gender") == "refused") {
                document.getElementById("refused").checked = true;
            }
        }
        if (sessionStorage.getItem("stAddress") !== null) {
            document.getElementById("staddress").value = sessionStorage.getItem("stAddress");
        }
        if (sessionStorage.getItem("subUrb") !== null) {
            document.getElementById("suburb").value = sessionStorage.getItem("subUrb");
        }
        if (sessionStorage.getItem("state") !== null) {
            document.getElementById("state").value = sessionStorage.getItem("state");
        }
        if (sessionStorage.getItem("postcode") !== null) {
            document.getElementById("postcode").value = sessionStorage.getItem("postcode");
        }
        if (sessionStorage.getItem("email") !== null) {
            document.getElementById("email").value = sessionStorage.getItem("email");
        }
        if (sessionStorage.getItem("phoneNumber") !== null) {
            document.getElementById("phonenum").value = sessionStorage.getItem("phoneNumber");
        }
        if (sessionStorage.getItem("textArea") !== null) {
            document.getElementById("written_skills").value = sessionStorage.getItem("textArea");
        }

        //get community leader skills;
        var comLeaderSkills = JSON.parse(sessionStorage.getItem("arrList1"));//convert string value to object;
        if (comLeaderSkills !== null) {
            document.getElementById("efflistening").checked = false; //avoid default check when loading;
            for (var i = 0; i < comLeaderSkills.length; i++) {
                if (comLeaderSkills[i] == "efflistening") {
                    document.getElementById("efflistening").checked = true;
                }
                if (comLeaderSkills[i] == "ielts") {
                    document.getElementById("ielts").checked = true;
                }
                if (comLeaderSkills[i] == "exp") {
                    document.getElementById("exp").checked = true;
                }
                if (comLeaderSkills[i] == "degree") {
                    document.getElementById("degree").checked = true;
                }
                if (comLeaderSkills[i] == "other_comleader") {
                    document.getElementById("other_comleader").checked = true;
                }
            }//for loop ends;
        }
        //get registered nurse skills;
        var rnSkills = JSON.parse(sessionStorage.getItem("arrList2"));//convert string value to object;
        if (rnSkills !== null) {
            document.getElementById("med").checked = false; //avoid default check when loading;
            for (var i = 0; i < rnSkills.length; i++) {
                if (rnSkills[i] == "med") {
                    document.getElementById("med").checked = true;
                }
                if (rnSkills[i] == "bsc") {
                    document.getElementById("bsc").checked = true;
                }
                if (rnSkills[i] == "expn") {
                    document.getElementById("expn").checked = true;
                }
                if (rnSkills[i] == "deg") {
                    document.getElementById("deg").checked = true;
                }
                if (rnSkills[i] == "other_rn") {
                    document.getElementById("other_rn").checked = true;
                }
            }//for loop ends
        }
    }
}

//*********************  setter and getter for job reference number  ******************

function setRefNum(jobRefNum) {
    if (typeof (Storage) !== "undefined") {
        localStorage.setItem("refNum", jobRefNum);//safe to local web storage;  
    }
}

function getRefNum() {
    if (typeof (Storage) !== "undefined") {
        if (localStorage.getItem("refNum") !== null) {
            var jobRefNum = document.getElementById("refnum");
            jobRefNum.value = localStorage.getItem("refNum"); //fill in the box;
        }
    }
}

//*********************  validator function  ******************

function validateForm() {

    /*initialization section*/
    //variables are assigned with value of specific element value in order to store them into local and session storages;

    var fName = document.getElementById("firstname").value;//first name;
    var lName = document.getElementById("lastname").value;// last name;
    var stAddress = document.getElementById("staddress").value;//street address;
    var subUrb = document.getElementById("suburb").value; //suburban;
    var emailAddress = document.getElementById("email").value;//email;
    var phoneNum = document.getElementById("phonenum").value;//phone number;
    var gender = document.getElementsByName("gender"); //get genders by name;

    for (var i = 0; i < gender.length; i++) {
        if (gender[i].checked == true) { // get a checked gender 
            gender = gender[i].value;
        }
    }

    var comLeadSkills = document.getElementsByClassName("clskills");//community leader skills check boxes;
    var arrListSkills1 = new Array();
    for (var i = 0; i < comLeadSkills.length; i++) {
        if (comLeadSkills[i].checked) {
            arrListSkills1[i] = comLeadSkills[i].value;//assign only checked boxes' values;
        }
    }
    sessionStorage.setItem("arrList1", JSON.stringify(arrListSkills1));

    var rnSkills = document.getElementsByClassName("rnskills");
    var arrListSkills2 = new Array();
    for (var i = 0; i < rnSkills.length; i++) {
        if (rnSkills[i].checked) {
            arrListSkills2[i] = rnSkills[i].value;//assign only checked boxes' values;
        }
    }
    sessionStorage.setItem("arrList2", JSON.stringify(arrListSkills2));

    /*warning message*/

    var warningMsg = document.getElementById("warningMessage");//warning message; 
    warningMsg.style.color = "red";

    /*getting date of birth and match if it is less than 15 or greater than 80;*/
    var dobElement = document.getElementById("dob").value;//dob value; 

if(!debug){//debug for dob 
    var date = new Date();
    var currentYear = date.getFullYear();//returns current year;

    var dobElement = document.getElementById("dob").value;
    var getDobYear = dobElement.slice(6, 10); //returns year d/d/d/d/ ;

    var currentYearInt = parseInt(currentYear); // parse string current year to integer;
    var getDobYearInt = parseInt(getDobYear); // parse date of birth to integer;

    var difference = currentYearInt - getDobYearInt; //get difference between current year and date of birth;

    if (difference > 15 && difference < 80) {

    } else {
        warningMsg.innerHTML = "please enter date properly!";
        return false;
    }
}

    /*matching postcode and state names */

    var postCodeElement = document.getElementById("postcode").value; //get postcode id 
    var stateSelectionElement = document.getElementById("state").value; // get an element with state id;
    //var firstLetterPostCode = postCodeElement.charAt(0); // return first letter of postcode 
    //var fistLetterPostCodeToInteger = parseInt(firstLetterPostCode); // transfer type of first letter (string) to integer;

    
if(!debug){
    if ((fistLetterPostCodeToInteger == 3 || fistLetterPostCodeToInteger == 8) && stateSelectionElement == "VIC") {

    } else if ((fistLetterPostCodeToInteger == 1 || fistLetterPostCodeToInteger == 2) && stateSelectionElement == "NSW") {

    } else if ((fistLetterPostCodeToInteger == 4 || fistLetterPostCodeToInteger == 9) && stateSelectionElement == "QLD") {

    } else if (fistLetterPostCodeToInteger == 0 && stateSelectionElement == "NT") {

    } else if (fistLetterPostCodeToInteger == 6 && stateSelectionElement == "WA") {

    } else if (fistLetterPostCodeToInteger == 5 && stateSelectionElement == "SA") {

    } else if (fistLetterPostCodeToInteger == 7 && stateSelectionElement == "TAS") {

    } else if (fistLetterPostCodeToInteger == 0 && stateSelectionElement == "ACT") {

    } else {
        warningMsg.innerHTML = "State and postcode do not match! try again please!";
        return false;
    }
}  

    /*matching other=skills check box with text area*/

    var OtherSkillsRnCheckBox = document.getElementById("other_rn");// get an element with id other_rn;
    var OtherSkillsCnCheckBox = document.getElementById("other_comleader"); //get an element with id other_comleader (community leader position);
    var textArea = document.getElementById("written_skills"); // get an element with id written_skills;
    
if(!debug){ //debug for logic that checks whether other boxes are checked or not;
    var booleanIfChecked = OtherSkillsRnCheckBox.checked; // return boolean value depending on other skills check box is checked or not;
    var booleanIfchecked2 = OtherSkillsCnCheckBox.checked; // return boolean value depending on checked in the box;

    if (booleanIfChecked || booleanIfchecked2) //when checked;
    {
        textArea.required; //required;
        if ((booleanIfChecked || booleanIfchecked2) && textArea.value == "") { //when checked, but textarea is not filled. Alert and return false;
            warningMsg.innerHTML = "You should fill the text box if you check on other skills !";
            return false;
        }
    }
    else {
        //when not checked;
    }
} 
    var textAreaText = textArea.value;// assign textArea value;

    //invoke setDataDetails function to initialize value to the storage;    
    setDataDetails(fName, lName, dobElement, gender, stAddress, subUrb, stateSelectionElement, postCodeElement, emailAddress, phoneNum, textAreaText);
    return true;
}

//*********************  init  ******************
function init() {
    if (document.getElementById("applySite") != null) {
        getRefNum();//get job reference number;
        getDataDetails();//get input detail from session storage;

        var formElement = document.getElementById("form");
        formElement.onsubmit = validateForm;
    }
    else if (document.getElementById("positionSite") != null) {
        var applyJobs = document.getElementsByClassName("applyJob");
        for (var i = 0; i < applyJobs.length; i++) {
            applyJobs[i].onclick = function () { setRefNum(this.id); }
        }
    }
}

window.onload = init;