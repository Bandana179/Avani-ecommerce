@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
 <div class="mt-3">
  <div class="grid md:grid-cols-12 gap-4">
   <div class="md:col-span-2">
    {{-- admin sidebar --}}
    @include('inc.adminSidebar')
    {{-- admin sidebar end --}}
   </div>
   <div class="md:col-span-10">
    <div class="border rounded bg-dashboard-bg">
     <div class="border-b rounded-b">
      <h1 class="text-lg font-bold py-3 px-3">Product Name</h1>
     </div>
     <div class="px-3 py-3">
      <div class="border shadow bg-white rounded py-4 px-4">
       <img src="https://cdn.shopify.com/s/files/1/0232/1317/8957/products/Anti_dandruff_295x.jpg?v=1618035791" alt=""
        class="m-auto">
       <div class="p-4">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore atque animi totam iste rerum? Eius officiis
        voluptatibus ducimus voluptate doloribus debitis dolor nemo, commodi vero tempore, inventore minima pariatur
        nesciunt.
       </div>
       <div class="flex p-4">
        <a href="
        {{-- {{url('admin/dashboard/editProduct')}}/{{$product->id}} --}}
        " class="text-indigo-600 hover:text-indigo-900 text-xl px-1"><i class="fa fa-pencil-square-o"
          aria-hidden="true"></i></a>
        <a href="
         {{-- {{url('admin/dashboard/deleteProduct')}}/{{$product->id}} --}}
         " class="text-red-500 hover:text-indigo-900 text-xl px-1"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>
</div>
</div>
@endsection