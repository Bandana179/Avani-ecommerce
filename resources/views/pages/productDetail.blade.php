@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="grid md:grid-cols-12 gap-4 mt-4 mb-3">
    {{-- in responsive show add to cart product --}}
    <div class="md:hidden md:col-span-3 block">
      {{-- add to cart design --}}
      <div class="border border-card-border">
        <div class="border-b">
          <div class="flex justify-around py-2">
            <h1>Price:</h1>
            <h1> Rs.{{$product->product_price}}</h1>
          </div>
        </div>
        <div class="border-b">
          <div class="flex justify-around py-2 items-center">
            <h1>Qty:</h1>
            <select id="country" name="category_id" autocomplete="country-name"
              class="mt-1 block w-14 py-1 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
        </div>
        <div class="py-2 px-2">
          <button class="py-1 w-full bg-primary text-white hover:bg-hover-color">Add To Cart</button>
        </div>
      </div>
      {{-- add to cart design end --}}

    </div>
    {{-- in responsive show add to cart product end --}}
    <div class="hidden md:col-span-3 md:block">
      {{-- similar product design --}}
      <div class="border border-card-border">
        <h1 class="border-b border-card-border py-2 px-2 font-medium text-lg">Similar Product</h1>
        @foreach ($similarproducts as $similar)
        <div class="mt-1 mb-1 py-1 px-2">
          <div
            class="border border-card-border shadow hover:border-hover-card-border hover:shadow grid md:grid-cols-12 gap-2">
            <div class="col-span-5">
              <a href="{{url('/product')}}/{{$similar->id}}">
                <img src="{{asset('uploads/product_image')}}/{{$similar->product_image}}" class="" alt=""
                  style="height: 100%;width:100%">
              </a>
            </div>
            <div class="py-2 px-2 col-span-7">
              <h1><span class="font-medium">Name:</span><a href="{{url('/product')}}/{{$similar->id}}">
                  <span>{{$similar->product_name}}</span></a></h1>
              <div class="mt-1">
                <h1><span class="font-medium">Price:</span> <span>Rs.{{$similar->product_price}}</span></h1>
              </div>
            </div>
          </div>
        </div>
        @endforeach


      </div>
      {{-- similar product design end --}}
    </div>
    <div class="md:col-span-6">
      {{-- product detail --}}
      <div class="border border-card-border shadow">
        <div class="w-full" style="height: 490px">
          <img src="{{asset('uploads/product_image')}}/{{$product->product_image}}" class="w-full h-full" alt="">
        </div>
        <div class="py-4 px-6">
          <h1 class="text-lg font-bold">{{$product->product_name}}</h1>
          <div>
              <p>{!! html_entity_decode($product->product_description)!!}</p>

          </div>
        </div>
      </div>
      {{-- product detail end --}}
      {{-- comment and review --}}
      <div class="border border-card-border mt-5">
        <h1 class="border-b border-card-border py-2 px-2 font-medium text-lg">Reviews</h1>
        <div class="mt-1 mb-1 py-1 px-2">
          {{-- review display design --}}
          @foreach ($reviews as $review )
          <div class="border-b border-card-border">
            <div class="py-2 px-2">
              <h1 class="font-medium">{{$product->product_name}}</h1>
              <div class="mt-1">
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
                <i class="fa fa-star-o" aria-hidden="true"></i>
              </div>
              <div>
                <span>{{$review->created_at}}</span>
              </div>
              <div>
                <p>{{$review->review}}
                </p>
              </div>
            </div>
          </div>
          @endforeach


          {{-- review display design end --}}
          {{-- review form --}}
          <div class="border border-card-border mt-3">
            <h1 class="border-b border-card-border py-2 px-2 font-medium text-lg">WRITE A CUSTOMER REVIEW</h1>
            <div class="mt-1 mb-1 py-1 px-2">
              <form method="POST" action="{{url('/postreview')}}/{{$product->id}}">
                @csrf
                <div class="mt-1">
                  <label for="" class="text-sm font-medium text-gray-700">Rating
                    *</label>
                  <select id="rating" name="rating_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option>---select---</option>
                    <option value="1">1-Poor</option>
                    <option value="2">2-Fair</option>
                    <option value="3">3-Good</option>
                    <option value="4">4-Very Good</option>
                    <option value="5">5-Excellent</option>
                  </select>
                </div>
                <div class="mt-2">
                  <label for="" class="text-sm font-medium text-gray-700">Comment
                    *</label>
                  <textarea type="text" rows="5" name="rating_description"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                    placeholder="Enter Your Comment"></textarea>
                </div>
                <input type="submit"
                  class="col-span-12 mt-3 group relative w-full flex justify-center py-2 px-4 border
                                  border-transparent text-sm font-medium rounded-md text-white
                                  bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                  value="Submit">
              </form>
            </div>
          </div>
          {{-- review form end --}}
        </div>
      </div>
      {{-- comment and review end --}}
    </div>
    {{-- in responsive show similar product --}}
    <div class="md:hidden md:col-span-3 block">
      {{-- similar product design --}}
      <div class="border border-card-border">
        <h1 class="border-b border-card-border py-2 px-2 font-medium text-lg">Similar Product</h1>
        @foreach ($similarproducts as $similar)
        <div class="mt-1 mb-1 py-1 px-2">
          <div
            class="border border-card-border shadow hover:border-hover-card-border hover:shadow grid md:grid-cols-12 gap-2">
            <div class="col-span-5">
              <img src="{{asset('uploads/product_image')}}/{{$similar->product_image}}" class="" alt=""
                style="height: 100%;width:100%">
            </div>
            <div class="py-2 px-2 col-span-7">
              <h1><span class="font-medium">Name:</span> <span>{{$similar->product_name}}</span></h1>
              <div class="mt-1">
                <h1><span class="font-medium">Price:</span> <span>Rs.{{$similar->product_price}}</span></h1>
              </div>
            </div>
          </div>
        </div>
        @endforeach


      </div>
      {{-- similar product design end --}}
    </div>
    {{-- in responsive show similar product end --}}
    <div class="hidden md:col-span-3 md:block">
      {{-- add to cart design --}}
      <div class="border border-card-border">
        <div class="border-b">
          <div class="flex justify-around py-2">
            <h1>Price:</h1>
            <h1> Rs.{{$product->product_price}}</h1>
          </div>
        </div>
        <div class="border-b">
          <div class="flex justify-around py-2 items-center">
            <h1>Qty:</h1>
            <select id="country" name="category_id" autocomplete="country-name"
              class="mt-1 block w-14 py-1 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>
        </div>
        <div class="py-2 px-2">
          <button class="py-1 w-full bg-primary text-white hover:bg-hover-color">Add To Cart</button>
        </div>
      </div>
      {{-- add to cart design end --}}

    </div>
  </div>
</div>
@endsection

@section('script')
<script>

</script>
@endsection
