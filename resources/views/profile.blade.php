@extends('main')

@section('content')
    <div class="container">
            <h3 class="mt-5 mb-2">Profile</h3>
        <div class="container d-flex flex-row align-items-center p-0">
            {{-- <div class="image" style="width: 20vw; height: 20vw; overflow: hidden; margin-right: 5vw; border-radius: 5px;">
                <img src="{{Storage::url(Auth::user()->image_url)}}" style="height: 100%" alt="">
            </div> --}}
            <img src="{{Storage::url(Auth::user()->image_url)}}" alt="" style="width: 20vw; height: 20vw; object-fit: cover; border-radius: 15px; margin-right: 5vw">

            <div class="container">
                <h3>{{$user->username}}</h3>
                <div class="text">
                    <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Role</p>
                    <h5>{{$user->role}}</h5>
                </div>

                <div class="text">
                    <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Email</p>
                    <h5>{{$user->email}}</h5>
                </div>

                <button class="btn btn-primary mt-3" style="display: flex; align-items: center">
                    <i class="bi bi-pencil-square me-2 d-flex align-items-center"></i>
                    <a href="{{route('edit_profile_page', ['user_id' => $user->user_id])}}" style="text-decoration: none; color: white">Edit</a>
                </button>
                {{-- <div class="btns d-flex flex-row">
                </div> --}}

            </div>

            <div class="container">
                <button class="btn btn-primary mt-3">
                    <a class="d-flex align-items-center" href="{{route('logout')}}" style="text-decoration: none; color: white; width: 15vw">
                        <i class="bi bi-box-arrow-right me-2 d-flex"></i>Log Out
                    </a>
                </button>

                <button class="btn btn-primary mt-3">
                    <a class="d-flex align-items-center" href="{{route('change_password_page')}}" style="text-decoration: none; color: white; width: 15vw">
                        <i class="bi bi-key-fill me-2 d-flex"></i>Change Password
                    </a>
                </button>
            </div>
        </div>
    </div>

@endsection
