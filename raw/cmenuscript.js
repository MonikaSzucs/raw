
var toggle = false;
var hamburgermenu = document.getElementById("hamburger");  
var hamb = document.getElementById("hamb");
        function myFunction(x) {
            x.classList.toggle("change");
                 
            
            if( toggle == false){
                 hamburgermenu.style.top = "0px";
                toggle = true;
 
            } else { hamburgermenu.style = "";
                   toggle = false;
                   }
                  
        }


