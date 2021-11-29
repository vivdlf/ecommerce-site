
// JQUERY
$(document).ready(() => 
{ 
  var style = document.createElement('style');
  style.innerHTML = `
  .navbar {
  position: sticky;
  top: 0;
  height: 60px;
  width: 100%;
  display: flex;
  align-items: center;
  background: rgb(231, 226, 221);
  background: #D9D0C7;
  background-color: #d0d0ce;
  background-color: #CBB29A;
  background-color: #BEAB9C;
  background-color: #AE927C;
  background-color: #F2E5D5;
  z-index: 1;
}
.navbar-center {
  width: 100%;
  max-width: 1170px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 1.5rem;
}
.nav-icon {
  font-size: 1.5rem;
}
.icon{
  color:black;
}
  `;
    var style1 = document.createElement('style');
  style1.innerHTML = `
  .icon{
 color: #fff;
}
.navbar {
  position: fixed;
  left: 0%;
  top: 0%;
  right: 0%;
  bottom: auto;
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  padding-top: 0px;
  padding-bottom: 0px;
  -webkit-box-align: center;
  -webkit-align-items: center;
  -ms-flex-align: center;
  align-items: center;
  border-style: none none solid;
  border-width: 0px 0px 1px;
  border-color: #000 #000 rgba(237, 235, 235, 0);
  background-color: transparent;
  z-index: 1;
}

  `;
  
    // Once user clicks 'Shop our Home Goods Collection' button there will be a scroll to the product section
    $(".banner-btn").click(function() {
        $('html,body').animate({
            scrollTop: $(".products").offset().top},
            'slow');
            document.head.appendChild(style);
    });

   
    /* When the user scrolls down, hide the navbar. When the user scrolls up, show the navbar */
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    //document.getElementById("navbar").style.top = "0";
      document.head.appendChild(style1);
       document.getElementById("lo").src="https://assets.website-files.com/614f0d68de16650e3a327379/614f13fd428b2b50eaae3190_logo_white.svg";
  } else {
    //document.getElementById("navbar").style.top = "-50px";
    document.head.appendChild(style);
    document.getElementById("lo").src="https://assets.website-files.com/614f0d68de16650e3a327379/61505e1afcc784409915d1c7_Orange.svg";
    
  }
  prevScrollpos = currentScrollPos;
}

    // Show & Hide Cart
    const $cartBtn = $('.cart-btn');
    const $cartDetails = $('.cart');
    const $closeCart = $('.close-cart');

    $($cartBtn).on('click',()=>{
      cartOverlay.classList.add('transparentBcg');
      cartDOM.classList.add('showCart');
    });

     $($closeCart).on('click',()=>{
      cartOverlay.classList.remove('transparentBcg');
      cartDOM.classList.remove('showCart');
    });

    // Show Drop Down Menu
    
  

   //Go Back to Main Page
    const $backBtn = document.querySelector('.back-btn');

    $($backBtn).on('click',()=>{
        console.log("here");
     location.replace("home.php");
     
    });


    //JavaScript
     //Validation
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
});
