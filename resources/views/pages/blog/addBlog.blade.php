@extends('layouts.app')
@section('content')
{{-- <div class="container mt-5">
    <form action="{{url('store')}}" method="POST">
    @csrf
    <div class="row">
    <div class="card shadow">
    <div class="card-header">
    <h4 class="card-title">Add Blog</h4>
    </div>
    <div class="card-body">
    <div class="form-group">
    <label> Title </label>
    <input type="text" class="form-control" name="title" placeholder="Enter the Title">
    </div>
    <div class="form-group">
    <label>Image</label>
    <input type="file" class="form-control" name="image" placeholder="Enter the Title">
    </div>
    <div class="form-group">
    <label>Description</label>
    <textarea class="form-control" id="body" placeholder="Enter the Description" name="body"></textarea>
    </div>
    </div>
    <div class="card-footer">
    <button type="submit" class="btn btn-success"> Save </button>
    </div>
    </div>
    </div>
    </div>
    </form>
    </div> --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-8">
         <div class="border shadow bg-white rounded py-4 px-4 max-w-2xl m-auto">
          <form action="/blogs/add" method="POST" enctype="multipart/form-data">
           @csrf
           <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12">
             <label for="" class="text-sm font-medium text-gray-700">Blog Title</label>
             <input type="text" name="title"
              class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
              placeholder="Blog Title" value="">
            </div>
            <div class="col-span-12">
             <label for="" class="text-sm font-medium text-gray-700">Image</label>
             <input
              class="form-control block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
              name="image" type="file" id="formFile">
            </div>
            <div class="col-span-12">
             <label for="" class="text-sm font-medium text-gray-700">Blog Description</label>
             <textarea class="ckeditor form-control" name="description"></textarea>
            </div>
           </div>
           <input type="submit"
            class="col-span-12 mt-3 group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
            value="Create Blog">
          </form>
         </div>
        </div>
       </div>
@endsection

