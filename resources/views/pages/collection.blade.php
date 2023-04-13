@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
 <span><a href="#" class="underline">Home</a> / <a href="#" class="underline">Collection</a> / <a href="#">{{$childcatname}}</a>
 </span>
 <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-4 mb-3">
 @foreach ($childcatcollection as $collection)
    <div class="border border-card-border shadow hover:border-hover-card-border hover:shadow">
     <a href="{{url('/product')}}/{{$collection->id}}">
      <div class="w-full" style="height: 290px">
       <img src="{{asset('uploads/product_image')}}/{{$collection->product_image}}"
        class="w-full h-full" alt="" id="product-image">
      </div>
     </a>
     <div class="py-2 px-2">

      <a href="#">
       <h1 id="title">{!! html_entity_decode(Str::limit($collection->product_name, 30, $end='...'))!!}</h1>
      </a>
      <div class="mt-2">
       <span>Rs. {{$collection->product_price}}</span>
      </div>
      <div class="mt-2">
          <button class="py-1 w-full bg-primary text-white hover:bg-hover-color add-to-cart-btn" id="addCart">Add To
          Cart</button>
      </div>
     </div>
    </div>
    @endforeach
</div>

</div>
@endsection

@section('script')
<script>

</script>
@endsection
