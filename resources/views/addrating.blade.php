@extends('main')

@section('content')
    <div class="container">
        <h3 class="mt-5 mb-2">Add Rating to {{$anime->title}}</h3>
        <form action="{{route('add_rating')}}" method="POST">
            @csrf
            <input type="hidden" type="text" name="anime_id" value="{{$anime->anime_id}}">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Rating</p>
            <input class="form-control mb-3" type="number" name="rating" step="0.01">
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Comment</p>
            <textarea class="form-control mb-3" type="text" name="comment"></textarea>

            @if ($errors->any())
                <p class="mb-3" style="color:red">
                    {{$errors->first()}}
                </p>
            @endif

            <button class="btn btn-primary" type="submit">Create</button>
        </form>
    </div>
@endsection
