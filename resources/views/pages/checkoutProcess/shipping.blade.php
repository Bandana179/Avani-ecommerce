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
      <h1 class="uppercase text-2xl font-medium">Shipping</h1>
      <form action="/payment" method="GET" enctype="multipart/form-data" class="mt-3" id="my-form">
        @csrf
        <div class="grid grid-cols-12 gap-6">
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">Address</label>
            <input type="text" name="address" id="address"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter Address" required>
          </div>
          {{-- <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">City</label>
            <input type="text" name="city" id="city"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter City" required>
          </div> --}}
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">City</label>
            <select id="city" name="category_id" autocomplete="country-name"
              class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500  sm:text-sm"
              required>
              <option value="">---select city---</option>
              <option value="kathmandu,100">kathmandu</option>
              <option value="bhaktapur,150">Bhaktapur</option>
              <option value="lalitpur,100">Lalitpur</option>
            </select>
          </div>
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">Contact Number</label>
            <input type="tel" name="contact_number" id="contact_number"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter Contact Number" required>
          </div>
          <div class="col-span-12">
            <label for="" class="text-sm font-medium text-gray-700">Email Address</label>
            <input type="email" name="email_address" id="email_address"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Enter Your Email" required>
          </div>
        </div>
        <input type="submit"
          class="col-span-12 mt-3 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer"
          value="Continue">
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  const form = document.getElementById('my-form')
  const address = document.getElementById('address')
  const city = document.getElementById('city')
  const contact_number = document.getElementById('contact_number')
  const email_address = document.getElementById('email_address')
  form.addEventListener('submit',function(e){
    // e.preventDefault()
    let shippingData = {
      address:address.value,
      city:city.value,
      contact_number:contact_number.value,
      email_address:email_address.value
    }
    localStorage.setItem("saveShippingAddress",JSON.stringify(shippingData))

  })
</script>
@endsection