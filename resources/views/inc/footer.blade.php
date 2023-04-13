<footer class="mt-[5rem] text-center lg:text-left text-gray-600 bg-primary">
  {{-- [#bfa84d] --}}
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 container pt-8 pb-8 text-center md:text-left text-white">
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-8">
      <div class="">
        <h6 class="text-center mb-1 font-semibold">
          <i class="fa fa-handshake-o" aria-hidden="true"></i> OUR PROMISE
        </h6>
        <span>
          <hr />
        </span>
        <ul class="px-[30px] py-[6px]">
          <li class="mb-2">
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i> <span class="font-medium"> 100% Ayurvedic
                :</span> All
              our products are certified by the Ministry of
              Ayush, Govt. of India.</p>
          </li>
          <li class="mb-2">
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i> <span class="font-medium"> Cruelty-free :</span>
              We
              are a PETA certified company. We never have and never will test on animals.</p>
          </li>
          <li class="mb-2">
            <p><i class="fa fa-arrow-right" aria-hidden="true"></i> <span class="font-medium"> Free from
                :</span>Petrochemicals, Parabens, SLS/SLES PEG/PPG, Genetically Modified Organisms (GMO) and other
              harmful synthetic
              ingredients.</p>
          </li>

        </ul>
      </div>
      <div class="">
        <h6 class="text-center mb-1 font-semibold">
          OUR PRODUCT RANGE
        </h6>
        <span>
          <hr />
        </span>
        <ul class="px-[30px] py-[6px]">
          @foreach($sub as $child)
          <li class="mb-2">
            <a href="">{{$child->child_category_name}}</a>
          </li>
          @endforeach
          <li class="mb-2">
            <a href="">The JH Edit - Our Beauty Journal</a>
          </li>
          <li class="mb-2">
            <a href="">Terms of Service</a>
          </li>

        </ul>
      </div>
      <div class="">
        <h6 class="text-center mb-1 font-semibold">
          Subscribe
        </h6>
        <span>
          <hr />
        </span>
        <ul class="px-[30px] py-[6px]">
          <li class="mb-2">
            <p>Sign-up for product updates and offers.</p>
          </li>
          <li class="mb-2">
            <form action="#">
              <input type="email" placeholder="Your Email" class="border-0">
              <input type="submit" value="OK" class="py-[0.5rem] px-2 bg-green-600 cursor-pointer">
            </form>
          </li>
          <li class="mb-2">
            <a href="" class="text-2xl mr-3"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
            <a href="" class="text-2xl"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="text-center p-4 bg-[#bfa84d]">
    <span class="text-white" style="color:white">© 2021 Copyright: </span>
    <a class="text-white font-semibold" href="#">
      Avani Nepal
    </a>
  </div>
</footer>