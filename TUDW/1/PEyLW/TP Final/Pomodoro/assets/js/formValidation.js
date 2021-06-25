function formCheck() {
	var validForm;
	validForm = checkInputs();
	
	if (validForm) {
		emptyInputs();
		resetBorderColor();
		location.replace("../index.html");
	}
}


function checkInputs() {
	// trim to remove the whitespaces
	var input, valid;
	valid = true;
	
	input = document.getElementById("userName");
	
	if(input.value === '') {
		colorBorder(input);
		valid = false;
	}
	
	input = document.getElementById("userEmail");
	
	if(!isEmail(input.value)) {
		colorBorder(input);
		valid = false;
	}
	
	input = document.getElementById("userSocialMedia");
	
	if(input.value === '') {
		colorBorder(input);
		valid = false;
	}
	
	input = document.getElementById("userAffair");
	
	if(input.value === '') {
		colorBorder(input);
		valid = false;
	}
	
	input = document.getElementById("userMessage");
	
	if(input.value === '') {
		colorBorder(input);
		valid = false;
	}
	
	return valid;
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function colorBorder(input) {
	input.style.borderColor = "#fc6d6d";
}

function emptyInputs(){
	document.getElementById("userName").value = "";
	document.getElementById("userEmail").value = "";
	document.getElementById("userSocialMedia").value = "";
	document.getElementById("userAffair").value = "";
	document.getElementById("userMessage").value = "";
}

function resetBorderColor(){
	userName = document.getElementById("userName");
	userEmail = document.getElementById("userEmail");
	userSocialMedia = document.getElementById("userSocialMedia");
	userAffair = document.getElementById("userAffair");
	userMessage = document.getElementById("userMessage");
	
	userName.style.borderColor = "#1e212d";
	userEmail.style.borderColor = "#1e212d";
	userSocialMedia.style.borderColor = "#1e212d";
	userAffair.style.borderColor = "#1e212d";
	userMessage.style.borderColor = "#1e212d";
}