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
        <div class="border rounded bg-gray-100">
          <div class="border-b rounded-b">
            <h1 class="text-lg font-bold py-3 px-3">Category</h1>
          </div>
          <div class="py-3 px-3">
            <div class="border bg-white rounded py-4 px-4">
              <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-4">
                  @include('inc.messages')
                  <form action="/admin/dashboard/add-category" method="POST">
                    @csrf
                    <div>
                      <label for="" class="text-sm font-medium text-gray-700">Category Name</label>
                      <input type="text" name="category_name" class="'mt-1 focus:ring-primary focus:border-primary
                    block
                    w-full
                    shadow-sm
                    sm:text-sm border-gray-300 rounded-md" placeholder="New Category" required>
                      <span class="text-red-500">
                        @error('category_name')
                        {{ $message }}
                        @enderror</span>
                    </div>
                    <input type="submit"
                      class="mt-3 group relative w-full flex justify-center py-2 px-4 border
                      border-transparent text-sm font-medium rounded-md text-white
                      bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary cursor-pointer"
                      value="Create Category">
                  </form>
                  {{-- {!! Form::open(['url' => '/admin/dashboard/add-category', 'method' => 'POST']) !!}
                  <div>
                    {{ Form::label('category_name', 'Category Name', ['class' => 'text-sm font-medium text-gray-700'])
                    }}
                    {{ Form::text('category_name', '', [
                    'class' => 'mt-1 focus:ring-indigo-500 focus:border-indigo-500
                    block
                    w-full
                    shadow-sm
                    sm:text-sm border-gray-300 rounded-md',
                    'placeholder' => 'New Category',
                    ]) }}
                    <span class="text-red-500">
                      @error('category_name')
                      {{ $message }}
                      @enderror
                  </div>
                  <input type="submit"
                    class="mt-3 group relative w-full flex justify-center py-2 px-4 border
                      border-transparent text-sm font-medium rounded-md text-white
                      bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    value="Create Category">
                  {!! Form::close() !!} --}}
                </div>
                <div class="col-span-12 md:col-span-8">
                  {{-- table --}}
                  <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                          <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                              <tr>
                                <th scope="col"
                                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Category Name</th>
                                <th scope="col" class="relative px-6 py-3">
                                  <span class="sr-only">Edit</span>
                                </th>
                              </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                              @if (count($categories) > 0)
                              @foreach ($categories as $item)
                              <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                  <div class="flex items-center">
                                    <div class="text-base text-gray-500">
                                      {{ $item->category_name }}</div>
                                  </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                  <a href="{{ url('/admin/dashboard/updatecategorypage') }}/{{ $item->id }}"
                                    class="text-indigo-600 font-bold text-xl hover:text-indigo-900 px-1"><i
                                      class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                  <a href="{{ url('/admin/dashboard/delete-category') }}/{{ $item->id }}"
                                    class="text-red-500 font-bold text-xl hover:text-indigo-900 px-1"><i
                                      class="fa fa-trash-o" aria-hidden="true"></i></a>
                                </td>
                              </tr>
                              @endforeach
                              @else
                              <p>No Categories Found</p>
                              @endif
                              <!-- More people... -->
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  {{-- table end --}}
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