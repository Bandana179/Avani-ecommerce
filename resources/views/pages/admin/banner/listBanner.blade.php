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
          <div class="border-b rounded-b py-3 px-3 flex justify-between items-center">
            <h1 class="text-lg font-bold">Banner</h1>
            <a href="/admin/dashboard/bannerCreate">
              <button
                class="col-span-12 group relative w-full flex justify-center py-2 px-4 border
                              border-transparent text-sm font-medium rounded-md text-white
                              bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                <div>
                  <i class="fa fa-plus-circle" aria-hidden="true"></i>
                </div>
                <div class="ml-1">
                  Create Banner
                </div>
              </button></a>
          </div>
          <div class="">
            <div class="border bg-white rounded ">
              <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                  <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="overflow-hidden border-b border-gray-200">
                      <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                          <tr>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              BANNER IMAGES</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              BANNER TYPE</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              PUBLISH</th>
                            <th scope="col" class="relative px-6 py-3">
                              <span class="sr-only">Edit</span>
                            </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($banners as $banner )
                          <tr>
                            <td class="px-6 py-4">
                              <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                  <img class="h-16 w-16 rounded"
                                    src="{{ asset('/uploads/banners') }}/{{$banner->image}}" alt="">
                                </div>
                                <div class="ml-4">
                                  <div class="text-sm font-medium text-gray-900 w-52">
                                    {{$banner->product}}
                                  </div>
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                              <div class="text-sm text-gray-900">
                                {{$banner->banner_type}}
                              </div>
                            </td>
                            @if($banner->ispublished==1)
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              <a href="{{url('changebannerstatus')}}/{{$banner->id}}"><span
                                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Published</span></a>
                            </td>
                            @else
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                              <a href="{{url('changebannerstatus')}}/{{$banner->id}}"><span
                                  class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                  Not Published</span></a>
                            </td>
                            @endif
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                              <a href="{{url('admin/dashboard/editbanner')}}/{{$banner->id}}"
                                class="text-indigo-600 hover:text-indigo-900 text-xl px-1"><i
                                  class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                              <a href="{{url('admin/dashboard/deletebanner')}}/{{$banner->id}}"
                                class="text-red-500 hover:text-indigo-900 text-xl px-1"><i class="fa fa-trash-o"
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