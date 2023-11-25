var cart = {}; 


function init(){
	
	$.getJSON("goods.JSON", goodsOut);
}

function goodsOut(data){
	
	console.log(data);
	var out='';
	for(var key in data){
        out +='<div class="cart">';
        out +=`<p class="name">${data[key].name}</p>`;
        out +=`<img  src="images/${data[key].img}" alt="">`;
        out +=`<div class="cost">${data[key].cost}</div>`;
        out +=`<button class="add-to-cart" data-id="${key}">Купить</button>`;
        out +='</div>';
    }
    $('.goods-out').html(out);
    $('.add-to-cart').on('click', addToCart);
}

function addToCart() {
    
    var id = $(this).attr('data-id');
    var out = '';
    
    if (cart[id]==undefined) {
        cart[id] = 1;
        counter = localStorage.getItem('counter')
        counter++;
        $('.goods-count').html(counter);
        localStorage.setItem('counter', counter); 
    }
    else {
        cart[id]++; 
        counter = localStorage.getItem('counter')
        counter++;
        $('.goods-count').html(counter);
        localStorage.setItem('counter', counter); 
    }
    showMiniCart();
    saveCart();
}

function saveCart() {
    
    localStorage.setItem('cart', JSON.stringify(cart)); 
}

function showMiniCart() {
    
    var out="";
    for (var key in cart) {
        out += key +' --- '+ cart[key]+'<br>';
    }			
    $('.mini-cart').html(out);
}

function loadCart() {
    
    if (localStorage.getItem('cart')) {
        
        cart = JSON.parse(localStorage.getItem('cart'));
        showMiniCart();
        
        counter = 0
        var id = $(this).attr('data-id');
        for (let i = 1; i < 7; i++){
            if (cart[i] == undefined){
                continue
            }
            else{
                counter+=cart[i]
            }
        }

        $('.goods-count').html(counter);
        localStorage.setItem('counter', counter); 


    }
}

$(document).ready(function () {
    init();
    loadCart();
});