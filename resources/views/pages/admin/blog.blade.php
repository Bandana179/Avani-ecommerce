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
        <div class="border rounded bg-gray-50">
          <div class="border-b rounded-b py-3 px-3 md:flex justify-between items-center">
            <h1 class="text-lg font-bold">Blogs</h1>
            <form action="" class="flex">
              <input type="text" name="product_name"
                class="focus:ring-indigo-500 focus:border-indigo-500 block  shadow-sm sm:text-sm border-gray-300 rounded-md"
                placehol
                der="search for blogs">
              <input type="submit"
                class="group relative ml-3 px-4 border
                              border-transparent text-sm font-medium rounded-md text-white
                              bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                value="Search">

            </form>
          </div>
          <div class="">
            <div class="border-b shadow bg-white rounded-b">

              <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Blog Name</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Status</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Date</th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach($blogs as $blog)
                          <tr>
                            <td class="px-6 py-4">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                  <img class="h-16 w-16 rounded" src="{{asset('uploads/blogs')}}/{{$blog->blog_image}}"
                                    alt="">
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900 w-52">
                                    {{$blog->blog_title}}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <a href="/"><span
                                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  {{$blog->blog_status}}</span></a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{$blog->blog_date}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <a href="{{url('blog/delete')}}/{{$blog->id}}"
                                class="text-red-500 hover:text-indigo-900 text-xl px-1"><i class="fa fa-trash-o"
                                  aria-hidden="true"></i></a>
                              <a href="{{url('blog/view')}}/{{$blog->id}}"
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
