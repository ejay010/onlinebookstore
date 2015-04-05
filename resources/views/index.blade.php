@extends('master')
<!-- Page Content -->
@section('content')
<div class="container">

    <div class="row">

        @if (Auth::user())
        <div class="col-md-3">
            <p class="lead">{{ Auth::user()->username }}</p>
            <div class="list-group">
                <a href="#" class="list-group-item">Search for Books</a>
                <a href="#" class="list-group-item">Rate Professors</a>
                <a href="#" class="list-group-item">Rate Classes</a>
                <a href="logout" class="list-group-item">Logout</a>
            </div>
        </div>
        @endif

        <div class="col-md-9">

            <div class="row carousel-holder">

                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="slide-image" src="http://greatresultsteambuilding.net/wp-content/uploads/2014/10/books-cds-products-800-x-300.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://thewellarmedwoman.com/image/cache/data/categories/books-and-dvds-800x300.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="slide-image" src="http://mmageephotography.com/wp-content/uploads/2010/09/books-2-800x300.jpg" alt="">
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach($books as $book)
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="thumbnail">
                        <a href="books/{{ $book->id }}"><img src="/assets/bookImages/{{ $book->thumbnail }}" alt=""></a>
                        <div class="caption">
                            <h4 class="pull-right">${{ $book->pprice }}</h4>
                            <h4><a href="#">{{ $book->title }}</a>
                            </h4>
                            <p>{{ $book->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
                    <!-- <span class="glyphicon glyphicon-star"></span> -->

            </div>

        </div>

    </div>

</div>
<!-- /.container -->
@endsection

@section('footer')
<div class="container">

    <hr>

    <!-- Footer -->
    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright &copy; Tortuga, Bucky's Bookstore 2014</p>
            </div>
        </div>
    </footer>

</div>
<!-- /.container -->
@endsection

@section('scripts')
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
@endsection
