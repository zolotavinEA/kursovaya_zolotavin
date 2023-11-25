var cart = {};
function loadCart() {
    
    if (localStorage.getItem('cart')) {
        
        cart = JSON.parse(localStorage.getItem('cart'));
            showCart();
        }
    else {
        $('.main-cart').html('Корзина пуста!');
    }
}

function showCart() {
    
    if (!isEmpty(cart)) {
        $('.main-cart').html('Корзина пуста!');
    }
    else {
        $.getJSON('goods.json', function (data) {
			var goods = data;
			var sum = 0;
            var out = '';
            for (var id in cart) {
                out += `<button data-id="${id}" class="del-goods">x</button>`;
                out += `<img src="images\\${goods[id].img}">`;
                out += ` ${goods[id].name  }`;
                out += `  <button data-id="${id}" class="minus-goods">-</button>  `;
                out += ` ${cart[id]}  `;
                out += `  <button data-id="${id}" class="plus-goods">+</button>  `;
                out += cart[id]*goods[id].cost;
                out += '<br>';
				sum += goods[id].cost*cart[id];
            }
			out += `<h3>Итого к оплате: ${sum}</div></h3>`
            $('.main-cart').html(out);
            $('.del-goods').on('click', delGoods);
            $('.plus-goods').on('click', plusGoods);
            $('.minus-goods').on('click', minusGoods);
        });
    }
}

function delGoods() {
    
    var id = $(this).attr('data-id');
    delete cart[id];
    saveCart();
    showCart();
}
function plusGoods() {
    
    var id = $(this).attr('data-id');
    cart[id]++;
    saveCart();
    showCart();
}
function minusGoods() {
    
    var id = $(this).attr('data-id');
    if (cart[id]==1) {
        delete cart[id];
    }
    else {
        cart[id]--;
    }
    saveCart();
    showCart();
}


function saveCart() {
    
    localStorage.setItem('cart', JSON.stringify(cart)); 
}

function isEmpty(object) {
   
    for (var key in object)
    if (object.hasOwnProperty(key)) return true;
    return false;
}

function sendEmail() {
    var ename = $('#ename').val();
    var email = $('#email').val();
    var ephone = $('#ephone').val();
    if (ename!='' && email!='' && ephone!='') {
        if (isEmpty(cart)) {
            alert('Ваш заказ оформлен и ожидает обработки!');
            delGoods(cart);
        }
        else {
            alert('Корзина пуста');
        }
    }
    else {
        alert('Заполните поля');
    }

}


$(document).ready(function () {
   loadCart();
   $('.send-email').on('click', sendEmail); 
});