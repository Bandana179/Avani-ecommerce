@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="grid md:grid-cols-12 gap-4 mt-7">
    <div class="md:col-span-8">
      <div class="shipping ml-5">
        <h1 class="uppercase text-2xl font-medium text-[#55595C]">Shipping</h1>
        <div class="info py-2">
          <h1 class="text-[#86898B] text-lg">Email: <span id="email">Sanjay@gmail.com</span></h1>
          <h1 class="text-[#86898B] text-lg">Phone: <span id="phone">453453534</span></h1>
          <h1 class="text-[#86898B] text-lg">Address: <span id="address">kharibot ,kathmandu</span></h1>
        </div>
      </div>
      <hr>
      <div class="shipping ml-5 my-3">
        <h1 class="uppercase text-2xl font-medium text-[#55595C]">Payment Method</h1>
        <div class="info py-2">
          <h1 class="text-[#86898B] text-lg">Method:<span id="payment_method"></span></h1>
        </div>
      </div>
      <hr>
      <div class="shipping ml-5 my-3">
        <h1 class="uppercase text-2xl font-medium text-[#55595C]">Order Items</h1>
        <div class="info py-2">
          <div class="border rounded mt-3 mb-3 px-5 py-3">
            <div class="shopping-cart-content">
              <div id="cartTable"></div>
              <!--render from js  -->
              {{-- <table class="w-full table-auto">
                <thead class="border-b">
                  <tr>
                    <th class="pt-1 py-2">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Remove</th>
                  </tr>
                </thead>
                <tbody id="cartTable">

                </tbody>
              </table> --}}
              <!--render from js  -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="md:col-span-4">
      <div class="border rounded-md">
        <div class="bg-gray-100 dark:bg-gray-700 rounded-t-md py-3">
          <h1 class="uppercase text-center text-[#303030] text-lg">order Summery</h1>
        </div>
        <div class=" px-7">
          <div class="flex justify-between py-2 px-2">
            <span>Items</span>
            <span id="items_price_total"></span>
          </div>
          <hr>
          <div class="flex justify-between py-2 px-2">
            <span>Delivery Charge</span>
            <span id="items_delivery_price"></span>
          </div>
          <hr>
          <div class="flex justify-between py-2 px-2">
            <span>Total</span>
            <span id="items_total_price"></span>
          </div>
          <hr>
          <div class="px-5 py-2">
            <form action="{{url('/orderstore')}}">
              <input type="hidden" value="shipping_phone" name="shipping_phone" id="shipping_phone">
                <input type="hidden" value="shipping_email" name="shipping_email" id="shipping_email">
              <input type="hidden" value="shipping_address" name="shipping_address" id="shipping_address">
              <input type="hidden" value="order_payment_method" name="order_payment_method" id="order_payment_method">
              <input type="hidden" value="cart_items" name="cart_items" id="cart_items">
              <input type="hidden" value="items_price" name="items_price" id="items_price">
              <input type="hidden" value="delivery_charge" name="delivery_charge" id="delivery_charge">
              <input type="hidden" value="total_price" name="total_price" id="total_price">
              {{-- <a href="/order/73948798459874"> --}}
                <button type="submit"
                  class="py-2 w-full bg-primary text-white hover:bg-hover-color add-to-cart-btn checkout-btn uppercase"
                  id="addCart">Place
                  Order
                </button>
                {{-- </a> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
 <script>
  // shipping info
 // let email = document.getElementById('email')
 // let shipping_email = document.getElementById('shipping_email')
 // let phone = document.getElementById('phone')
 // let address = document.getElementById('address')
 // let shipping_address_value = JSON.parse(localStorage.getItem("saveShippingAddress"));
 // console.log(shipping_address_value)
 // email.innerText = shipping_address_value.email_address
 // shipping_email.value=shipping_address_value.email_address
 // phone.innerText = shipping_address_value.contact_number
 // address.innerText = `${shipping_address_value.city},${shipping_address_value.address}`
 //
 // // // shipping info end
 // // // payment Method
 // let payment_method = document.getElementById('payment_method')
 // let payment_method_value = JSON.parse(localStorage.getItem("savePaymentMethod"));
 // payment_method.innerText = payment_method_value
 // payment Method Ends
</script>
 <script src="{{ asset('js/cart.js') }}"></script>
<script src="{{ asset('js/order.js') }}"></script>
@endsection
