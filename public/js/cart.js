document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.cart_add a');
    const cartCountElement = document.querySelector('.cart_num');
    const cartPriceElement = document.querySelector('.cart_price');

    function updateCartInfo() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartCount = cart.length;
        const cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0).toFixed(2);

        cartCountElement.textContent = cartCount;
        cartPriceElement.textContent = `€${cartTotal}`;
    }

    addToCartButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            const itemElement = event.target.closest('.product__item');
            const itemId = itemElement.getAttribute('data-id');
            const itemTitle = itemElement.querySelector('h6 a').innerText;
            const itemPrice = itemElement.querySelector('.product__item__price').getAttribute('data-price');
            const itemImage = itemElement.querySelector('.product__item__pic').getAttribute('data-setbg');

            const cartItem = {
                id: itemId,
                title: itemTitle,
                price: parseFloat(itemPrice),
                image: itemImage,
                quantity: 1
            };

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            const existingItemIndex = cart.findIndex(item => item.id === itemId);

            if (existingItemIndex > -1) {
                alert('Item already exists in the cart');
            } else {
                cart.push(cartItem);
                localStorage.setItem('cart', JSON.stringify(cart));
                alert('Item added to cart');
                updateCartInfo();
            }
        });
    });

    // Initialize cart info on page load
    updateCartInfo();
});


document.addEventListener('DOMContentLoaded', () => {
    const cartTableBody = document.querySelector('.shopping__cart__table tbody');
    const subTotalPriceElement = document.querySelector('.sub_total_price');
    const totalPriceElement = document.querySelector('.total_price');
    const proceedToCheckoutButton = document.querySelector('.primary-btn');

    const cartCountElement = document.querySelector('.header__top__right__cart a span');
    const cartPriceElement = document.querySelector('.cart_price');

    function updateCartInfo() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const cartCount = cart.length;
        const cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0).toFixed(2);

        cartCountElement.textContent = cartCount;
        cartPriceElement.textContent = `€${cartTotal}`;
    }

    if (!cartTableBody) {
        console.error('Error: Cart table body element not found.');
        return;
    }

    if (!subTotalPriceElement || !totalPriceElement || !proceedToCheckoutButton) {
        console.error('Error: One or more cart elements not found.');
        return;
    }

    function updateCartPage() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cartTableBody.innerHTML = '';

        if (cart.length === 0) {
            cartTableBody.innerHTML = `
                <tr>
                    <td colspan="4" class="text-center">
                        <div class="product__item">
                            <div class="product__item__text">
                                <h6>No Cart Item Found</h6>
                            </div>
                        </div>
                    </td>
                </tr>
            `;
            proceedToCheckoutButton.style.display = 'none';
            subTotalPriceElement.textContent = '€0.00';
            totalPriceElement.textContent = '€0.00';
            return;
        }

        let subTotal = 0;

        cart.forEach(item => {
            const itemTotalPrice = (item.price * item.quantity).toFixed(2);
            subTotal += parseFloat(itemTotalPrice);

            const cartRow = document.createElement('tr');
            cartRow.innerHTML = `
                <td class="product__cart__item">
                    <div class="product__cart__item__pic">
                        <img src="${item.image}" alt="${item.title}" width="100">
                    </div>
                    <div class="product__cart__item__text">
                        <small>${item.title}</small>
                        <h5>€${item.price.toFixed(2)}</h5>
                    </div>
                </td>
                <td class="quantity__item">
                    <!-- Quantity functionality can be added here -->
                </td>
                <td class="cart__price">€${itemTotalPrice}</td>
                <td class="cart__close" data-id="${item.id}">
                    <a href="javascript:void(0);">
                        <span class="icon_close"></span>
                    </a>
                </td>
            `;

            cartTableBody.appendChild(cartRow);
        });

        subTotalPriceElement.textContent = `€${subTotal.toFixed(2)}`;
        totalPriceElement.textContent = `€${subTotal.toFixed(2)}`;
        proceedToCheckoutButton.style.display = 'block';

        // Add event listeners for removing items from the cart
        document.querySelectorAll('.cart__close').forEach(button => {
            button.addEventListener('click', (event) => {
                const itemId = event.currentTarget.getAttribute('data-id');
                removeItemFromCart(itemId);
            });
        });
    }

    function removeItemFromCart(itemId) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart = cart.filter(item => item.id !== itemId);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartPage();
        updateCartInfo();
    }

    updateCartPage();
    updateCartInfo();
});


document.addEventListener('DOMContentLoaded', () => {
    const checkoutProductsList = document.getElementById('checkout-products');
    const subtotalAmountElement = document.getElementById('subtotal-amount');
    const totalAmountElement = document.getElementById('total-amount');

    function loadCartItems() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        checkoutProductsList.innerHTML = '';

        if (cart.length === 0) {
            checkoutProductsList.innerHTML = '<li>No Cart Items Found</li>';
            subtotalAmountElement.textContent = '€0.00';
            totalAmountElement.textContent = '€0.00';
            return;
        }

        let subtotal = 0;

        cart.forEach((item, index) => {
            const itemTotalPrice = (item.price * item.quantity).toFixed(2);
            subtotal += parseFloat(itemTotalPrice);

            const productItem = document.createElement('li');
            productItem.innerHTML = `<samp>${String(index + 1).padStart(2, '0')}.</samp> ${item.title} <span>€${itemTotalPrice}</span>`;
            checkoutProductsList.appendChild(productItem);
        });

        const formattedSubtotal = `€${subtotal.toFixed(2)}`;
        subtotalAmountElement.textContent = formattedSubtotal;
        totalAmountElement.textContent = formattedSubtotal;
    }

    // Initialize checkout page on load
    loadCartItems();
});

document.addEventListener('DOMContentLoaded', () => {
    const placeOrderButton = document.getElementById('order-item');
    const buttonSpinner = document.getElementById('button-spinner');

    if (placeOrderButton) {
        placeOrderButton.addEventListener('click', async (event) => {
            event.preventDefault();

            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert('Your cart is empty.');
                return;
            }

            // Show spinner and disable the button
            buttonSpinner.style.display = 'inline-block';
            placeOrderButton.classList.add('disable-button');

            try {
                const response = await fetch('/checkout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ cart })
                });

                const data = await response.json();

                // Hide spinner and enable the button
                buttonSpinner.style.display = 'none';
                placeOrderButton.classList.remove('disable-button');

                if (data.status === 'success' && data.redirect_url) {
                    window.location.href = data.redirect_url;
                    localStorage.removeItem('cart'); // Clear the cart on the frontend
                } else {
                    alert(data.message || 'Something went wrong.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Something went wrong. Please try again.');

                // Hide spinner and enable the button in case of an error
                buttonSpinner.style.display = 'none';
                placeOrderButton.classList.remove('disable-button');
            }
        });
    }
});
