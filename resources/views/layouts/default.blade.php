<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/cerulean/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.3.1/lux/bootstrap.css" >
    <!-- <script src="//cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script> -->
    <link href='https://use.fontawesome.com/releases/v5.0.1/css/all.css?ver=4.9.1' />    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    

<title>L0L0L0L0L0L0L0L</title>
</head>
<body>

    @include('elements.navbar')

    <div class="container">
            @include('elements.flash')
            @yield('content')
    </div>


<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
@yield('script')
</body>
</html>