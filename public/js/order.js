let email = document.getElementById("email");
let phone = document.getElementById("phone");
let address = document.getElementById("address");
let shipping_email = document.getElementById("shipping_email");
let shipping_phone = document.getElementById("shipping_phone");
let shipping_address = document.getElementById("shipping_address");
let items_price = document.getElementById("items_price");
let delivery_charge = document.getElementById("delivery_charge");
let total_price = document.getElementById("total_price");
let items_delivery_price = document.getElementById("items_delivery_price");

let shipping_address_value = JSON.parse(
    localStorage.getItem("saveShippingAddress")
);
console.log(shipping_address_value.city.split(",")[0]);
email.innerText = shipping_address_value.email_address;
phone.innerText = shipping_address_value.contact_number;
address.innerText = `${shipping_address_value.city.split(",")[0]},${
    shipping_address_value.address
}`;
// console.log(
//     "shipping_address_value",
//     shipping_address_value.city.split(",")[1]
// );
items_delivery_price.innerText = `Rs. ${
    shipping_address_value.city.split(",")[1]
}`;

// shipping info end
// payment Method
let payment_method = document.getElementById("payment_method");
let order_payment_method = document.getElementById("order_payment_method");
let payment_method_value = JSON.parse(
    localStorage.getItem("savePaymentMethod")
);
payment_method.innerText = payment_method_value;
order_payment_method.value = payment_method_value;

let cart_items = document.getElementById("cart_items");
let cart_value = localStorage.getItem("cartItems");
console.log(JSON.parse(cart_value));
cart_items.value = cart_value;

JSON.parse(cart_value).map((value) =>
    console.log("value", value.price.split(".")[1])
);

// console.log(
//     "kljdlfkas",
//     JSON.parse(cart_value)
//         .reduce((acc, item) => acc + item.price.split(".")[1] * item.qty, 0)
//         .toFixed(2)
// );

// payment Method Ends

const itemTotalPrice = JSON.parse(cart_value)
    .reduce((acc, item) => acc + item.price.split(".")[1] * item.qty, 0)
    .toFixed(2);

let items_price_total = document.getElementById("items_price_total");
items_price_total.innerText = `Rs. ${itemTotalPrice}`;

let items_total_price = document.getElementById("items_total_price");
items_total_price.innerText = `Rs. ${
    parseInt(itemTotalPrice) +
    parseInt(shipping_address_value.city.split(",")[1])
}`;
console.log(typeof parseInt(itemTotalPrice));

// for form data
shipping_email.value = shipping_address_value.email_address;
shipping_phone.value = shipping_address_value.contact_number;
shipping_address.value = `${shipping_address_value.city.split(",")[0]},${
    shipping_address_value.address
}`;
items_price.value = itemTotalPrice;
delivery_charge.value = parseInt(shipping_address_value.city.split(",")[1]);
total_price.value = `${
    parseInt(itemTotalPrice) +
    parseInt(shipping_address_value.city.split(",")[1])
}`;
// for form data

window.onload = () => {
    const cartValue = JSON.parse(localStorage.getItem("cartItems"));
    const shoppingCartContent = document.getElementsByClassName(
        "shopping-cart-content"
    )[0];
    // console.log(cartValue);
    // console.log(shoppingCartContent);
    const checkOutBtn = document.getElementsByClassName("checkout-btn")[0];
    // display message if cart is empty
    if (cartValue.length === 0) {
        const cartEmpty = document.createElement("div");
        cartEmpty.className = "cart-empty";
        cartEmpty.innerText = "Your cart is empty";
        shoppingCartContent.appendChild(cartEmpty);
        checkOutBtn.setAttribute("disabled", true);
    }
    // end
    cartValue.forEach(function (item) {
        const cartValue = JSON.parse(localStorage.getItem("cartItems"));
        const exitItem = cartValue.find((value) => value.title === item.title);
        console.log("exitItem", exitItem.qty === "2" ? true : false);
        tableRow = document.createElement("tr");
        tableRow.className = "border-b tr flex justify-between items-center";
        cartTable = document.getElementById("cartTable");
        let cartRowContent = `
      <td class="py-3 md:flex items-center">
      <div class="mr-3">
          <img class="h-16 w-16 rounded" src="${item.imageSrc}" alt="">
         </div>
         <div>
          <span class="font-medium item_title" id="title">${item.title}</span>
         </div>
      </td>
      <td class="text-center price">${item.qty}*${item.price.split(".")[1]} = ${
            item.qty * item.price.split(".")[1]
        }</td>
      
    `;
        tableRow.innerHTML = cartRowContent;
        cartTable.appendChild(tableRow);
    });

    eventHandler();
    qtyChange();
    updateCartTotal();
};
