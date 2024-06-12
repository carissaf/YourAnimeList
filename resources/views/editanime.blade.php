@extends('main')

@section('content')
<div class="container mt-5 d-flex flex-row">
    <img class="me-5" src="{{Storage::url($anime->image_url)}}" style="width: 25vw; height:35vw; " alt="">
    <div class="desc container">
        <form action="{{route('edit_anime')}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="anime_id" value="{{$anime->anime_id}}">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Title</p>
            <input class="form-control mb-3" type="text" name="title" value="{{$anime->title}}">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Description</p>
            <textarea class="form-control mb-3" type="text" name="description">{{$anime->description}}</textarea>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Aired Date</p>
            <input class="form-control mb-3" type="date" name="aired_date" value="{{$anime->aired_date}}">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Episodes</p>
            <input class="form-control mb-3" type="number" name="episodes" value="{{$anime->episodes}}">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Rating</p>
            <input class="form-control mb-3" type="number" name="rating" value="{{$anime->rating}}" disabled>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Status</p>
            <select class="form-select mb-3" name="is_ongoing">
                <option value="1" {{$anime->is_ongoing == 1? 'selected' : ''}}>Ongoing</option>
                <option value="0" {{$anime->is_ongoing == 0? 'selected' : ''}}>Finished</option>
            </select>

            @if ($errors->any())
                <p class="mb-3" style="color:red">
                    {{$errors->first()}}
                </p>
            @endif

            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
</div>
@endsection
