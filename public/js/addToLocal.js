const addToCartElement = document.getElementsByClassName("add-to-cart-btn");
// console.log("addToCartElement", addToCartElement);
const addToLocalStorageClicked = (e) => {
    const button = e.target;
    // console.log(button.parentElement.parentElement.parentElement);
    const shopItem = button.parentElement.parentElement.parentElement;
    // console.log(shopItem.querySelector("#title").innerText);
    const title = shopItem.querySelector("#title").innerText;
    const price = shopItem.querySelector("span").innerText;
    // console.log("title", title, "price", price);
    // const title = shopItem.getElementsByClassName("game-title")[0].innerText;
    // const price = parseFloat(
    //     shopItem.getElementsByClassName("price")[0].innerText.replace("Rs.", "")
    // );
    const imageSrc = shopItem.querySelector("img").src;

    // console.log(title, price, imageSrc);
    addItemToCart(title, price, imageSrc, 1);
};

let cartArr = [];

console.log(cartArr);

let getCartItems = JSON.parse(localStorage.getItem("cartItems"));
// console.log(getCartItems);
if (getCartItems) {
    for (let i = 0; i < getCartItems.length; i++) {
        cartArr.push(getCartItems[i]);
    }
}

function addItemToCart(title, price, imageSrc, qty) {
    let cartData = {
        title: title,
        price: price,
        imageSrc: imageSrc,
        qty,
    };

    const exitItem = cartArr.find((item) => item.title === title);
    // console.log(exitItem);

    if (exitItem) {
        if (exitItem.title === title) {
            // const cartMessageContainer = document.createElement("div");
            // const cartMessage = document.createElement("p");
            // cartMessageContainer.className = "cart-message-container";
            // cartMessage.className = "cart-message";
            // const body = document.querySelector("body");
            // cartMessage.innerText = `${title} is already in your cart!`;
            // cartMessageContainer.appendChild(cartMessage);
            // body.appendChild(cartMessageContainer);
            // setTimeout(() => {
            //     cartMessageContainer.remove();
            // }, 2000);
            alert(`${title} is already in your cart!`);
        }
    } else {
        // display message to ui
        const cartMessageContainer = document.createElement("div");
        const cartMessage = document.createElement("p");
        cartMessageContainer.className = "cart-message-container";
        cartMessage.className = "cart-message";
        const body = document.querySelector("body");
        cartMessage.innerText = "Added to cart";
        cartMessageContainer.appendChild(cartMessage);
        body.appendChild(cartMessageContainer);
        setTimeout(() => {
            cartMessageContainer.remove();
        }, 2000);
        // end
        cartArr.push(cartData);
        localStorage.setItem("cartItems", JSON.stringify(cartArr));
    }
}

for (let i = 0; i < addToCartElement.length; i++) {
    const button = addToCartElement[i];
    button.addEventListener("click", addToLocalStorageClicked);
}
