@extends('main')

@section('content')
    <div class="container mt-5 d-flex flex-row">
        <img class="me-5" src="{{Storage::url($anime->image_url)}}" style="width: 25vw; height:35vw; " alt="">
        {{-- @if (Storage::exists($anime->image_url))
            <img src="{{Storage::url($anime->image_url)}}" alt="">
        @else
            <img src="{{$anime->image_url}}" alt="">
        @endif --}}
        <div class="desc">
            <h2>{{$anime->title}}</h2>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Description</p>
            <p>{{$anime->description}}</p>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Aired Date</p>
            <h4>{{$anime->aired_date}}</h4>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Episodes</p>
            <h4>{{$anime->episodes}}</h4>
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Rating</p>
            <h4>{{$anime->rating}}</h4>

            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Status</p>
            @if ($anime->is_ongoing == 1)
                <h4>Ongoing</h4>
            @else
                <h4>Finished</h4>
            @endif
        </div>
    </div>

    <div class="ratings container mt-5">
        <div class="container d-flex justify-content-between p-0">
            <h4>Ratings</h4>
            <div class="text">
                <button class="btn btn-primary">
                    <a class="d-flex f-row" href="{{route('add_rating_page', ['anime_id' => $anime->anime_id])}}" style="color: white; text-decoration: none">
                        <i class="bi bi-plus d-flex align-items-center me-2"></i>
                        Add Rating
                    </a>
                </button>
            </div>
        </div>

        @if(session('error'))
            <p class="mb-3 mt-2 d-flex justify-content-end" style="color:red">
                {{session('error')}}
            </p>
        @endif

        @foreach ($ratings as $rating)
            <div class="border-bottom mt-3 mb-2">
                <div class="user d-flex flex-row align-items-center">
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
    </div>
@endsection
