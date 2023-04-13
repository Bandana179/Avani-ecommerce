@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="mt-3">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-2">
        {{-- admin sidebar --}}
        @include('inc.adminSidebar')
        {{-- admin sidebar end --}}
      </div>
      <div class="col-span-10">
        <div class="border rounded bg-dashboard-bg">
          <div class="border-b rounded-b">
            <h1 class="text-lg font-bold py-3 px-3">Create Banner</h1>
          </div>
          <div class="py-9">
            <div class="border shadow bg-white rounded py-4 px-4 max-w-2xl m-auto">
              <form action="/admin/dashboard/addBanner" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-12 gap-6">
                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Banner Type</label>
                    <select id="country" name="banner_type" autocomplete="country-name"
                      class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                      required>
                      <option value="">---Select Banner---</option>
                      <option>Main Banner</option>
                      @if($bannerfirst>0)
                      <option disabled>first Banner</option>
                      @else
                      <option>first Banner</option>
                      @endif
                      @if($bannersecond>0)
                      <option disabled>Second Banner</option>
                      @else
                      <option>Second Banner</option>
                      @endif
                    </select>
                  </div>
                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Product Name</label>
                    <select id="country" name="product_id" autocomplete="country-name"
                      class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                      required>
                      <option value="">---Product---</option>
                      @foreach ($products as $product )
                      <option value={{$product->id}}>{{$product->product_name}}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Banner url</label>
                    <input type="text" name="product_name"
                      class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                      placeholder="Banner url" value="" disabled>
                  </div>

                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Image</label>
                    <input class="form-control
                                      block
                                      w-full
                                      text-base
                                      font-normal
                                      text-gray-700
                                      bg-white bg-clip-padding
                                      border border-solid border-gray-300
                                      rounded
                                      transition
                                      ease-in-out
                                      m-0
                                      focus:text-gray-700 focus:bg-white focus:border-primary focus:outline-none"
                      name="product_image" type="file" id="formFile" required>
                  </div>

                </div>
                <input type="submit" class="col-span-12 mt-3 group relative w-full flex justify-center py-2 px-4 border
                  border-transparent text-sm font-medium rounded-md text-white
                  bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                  value="Create Banner">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection