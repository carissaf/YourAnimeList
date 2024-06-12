@extends('main')

@section('content')
{{-- <button class="btn btn-primary mt-3" style="display: flex; align-items: center">

    <a href="" style="text-decoration: none; color: white">Edit</a>
</button> --}}
    <div class="container d-flex justify-content-between mt-5 mb-3">
        <h3>All animes</h3>
        <button type="button" class="btn btn-primary">
            <a class="d-flex f-row" href="{{route('add_anime_page')}}" style="text-decoration: none; color: white">
                <i class="bi bi-plus d-flex align-items-center me-2"></i>
                Add New Anime
            </a>
        </button>
    </div>

    <form class="container" action="{{route('admin_search_anime')}}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="title" placeholder="Search anime title..">
            <button class="btn btn-primary d-flex flex-row align-items-center" type="submit">
                <i class="bi bi-search d-flex flex-row align-items-center me-2"></i>
                Search
            </button>
        </div>
    </form>

    {{-- {{Storage::url($anime->image_url)}} --}}
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr class="table">
                    <th scope="col" style="background-color: #e1e7f5;">anime_id</th>
                    <th scope="col" style="background-color: #e1e7f5;">Title</th>
                    <th scope="col" style="background-color: #e1e7f5;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($animes as $anime)
                <tr>
                    <th scope="row">{{$anime->anime_id}}</th>
                    <td>
                        {{-- @if (Storage::exists($anime->image_url))
                            <img src="{{Storage::url($anime->image_url)}}" alt="">
                        @else
                            <img src="{{$anime->image_url}}" alt="">
                        @endif --}}
                        <img src="{{Storage::url($anime->image_url)}}" style="width: 15vw; margin-right: 1.5vw" alt="">
                        {{$anime->title}}</td>
                    <td>
                        <div class="d-flex flex-row">
                            <button type="button" class="btn btn-primary m-2" >
                                <a class="d-flex f-row" href="{{route('anime_detail', ['anime_id' => $anime->anime_id])}}" style="color: white; text-decoration: none">
                                    <i class="bi bi-info-circle-fill me-1 d-flex align-items-center"></i>
                                    Details
                                </a>
                            </button>
                            <a class="d-flex f-row btn btn-outline-primary m-2" href="{{route('edit_anime_page', ['anime_id' => $anime->anime_id])}}" style="text-decoration: none">
                                <i class="bi bi-pencil-square me-1 d-flex align-items-center"></i>
                                Edit
                            </a>
                            <form action="{{ route('delete_anime') }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="anime_id" value="{{$anime->anime_id}}">
                                <button class="d-flex f-row align-items-center btn btn-danger m-2" type="submit">
                                    <i class="bi bi-trash-fill me-1 d-flex align-items-center"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection
