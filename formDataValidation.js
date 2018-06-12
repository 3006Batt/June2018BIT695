//3006Batt April 2018 
function form1DataValidation(){
    var jsBoolVarMemberID = validateMemberID(document.forms["form_one"]["memberID"].value);
	var jsBoolVarFirstName = validateName(document.forms["form_one"]["firstName"].value);
	var jsBoolVarFamilyName = validateName(document.forms["form_one"]["familyName"].value);
	var jsBoolVarEmail = validateEmail(document.forms["form_one"]["email"].value);
	var jsBoolVarPhone = validatePhNumber(document.forms["form_one"]["phone"].value);
	var errorString = "There is a problem with the data on this form.\n\n";
	if (!jsBoolVarMemberID||!jsBoolVarFirstName||!jsBoolVarFamilyName||!jsBoolVarEmail||!jsBoolVarPhone){
		if(!jsBoolVarMemberID)
			errorString += "Please Enter a valid Member ID\n";
		if(!jsBoolVarFirstName)
			errorString += "Please Enter a valid First Name\n";
		if(!jsBoolVarFamilyName)
			errorString += "Please Enter a valid Last Name\n";
		if(!jsBoolVarEmail)
			errorString += "Please Enter a valid Email Address\n";
		if(!jsBoolVarPhone)
			errorString += "Please Enter a valid Phone Number\n";
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

