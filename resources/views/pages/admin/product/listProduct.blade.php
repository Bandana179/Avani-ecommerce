@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="mt-3">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-12 md:col-span-2">
        {{-- admin sidebar --}}
        @include('inc.adminSidebar')
        {{-- admin sidebar end --}}
      </div>
      <div class="col-span-12 md:col-span-10">
        <div class="border rounded bg-dashboard-bg">
          <div class="border-b rounded-b">
            <h1 class="text-lg font-bold py-3 px-3">Product List</h1>
          </div>
          <div class="py-5 px-5">
            <div class="border-b shadow bg-white rounded-t py-4 px-4">
              <div class="grid grid-cols-12 gap-3">
                <div class="col-span-12 md:col-span-6">
                  <select id="category" name="category" autocomplete="country-name"
                    class="mt-1 block w-full md:w-52 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm category"
                    onchange="categoryChangeFunction()">
                    <option>---select---</option>
                    @if (count($categories) > 1)
                    @foreach ($categories as $item)
                    <option value="{{ $item->id }}" class="selectCategory">{{ $item->category_name }}
                    </option>
                    @endforeach
                    @else
                    <option>No Category</option>
                    @endif
                  </select>
                </div>
                <div class="col-span-6 md:col-span-3">
                  {{-- <input type="date"
                    class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    placeholder="New Product Name"> --}}
                </div>
                <div class="col-span-6 md:col-span-3">
                  <select id="status" name="country" autocomplete="country-name"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm status"
                    onchange="statusChangeFunction()">
                    <option>Status</option>
                    <option value="active">Active</option>
                    <option value="featured">Featured</option>
                    <option>Show All</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="border-b shadow bg-white rounded-b">

              <div class="flex flex-col overflow-hidden">
                <div class="-my-2 sm:-mx-6 lg:-mx-8 overflow-x-scroll">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Product Name</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Price</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Status</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Product feature</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Date</th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($products as $product)
                          <tr>
                            <td class="px-6 py-4">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                  <img class="h-16 w-16 rounded"
                                    src="{{ asset('uploads/product_image/'.$product->product_image) }}" alt="">
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900 w-52">
                                    {{$product->product_name}}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">Rs.{{$product->product_price}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <a href="{{url('changeproductstatus')}}/{{$product->id}}"><span
                                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  {{$product->product_status}} </span></a>
                            </td>
                            {{-- <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              {{$product->product_date}}
                            </td> --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                              <a href="{{url('setfeature')}}/{{$product->id}}"><span
                                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  {{$product->product_feature}} </span></a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$product->product_date}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <a href="{{url('admin/dashboard/editProduct')}}/{{$product->id}}"
                                class="text-indigo-600 hover:text-indigo-900 text-xl px-1"><i
                                  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                              <a href="{{url('admin/dashboard/deleteProduct')}}/{{$product->id}}"
                                class="text-red-500 hover:text-indigo-900 text-xl px-1"><i class="fa fa-trash-o"
                                  aria-hidden="true"></i></a>
                              <a href="{{url('admin/dashboard/detailsProduct')}}/{{$product->id}}"
                                class="text-indigo-600 hover:text-indigo-900 text-xl px-1"><i class="fa fa-eye"
                                  aria-hidden="true"></i></a>
                            </td>
                          </tr>
                          @endforeach

                          <!-- More people... -->
                        </tbody>
                      </table>
                    </div>
                  </div>
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

@section("script")
<script>
  let category = document.getElementsByClassName("category")
  
  function categoryChangeFunction() {
  var catId = document.getElementsByClassName("category")[0].value;
  window.location = `http://avani_nepal_1.io/admin/dashboard/product/category/${catId}`;
  }

  function statusChangeFunction(){
    let statusValue = document.getElementsByClassName("status")[0].value;
    window.location = `http://avani_nepal_1.io/admin/dashboard/product/status/${statusValue}`;
  }
</script>
@endsection