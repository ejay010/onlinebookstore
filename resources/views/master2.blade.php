<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_TOKEN" content="{{ csrf_token() }}">
    <meta name="publishableKey" content="{{ Config::get('stripe.publishable_key') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    @yield('stylesheets', '

    <!-- Custom CSS -->
    <!--<link href="css/shop-homepage.css" rel="stylesheet"> -->
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
    <!--<link href="css/bootstrap.min.css" rel="stylesheet">-->
    ')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    @yield('headScripts', '
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>')
    <![endif]-->

</head>

<body>


<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            @yield('links' , View::make('navs.navdefault'))
        </ul>
    </div>

    <div id="templatemo_header"><img src="images/newcompass.jpg" alt="" width="960" height="287" /></div>

    <!--@yield('title', 'Tortuga, Bucky\'s Book\'s')-->

    @yield('content')

    @yield('footer')

    @yield('scripts')
</div>
</body>

</html>
