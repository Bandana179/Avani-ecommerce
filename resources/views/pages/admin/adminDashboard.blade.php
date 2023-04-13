@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="mt-3">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-2">
        {{-- admin sidebar --}}
        {{-- @include('inc.adminSidebar1') --}}
        @include('inc.adminSidebar')
        {{-- admin sidebar end --}}
      </div>
      <div class="col-span-10">
        <div class="border rounded bg-dashboard-bg">
          <div class="grid grid-cols-3 gap-4 p-5">
            {{-- card design --}}
            <div class="border shadow-sm bg-white p-5 text-center">
              <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 30 30"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <h1 class="font-bold text-xl">Users</h1>
              </div>
              <span>{{$usercount}} Total</span>
            </div>
            {{-- card design end --}}
            {{-- card design --}}
            <div class="border shadow-sm bg-white p-5 text-center">
              <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 30 30"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                </svg>
                <h1 class="font-bold text-xl">Products</h1>
              </div>
              <span>{{$product_count}}</span>
            </div>
            {{-- card design end --}}
            {{-- card design --}}
            <div class="border shadow-sm bg-white p-5 text-center">
              <div class="flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 30 30"
                  stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h1 class="font-bold text-xl">Order</h1>
              </div>
              <span>{{$orders_count}} Total</span>
            </div>
            {{-- card design end --}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
