
@extends('layout')

@section('content')







    <div class="contanrel p-5 m-5bg-body-tertiary">
        <h1>Books</h1>
        @if(session('success'))
        <div class="alert alert-success" id="alert">
            {{ session('success') }}
        </div>
        @endif
        <script>
            setTimeout(function() {
                var successAlert = document.getElementById('alert');
                successAlert.style.display = 'none';
            }, 1000);
        </script>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ route('book.edit', $book->id) }}" class="btn btn-secondary">Update</a>
                        <form action="{{ route('book.destroy', $book->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('book.create') }}" class="btn btn-primary my-4">Add Book</a>
    </div>




    @endsection