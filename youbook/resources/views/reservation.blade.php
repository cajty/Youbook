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
                @foreach($Reservations as $res)
                <tr>
                    <td>{{ $res->title }}</td>
                    <td>{{ $res->author }}</td>
                    <td>
                        
                        <form action="{{ route('book.destroy', $res->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('book.create') }}" class="btn btn-primary">Add Book</a>
    </div>




    @endsection
