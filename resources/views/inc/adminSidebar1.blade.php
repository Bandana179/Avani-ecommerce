<div class="border rounded">
  <div class="bg-indigo-700 rounded-t py-2 px-2 flex items-center justify-between">
    <h1 class="text-white text-xl font-bold">Admin</h1>
    <div class="text-white cursor-pointer">
      <i class="fa fa-hand-o-left" aria-hidden="true"></i>
    </div>
  </div>
  <div class="py-2 px-2">
    <div x-data="{ open: false }">
      <div class="flex items-center justify-between hover:bg-gray-100 py-2 px-2 rounded cursor-pointer"
        @click="open = ! open">
        <div class="flex items-center">
          <div class="mr-3">
            <i class="fa fa-filter" aria-hidden="true"></i>
          </div>
          <h1 class="text-base font-medium">Category</h1>
        </div>
        <div class="mr-3">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
      </div>
      {{-- category dropdown --}}
      <div class="ml-8" x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1">
        <h1 class="text-base px-1 py-1 text-gray-500 hover:text-gray-700"><a
            href="/admin/dashboard/category">Category</a></h1>
        <h1 class="text-base px-1 py-1 text-gray-500 hover:text-gray-700"><a href="/admin/dashboard/sub-category">Sub
            Category</a></h1>
        <h1 class="text-base px-1 py-1 text-gray-500 hover:text-gray-700"><a
            href="/admin/dashboard/child-category">Child Category</a></h1>
      </div>
      {{-- category dropdown end --}}
    </div>
    <div x-data="{ open: false }">
      <div class="flex items-center justify-between hover:bg-gray-100 py-2 px-2 rounded cursor-pointer"
        @click="open = ! open">
        <div class="flex items-center">
          <div class="mr-3">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
          </div>
          <h1 class="text-base font-medium">Product</h1>
        </div>
        <div class="mr-3">
          <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
      </div>
      {{-- product dropdown --}}
      <div class="ml-8" x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-1">
        <h1 class="text-base px-1 py-1 text-gray-500 hover:text-gray-700"><a href="/admin/dashboard/product">List
            Product</a></h1>
        <h1 class="text-base px-1 py-1 text-gray-500 hover:text-gray-700"><a href="/admin/dashboard/addProduct">Add
            Product</a>
        </h1>
      </div>
      {{-- product dropdown end --}}
    </div>
    <div>
      <div class="flex items-center justify-between hover:bg-gray-100 py-2 px-2 rounded cursor-pointer">
        <a href="/admin/dashboard/banner">
          <div class="flex items-center">
            <div class="mr-3">
              <i class="fa fa-picture-o" aria-hidden="true"></i>
            </div>
            <h1 class="text-base font-medium">Banner</h1>
          </div>
        </a>
      </div>
    </div>
    <div>
      <div class="flex items-center justify-between hover:bg-gray-100 py-2 px-2 rounded cursor-pointer">
        <a href="/admin/dashboard/user">
          <div class="flex items-center">
            <div class="mr-3">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <h1 class="text-base font-medium">Users</h1>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>