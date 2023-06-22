window.addEventListener('click', function(event) {

    let counter;
  
    if(event.target.dataset.action === 'plus' || event.target.dataset.action === 'minus'){
        const itemControl = event.target.closest('.cart__item-control');
        const cartItem = document.querySelectorAll('.cart__item-products');
        counter = itemControl.querySelector('[data-counter]');
       
    }
    if(event.target.dataset.action === 'plus') {

        counter.innerText = ++counter.innerText;    
        calcPrice();    

    }
    if(event.target.dataset.action === 'minus') {
        

        if(parseInt(counter.innerText) > 1) {
            counter.innerText = --counter.innerText;  
        } else if(parseInt(counter.innerText) === 1) {

            event.target.closest('.cart__item-products').remove();

            toggleCartStatus();
            calcPrice();
        }

        if(event.target.hasAttribute('data-action') && event.target.closest('.cart-wrapper')) {
            calcPrice();
        }
        
    }
})