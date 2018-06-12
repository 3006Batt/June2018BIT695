//3006Batt April 2018 

function form6DataValidation(){
	var errorString = "There is a problem with the data on this form.\n\n";
	var jsBoolVarMemberID = validateMemberID(document.forms["form_six"]["membersID"].value);
	if (!jsBoolVarMemberID){
		if(!jsBoolVarMemberID)
			errorString += "Please Enter a valid Member ID\n";
		alert(errorString);
        return false;
	}
}
function validateMemberID(inputID){
    var regex = /^[a-zA-Z0-9 ]{1,30}$/;
    return(regex.test(inputID));
}
function validateName(inputName){
    var regex = /^[a-zA-Z ]{1,30}$/;
    return(regex.test(inputName));
}
function validateEmail(inputEmail){
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return(regex.test(inputEmail));
}
function validatePhNumber(inputPhNumber){
    var regex = /([0-9\s\-]{7,})(?:\s*(?:#|x\.?|ext\.?|extension)\s*(\d+))?$/;
    return(regex.test(inputPhNumber));
}

