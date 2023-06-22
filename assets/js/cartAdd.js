const cartWrapper = document.querySelector('.cart-wrapper');
const popup = document.querySelector('.popup');
const body = document.querySelector('body');


window.addEventListener('click', function(event) {
    
    if(event.target.hasAttribute('data-order')) {
        popup.classList.add('active');
        body.classList.add('active');
        const totalPriceOrder = document.querySelector('.count__price').innerHTML;
            orderItemHTML = `<div class="total-price">${totalPriceOrder} ₽</div>
            <input type="hidden" name="total-price" value="${totalPriceOrder}">
            `
            
            const popupPrice = document.querySelector('.popup-title');
            popupPrice.insertAdjacentHTML("beforeend",orderItemHTML);
            popup.addEventListener('click', function(e) {
                if(!e.target.closest('.popup-order')){
                    popup.classList.remove('active');
                    body.classList.remove('active');
                    const totalPrice = document.querySelector('.total-price');
                    totalPrice.remove();
                }
            })
       
    } 
    if(event.target.hasAttribute('data-accept')) {
        document.querySelector('.popup-order').classList.add('none');
        document.querySelector('.popup-accept').classList.add('active');
    }
    if(event.target.hasAttribute('data-cart')) {
        
        const card = event.target.closest('.catalog__item')
        console.log(event.target);
        console.log(card);
        const productInfo = {
            id: card.dataset.id,
            imgSrc: card.querySelector('img').getAttribute('src'),
            title: card.querySelector('.catalog__item-title').innerText,
            price: card.querySelector('.catalog__item-price').innerText,
            weight: card.querySelector('.catalog__item-weight').innerText,
        };

        const itemInCart = cartWrapper.querySelector(`[data-id="${productInfo.id}"]`);

        if(itemInCart) {

            const counterElement = itemInCart.querySelector('[data-counter]');
            counterElement.innerText = ++counterElement.innerText;

        } else {
            const cartItemHTML = `
                <div class="cart__item-products" data-id="${productInfo.id}">
                    <div class="cart__item-img"><img src="${productInfo.imgSrc}" alt=""></div>       
                    <div class="cart__item-name">${productInfo.title}</div>       
                    <div class="cart__item-price">${productInfo.price}</div>
                    <div class="cart__item-control">
                        <div class="control-btn" data-action="minus">-</div>
                        <div class="control-count" data-counter>1</div>
                        <div class="control-btn" data-action="plus">+</div>
                    </div>
                </div>`;

        cartWrapper.insertAdjacentHTML('beforeend', cartItemHTML);
        const delay = setTimeout(() => {
            const dropdown = document.querySelector('.dropdown__cart');
            dropdown.classList.add('none');
        }, 4000);
        }


        toggleCartStatus();
        calcPrice(); 
        const dropdown = document.querySelector('.dropdown__cart');
        dropdown.classList.remove('none');
    }
})