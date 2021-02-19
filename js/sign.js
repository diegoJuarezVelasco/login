$(document).ready(function () {
    console.log("document ready!");
  
    /*email */
    let email = document.getElementById("email");
    let error_email = document.getElementById("error_email");
    let password = document.getElementById("password");
    email.addEventListener("blur", checkEmail);
 



    function checkEmail(event) {
      console.log("yep!")
      if(this.value.indexOf("@") > -1) {
          error_email.style.display = "none";
      } else {
          error_email.innerHTML = "*Invalid email*";
          error_email.style.display = "block";
          error_email.style.color = "red";
          error_email.style.fontSize="1.2rem";
      }
    }
  
  
  
  });
  