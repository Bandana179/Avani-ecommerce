@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="mt-4">
    <h1 class="uppercase text-2xl font-medium">{{$order->order_number}}</h1>
  </div>
  <div class="grid md:grid-cols-12 gap-4 mt-7">
    <div class="md:col-span-8">
      <div class="shipping ml-5">
        <h1 class="uppercase text-2xl font-medium text-[#55595C]">Shipping</h1>
        <div class="info py-2">
          <h1 class="text-[#86898B] text-lg">Email: <span id="email">{{$order->shipping_email}}</span></h1>
          <h1 class="text-[#86898B] text-lg">Phone: <span id="phone">{{$order->shipping_phone}}</span></h1>
          <h1 class="text-[#86898B] text-lg">Address: <span id="address">{{$order->shipping_address}}</span></h1>
          <div class="w-full bg-[#f7dddc] border-[#712b29] text-[#712b29] py-2 px-4 my-3">
              @if($order->status==0)
                  Not Delivered
                  @else
                  Delivered
              @endif
          </div>
        </div>
      </div>

      <hr>
      <div class="shipping ml-5 my-3">
        <h1 class="uppercase text-2xl font-medium text-[#55595C]">Payment Method</h1>
        <div class="info py-2">
          <h1 class="text-[#86898B] text-lg">Method: <span id="payment_method">{{$order->order_payment_method}}</span></h1>
{{--          <div class="w-full bg-[#f7dddc] border-[#712b29] text-[#712b29] py-2 px-4 my-3">--}}
{{--            Not Paid--}}
{{--          </div>--}}
          {{-- <div class="w-full bg-[#dbf2e3] border-[#cdedd8] text-[#27633c] py-2 px-4 my-3">
            Not Paid
          </div> --}}
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
               <table class="w-full table-auto">
                <thead class="border-b">
                  <tr>
                    <th class="pt-1 py-2">Product</th>
                    <th>Price</th>
                    <th>Quantity</th>

                  </tr>
                </thead>
                <tbody id="cartTable">
                @foreach(json_decode($order->cart_items) as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->qty}}</td>
                    </tr>
                @endforeach

                </tbody>
              </table>
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
            <span>{{$order->items_price}}</span>
          </div>
          <hr>
          <div class="flex justify-between py-2 px-2">
            <span>Delivery Charge</span>
            <span>{{$order->delivery_charge}}</span>
          </div>
          <hr>
          <div class="flex justify-between py-2 px-2">
            <span>Total</span>
            <span>{{$order->total_price}}</span>
          </div>
          <hr>
          <div class="px-5 py-2">

            <body>
{{--              <form action="https://uat.esewa.com.np/epay/main" method="POST">--}}
{{--                <input value="100" name="tAmt" type="hidden">--}}
{{--                <input value="90" name="amt" type="hidden">--}}
{{--                <input value="5" name="txAmt" type="hidden">--}}
{{--                <input value="2" name="psc" type="hidden">--}}
{{--                <input value="3" name="pdc" type="hidden">--}}
{{--                <input value="EPAYTEST" name="scd" type="hidden">--}}
{{--                <input value="ee2c3ca1-696b-4cc5-a6be-2c40d929d453" name="pid" type="hidden">--}}
{{--                <input value="{{route('esewa.success')}}" type="hidden" name="su">--}}
{{--                <input value="{{route('esewa.fail')}}" type="hidden" name="fu">--}}
{{--                <input value="Submit" type="submit">--}}
{{--              </form>--}}
            </body>
            {{-- <a href="/#"> <button
                class="py-2 w-full bg-primary text-white hover:bg-hover-color add-to-cart-btn checkout-btn uppercase"
                id="addCart">Pay</button></a> --}}
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
 let email = document.getElementById('email')
 let phone = document.getElementById('phone')
 let address = document.getElementById('address')
 let shipping_address_value = JSON.parse(localStorage.getItem("saveShippingAddress"));
 console.log(shipping_address_value)
 email.innerText = shipping_address_value.email_address
 phone.innerText = shipping_address_value.contact_number
 address.innerText = {`${shipping_address_value.city},${shipping_address_value.address}`}

 // shipping info end
 // payment Method
 let payment_method = document.getElementById('payment_method')
 let payment_method_value = JSON.parse(localStorage.getItem("savePaymentMethod"));
 payment_method.innerText = payment_method_value
 // payment Method Ends
</script>
{{-- <script src="{{ asset('js/cart.js') }}"></script> --}}
<script src="{{ asset('js/order.js') }}"></script>
@endsection
