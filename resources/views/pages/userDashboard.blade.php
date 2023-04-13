@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="mt-3">
    <div class="grid md:grid-cols-12 gap-8">
      <div class="md:col-span-3">
        <h1 class="font-bold text-2xl text-center">UPDATE PROFILE</h1>
        <div class="px-5 py-3">
          <form action="{{url('updateuserprofile')}}/{{$user->id}}" method="POST" class="mt-3">
            @csrf
            <div class="">
              <div class="">
                <label for="" class="text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" name="full_name"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 "
                  placeholder="Enter Full Name" value="{{$user->full_name}}">
              </div>
              <div class="mt-3">
                <label for="" class="text-sm font-medium text-gray-700">Phone Number</label>
                <input type="text" name="phone"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 "
                  placeholder="Enter Phone Number" value="{{$user->phone_number}}">
              </div>
              <div class="mt-3">
                <label for="" class="text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 "
                  placeholder="Enter Email" value="{{$user->email}}">
              </div>
              <div class="mt-3">
                <label for="" class="text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password"
                  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 "
                  placeholder="Enter Password" value="">
              </div>
            </div>
            <input type="submit"
              class=" mt-3 group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer"
              value="UPDATE">
          </form>
        </div>
      </div>
      <div class="md:col-span-9">
        <h1 class="font-bold text-2xl uppercase">My order</h1>
        <div class="flex flex-col py-3">
          <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
              <div class="overflow-hidden shadow-md">
                <table class="min-w-full">
                  <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                      <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        ID
                      </th>
                      <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Date
                      </th>
                      <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Total
                      </th>
                      <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Paid
                      </th>
                      <th scope="col"
                        class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                        Delivered
                      </th>
                      <th scope="col" class="relative py-3 px-6">
                        <span class="sr-only">Details</span>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($orders as $order)
                    <!-- Product 1 -->
                    <tr
                      class="border-b odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700 dark:border-gray-600">
                      <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$order->order_number}}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                       {{date('d-m-y', strtotime($order->created_at))}}
                      </td>
                      <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                       {{$order->total_price}}

                      </td>
                        @if($order->payment_status==0)
                      <td class="py-4 px-6 text-base text-red-500 whitespace-nowrap dark:text-red-400">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </td>
                        @else
                            <td class="py-4 px-6 text-base text-green-500 whitespace-nowrap dark:text-green-400">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </td>
                        @endif
                        @if($order->payment_status==0)
                      <td class="py-4 px-6 text-base text-red-500 whitespace-nowrap dark:text-red-400">
                        <i class="fa fa-times" aria-hidden="true"></i>
                      </td>
                        @else
                            <td class="py-4 px-6 text-base text-green-500 whitespace-nowrap dark:text-green-400">
                                <i class="fa fa-check" aria-hidden="true"></i>
                            </td>
                            @endif
                      <td class="py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                        <a href="{{url('orderdetail')}}/{{$order->id}}"class="text-blue-600 dark:text-blue-500 hover:underline">Details</a>
                      </td>
                    </tr>
                    <!-- Product 2 -->
                    @endforeach
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
@endsection
