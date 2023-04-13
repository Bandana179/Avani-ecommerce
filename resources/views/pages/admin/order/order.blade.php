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
                            <h1 class="text-lg font-bold">ORDERS</h1>

                        </div>
                        <div class="">
                            <div class="border bg-white rounded ">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                            <div class="overflow-hidden border-b border-gray-200">
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
                                                                <td>
                                                                <a href="{{url('changeorderstatus')}}/{{$order->id}}"><span
                                                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                    <i class="fa fa-times" aria-hidden="true"></i> </span></a>
                                                                </td>
                                                            @else
                                                                <td class="py-4 px-6 text-base text-green-500 whitespace-nowrap dark:text-green-400">
                                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                                </td>
                                                            @endif
                                                            @if($order->status==0)
                                                                <td>
                                                                    <a href="{{url('changeorderstatus')}}/{{$order->id}}"><span
                                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                                    <i class="fa fa-times" aria-hidden="true"></i> </span></a>
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
            </div>
        </div>
    </div>
@endsection
