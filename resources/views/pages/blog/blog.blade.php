@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="md:flex items-center justify-between">
    <h1 class="text-xl font-bold">Blogs</h1>
    <div class="md:flex">
      <form action="" class="flex">
        <input type="text" placeholder="search for blogs"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-full block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mr-2">
        <input type="submit" value="search"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer">
      </form>
      <a href="/blogs/add">
        <button
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 cursor-pointer md:ml-3"><i
            class="fa fa-plus-circle" aria-hidden="true"></i> Add
          Blogs</button>
      </a>
    </div>
  </div>
  <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-5 my-6">
    @foreach ($blogs as $blog)
    <div class="border rounded shadow-lg ">
      <div class="py-4 px-4">
        <div class="w-full" style="">
          <a href="/blogs/4">
            <img src="{{asset('uploads/blogs')}}/{{$blog->blog_image}}" class="" alt="" id="product-image">
          </a>
        </div>
        <div class="">
          <h1 id="title" class="text-xl mt-2">{{$blog->blog_title}}</h1>
          <div class="mt-2">
            <p class="text-base">{!! html_entity_decode(Str::limit($blog->blog_description, 100, $end='...'))!!}</p>
          </div>
          <div class="mt-2">
            <a href="/blogs/4">
              <button class="text-primary">Read More</button>
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach


  </div>
</div>
@endsection