// const updateCounterDisplay = (counterDisplay, count) => {
//   counterDisplay.textContent = count;
// };

// const createCounterDisplay = (count) => {
//   const counterDisplay = document.createElement("span");
//   counterDisplay.textContent = count;
//   counterDisplay.style.marginRight = "10px";
//   counterDisplay.style.marginLeft = "10px";
//   return counterDisplay;
// };

// const createButton = (text, className, onClick) => {
//   const button = document.createElement("button");
//   button.textContent = text;
//   button.classList = className;
//   button.addEventListener("click", onClick);
//   return button;
// };

// const handleDecrement = (counterDisplay, buttonId, button) => {
//   let currentCount = parseInt(counterDisplay.textContent, 10);
//   if (currentCount > 0) {
//     currentCount--;
//     updateCounterDisplay(counterDisplay, currentCount);
//     sessionStorage.setItem('donutid' + buttonId, currentCount);
//   }
//   if (currentCount === 0) {
//     const counterContainer = counterDisplay.parentNode;
//     sessionStorage.removeItem('donutid' + buttonId);
//     counterContainer.parentNode.replaceChild(button, counterContainer);
//   }
// };

// const handleIncrement = (counterDisplay, buttonId) => {
//   let currentCount = parseInt(counterDisplay.textContent, 10) + 1;
//   updateCounterDisplay(counterDisplay, currentCount);
//   sessionStorage.setItem('donutid' + buttonId, currentCount);
// };

// const buyButtons = document.querySelectorAll(".buy-button");
// buyButtons.forEach(function (button) {
//   let donutSessionKey = 'donutid' + button.id;
//   if (donutSessionKey in sessionStorage) {
//     const count = sessionStorage.getItem(donutSessionKey);
//     const counterDisplay = createCounterDisplay(count);
//     const counterContainer = document.createElement("div");
//     counterContainer.classList.add("counter-container");
//     const decrementButton = createButton("-", "btn btn-secondary", () => handleDecrement(counterDisplay, button.id, button));
//     const incrementButton = createButton("+", "btn btn-secondary", () => handleIncrement(counterDisplay, button.id));
//     counterContainer.appendChild(decrementButton);
//     counterContainer.appendChild(counterDisplay);
//     counterContainer.appendChild(incrementButton);
//     button.parentNode.replaceChild(counterContainer, button);
//   }

//   button.addEventListener("click", function () {
//     sessionStorage.setItem(donutSessionKey, 1);
//     const counterDisplay = createCounterDisplay(1);
//     const counterContainer = document.createElement("div");
//     counterContainer.classList.add("counter-container");
//     const decrementButton = createButton("-", "btn btn-secondary", () => handleDecrement(counterDisplay, button.id, button));
//     const incrementButton = createButton("+", "btn btn-secondary", () => handleIncrement(counterDisplay, button.id));
//     counterContainer.appendChild(decrementButton);
//     counterContainer.appendChild(counterDisplay);
//     counterContainer.appendChild(incrementButton);
//     button.parentNode.replaceChild(counterContainer, button);
//   });
// });

const updateCounterDisplay = (counterDisplay, count) => {
  counterDisplay.textContent = count;
};

const createCounterDisplay = (count) => {
  const counterDisplay = document.createElement("span");
  counterDisplay.textContent = count;
  counterDisplay.style.marginRight = "10px";
  counterDisplay.style.marginLeft = "10px";
  return counterDisplay;
};

const createButton = (text, className, onClick) => {
  const button = document.createElement("button");
  button.textContent = text;
  button.classList = className;
  button.addEventListener("click", onClick);
  return button;
};

const handleDecrement = (counterDisplay, buttonId, button) => {
  let currentCount = parseInt(counterDisplay.textContent, 10);
  if (currentCount > 0) {
    currentCount--;
    updateCounterDisplay(counterDisplay, currentCount);
    // Make AJAX request to update cart on server
    updateCartOnServer(buttonId, currentCount);
  }
  if (currentCount === 0) {
    const counterContainer = counterDisplay.parentNode;
    counterContainer.parentNode.replaceChild(button, counterContainer);
  }
};

const handleIncrement = (counterDisplay, buttonId) => {
  let currentCount = parseInt(counterDisplay.textContent, 10) + 1;
  updateCounterDisplay(counterDisplay, currentCount);
  // Make AJAX request to update cart on server
  updateCartOnServer(buttonId, currentCount);
};

const updateCartOnServer = (buttonId, count) => {
  // Make AJAX request to update cart on server
  // Example: You need to replace this URL with your actual server endpoint
  const url = '/update-cart';
  const data = { buttonId, count };

  // Example: Using Fetch API for AJAX request
  fetch(url, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  .then(response => {
    // Handle response
    console.log('Cart updated successfully');
  })
  .catch(error => {
    console.error('Error updating cart:', error);
  });
};

const buyButtons = document.querySelectorAll(".buy-button");
buyButtons.forEach(function (button) {
  button.addEventListener("click", function () {
    const counterDisplay = createCounterDisplay(1);
    const counterContainer = document.createElement("div");
    counterContainer.classList.add("counter-container");
    const decrementButton = createButton("-", "btn btn-secondary", () => handleDecrement(counterDisplay, button.id, button));
    const incrementButton = createButton("+", "btn btn-secondary", () => handleIncrement(counterDisplay, button.id));
    counterContainer.appendChild(decrementButton);
    counterContainer.appendChild(counterDisplay);
    counterContainer.appendChild(incrementButton);
    button.parentNode.replaceChild(counterContainer, button);
  });
});
