<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="admin_body">
    <button class="btn btn-primary admin_sidebar_btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Enable body scrolling</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body admin_nav_a">
    <p> <a href="{{ route('admin.film.create') }}">film</a></p>
    <p> <a href="{{ route('admin.country.create') }}">country</a></p>
    <p> <a href="{{ route('admin.director.create')}}">director</a></p>
    <p> <a href="{{ route('admin.operator.create')}} ">operator</a></p>
    <p> <a href="{{ route('admin.actor.create')}}">actors</a></p>
  </div>
</div>
      @yield('content')
   



      <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
      <script>
        $(function (){
            $('#favorite-cars').select2();
            $('#favorite-country').select2();
        })

        $(function (){
            $('#favorite-cars1').select2();
            $('#favorite-country1').select2();
        })

        $(function (){
            $('#favorite-cars2').select2();
            $('#favorite-country2').select2();
        })
    </script>
</body>
</html>