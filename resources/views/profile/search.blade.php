@extends('master2')
@section('content')
<!-- Page Content -->
<div class="container">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Results for...
                <small>{{ $query }}</small>
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        @foreach($books as $book)
        <div class="col-md-3 portfolio-item">
            <a href="books/{{ $book->id }}">
                <img class="img-responsive" src="/assets/bookImages/{{ $book->thumbnail }}" alt="{{ $book->title }}" style="width: 500px; height: 500px;">
            </a>
        </div>
        @endforeach
    </div>
    <!-- /.row -->

    <hr>
</div>
<!-- /.container -->
@endsection

@section('scripts')
<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
@endsection
