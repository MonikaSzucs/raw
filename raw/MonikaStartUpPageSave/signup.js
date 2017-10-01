var SignUp = document.getElementById("SignUp");
var SignIn1 = document.getElementById("SignIn1");
var wrapper = document.getElementById("wrapper");
                
var SignUpButton = document.getElementById("SignUpButton");

 
var SignUp1 = document.getElementById("SignUp1");

                
var Email = document.getElementById("Email");
var BackLoginButton = document.getElementById("BackLoginButton");

var FnameNew = document.getElementById("FnameNew");
var UsernameNew = document.getElementById("UsernameNew");
var EmailSUP = document.getElementById("EmailSUP");
var PasswordNew = document.getElementById("PasswordNew");
var PasswordNew2 = document.getElementById("PasswordNew2");


var check = false; 

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
	};  

function SignUpButtonCheck(){
	///document.SignUpForm.submit();
	
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
}
	
SignUpButton.addEventListener("click", function(e){
	
	if ( SignUp1.checkValidity() ) {
		
		SignUpButtonCheck();

		if(check){
			SignUpButtonCheck();
			document.SignUpForm.submit();
			
		//window.location.reload();
		////SignUp1.reset();
		///SignIn1.reset();
		///ForgotPass.reset();
		}
		
		e.preventDefault();
	
    } else {
		SignUpButtonCheck();
    }
	

		//check = true; checked to see if all the conditions are true
	
});