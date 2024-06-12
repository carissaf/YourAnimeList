@extends('main')

@section('content')
    <div class="container">
        <h3 class="mt-5 mb-2">Add New Anime</h3>
        <form action="{{route('add_anime')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="form-control mb-3" type="file" name="image">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Title</p>
            <input class="form-control mb-3" type="text" name="title">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Description</p>
            <textarea class="form-control mb-3" type="text" name="description"></textarea>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Aired Date</p>
            <input class="form-control mb-3" type="date" name="aired_date">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Episodes</p>
            <input class="form-control mb-3" type="number" name="episodes">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Status</p>
            <select class="form-select mb-3" name="is_ongoing">
                <option value="1">Ongoing</option>
                <option value="0">Finished</option>
            </select>

            @if ($errors->any())
                <p class="mb-3" style="color:red">
                    {{$errors->first()}}
                </p>
            @endif

            <button class="btn btn-primary" type="submit">Create</button>

        </form>
    </div>
@endsection
