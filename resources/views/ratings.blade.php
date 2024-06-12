@extends('main')

@section('content')
    <div class="container">
        <h3 class="mb-2 mt-5">All Ratings</h3>
        {{-- <div class="row row-cols-5"> --}}
            @foreach ($ratings as $rating)
                <div class="border-bottom my-3">
                    <div class="container d-flex align-items-center p-0" style="justify-content: space-between">
                        <h4><a href="{{route('anime_detail', ['anime_id' => $rating->anime_id])}}" style="color: black">{{$rating->title}}</a></h4>
                        @if (Auth::user()->role == 'admin')
                            <form action="{{route('delete_rating')}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="anime_id" value="{{$rating->anime_id}}">
                                <input type="hidden" name="user_id" value="{{$rating->user_id}}">
                                <button class="d-flex f-row align-items-center btn btn-danger m-2" type="submit">
                                    <i class="bi bi-trash-fill me-1 d-flex align-items-center"></i>
                                    Delete
                                </button>
                            </form>
                        @endif
                    </div>

                    <div class="d-flex flex-row align-items-center mt-3">
                        <img src="{{Storage::url($rating->image_url)}}" alt="" style="width: 3vw; height: 3vw; object-fit: cover; border-radius: 5px; margin-right: 1vw">
                        <h5>{{$rating->username}}</h5>
                    </div>

                    <div class="container d-flex flex-row p-0 mt-2">
                        <div class="text">
                            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Rated</p>
                            <p>{{$rating->rating}}</p>
                        </div>

                        <div class="text mx-5">
                            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Comment</p>
                            <p>{{$rating->comment}}</p>
                        </div>
                    </div>
                </div>

            @endforeach
        {{-- </div> --}}
    </div>
@endsection
