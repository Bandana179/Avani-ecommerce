const removeCartItem = (e) => {
    const cartRow = e.target.parentElement.parentElement;
    // console.log("cartRow", cartRow);
    const titleElement = cartRow.querySelectorAll("td")[0].innerText;
    // console.log("cartRow", titleElement);

    if (
        window.confirm(
            `Are you sure you want to delete ${titleElement} from cart?`
        )
    ) {
        // delete from local storage
        const cartValue = JSON.parse(localStorage.getItem("cartItems"));
        const result = cartValue.filter((item) => item.title !== titleElement);
        // console.log(result);
        localStorage.setItem("cartItems", JSON.stringify(result));
        // end
        // delete from ui
        let buttonClick = e.target;
        buttonClick.parentElement.parentElement.remove();
        // delete from ui end
        updateCartTotal();
    }
};

const eventHandler = () => {
    // delete btn
    const deleteBtn = document.querySelectorAll("#delete-btn");
    deleteBtn.forEach(function (btn) {
        btn.addEventListener("click", removeCartItem);
    });
    // delete btn end
};

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
        tableRow.className = "border-b tr";
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
      <td class="text-center price">${item.price}</td>
      <td class="text-center">
         <select id="qty_change" name="category_id" autocomplete="country-name"
          class="qty block w-14 py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm m-auto">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
         </select>
        </td>
        <td class="text-center">
            <i class="fa fa-trash-o text-red-500 hover:text-indigo-900 text-xl px-1 cursor-pointer" id="delete-btn" aria-hidden="true" style="font-size:23px"></i>
        </td>
    `;
        tableRow.innerHTML = cartRowContent;
        cartTable.appendChild(tableRow);
    });

    eventHandler();
    qtyChange();
    updateCartTotal();
};

const qtyChange = () => {
    const qtyValue = document.querySelectorAll("#qty_change");
    console.log("qtyValue", qtyValue);
    qtyValue.forEach(function (btn) {
        btn.addEventListener("change", upateQtyValue);
    });
};

const upateQtyValue = (e) => {
    console.log("object", e.target.value);
    // localStorage.setItem("cartItems", JSON.stringify(cartItems));
    updateCartTotal(e.target.value);
    const cartValue = JSON.parse(localStorage.getItem("cartItems"));
    const cartRow = e.target.parentElement.parentElement;
    const titleElement = cartRow.querySelectorAll("td")[0].innerText;
    const newArr = cartValue.map((obj) => {
        if (obj.title === titleElement) {
            return { ...obj, qty: e.target.value };
        }

        return obj;
    });
    // const exitItem = cartValue.find((item) => item.title === titleElement);
    console.log("cartRow", newArr);
    localStorage.setItem("cartItems", JSON.stringify(newArr));
};

const updateCartTotal = (qty) => {
    console.log("object", qty);
    const cartRows = document.getElementsByClassName("tr");
    let total = 0;
    let qtyValue = 1;
    for (let i = 0; i <= cartRows.length - 1; i++) {
        const cartRow = cartRows[i];
        let titleElement =
            cartRow.getElementsByClassName("item_title")[0].innerText;
        let priceElement = cartRow.getElementsByClassName("price")[0];
        let qtyElement = cartRow.getElementsByClassName("qty")[0];
        const cartValue = JSON.parse(localStorage.getItem("cartItems"));
        const exitItem = cartValue.find(
            (value) => value.title === titleElement
        );
        console.log("qtyElement", exitItem);
        let price = parseFloat(priceElement.innerText.replace("Rs.", ""));
        // qtyElement.addEventListener("change", function (e) {
        //     console.log("first", e.target.value);
        // });

        total = total + price * (qty === undefined ? 1 : qty);
        console.log("total", total);
    }
    total = Math.round(total * 100) / 100;
    document.getElementsByClassName("totalPrice")[0].innerText = `Rs. ${total}`;
    // document.getElementById("items_price_total")[0].innerText = `Rs. ${total}`;
    const subtotal = document.getElementById("subtotal");
    subtotal.innerText = cartRows.length;
};
