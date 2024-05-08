// // const createDonutProduct = (img, donutName, detail, price, popis) => {
// //   const holder = document.createElement("div")
// //   holder.classList.add("col-md-4", "col-sm-6", "d-flex", "flex-column", "align-items-center", "justify-content-end", "product", "text-center")

// // }



// // <div
// //   class="col-md-4 col-sm-6 d-flex flex-column align-items-center justify-content-end product text-center">
// //   <a href="#">
// //       <img src="./images/choco_sprinkle.jpg" alt="Chocolate sprinkled glazed donut" width="190"
// //           height="150" class="img-fluid">
// //   </a>
// //   <div class="name-price">
// //       <p>Čokoládový Posýpaný Donut</p>
// //       <p class="price">0,89$/ks</p>
// //   </div>
// //   <button id="2" type="button" class="btn btn-secondary buy-button">Objednať</button>
// // </div>





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

// const donutsInfo = {
//   1: {
//     donutName: "Čokoládový Donut"
//   },
//   2: {
//     donutName: "Čokoládový Posýpaný Donut"
//   },
//   3: {
//     donutName: "Klasický Glazúrový Donut"
//   },
//   4: {
//     donutName: "Cukrový Donut"
//   },
//   5: {
//     donutName: "Modrý Posýpaný Donut"
//   },
// }

// const handleDecrement = (counterDisplay, buttonId, button) => {
//   let currentCount = parseInt(counterDisplay.textContent, 10);
//   if (currentCount > 0) {
//     currentCount--;
//     updateCounterDisplay(counterDisplay, currentCount);
//     sessionStorage.setItem('donutid' + buttonId, currentCount);
//     // alert(`Z košíku bol odobratý 1 ${donutsInfo[buttonId].donutName}`)
//   }
//   if (currentCount === 0) {
//     const counterContainer = counterDisplay.parentNode;
//     sessionStorage.removeItem('donutid' + buttonId);
//     counterContainer.parentNode.replaceChild(button, counterContainer);
//     // alert(`Z košíku bol odobratý ${donutsInfo[buttonId].donutName}`)
//   }
// };

// const handleIncrement = (counterDisplay, buttonId) => {
//   let currentCount = parseInt(counterDisplay.textContent, 10) + 1;
//   updateCounterDisplay(counterDisplay, currentCount);
//   sessionStorage.setItem('donutid' + buttonId, currentCount);
//   // alert(`Do košíku bol pridaný 1 ${donutsInfo[buttonId].donutName}`)
// };

// const buyButtons = document.querySelectorAll(".buy-button");
// buyButtons.forEach(function (button) {
//   let donutSessionKey = 'donutid' + button.id;
//   if (donutSessionKey in sessionStorage) {
//     const count = sessionStorage.getItem(donutSessionKey);
//     const counterDisplay = createCounterDisplay(count);
//     const counterContainer = document.createElement("div");
//     counterContainer.classList.add("buy-section");
//     counterContainer.classList.add("d-flex");
//     counterContainer.classList.add("align-items-center");
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
//     counterContainer.classList.add("buy-section");
//     counterContainer.classList.add("d-flex");
//     counterContainer.classList.add("align-items-center");
//     const decrementButton = createButton("-", "btn btn-secondary", () => handleDecrement(counterDisplay, button.id, button));
//     const incrementButton = createButton("+", "btn btn-secondary", () => handleIncrement(counterDisplay, button.id));
//     counterContainer.appendChild(decrementButton);
//     counterContainer.appendChild(counterDisplay);
//     counterContainer.appendChild(incrementButton);
//     button.parentNode.replaceChild(counterContainer, button);
//   });
// });

