@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="mt-3">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-2">
        {{-- admin sidebar --}}
        @include('inc.adminSidebar')
        {{-- admin sidebar end --}}
      </div>
      <div class="col-span-10">
        <div class="border rounded bg-gray-100">
          <div class="border-b rounded-b">
            <h1 class="text-lg font-bold py-3 px-3">Category</h1>
          </div>
          <div class="py-3 px-3">
            <div class="border bg-white rounded py-4 px-4">
              <div class="grid grid-cols-12 gap-6">
                <div class="col-span-4">
                  @include('inc.messages')
                  {!! Form::open(['url' => '/admin/dashboard/update-category/'.$category->id,'method'=>'POST']) !!}
                  <div>
                    {{Form::label('category_name', 'Category Name',['class'=>'text-sm font-medium text-gray-700'])}}
                    {{Form::text('category_name', $category->category_name , ['class' => 'mt-1
                    focus:ring-primary
                    focus:border-primary
                    block
                    w-full
                    shadow-sm
                    sm:text-sm border-gray-300 rounded-md','placeholder'=>'New Category'])}}
                    <span class="text-red-500">@error('category_name'){{ $message }} @enderror
                  </div>
                  <input type="submit"
                    class="mt-3 group relative w-full flex justify-center py-2 px-4 border
                      border-transparent text-sm font-medium rounded-md text-white
                      bg-primary hover:bg-primary focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary cursor-pointer"
                    value="Update Category">
                  {!! Form::close() !!}
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          {{-- table end --}}
        </div>

      </div>

    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
@endsection