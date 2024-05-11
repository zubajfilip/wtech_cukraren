document.addEventListener('DOMContentLoaded', function() {
    // Get all delivery radio buttons
    var deliveryRadios = document.querySelectorAll('input[name="delivery"]');
    // Get all payment radio buttons
    var paymentRadios = document.querySelectorAll('input[name="payment"]');

    // Function to update selected options
    function updateSelectedOptions() {
        var totalSum = 0;
        // Update selected delivery option
        deliveryRadios.forEach(function(radio) {
            if (radio.checked) {
                var deliveryName = radio.nextElementSibling.textContent;
                var deliveryPrice = radio.parentElement.nextElementSibling.querySelector('p').textContent;
                totalSum += parseFloat(deliveryPrice.slice(1).slice(0,-1));
                document.querySelector('.price-delivery').textContent = deliveryName + ' ' + deliveryPrice;
            }
        });

        // Update selected payment option
        paymentRadios.forEach(function(radio) {
            if (radio.checked) {
                var paymentName = radio.nextElementSibling.textContent;
                var paymentPrice = radio.parentElement.nextElementSibling.querySelector('p').textContent;
                totalSum += parseFloat(paymentPrice.slice(1).slice(0,-1));
                document.querySelector('.price-payment').textContent = paymentName + ' ' + paymentPrice;
            }
        });

        document.querySelector('.sum span:nth-child(2)').textContent = totalSum.toFixed(2) + '€';
    }

    // Event listener for delivery radio buttons
    deliveryRadios.forEach(function(radio) {
        radio.addEventListener('change', updateSelectedOptions);
    });

    // Event listener for payment radio buttons
    paymentRadios.forEach(function(radio) {
        radio.addEventListener('change', updateSelectedOptions);
    });

    // Initial update
    updateSelectedOptions();
});
