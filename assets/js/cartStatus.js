function toggleCartStatus() {

    const cartWrapper = document.querySelector('.cart-wrapper');
    const cartEmpty = document.querySelector('[data-cart-empty]');
    const cartFull = document.querySelector('[data-cart-full]');
    const dropdown = document.querySelector('.dropdown__cart');
    // console.log(cartEmpty);
    if(cartWrapper.children.length > 0 ) {
        cartFull.classList.add('block');
        cartFull.classList.remove('none');
        cartEmpty.classList.add('none');
        dropdown.classList.add('none');
    } else {
        cartEmpty.classList.remove('none')
        cartFull.classList.remove('block')
        cartFull.classList.add('none')
    }
}