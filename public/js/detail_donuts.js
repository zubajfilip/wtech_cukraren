document.addEventListener('DOMContentLoaded', function () {
    const decrementButton = document.querySelector('.decrement-button');
    const incrementButton = document.querySelector('.increment-button');
    const quantityValue = document.querySelector('.quantity-value');

    decrementButton.addEventListener('click', function () {
        let quantity = parseInt(quantityValue.textContent);
        if (quantity > 0) {
            quantity--;
            quantityValue.textContent = quantity;
            updateQuantityInputValue(quantity);
        }
    });

    incrementButton.addEventListener('click', function () {
        let quantity = parseInt(quantityValue.textContent);
        quantity++;
        quantityValue.textContent = quantity;
        updateQuantityInputValue(quantity);
    });

    function updateQuantityInputValue(quantity) {
        document.getElementById('quantity').value = quantity;
    }
});