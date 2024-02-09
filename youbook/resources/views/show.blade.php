@extends('layout')

@section('content')


<div class="contanrel p-5 m-5 bg-body-tertiary">







    @if($errors->any())
    <div class="alert alert-danger" id="alert">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (Session::has('error'))
    <div class="alert alert-danger" id="alert">
        {{ Session::get('error') }}
    </div>
    @endif
    @if (Session::has('success'))
    <div class="alert alert-success" id="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    <script>
        setTimeout(function() {
            var successAlert = document.getElementById('alert');
            successAlert.style.display = 'none';
        }, 1000);
    </script>

    <h1> info of {{ $book->title }}</h1>



    <table class="table">
        <tr>
            <th>Author</th>
            <td>{{ $book->author }}</td>
        </tr>
        <tr>
            <th>description</th>
            <td>{{ $book->description }}</td>
        </tr>
    </table>
    <a href="{{ route('book.library') }}" class="btn btn-primary">Back</a>


</div>









<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('reservation.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="startDate">Start Date</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>

                    <input type="hidden" name="bookId" value="{{ $book->id }}">

                    <button type="submit" class="btn btn-primary mt-3">Reserve</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>


@endsection