@extends('main')

@section('content')
    {{-- <div id="anime-banner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://3.bp.blogspot.com/-VJFiS2_Z7-Q/UyeJQ1TxdlI/AAAAAAAAAs8/IqDNuDRMpWU/s1600/TheWindRises04.jpg" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="https://mxj.myanimelist.net/img/projects/aot_ukiyo-e/main_visual.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
            <img src="https://akcdn.detik.net.id/visual/2021/10/28/film-jujutsu-kaisen-0_169.jpeg?w=650" class="d-block w-100">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#anime-banner" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#anime-banner" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div> --}}

    <div class="top-animes container p-0">
        <div class="d-flex flex-row justify-content-between mb-2 mt-5 p-0">
            <h3>Top 5 Animes</h3>
            {{-- <a href="">View More</a> --}}
        </div>

        <div class="d-flex flex-row justify-content-between p-0">
            @foreach ($animes as $anime)
            {{-- {{Storage::url($anime->image_url)}} --}}
                {{-- <img src="{{$anime->image_url}}" alt=""> --}}
                {{-- <h4>{{$anime->title}}</h4> --}}
                <a  href="{{route('anime_detail', ['anime_id' => $anime->anime_id])}}" style="text-decoration: none">
                    <div class="card mb-4" style="width: 15vw; height: 57vh;">
                        <img src="{{Storage::url($anime->image_url)}}" class="card-img-top" alt="" style="object-fit:cover; height: 45vh; width:100%">
                        {{-- @if (Storage::exists($anime->image_url))
                            <img src="{{Storage::url($anime->image_url)}}" class="card-img-top" alt="" style="height: 30vh">
                        @else
                            <img src="{{$anime->image_url}}" class="card-img-top" alt="" style="height: 30vh">
                        @endif --}}
                        <div class="card-body">
                            <h6 class="card-title">{{$anime->title}}</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>

    <div class="latest-animes container p-0">
        <div class="d-flex flex-row justify-content-between mb-2 mt-5">
            <h3>Latest Animes</h3>
        </div>

        <div class="d-flex flex-row justify-content-between p-0">
            @foreach ($latestanimes as $anime)
                <a  href="{{route('anime_detail', ['anime_id' => $anime->anime_id])}}" style="text-decoration: none">
                    <div class="card mb-4" style="width: 15vw; height: 57vh;">
                        <img src="{{Storage::url($anime->image_url)}}" class="card-img-top" alt="" style="object-fit:cover; height: 45vh; width:100%">
                        <div class="card-body">
                            <h6 class="card-title">{{$anime->title}}</h6>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="latest-animes container p-0">
        <div class="d-flex flex-row justify-content-between mb-2 mt-5">
            <h3>Latest Ratings</h3>
        </div>

        @foreach ($latestratings as $rating)
                <div class="border border-secondary-subtle rounded mt-3">
                    <div class="container d-flex align-items-center px-3 pt-3" style="justify-content: space-between">
                        <h4><a href="{{route('anime_detail', ['anime_id' => $rating->anime_id])}}" style="color: black">{{$rating->title}}</a></h4>
                    </div>

                    <div class="d-flex flex-row align-items-center px-3 pt-3">
                        <img src="{{Storage::url($rating->image_url)}}" alt="" style="width: 3vw; height: 3vw; object-fit: cover; border-radius: 5px; margin-right: 1vw">
                        <h5>{{$rating->username}}</h5>
                    </div>

                    <div class="container d-flex flex-row p-3 mt-2">
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
