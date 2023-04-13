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
            <h1 class="text-lg font-bold py-3 px-3">Create Product</h1>
          </div>
          <div class="py-9">
            <div class="border shadow bg-white rounded py-4 px-4 max-w-2xl m-auto">
              <form action="/admin/dashboard/addProduct" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-12 gap-6">
                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Product Title</label>
                    <input type="text" name="product_name"
                      class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                      placeholder="New Product Name" required>
                  </div>
                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Full Description</label>
                    <textarea type="text" rows="3" name="product_description"
                    class="ckeditor form-control" required></textarea>
                  </div>
                  <div class="col-span-12">
                    <label for="" class="text-sm font-medium text-gray-700">Main Image</label>
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
                      required name="product_image" type="file" id="formFile">
                  </div>
                  <div class="col-span-12 sm:col-span-4 lg:col-span-4">
                    <label for="" class="text-sm font-medium text-gray-700">Main Category *</label>
                    <select id="country" name="category_id" autocomplete="country-name"
                      class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                      required>
                      <option value="">---select---</option>
                      @if (count($categories) > 1)
                      @foreach ($categories as $item)
                      <option value="{{ $item->id }}">{{ $item->category_name }}
                      </option>
                      @endforeach
                      @else
                      <option>No Category</option>
                      @endif

                    </select>
                  </div>

                  <div class="col-span-12 sm:col-span-4 lg:col-span-4">
                    <label for="" class="text-sm font-medium text-gray-700">Sub Category *</label>
                    <select id="country" name="subcategory_id" autocomplete="country-name"
                      class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                      required>
                      <option value="">---select---</option>
                      @if (count($subcategories) > 1)
                      @foreach ($subcategories as $item)
                      <option value="{{ $item->id }}">
                        {{ $item->sub_category_name }}</option>
                      @endforeach
                      @else
                      <option>No Category</option>
                      @endif
                    </select>
                  </div>

                  <div class="col-span-12 sm:col-span-4 lg:col-span-4">
                    <label for="" class="text-sm font-medium text-gray-700">Child Category *</label>
                    <select id="country" name="childcategory_id" autocomplete="country-name"
                      class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                      required>
                      <option value="">---select---</option>
                      @if (count($childcategories)> 1)
                      @foreach ($childcategories as $item)
                      <option value="{{ $item->id }}">
                        {{ $item->child_category_name }}</option>
                      @endforeach
                      @else
                      <option>No Category</option>
                      @endif
                    </select>
                  </div>
                  <div class="col-span-12 sm:col-span-4 lg:col-span-4">
                    <label for="" class="text-sm font-medium text-gray-700">Set Product as featured*</label>
                    <select id="country" name="product_feature" autocomplete="country-name"
                      class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                      required>
                      <option value="">---select---</option>
                      <option value="featured">featured</option>
                      <option value="not featured">not featured</option>
                    </select>
                  </div>

                  <div class="col-span-12 lg:col-span-4">
                    <label for="" class="text-sm font-medium text-gray-700">Price *</label>
                    <input type="number" name="product_price"
                      class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                      required placeholder="Enter Price">
                  </div>
                  {{-- <div class="col-span-12">
                    <label class="block text-sm font-medium text-gray-700"> Product Other Image </label>
                    <div
                      class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                          viewBox="0 0 48 48" aria-hidden="true">
                          <path
                            d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                          <label for="file-upload"
                            class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                            <span>Upload a file</span>
                            <input id="file-upload" required name="file_upload[]" type="file" class="sr-only" multiple>
                          </label>
                          <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                      </div>
                    </div>
                  </div> --}}
                </div>
                <input type="submit"
                  class="col-span-12 mt-3 group relative w-full flex justify-center py-2 px-4 border
                  border-transparent text-sm font-medium rounded-md text-white
                  bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primar cursor-pointer"
                  value="Create Product">
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
