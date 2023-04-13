@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
 <div class="grid md:grid-cols-12 gap-4 mt-4 mb-3">
  <div class="hidden md:col-span-4 md:block">
   {{-- similar product design --}}
   <div class="border border-card-border">
    <h1 class="border-b border-card-border py-2 px-2 font-medium text-lg">Other Blogs</h1>
    @foreach ($blogs as $blog )
    <div class="mt-1 mb-1 py-1 px-2">
        <div
         class="border border-card-border shadow hover:border-hover-card-border hover:shadow grid md:grid-cols-12 gap-2">
         <div class="col-span-5">
          <a href="{{url('/blogs')}}/{{$blog->id}}">
           <img src="{{asset('uploads/blogs')}}/{{$blog->blog_image}}" class="" alt="" style="height: 100%;width:100%">
          </a>
         </div>
         <div class="py-2 px-2 col-span-7">
          <h1><span class="font-medium">Name:</span><a href="#">
            <span>{{$blog->blog_title}}</span></a></h1>
          <div class="mt-1">
           <h1><span class="font-medium">Description:</span> <span>{!! html_entity_decode(Str::limit($blog->blog_description, 50, $end='...'))!!}</span></h1>
          </div>
         </div>
        </div>
       </div>
    @endforeach

    {{-- @endforeach --}}


   </div>
   {{-- similar product design end --}}
  </div>
  {{-- blog content --}}
  <div class="md:col-span-7">
   {{-- product detail --}}
   <div class="border border-card-border shadow">
    <div class="w-full" style="height: 490px">
     <img src="{{asset('uploads/blogs')}}/{{$blog->blog_image}}" class="w-full h-full" alt="">
    </div>
    <div class="py-4 px-6">
     <h1 class="text-lg font-bold">{{$blog->blog_title}}</h1>
     <div>
      <p>{!! html_entity_decode($blog->blog_description)!!}</p>
     </div>
    </div>
   </div>
   {{-- product detail end --}}
  </div>
  {{-- blog content end --}}
  {{-- in responsive show similar product --}}
  <div class="md:hidden md:col-span-7 block">
   {{-- similar product design --}}
   <div class="border border-card-border">
    <h1 class="border-b border-card-border py-2 px-2 font-medium text-lg">Other Blogs</h1>
    {{-- @foreach ($similarproducts as $similar) --}}
    <div class="mt-1 mb-1 py-1 px-2">
     <div
      class="border border-card-border shadow hover:border-hover-card-border hover:shadow grid md:grid-cols-12 gap-2">
      <div class="col-span-5">
       <a href="#">
        <img src="#" class="" alt="" style="height: 100%;width:100%">
       </a>
      </div>
      <div class="py-2 px-2 col-span-7">
       <h1><span class="font-medium">Name:</span><a href="#">
         <span>blog 1</span></a></h1>
       <div class="mt-1">
        <h1><span class="font-medium">Description:</span> <span>Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Nam iusto minima aperiam </span></h1>
       </div>
      </div>
     </div>
    </div>
    {{-- @endforeach --}}


   </div>
   {{-- similar product design end --}}
  </div>
  {{-- in responsive show similar product end --}}
 </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
