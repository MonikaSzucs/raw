var wrapper = document.getElementById("wrapper");
	

var BackLogIn = document.getElementById("BackLogIn")

	
var Email = document.getElementById("Email");
var Password = document.getElementById("Password");  

	
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