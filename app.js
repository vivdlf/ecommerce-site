// JavaScript

//Assigning all elements to variables

const cartButton = document.querySelector('.cart-btn');
const closeCartButton = document.querySelector('.close-cart');
const clearCartButton = document.querySelector('.clear-cart');
const cartDOM = document.querySelector('.cart');
const cartOverlay= document.querySelector('.cart-overlay');
const cartItems= document.querySelector('.cart-items');
const cartTotal= document.querySelector('.cart-total');
const cartSubTotal= document.querySelector('.cart-subtotal');
const cartTax= document.querySelector('.cart-tax');
const cartContent = document.querySelector('.cart-content');
const productsDOM = document.querySelector('.products-center');

// CART
let cart = [];
//buttons
let buttonsDOM = [];

let finalPrices = [];

var $finalItems = {
    "Item1" : {
        "Title": "Queen Panel Bed",
        "Price": 10.99,
        "Amount": 0
    },
    "Item2" : {
        "Title": "King Panel Bed",
        "Price": 12.99,
        "Amount": 0,
    },
    "Item3" : {
        "Title": "Single Panel Bed",
        "Price": 12.99,
        "Amount": 0
    },
    "Item4" : {
        "Title": "Twin Panel Bed",
        "Price":  22.99,
        "Amount": 0,
    },
    "Item5" : {
        "Title": "Fridge",
        "Price": 88.99,
        "Amount": 0
    },
    "Item6" : {
        "Title": "Dresser",
        "Price":  32.99,
        "Amount": 0,
    },
    "Item7" : {
        "Title": "Couch",
        "Price":  45.99,
        "Amount": 0,
    },
    "Item8" : {
        "Title": "Table",
        "Price":  33.99,
        "Amount": 0
    },         
};


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
});
// Getting the Products
class Products{
   async getProducts(){
       try{
        let result = await fetch('products.json');
        let data = await result.json();

        let products = data.items;
        products = products.map(item=>{
            const {title,price} = item.fields;
            const{id} = item.sys;
            const image = item.fields.image.fields.file.url;
            return {title,price,id,image}
        })
        return products
       } catch (error){
        console.log(error);
       }
    }
}

//Display Products
class UI{
    displayProducts(products){
        let result = "";
        products.forEach(product => {
            result += `
            <!--Single Product-->
  <article class="product">
    <div class="img-container">
      <img src=${product.image} alt="Product" class="product-img"/>
      <button class="bag-btn" data-id=${product.id}>
        <i class="fas fa-shopping-cart"></i>
        Add to Cart
      </button>
    </div>
    <h3>${product.title}</h3>
    <h4>$${product.price}</h4>
  </article>
  <!--End of Single Product-->
            `;
        });
         productsDOM.innerHTML = result;
    }
   getBagButtons(){
    const buttons = [...document.querySelectorAll('.bag-btn')];
    buttonsDOM = buttons;
    buttons.forEach(button => {
        let id = button.dataset.id;
        
        let inCart = cart.find(item => item.id ===id);

        if(inCart){
            button.innerText = "In Cart";
            button.disabled = true;
        }
       
             button.addEventListener('click', event => {
              event.target.innerText = "In Cart";
              event.target.disabled = true;

            //get product from products
            let cartItem = {...Storage.getProduct(id), amount : 1};
            //add product to the cart
            cart = [...cart, cartItem];
            //save cart in local storage
            Storage.saveCart(cart);
            //set cart values
            this.setCartValues(cart);
            //display cart item
            this.addCartItem(cartItem);
            //show the cart
            this.showCart();
            });
        
    });
   }
   setCartValues(cart){
       let temp=0;
       let itemsTotal=0;

      //Destroy Objects
      for (const key in $finalItems) {

        $finalItems[key]["Amount"] =0;
    }
       cart.map(item =>{
        switch (item.title) {
            case 'queen panel bed':
                 $finalItems["Item1"]["Amount"] = item.amount;
            break;
            case 'king panel bed':
                 $finalItems["Item2"]["Amount"] = item.amount;
            break;
            case 'single panel bed':
                 $finalItems["Item3"]["Amount"] = item.amount;
            break;
            case 'twin panel bed':
                  $finalItems["Item4"]["Amount"] = item.amount;
            break;
            case 'fridge':
                  $finalItems["Item5"]["Amount"] = item.amount;
            break;
            case 'dresser':
                  $finalItems["Item6"]["Amount"] = item.amount;
            break;
            case 'couch':
                  $finalItems["Item7"]["Amount"] = item.amount;
            break;
            case 'table':
                  $finalItems["Item8"]["Amount"] = item.amount;
            break;
        }
       
       
        temp += item.price * item.amount;
        
        itemsTotal += item.amount;
       });
       cartSubTotal.innerText = parseFloat(temp.toFixed(2));
       cartTax.innerText = parseFloat( ((temp.toFixed(2)) * 0.125).toFixed(2) );
       cartTotal.innerText = (parseFloat( ((temp.toFixed(2)) * 0.125).toFixed(2) ) + parseFloat(temp.toFixed(2))).toFixed(2);
       cartItems.innerText = itemsTotal;
       
       finalPrices ={
           "Total Number of Items": cartItems.innerHTML,
           "Cart Subtotal": cartSubTotal.innerHTML,
           "Cart Tax": cartTax.innerHTML,
           "Cart Total": cartTotal.innerHTML
       };
        
   }
 
   addCartItem(item){
   const div = document.createElement('div');
   div.classList.add('cart-item');
   div.innerHTML = ` 
   <img src=${item.image} alt="Product">
        <div>
          <h4>${item.title}</h4>
          <h5>${item.price}</h5>
          <span class="remove-item" data-id=${item.id}>remove</span>
        </div>

        <div>
          <i class="fas fa-chevron-up" data-id=${item.id}></i>
          <p class="item-amount">${item.amount}</p>
          <i class="fas fa-chevron-down" data-id=${item.id}></i>
        </div>
   `;
   cartContent.appendChild(div);
   }
   showCart(){
        cartOverlay.classList.add('transparentBcg');
        cartDOM.classList.add('showCart');
   }
   setUpApp(){
        cart = Storage.getCart();
        this.setCartValues(cart);
        this.populateCart(cart);
        cartButton.addEventListener('click', this.showCart);
        closeCartButton.addEventListener('click', this.hideCart);
   }
   populateCart(cart){
       cart.forEach(item=>this.addCartItem(item));
   }
   hideCart(){
       cartOverlay.classList.remove('transparentBcg');
       cartDOM.classList.remove('showCart');
   }
   cartLogic(){
      clearCartButton.addEventListener('click', ()=>{
       this.clearCart()});
       // clearCartButton.addEventListener('click', this.clearCart); 
       cartContent.addEventListener('click', event =>{
        if(event.target.classList.contains('remove-item'))
        {
            let removeItem = event.target;
            let id = removeItem.dataset.id;
            cartContent.removeChild(removeItem.parentElement.parentElement);
            this.removeItem(id);
        }
        else if(event.target.classList.contains('fa-chevron-up'))
        {
            let addAmount = event.target;
            let id = addAmount.dataset.id;
            let tempItem = cart.find(item=>item.id===id);
            tempItem.amount = tempItem.amount + 1;

            Storage.saveCart(cart);
            this.setCartValues(cart);
            addAmount.nextElementSibling.innerText = tempItem.amount;
        } else if(event.target.classList.contains('fa-chevron-down'))
        {
            let lowerAmount = event.target;
            let id = lowerAmount.dataset.id;
            let tempItem =  cart.find(item=>item.id===id);

            tempItem.amount = tempItem.amount -1;
            if(tempItem.amount>0){
                Storage.saveCart(cart);
                this.setCartValues(cart);
                lowerAmount.previousElementSibling.innerText=tempItem.amount;
            }else{
                cartContent.removeChild(lowerAmount.parentElement.parentElement);
                this.removeItem(id);
            }

        }
       });
     }
   clearCart(){
       //console.log(this);
       let cartItems = cart.map(item => item.id);
       cartItems.forEach(id => this.removeItem(id));
       while(cartContent.children.length>0){
           cartContent.removeChild(cartContent.children[0]);
       }
       this.hideCart();
   }
   removeItem(id){
    cart = cart.filter (item => item.id !==id);
    this.setCartValues(cart);
    Storage.saveCart(cart);
    let button = this.getSingleButton(id);
    button.disabled = false;
    button.innerHTML =  ` <i class="fas fa-shopping-cart"></i>
        Add to Cart
      </button> `;
   }
   getSingleButton(id){
       return buttonsDOM.find(button => button.dataset.id === id);
   }

}
//Local Storage
class Storage{
    static saveProducts(products){
        localStorage.setItem("products", JSON.stringify(products));
    }

    static getProduct(id){
        let products = JSON.parse(localStorage.getItem('products'));
        return products.find(product => product.id === id);
    }

    static saveCart(cart){
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    
    static getCart(){
        return localStorage.getItem('cart')?JSON.parse(
            localStorage.getItem('cart')
        ):[]
    }
}

document.addEventListener("DOMContentLoaded", ()=>{
    const ui = new UI();
    const products = new Products();

    //Setup App
    ui.setUpApp();
    //get all products
    //products.getProducts().then(data => console.log(data));
    products.getProducts().then(products => {
        ui.displayProducts(products);
        Storage.saveProducts(products);
    }).then( ()=>{
        ui.getBagButtons();
        ui.cartLogic();
    });
    $("#myButton").on("click", function () {
        
      
        console.log("All Products Ordered:")
        var result = {};
            Object.keys($finalItems).forEach(function(key) {
            if ($finalItems[key]["Amount"] > 0 ) {
                result[key] = $finalItems[key];
            }
            });
       //console.log(result);
        itemData = JSON.stringify(result);

      
        
        itemPrices = JSON.stringify(finalPrices);
      

      //Ajax User's Total Bill to checkout.php

      
      //console.log(JSON.parse(itemPrices));
    $.ajax({
            type: "POST",
            url: "./save-data.php",
            data: {ip: itemPrices,
                   io: itemData},
            success: function(response){
                console.log(response);
            }
            
           
      });

      
   
     window.location.href = "checkout.php";

      


    
    });
  
});


