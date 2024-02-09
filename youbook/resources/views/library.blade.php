




@extends('layout')

@section('content')

    .<div class="container">
        <div class="row m-4">
        @foreach($books as $book)
        <div class="col">
            <div class="card" style="width: 24rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $book->title }}</h5>
                    <p class="card-text">{{ $book->author }}</p>
                    <a href="{{ route('book.show', $book->id) }}" class="btn btn-secondary">Show</a>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    
  




    @endsection