<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>{{ config('app.name', '') }}</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">

    
     <!--  Fonts and icons     -->
    <!--<link href="/css/cssstyle.css" rel="stylesheet" type ="text/css">-->
    <link href="/css/fa-regular.css" rel="stylesheet">
    <link href="/css/fa-brand.css" rel="stylesheet">
    <link href="/css/fa-solid.css" rel="stylesheet">
    <link href="/css/fontawesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>

  <body>
    <div class="container-fluid">
      @yield('container')  
    </div>

    <!-- Scripts -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.js"></script>
    <script type="/js/app.js"></script>
    
</body>
</html>