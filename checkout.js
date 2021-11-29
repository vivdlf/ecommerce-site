$(document).ready(() => 
{ 
    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {
      var currentScrollPos = window.pageYOffset;
      if (prevScrollpos > currentScrollPos) {
        document.getElementById("navbarr").style.top = "0";
          
      } else {
        document.getElementById("navbarr").style.top = "-50px";
      
        
      }
      prevScrollpos = currentScrollPos;
    }

   //When user clicks the back button he/she is redirected back to the main page, index.php
    const $backBtn = document.querySelector('.back-btn');

    $($backBtn).on('click',()=>{
        console.log("here");
     location.replace("home.php");
    });


    //JavaScript Form Validation
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
              
                console.log("false");
                event.preventDefault();
                event.stopPropagation();
              }
              else{
                 $.ajax({
                 type: "POST",
                 url: "./save-order.php"
                 });

                event.preventDefault();
               
               
               window.localStorage.clear();
               window.location = "receipt.php";


              }
              
              form.classList.add('was-validated');
            
            }, false);
            
          });
          
        }, false);
       
      })();
});


