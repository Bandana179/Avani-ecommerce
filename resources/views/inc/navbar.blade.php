<nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 bg-white border-gray-200 py-2.5 rounded dark:bg-gray-800">
  <div class="flex justify-between mb-5">
    <a href="/" class="flex items-center">
      <img src="{{asset('images/avani_logo.jpg')}}" class="mr-3 h-10 sm:h-12" alt="Flowbite Logo" />
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-primary">Avani Nepal</span>
    </a>
    <div class="flex items-center md:order-2">
      {{-- sign in --}}
      @if(!(session()->has('admin_session')||session()->has('user_session')))
      <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
        <a href="/account/login" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
        <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
        <a href="/account/register" class="text-sm font-medium text-gray-700 hover:text-gray-800">Create
          account</a>
      </div>
      @endif
      {{-- sign in end --}}
      <!-- Search -->
      {{-- <div class="ml-1 flex lg:ml-3">
        <a href="#" class="p-2 text-gray-400 hover:text-gray-500">
          <span class="sr-only">Search</span>
          <!-- Heroicon name: outline/search -->
          <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
            aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </a>
      </div> --}}
      {{-- search --}}
      <!-- Cart -->
      <div class="ml-1 flow-root lg:ml-3">
        <a href="/cart" class="group -m-2 p-2 flex items-end">
          <!-- Heroicon name: outline/shopping-bag -->
          <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
          </svg>
          <span class="ml-1 text-sm font-medium text-gray-700 group-hover:text-gray-800 cart_value">0</span>
          <span class="sr-only">items in cart, view bag</span>
        </a>
      </div>
      {{-- cart end --}}

      @if(session()->has('admin_session'))
      <button type="button"
        class="flex mr-3 ml-4 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 rounded-full"
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt="">
      </button>
      <!-- Dropdown menu -->
      <div
        class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
        id="dropdown">
        <div class="py-3 px-4">
          <span class="block text-sm text-gray-900 dark:text-white">{{session()->get('admin_name') }}</span>
          <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ session()->get('email')
            }}</span>
        </div>
        <ul class="py-1" aria-labelledby="dropdown">
          <li>
            <a href="/admin/dashboard"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
          </li>
          {{-- <li>
            <a href="#"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
          </li>
          <li>
            <a href="#"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
          </li> --}}
          <li>
            <a href="/account/logout"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
              out</a>
          </li>
        </ul>
      </div>
      @endif
      @if(session()->has('user_session'))
      <button type="button"
        class="flex mr-3 ml-4 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="dropdown">
        <span class="sr-only">Open user menu</span>
        <img class="h-8 w-8 rounded-full"
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt="">
      </button>
      <!-- Dropdown menu -->
      <div
        class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
        id="dropdown">
        <div class="py-3 px-4">
          <span class="block text-sm text-gray-900 dark:text-white">{{ session()->get('user_name') }}</span>
          <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{
            session()->get('user_email') }}</span>
        </div>
        <ul class="py-1" aria-labelledby="dropdown">
          <li>
            <a href="/user/dashboard"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
          </li>
          {{-- <li>
            <a href="#"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
          </li>
          <li>
            <a href="#"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
          </li> --}}
          <li>
            <a href="/account/logout"
              class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
              out</a>
          </li>
        </ul>
      </div>
      @endif
      <button data-collapse-toggle="mobile-menu-2" type="button"
        class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="mobile-menu-2" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
            clip-rule="evenodd"></path>
        </svg>
        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
            clip-rule="evenodd"></path>
        </svg>
      </button>
    </div>
  </div>


  <div class="flex flex-wrap justify-center items-center mx-auto border-b pb-2">
    <a href="/" class="flex items-center mr-3">
      <!-- <img src="{{asset('images/avani_logo.jpg')}}" class="mr-3 h-10 sm:h-12" alt="Flowbite Logo" />
      <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-primary">Avani Nepal</span> -->
    </a>


    <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
      <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
        <li>
          <a href="/"
            class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white"
            aria-current="page">Home</a>
        </li>
        {{-- <li>
          <a href="/about"
            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li> --}}
        {{-- <li>
          <div class="flex" x-data="{ open: false }">
            <div class="relative flex">
              <!-- Item active: "border-indigo-600 text-indigo-600", Item inactive: "border-transparent text-gray-700 hover:text-gray-800" -->
              <button type="button" @click="open = ! open" x-state:on="Item active" x-state:off="Item inactive"
                class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px"
                aria-expanded="false">Skin</button>
            </div>

            <div class="absolute inset-x-0 text-sm text-gray-500" x-show="open" style="margin-top: 54px;"
              x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
              <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
              <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

              <div class="relative bg-white z-50">
                <div class="max-w-7xl mx-auto px-8">
                  <div class="grid grid-cols-2 gap-y-10 gap-x-8 py-9">
                    <div class="col-start-2 grid grid-cols-2 gap-x-8">
                      <div class="group relative text-base sm:text-sm">
                        <div
                          class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                          <img
                            src="https://cdn.shopify.com/s/files/1/0232/1317/8957/products/deepsndreds-min_295x.jpg?v=1645079616"
                            class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-medium text-gray-900">
                          <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                          dfadsf
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                      </div>

                      <div class="group relative text-base sm:text-sm">
                        <div
                          class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                          <img
                            src="https://cdn.shopify.com/s/files/1/0232/1317/8957/products/1A-min_295x.jpg?v=1633334415"
                            alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt."
                            class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-medium text-gray-900">
                          <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                          dfasdfasdf
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                      </div>
                    </div>
                    <div class="row-start-1 grid grid-cols-3 gap-y-10 gap-x-8 text-sm">
                      <div>
                        <p id="Clothing-heading" class="font-medium text-gray-900">SHOP BY CATEGORY</p>
                        <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> Todfaps </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfads </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>
                        </ul>
                      </div>

                      <div>
                        <p id="Accessories-heading" class="font-medium text-gray-900">SHOP BY CONCERNS</p>
                        <ul role="list" aria-labelledby="Accessories-heading"
                          class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dadfadsf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdf </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdfsd </a>
                          </li>
                        </ul>
                      </div>

                      <div>
                        <p id="Brands-heading" class="font-medium text-gray-900">SHOP BY SKIN TYPE</p>
                        <ul role="list" aria-labelledby="Brands-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> DFASDF </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdfds </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdfas </a>
                          </li>

                          <li class="flex">
                            <a href="#" class="hover:text-gray-800"> dfasdfa </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li> --}}
        <li>
          <a href="/blogs"
            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Blogs</a>
        </li>
        @foreach ($categories as $category )
        <li class="hoverable">
          <a href="#"
            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 ">{{$category->category_name}}</a>
          <div class="mega-menu mb-16 sm:mb-0 shadow-xl bg-blue-800 z-10 bg-transparent ">

            <div class="absolute inset-x-0 text-sm text-gray-500 mt-[0px] w-max m-auto shadow-xl"
              x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0"
              x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
              x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
              <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
              <div class="absolute inset-0 top-1/2 bg-white shadow" aria-hidden="true"></div>

              <div class="relative bg-white z-50">
                <div class="max-w-7xl mx-auto px-8">
                  <div class="gap-x-8 py-9 w-max">
                    {{-- <div class="col-start-2 grid grid-cols-2 gap-x-8">
                      <div class="group relative text-base sm:text-sm">
                        <div
                          class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                          <img
                            src="https://cdn.shopify.com/s/files/1/0232/1317/8957/products/deepsndreds-min_295x.jpg?v=1645079616"
                            class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-medium text-gray-900">
                          <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                          dfadsf
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                      </div>

                      <div class="group relative text-base sm:text-sm">
                        <div
                          class="aspect-w-1 aspect-h-1 rounded-lg bg-gray-100 overflow-hidden group-hover:opacity-75">
                          <img
                            src="https://cdn.shopify.com/s/files/1/0232/1317/8957/products/1A-min_295x.jpg?v=1633334415"
                            alt="Three shirts in gray, white, and blue arranged on table with same line drawing of hands and shapes overlapping on front of shirt."
                            class="object-center object-cover">
                        </div>
                        <a href="#" class="mt-6 block font-medium text-gray-900">
                          <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                          dfasdfasdf
                        </a>
                        <p aria-hidden="true" class="mt-1">Shop now</p>
                      </div>
                    </div> --}}

                    <div class="row-start-1 flex gap-y-10 gap-x-8 text-sm">
                      @foreach($subcategories as $subcategory)
                      @if($category->id==$subcategory->category_id)
                      <div>
                        <p id="Clothing-heading" class="font-medium text-gray-900">{{$subcategory->sub_category_name}}
                        </p>
                        <ul role="list" aria-labelledby="Clothing-heading" class="mt-6 space-y-6 sm:mt-4 sm:space-y-4">
                          @foreach ($childcategories as $childcategory)
                          @if($childcategory->category_id==$category->id &&
                          $childcategory->subcategory_id==$subcategory->id)
                          <li class="flex">
                            <a href="{{url('collection')}}/{{$childcategory->id}}"
                              class="hover:text-gray-800">{{$childcategory->child_category_name}}</a>
                          </li>
                          @endif
                          @endforeach
                        </ul>



                      </div>
                      @endif
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </li>
        @endforeach

        </li>
        {{-- <li>
          <a href="/contact"
            class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li> --}}
      </ul>
    </div>
  </div>
</nav>