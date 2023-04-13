@extends('layouts.app')

@section('content')
<div class="min-h-full flex items-center justify-center pb-12 pt-9 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-24 w-auto" src="{{asset('images/avani_logo.jpg')}}" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">Create Your Account</h2>

    </div>
    @include('inc.messages')
     {!! Form::open(['url' => '/account/save','method'=>'POST']) !!}
    <div class="mb-5">
      {{Form::label('full_name', 'Full Name',['class'=>'block text-base font-medium text-gray-700 mb-1'])}}
      {{Form::text('full_name', '', ['class' => 'mt-1 focus:ring-primary focus:border-primary block w-full
      shadow-sm
      sm:text-sm border-gray-300 rounded-md'])}}
      <span class="text-red-500">@error('full_name'){{ $message }} @enderror</span>
    </div>
    <div class="mb-5">
      {{Form::label('phone_number', 'Phone Number',['class'=>'block text-base font-medium text-gray-700 mb-1'])}}
      {{Form::text('phone_number', '', ['class' => 'mt-1 focus:ring-primary focus:border-primary block w-full
      shadow-sm
      sm:text-sm border-gray-300 rounded-md'])}}
      <span class="text-red-500">@error('phone_number'){{ $message }} @enderror</span>
    </div>
    <div class="mb-5">
      {{Form::label('email', 'Email',['class'=>'block text-base font-medium text-gray-700 mb-1'])}}
      {{Form::text('email', '', ['class' => 'mt-1 focus:ring-primary focus:border-primary block w-full
      shadow-sm
      sm:text-sm border-gray-300 rounded-md'])}}
      <span class="text-red-500">@error('email'){{ $message }} @enderror</span>
    </div>
    <div class="mb-5">
      {{Form::label('password', 'Password',['class'=>'block text-base font-medium text-gray-700 mb-1'])}}
      {{Form::text('password', '', ['class' => 'mt-1 focus:ring-primary focus:border-primary block w-full
      shadow-sm
      sm:text-sm border-gray-300 rounded-md'])}}
      <span class="text-red-500">@error('password'){{ $message }} @enderror</span>
    </div>
    <div class="mb-5">
      {{Form::label('confirm_password', 'Confirm Password',['class'=>'block text-base font-medium text-gray-700
      mb-1'])}}
      {{Form::text('confirm_password', '', ['class' => 'mt-1 focus:ring-primary focus:border-primary block
      w-full shadow-sm
      sm:text-sm border-gray-300 rounded-md'])}}
      <span class="text-red-500">@error('confirm_password'){{ $message }} @enderror</span>
    </div>
    {{Form::submit('Submit', ['class' => 'group relative w-full flex justify-center py-2 px-4 border
    border-transparent text-sm font-medium rounded-md text-white
    bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary
    cursor-pointer'])}}
    {!! Form::close() !!}

{{--    <form class="mt-8 space-y-6" action="/account/save" method="POST">--}}
{{--      @csrf--}}
{{--      <div>--}}
{{--        <label for="first-name" class="block text-base font-medium text-gray-700 mb-1">Full Name</label>--}}
{{--        <input type="text" name="first-name" id="first-name" autocomplete="given-name"--}}
{{--          class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--        <span class="text-red-500">@error('full_name'){{ $message }} @enderror</span>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <label for="first-name" class="block text-base font-medium text-gray-700 mb-1">Phone Number</label>--}}
{{--        <input type="text" name="first-name" id="first-name" autocomplete="given-name"--}}
{{--          class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--        <span class="text-red-500">@error('phone_number'){{ $message }} @enderror</span>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <label for="first-name" class="block text-base font-medium text-gray-700 mb-1">Email</label>--}}
{{--        <input type="text" name="first-name" id="first-name" autocomplete="given-name"--}}
{{--          class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--        <span class="text-red-500">@error('email'){{ $message }} @enderror</span>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <label for="first-name" class="block text-base font-medium text-gray-700 mb-1">Password</label>--}}
{{--        <input type="text" name="first-name" id="first-name" autocomplete="given-name"--}}
{{--          class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--        <span class="text-red-500">@error('password'){{ $message }} @enderror</span>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <label for="first-name" class="block text-base font-medium text-gray-700 mb-1">Confirm Password</label>--}}
{{--        <input type="password" name="first-name" id="first-name" autocomplete="given-name"--}}
{{--          class="mt-1 focus:ring-primary focus:border-primary block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">--}}
{{--        <span class="text-red-500">@error('confirm_password'){{ $message }} @enderror</span>--}}
{{--      </div>--}}
{{--      <div>--}}
{{--        <button type="submit"--}}
{{--          class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">--}}
{{--          <span class="absolute left-0 inset-y-0 flex items-center pl-3">--}}
{{--            <!-- Heroicon name: solid/lock-closed -->--}}

{{--          </span>--}}
{{--          Register--}}
{{--        </button>--}}
{{--      </div>--}}
{{--    </form>--}}


  </div>
</div>
@endsection
