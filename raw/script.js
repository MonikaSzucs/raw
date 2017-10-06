var SignUp = document.getElementById("SignUp");
var SignIn1 = document.getElementById("SignIn1");
var LogInButton = document.getElementById("LogInButton");
var MColor = document.getElementById("M-Color");
var wrapper = document.getElementById("wrapper");
	
var SignUpButton = document.getElementById("SignUpButton");
SignUpButton.style.display = "none";

var BackLogIn = document.getElementById("BackLogIn")
BackLogIn.style.display = "none";

var SignUp1 = document.getElementById("SignUp1");
SignUp1.style.display ="none";
	
var Email = document.getElementById("Email");
var Password = document.getElementById("Password");
	
var ForgotPassword = document.getElementById("ForgotPassword");
ForgotPass.style.display = "none";    
	
var ResetButton = document.getElementById("ResetButton");
ResetButton.style.display = "none";

var PasswordResetMessage = document.getElementById("PasswordResetMessage");
PasswordResetMessage.style.display = "none";

var BackToLogIn = document.getElementById("BackToLogIn");
BackToLogIn.style.display = "none";

SignUp1.reset();
SignIn1.reset();
ForgotPass.reset();
     
	//Sign up test word under button
SignUp.addEventListener("click", function(){
	SignUp1.reset();
	SignIn1.reset();
	ForgotPass.reset();

	SignIn1.style.display="none";
	
	SignUp1.style.display="block";

	SignUp1.style.height = "280px";
	SignUp.style.paddingBottom = "60px";
	
	MColor.style.height = "120%";
	
	LogInButton.style.display ="none";
	
	SignUp.style.display="none";
	BackLogIn.style.display = "block";
	SignUpButton.style.display = "block";
	
	ForgotPass.style.display = "none";
	ResetButton.style.display = "none";
	PasswordResetMessage.style.display = "none";
	
});


BackLogIn.addEventListener("click", function(){
	SignUp1.reset();
	SignIn1.reset();
	ForgotPass.reset();
	
	SignUp.style.display="block"
	
	SignIn1.style.display="block";
	SignUp1.style.display="none";
	
	BackLogIn.style.display = "none";
	
	SignUpButton.style.display = "none";
	LogInButton.style.display = "block";
	BackLoginButton.style.display = "block";
	SignUp.style.paddingBottom = "0px";
	PasswordResetMessage.style.display = "none";
});
	
function validateEmail(givenValue){
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i;
	if(re.test(givenValue))
	{
		return true;
	}
	else{
		return false;
	}
};
	
//Checks to see if the form area has the right first name and last name characteres entered
function PasswordF(givenValue)  
{  
   var re = /[A-Za-z]/;  
   if(re.test(givenValue))
	{  

	  return true; 

	 }  
   else  
	 {    
	 return false;  
	 }  
  };     
 
LogInButton.addEventListener("click", function(){
	
	var check = true;
	
	var signInByPassMobile = 0;
	var signUpByPassMobile = 0;
	
	
	//email validation
	if(validateEmail(Email.value))
	{
		signInByPassMobile+=1;
		Email.style.backgroundColor = '#FFFFFF';
	}
	else{
		check = false;
		Email.style.backgroundColor = "#FFCCCC";
	}
	
	
	
	
	//password entered in is correct
	if(PasswordF(Password.value))
	{
		signInByPassMobile+=1;
		Password.style.backgroundColor = '#FFFFFF';
	}
	else{
		check = false;
		Password.style.backgroundColor = '#FFCCCC';
	}
                
                
				
				

                
	
	if(signInByPassMobile==2){
		check = true;
	}

	if(signUpByPassMobile==5){
		check = true;
	}

		//check = true; checked to see if all the conditions are true
	if(check){
		
		document.location.href = "TestLoginPage.html";
		//window.open("TestLoginPage.html", "New")
		SignUpButton.style.display = "none";
		SignUp1.reset();
		SignIn1.reset();
		ForgotPass.reset();
		PasswordResetMessage.style.display = "none";
	}
});
	

function SignUpEmail(givenValue){
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i;
	if(re.test(givenValue))
	{
		return true;
	}
	else{
		return false;
	}
};
	
function allLetter(givenValue)  
	{  
	   var re = /[A-Za-z]/;  
	   if(re.test(givenValue))
		{  
		  return true; 
		 }  
	   else  
		 {    
		 return false;  
		 }  
	}  

	
SignUpButton.addEventListener("click", function(){
	

	var check = true;
	
	var signUpByPassMobile = 0;
	
	
	//email validation
	if(SignUpEmail(EmailSUP.value))
	{
		signUpByPassMobile+=1;
		EmailSUP.style.backgroundColor = '#FFFFFF';
	}
	else{
		check = false;
		EmailSUP.style.backgroundColor = '#FFCCCC';
	}
	
	//username validation
	if(UsernameNew.value)
	{
		signUpByPassMobile+=1;
		UsernameNew.style.backgroundColor = '#FFFFFF';
	}
	else{
		check = false;
		UsernameNew.style.backgroundColor = '#FFCCCC';
	}
	
	if(allLetter(FnameNew.value))
	{
		signUpByPassMobile+=1;
		FnameNew.style.backgroundColor = '#FFFFFF';
	}
	else{
		check = false;
		FnameNew.style.backgroundColor = '#FFCCCC';
	}
	
	
	
	//password entered in is correct
	if(PasswordNew.value)
	{
		signUpByPassMobile+=1;
		PasswordNew.style.backgroundColor = '#FFFFFF';
	}
	else{
		check = false;
		PasswordNew.style.backgroundColor = '#FFCCCC';

	}
	console.log(PasswordNew.value);
	console.log(PasswordNew2.value);
	if(PasswordNew2.value)
	{
	
		if(PasswordNew2.value === PasswordNew.value){
			signUpByPassMobile+=1;
			PasswordNew2.style.backgroundColor = '#FFFFFF';
			console.log("equal");
		}
		else{
			check = false;
			PasswordNew2.style.backgroundColor = '#FFCCCC';
		}
	}
	else{
		check = false;
		PasswordNew2.style.backgroundColor = '#FFCCCC';
	}
	

	if(signUpByPassMobile==5){
		check = true;
	}

		//check = true; checked to see if all the conditions are true
	if(check){
		window.location.reload();
		SignUp1.reset();
		SignIn1.reset();
		ForgotPass.reset();
		
	}
});
                
ForgotPassword.addEventListener("click", function(){
	SignUp1.reset();
	SignIn1.reset();
	ForgotPass.reset();
	
	ForgotPass.style.display = "block";
	SignIn1.style.display="none";
	
	ForgotPass.style.height = "80px";
	
	SignUpButton.style.display ="none";
	LogInButton.style.display = "none";
	ResetButton.style.display = "block";

});
	
	
	function validateEmailForgot(givenValue){
	var re = /[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}/i;
		if(re.test(givenValue))
		{
			return true;
		}
		else{
			return false;
		}
	};

	
ResetButton.addEventListener("click", function(){
	var check = true;
	var Forgot = 0;
	
	console.log("clicked");
	
	//email validation
	if(validateEmailForgot(EmailForgot.value))
	{
		Forgot+=1;
		EmailForgot.style.borderBottomColor = '#FFFFFF';
		console.log("+1");
	}
	else{
		check = false;
		EmailForgot.style.backgroundColor = '#FFCCCC';
		console.log("else");
	}
		
	if(Forgot==1){
		check = true;
	}
		
	
		//check = true; checked to see if all the conditions are true
	if(check){
		//document.location.href = "TestLoginPage.html";
		PasswordResetMessage.style.display = "block";
		PasswordResetMessage.style.color = "white";
		//window.location.href = "HomePage.html";
		SignUp1.reset();
		SignIn1.reset();
		ForgotPass.reset();
	}    
});