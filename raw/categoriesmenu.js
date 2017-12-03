
var toggle = false;
var hamburgermenu2 = document.getElementById("hamburger2");  
var hamb2 = document.getElementById("catergories");
        function myFunction2(f) {
            f.classList.toggle("change");
                 
            
            if( toggle == false){
                 hamburgermenu2.style.top = "0px";
                toggle = true;
 
            } else { hamburgermenu2.style = "";
                   toggle = false;
                   }
                  
        }


