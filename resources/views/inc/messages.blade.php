{{-- @if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="alert alert-danger">
  {{$error}}
</div>
@endforeach
@endif --}}

@if(session('success'))
<div class="w-full rounded-md border shadow-sm px-4 py-2 text-base "
  style="border-color: #c3e6cb;color: #155724;background-color: #d4edda">
  {{session('success')}}
</div>
@endif

@if(session('error'))
<div class="w-full rounded-md border shadow-sm px-4 py-2 text-base "
  style="border-color: #f5c6cb;color: #721c24;background-color: #f8d7da">
  {{session('error')}}
</div>
@endif