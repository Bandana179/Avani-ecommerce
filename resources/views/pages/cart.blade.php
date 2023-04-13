@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="grid md:grid-cols-12 gap-4 mt-4">
    <div class="md:col-span-8">
      <div>
        <h1 class="font-semibold text-3xl text-center">My Shopping Cart</h1>
      </div>
      <div class="border rounded mt-3 mb-3 px-5 py-3">
        {{-- <div class="header border-b">
          <h1>sanja</h1>
        </div>
        <div class="header border-b">
          <h1>sanja</h1>
        </div> --}}
        <div class="shopping-cart-content">
          <!--render from js  -->
          <table class="w-full table-auto">
            <thead class="border-b">
              <tr>
                <th class="pt-1 py-2">Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Remove</th>
              </tr>
            </thead>
            <tbody id="cartTable">
              {{-- <tr class="border-b">
                <td class="py-3 flex items-center">
                  <div class="mr-3">
                    <img class="h-16 w-16 rounded" src="{{ asset('/images/product1.jpg') }}" alt="">
                  </div>
                  <div>
                    <span class="font-medium">hello anothoer product</span>
                  </div>
                </td>
                <td class="text-center">Rs.200</td>
                <td class="text-center">
                  <select id="country" name="category_id" autocomplete="country-name"
                    class="block w-14 py-1 px-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm m-auto">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                </td>
                <td class="text-center">
                  <a href="/" class="text-red-500 hover:text-indigo-900 text-xl px-1"><i class="fa fa-trash-o"
                      aria-hidden="true"></i></a>
                </td>
              </tr> --}}
            </tbody>
          </table>
          <!--render from js  -->
        </div>
      </div>
    </div>
    <div class="md:col-span-4">
      <div class="border">
        <div class="border-b px-5 py-2">
          <h2 class="uppercase text-lg font-medium">
            SubTotal (<span id="subtotal">1</span>) Items
          </h2>
          <span class="totalPrice" id="totalPrice">Rs. 0</span>
        </div>
        <div class="px-5 py-2">
          <a href="/shipping"> <button
              class="py-2 w-full bg-primary text-white hover:bg-hover-color add-to-cart-btn checkout-btn"
              id="addCart">PROCEED TO
              CHECKOUT</button></a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script src="{{ asset('js/cart.js') }}"></script>
@endsection