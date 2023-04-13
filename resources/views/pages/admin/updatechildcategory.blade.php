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
        <div class="border rounded bg-gray-100">
          <div class="border-b rounded-b">
            <h1 class="text-lg font-bold py-3 px-3">Child Category</h1>
          </div>
          <div class="py-3 px-3">
            <div class="border bg-white rounded py-4 px-4">
              <div class="grid grid-cols-12 gap-6">
                <div class="col-span-4">
                  <form action="{{url('/admin/dashboard/update-childcategory')}}/{{$childcategory->id}}" method="Post">
                    @csrf
                    <div>
                      <label for="" class="text-sm font-medium text-gray-700">Child Category Name</label>
                      <input type="text" name="child_category_name" value="{{$childcategory->child_category_name}}"
                        class="mt-1 focus:ring-primary focus:border-primary block w-full
                        shadow-sm
                        sm:text-sm border-gray-300 rounded-md" placeholder="New Child Category" required>
                    </div>
                    <div class="mt-4">
                      <label for="" class="text-sm font-medium text-gray-700">Main Category *</label>
                      <select id="country" name="category_id" autocomplete="country-name"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="{{$childcategory->category_id}}">{{$category_name}}</option>
                        @if(count($categories)>1)
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->category_name}}</option>
                        @endforeach
                        @else
                        <option>No Category</option>
                        @endif
                      </select>
                    </div>
                    <div class="mt-4">
                      <label for="" class="text-sm font-medium text-gray-700">Sub Category Name*</label>
                      <select id="country" name="subcategory_id" autocomplete="country-name"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">
                        <option value="{{$childcategory->subcategory_id}}">{{$subcategory_name}}</option>
                        @if(count($subcategories)>1)
                        @foreach ($subcategories as $item)
                        <option value="{{$item->id}}">{{$item->sub_category_name}}</option>
                        @endforeach
                        @else
                        <option>No Category</option>
                        @endif
                      </select>
                      </select>
                    </div>
                    <input type="submit" class="mt-3 group relative w-full flex justify-center py-2 px-4 border
    border-transparent text-sm font-medium rounded-md text-white
    bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary"
                      value="Update Child Category">
                  </form>
                </div>
                <div class="col-span-8">

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