@extends('main')

@section('content')
    <div class="container">
        <h3 class="mb-2 mt-5">All Animes</h3>
        <form action="{{route('search_anime')}}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="title" placeholder="Search anime title..">
                <button class="btn btn-primary d-flex flex-row align-items-center" type="submit">
                    <i class="bi bi-search d-flex flex-row align-items-center me-2"></i>
                    Search
                </button>
            </div>
        </form>

        <div class="row row-cols-5 p-0">
            @foreach ($animes as $anime)
            {{-- {{Storage::url($anime->image_url)}} --}}
                {{-- <img src="{{$anime->image_url}}" alt=""> --}}
                {{-- <h4>{{$anime->title}}</h4> --}}
                <div class="col">
                    <a href="{{route('anime_detail', ['anime_id' => $anime->anime_id])}}" style="text-decoration: none">
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
                </div>

            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center my-5">
        {!! $animes->links() !!}
    </div>
@endsection
