@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="grid md:grid-cols-12 gap-4 mt-4">



    <div class="md:col-span-12">
      {{-- <div class="owl-one owl-carousel owl-theme">
        @foreach($banners as $banner)
        <div class="w-full" style="height: 350px">
          <a href="{{$banner->url}}"> <img src="{{asset('uploads/banners')}}/{{$banner->image}}" class="w-full h-full"
              alt="">
        </div></a>
        @endforeach

      </div> --}}
      <div id="default-carousel" class="relative" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="overflow-hidden relative h-56 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
          <!-- Item 1 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <span
              class="absolute top-1/2 left-1/2 text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 sm:text-3xl dark:text-gray-800">First
              Slide</span>
            <img src="https://flowbite.com/docs/images/carousel/carousel-1.svg"
              class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
          <!-- Item 2 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://flowbite.com/docs/images/carousel/carousel-2.svg"
              class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
          <!-- Item 3 -->
          <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="https://flowbite.com/docs/images/carousel/carousel-3.svg"
              class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
          </div>
        </div>
        <!-- Slider indicators -->
        <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
            data-carousel-slide-to="0"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
            data-carousel-slide-to="1"></button>
          <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
            data-carousel-slide-to="2"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
          class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
          data-carousel-prev>
          <span
            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="hidden">Previous</span>
          </span>
        </button>
        <button type="button"
          class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
          data-carousel-next>
          <span
            class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor"
              viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="hidden">Next</span>
          </span>
        </button>
      </div>
    </div>
  </div>
  {{-- <div class="owl-one owl-carousel owl-theme">
    @foreach($banners as $banner)
    <div class="w-full" style="height: 450px">
      <a href="{{$banner->url}}"> <img src="{{asset('uploads/banners')}}/{{$banner->image}}" class="w-full h-full"
          alt="">
    </div></a>
    @endforeach

  </div> --}}
  {{-- latest product --}}
  <div class="latest_product">
    <h1 class="font-semibold text-2xl mb-3 mt-5">Latest Product</h1>
    {{-- card design --}}
    <div class="featured-product owl-carousel">
      @foreach( $products_list as $product)
      <div class="border border-card-border shadow hover:border-hover-card-border hover:shadow">
        <a href="{{url('/product')}}/{{$product->id}}">
          <div class="w-full" style="height: 290px">
            <img src="{{asset('uploads/product_image')}}/{{$product->product_image}}" class="w-full h-full" alt=""
              id="product-image">
          </div>
        </a>
        <div class="py-2 px-2">
          <a href="{{url('/product')}}/{{$product->id}}">
            <h1 id="title">{{\Illuminate\Support\Str::limit($product->product_name, 30, $end='...')}}</h1>
          </a>
          <div class="mt-2">
            <span>Rs.{{$product->product_price}}</span>
          </div>
          <div class="mt-2">
            <button class="py-1 w-full bg-primary text-white hover:bg-hover-color add-to-cart-btn" id="addCart">Add To
              Cart</button>
          </div>
        </div>
      </div>
      @endforeach

    </div>
    {{-- card design end --}}
  </div>
  {{-- latest product end --}}
  {{-- banner Ad --}}
  @foreach($bannerfirst as $banner)
  <div class="my-9">
    <a href="/">
      <a href="{{$banner->url}}"> <img src="{{asset('uploads/banners')}}/{{$banner->image}}" class="w-full h-[350px]"
          style="height: 350px" alt="">
      </a>
  </div>
  @endforeach
  {{-- banner Ad end --}}

  {{-- Featured product --}}
  <div class="featured_product">
    <h1 class="font-semibold text-2xl mb-3 mt-5">Featured Product</h1>
    {{-- card design --}}
    <div class="grid md:grid-cols-4 gap-4">
      @foreach( $featured_products as $product)
      {{-- @for ($i = 1; $i <=8; $i++) --}} <div>
        <div class="border border-card-border shadow hover:border-hover-card-border hover:shadow">
          <a href="{{url('/product')}}/{{$product->id}}">
            <div class="w-full" style="height: 290px">
              <img src="{{asset('uploads/product_image')}}/{{$product->product_image}}" class="w-full h-full" alt=""
                id="product-image">
            </div>
          </a>
          <div class="py-2 px-2">
            <a href="{{url('/product')}}/{{$product->id}}">
              <h1 id="title"> {{\Illuminate\Support\Str::limit($product->product_name, 30, $end='...')}}</h1>
            </a>
            <div class="mt-2">
              <span>Rs.{{$product->product_price}}</span>
            </div>
            <div class="mt-2">
              <button class="py-1 w-full bg-primary text-white hover:bg-hover-color add-to-cart-btn" id="addCart">Add
                To
                Cart</button>
            </div>
          </div>
        </div>

    </div>
    @endforeach
    {{-- @endfor --}}
  </div>
  <button class="m-auto flex py-1 px-4 bg-primary text-white mt-5">View More...</button>
</div>
{{-- Featured Product --}}

{{-- second banner Ad --}}
@foreach($bannersecond as $banner)
<div class="my-9">
  <a href="/">
    <a href="{{$banner->url}}"> <img src="{{asset('uploads/banners')}}/{{$banner->image}}" class="w-full h-[350px]"
        style="height: 350px" alt="">
    </a>
</div>
@endforeach
{{-- second banner Ad end --}}

{{-- Blog Section --}}
<div class="blog_section">
  <div class="flex items-center justify-between">
    <h1 class="font-semibold text-2xl mb-3 mt-5">CHECK OUT OUR TOP BLOGS</h1>
    <a href="/blogs">
      <h1 class="text-primary font-semibold">EXPLORE ALL</h1>
    </a>
  </div>
  {{-- card design --}}
  <div class="blog-carousel owl-carousel">
    @foreach( $blogs as $blog)

    <div class="border rounded shadow-lg ">
      <div class="py-4 px-4">
        <div class="w-full h-[200px]" style="">
          <a href="/blogs/4">
            <img src="{{asset('uploads/blogs')}}/{{$blog->blog_image}}" class="w-full h-full" alt="" id="product-image">
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
  {{-- card design end --}}
</div>
{{-- Blog Section end --}}


{{-- Explore product --}}
<div class="explore_product mb-3">
  <h1 class="font-semibold text-2xl mb-3 mt-5">EXPLORE MORE</h1>
  {{-- card design --}}
  <div class="grid md:grid-cols-5 gap-6">
    {{-- @for ($i = 1; $i <=8; $i++) --}} <div>
      <a href="/">
        <div class="shadow-lg relative">
          <div class="w-full" style="">
            <img src="{{asset('images/explore1.jpg')}}" class="w-full h-full rounded-md" alt="" id="product-image">
          </div>
          <div class="absolute" style="transform: translate(-50%, -50%);top: 50%;left: 50%;">
            <h1 class="text-white uppercase font-bold">skin care</h1>
          </div>
        </div>
      </a>
  </div>
  <div>
    <a href="/">
      <div class="shadow-lg relative">
        <div class="w-full" style="">
          <img src="{{asset('images/explore2.jpg')}}" class="w-full h-full rounded-md" alt="" id="product-image">
        </div>
        <div class="absolute" style="transform: translate(-50%, -50%);top: 50%;left: 50%;">
          <h1 class="text-white uppercase font-bold">skin care</h1>
        </div>
      </div>
    </a>
  </div>
  <div>
    <a href="/">
      <div class="shadow-lg relative">
        <div class="w-full" style="">
          <img src="{{asset('images/explore3.jpg')}}" class="w-full h-full rounded-md" alt="" id="product-image">
        </div>
        <div class="absolute" style="transform: translate(-50%, -50%);top: 50%;left: 50%;">
          <h1 class="text-white uppercase font-bold">skin care</h1>
        </div>
      </div>
    </a>
  </div>
  <div>
    <a href="/">
      <div class="shadow-lg relative">
        <div class="w-full" style="">
          <img src="{{asset('images/explore4.jpg')}}" class="w-full h-full rounded-md" alt="" id="product-image">
        </div>
        <div class="absolute" style="transform: translate(-50%, -50%);top: 50%;left: 50%;">
          <h1 class="text-white uppercase font-bold">skin care</h1>
        </div>
      </div>
    </a>
  </div>
  <div>
    <a href="/">
      <div class="shadow-lg relative">
        <div class="w-full" style="">
          <img src="{{asset('images/explore6.jpg')}}" class="w-full h-full rounded-md" alt="" id="product-image">
        </div>
        <div class="absolute" style="transform: translate(-50%, -50%);top: 50%;left: 50%;">
          <h1 class="text-white uppercase font-bold">skin care</h1>
        </div>
      </div>
    </a>
  </div>
  {{-- @endfor --}}
</div>
{{-- Explore Product --}}
</div>
</div>

@endsection

@section('script')
<script>
  $('.owl-one').owlCarousel({
    // autoplay:true,
    // autoplayTimeout:2000,
    // autoplayHoverPause:true,
        loop:true,
        margin:10,
        // nav:true,
        responsiveClass:true,
        responsive:{
        0:{
        items:1
        },
        600:{
        items:1
        },
        1000:{
        items:1
        }
        }
        })
  $('.featured-product').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  responsiveClass:true,
  responsive:{
  0:{
  items:1
  },
  600:{
  items:3
  },
  1000:{
  items:4
  }
  }
  })
  $('.blog-carousel').owlCarousel({
  loop:true,
  margin:30,
  nav:true,
  responsiveClass:true,
  responsive:{
  0:{
  items:1
  },
  600:{
  items:3
  },
  1000:{
  items:3
  }
  }
  })
</script>
<script>
  const categoryBtn = document.getElementsByClassName("categoryBtn");
  const subCategoryBtn = document.getElementsByClassName("subCategoryBtn");
  console.log("categoryBtn", categoryBtn);
  for(let i=0;i<categoryBtn.length;i++){
    categoryBtn[i].addEventListener('click',function(){
      subCategoryBtn[i].classList.toggle('MyStyle');
    })
  }

</script>

<script src="{{ asset('js/addToLocal.js') }}"></script>
@endsection