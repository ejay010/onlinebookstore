<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0">
<html>
<head>
    <title>Book Tortuga BookStore</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/templatemo_style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="templatemo_container">
    <div id="templatemo_menu">
        <ul>
            @yield('links', View::make('navs.navdefault'))
        </ul>
    </div> <!-- end of menu -->

    <div id="templatemo_header"><img src="images/newcompass.jpg" alt="" width="960" height="287" />

    </div>
    <!-- end of header -->

    <div id="templatemo_content">
        <div class="container">
            <section id="content">
                <form action="login" method="post">
                    <h2>Welcome!</h2>
                    <div>
                        <input type="text" placeholder="Email" required="" id="username" name="email"/>
                    </div>
                    <div>
                        <input type="password" placeholder="Password" required="" id="password" name="password"/>
                        {!! Form::token() !!}
                    </div>
                    <div>
                        <input type="submit" value="Log in" />
                        <a href="/register">Register</a>
                    </div>
                </form><!-- form -->
                <div class="button">

                </div><!-- button -->
            </section><!-- content -->

        </div><!-- container -->
        <br>
        <br>
    </div> <!-- end of container -->
</body>
</html>