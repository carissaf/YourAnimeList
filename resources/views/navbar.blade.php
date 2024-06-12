{{-- <div class="navbar-left">
    <div class="logo">
        <img src="{{asset('images/youranimelistlogo.png')}}" alt="">
    </div>

    <div class="links">
        <a href="{{route('home_page')}}">Home</a>

        @if (Auth::user()->role == 'admin')
            <a href="{{route('admin_animes')}}">Animes</a>
        @else
            <a href="{{route('animes')}}">Animes</a>
        @endif

        <a href="">Ratings</a>
    </div>
</div>

<div class="account">
    <a href="">
        <div class="image">
            <img src="{{Storage::url(Auth::user()->image_url)}}" alt="">
        </div>
        <h4>{{Auth::user()->username}}</h4>
    </a>
</div> --}}

<nav class="navbar navbar-expand-lg container-fluid sticky-top" style="background-color:#2e51a2; margin:0;">
    <div class="container-fluid">
        <a href="" class="navbar-brand">
            <img src="{{asset('images/youranimelistlogo.png')}}" style="width: 16vw" alt="" class="mx-5">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home_page')}}">Home</a>
                </li>

                <li class="nav-item">
                    @if (Auth::user()->role == 'admin')
                        <a class="nav-link" href="{{route('admin_animes')}}">Animes</a>
                    @else
                        <a class="nav-link" href="{{route('animes')}}">Animes</a>
                    @endif
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('ratings')}}">Ratings</a>
                </li>
            </ul>

            <a class="d-flex align-items-center account me-5" style="text-decoration: none" href="{{route('profile_page', ['user_id' => Auth::user()->user_id])}}">
                {{-- <div class="image">
                    <img src="{{Storage::url(Auth::user()->image_url)}}" alt="">
                </div> --}}
                <img src="{{Storage::url(Auth::user()->image_url)}}" alt="" style="width: 2.5vw; height: 2.5vw; object-fit: cover; border-radius: 5px; margin-right: 1vw">
                <span>{{Auth::user()->username}}</span>
            </a>
        </div>
    </div>
</nav>
