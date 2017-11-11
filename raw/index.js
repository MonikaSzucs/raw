			var SignUp = document.getElementById("SignUp");
			var SignIn1 = document.getElementById("SignIn1");
			var LogInButton = document.getElementById("LogInButton");
			var wrapper = document.getElementById("wrapper");

                
            var Email = document.getElementById("Email");
            var Password = document.getElementById("Password");
                
            var ForgotPassword = document.getElementById("ForgotPassword");
               

			
                
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


                
 
                

			