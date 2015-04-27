<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0">
<head>
<title>Book Tortuga BookStore</title>

<link href="css/templatemo_style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            @yield('links' , View::make('navs.navdefault'))
    	</ul>
    </div> <!-- end of menu -->

  <div id="templatemo_header"><img src="images/newcompass.jpg" alt="" width="960" height="287" />


    </div>
  <!-- end of header -->

    <div id="templatemo_content">

        <div id="templatemo_content_left">
        	<div class="templatemo_content_left_section">
            	<h1 align="left">Categories</h1>
                <div align="left">
                  <ul>@foreach($booksCategory as $Category)
                      <li><a href="/searchCategory?c={{ $Category['category'] }}" class="list-group-item">{{ $Category['category'] }}</a></li>
                      @endforeach
                  </ul>
                </div>
        	</div>
        </div>
        <div align="left"><!-- end of content left -->

        </div>
        <div id="templatemo_content_right">
            @foreach($books as $book)

        	<div class="templatemo_product_box">

            	<h1>{{ $book->title }}<span></span></h1>
   	      <img src="/assets/bookImages/{{ $book->thumbnail }}" alt="{{ $book->title }}" width="103" height="141" />
                <div class="product_info">
               	  <p>{{ $book->description }}</p>
                  <h3>${{ $book->pprice }}</h3>
                    <div class="buy_now_button"><a href="books/{{ $book->id }}">Detail</a></div>
              </div>
                <div class="cleaner">&nbsp;</div>
            </div>

            @endforeach



            <a href="subpage.html"></a>
        </div> <!-- end of content right -->

    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->

    <div id="templatemo_footer"><br />
    </div>
    <!-- end of footer -->
<!--  Free CSS Template www.templatemo.com -->
</div> <!-- end of container -->
</body>
</html>































