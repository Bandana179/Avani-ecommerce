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
          <div class="border-b rounded-b py-3 px-3 md:flex justify-between items-center">
            <h1 class="text-lg font-bold">Users</h1>
            <form action="" class="flex">
              <input type="text" name="product_name"
                class="focus:ring-primary focus:border-primary block  shadow-sm sm:text-sm border-gray-300 rounded-md"
                required placeholder="search for user">
              <input type="submit"
                class="group relative ml-3 px-4 border
                              border-transparent text-sm font-medium rounded-md text-white
                              bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary cursor-pointer"
                value="Search">

            </form>
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
                              User Name</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Phone Number</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              Email</th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                              is Admin</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                          @foreach ($users as $user )
                          <tr>
                            <td class="px-6 py-4">
                              <div class="">
                                <div class="text-sm font-medium text-gray-900">
                                  {{$user->full_name}}
                                </div>
                              </div>
                            </td>
                            <td class="px-6 py-4">
                              <div class="text-sm text-gray-900">
                                {{$user->phone_number}}
                              </div>
                            </td>
                            <td class="px-6 py-4">
                              <div class="text-sm text-gray-900">
                                {{$user->email}}
                              </div>
                            </td>
                            @if($user->is_admin==1)
                            <td class="px-6 py-4 text-sm text-gray-500">
                              <input id="comments" name="comments" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" checked
                                disabled>
                            </td>
                            @else
                            <td class="px-6 py-4 text-sm text-gray-500">
                              <input id="comments" name="comments" type="checkbox"
                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" disabled>
                            </td>
                            @endif

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