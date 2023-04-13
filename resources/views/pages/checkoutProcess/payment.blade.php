@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="py-4 px-4 max-w-2xl m-auto">
    <ul class="flex justify-between">
      <li>
        <a href="/">Shipping</a>
      </li>
      <li>
        <a href="/">Payment</a>
      </li>
      <li>
        <a href="/">Place Order</a>
      </li>
    </ul>
    <div class="mt-8">
      <h1 class="uppercase text-3xl font-medium">payment method</h1>
      <h1 class="text-xl my-5">Select Method</h1>
      <form action="/placeorder" class="mt-4" id="payment_form">
{{--        <div class="flex items-center mb-4">--}}
{{--          <input id="esewa" type="radio" name="countries" value="Esewa"--}}
{{--            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"--}}
{{--            aria-labelledby="esewa" aria-describedby="esewa" checked>--}}
{{--          <label for="esewa" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">--}}
{{--            Esewa--}}
{{--          </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center mb-4">--}}
{{--          <input id="bank_transfer" type="radio" name="countries" value="Bank Transfer"--}}
{{--            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600"--}}
{{--            aria-labelledby="bank_transfer" aria-describedby="bank_transfer">--}}
{{--          <label for="bank_transfer" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">--}}
{{--            Bank Transfer--}}
{{--          </label>--}}
{{--        </div>--}}

        <div class="flex items-center mb-4">
          <input id="cash_delivery" type="radio" name="payment_method" value="Cash on Delivery"
            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-600 dark:bg-gray-700 dark:border-gray-600"
            aria-labelledby="cash_delivery" aria-describedby="cash_delivery">
          <label for="cash_delivery" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">
            Cash on Delivery
          </label>
        </div>

{{--        <div class="flex items-center mb-4">--}}
{{--          <input id="khalti" type="radio" name="countries" value="Khalti"--}}
{{--            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600"--}}
{{--            aria-labelledby="khalti" aria-describedby="khalti">--}}
{{--          <label for="khalti" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">--}}
{{--            Khalti--}}
{{--          </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center mb-4">--}}
{{--          <input id="fone_pay" type="radio" name="countries" value="Fone Pay"--}}
{{--            class="w-4 h-4 border-gray-300 focus:ring-2 focus:ring:blue-300 dark:focus-ring-blue-600 dark:bg-gray-700 dark:border-gray-600"--}}
{{--            aria-labelledby="fone_pay" aria-describedby="fone_pay">--}}
{{--          <label for="fone_pay" class="block ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">--}}
{{--            Fone Pay--}}
{{--          </label>--}}
{{--        </div>--}}

        <input type="submit"
          class="col-span-12 mt-3 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer"
          value="Continue">
      </form>
      {{-- <form action="/admin/dashboard/addBanner" method="POST" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="grid grid-cols-12 gap-6">
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="product_name"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter Address" value="">
          </div>
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">City</label>
            <input type="text" name="product_name"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter City" value="">
          </div>
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">Contact Number</label>
            <input type="tel" name="product_name"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter Contact Number" value="">
          </div>
        </div>
        <input type="submit"
          class="col-span-12 mt-3 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer"
          value="Continue">
      </form> --}}
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  const payment_form = document.getElementById('payment_form')
  const esewa = document.getElementById('esewa')
  console.log("first")
  const bank_transfer = document.getElementById('bank_transfer')
  const cash_delivery = document.getElementById('cash_delivery')
  const khalti = document.getElementById('khalti')
  const fone_pay = document.getElementById('fone_pay')
  payment_form.addEventListener('submit',function(e){
    localStorage.setItem("savePaymentMethod",JSON.stringify("Cash on delivery"))
  })
</script>
@endsection
