<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{config('app.name','AvaniNepal')}}</title>
  {{--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}


  <!-- Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&family=Roboto:wght@500&display=swap"
    rel="stylesheet">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
  {{--
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

  {{--
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}

</head>

<body>
  {{-- @include('inc.navbar1') --}}
  @include('inc.navbar')
  {{-- <div class="container"> --}}
    {{-- @include('inc.messages') --}}
    @yield('content')
    {{-- </div> --}}
  @include('inc.footer')


  <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://use.fontawesome.com/a4f771b524.js"></script>
  <script src="https://unpkg.com/flowbite@1.4.3/dist/flowbite.js"></script>
  <script>
    const cartValue1 = JSON.parse(localStorage.getItem("cartItems"));
    const cartValue = document.getElementsByClassName('cart_value')[0];
    cartValue.innerText = cartValue1.length
  </script>
  <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
           $('.ckeditor').ckeditor();
       });
  </script>
</body>

@yield('script')
</body>

</html>
