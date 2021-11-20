// JQUERY
$(document).ready(() => 
{ 
    // Once user clicks 'Shop our Home Goods Collection' button there will be a scroll to the product section
    $(".banner-btn").click(function() {
        $('html,body').animate({
            scrollTop: $(".products").offset().top},
            'slow');
    });

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

    $cartDetails.on('mouseleave', () => {
      cartOverlay.classList.remove('transparentBcg');
      cartDOM.classList.remove('showCart');
    });

    $cartBtn.on('mouseover', () => {
      cartOverlay.classList.add('transparentBcg');
      cartDOM.classList.add('showCart');
    });

    //Go Back to Main Page
    const $backBtn = $('.back-btn');

    $($backBtn).on('click',()=>{
        console.log("hola");
     location.replace("index.html");
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
