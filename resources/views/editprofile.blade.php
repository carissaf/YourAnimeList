@extends('main')

@section('content')
    <div class="container">
        <h3 class="mt-5 mb-2">Edit Profile</h3>
        <form action="{{route('edit_profile')}}" method="POST">
            @csrf
            @method('PATCH')
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Username</p>
            <input class="form-control mb-3" type="text" name="username" value="{{$user->username}}">

            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Email</p>
            <input class="form-control mb-3" type="email" name="email" value="{{$user->email}}">

            @if ($errors->any())
                <p class="mb-3" style="color:red">
                    {{$errors->first()}}
                </p>
            @endif

            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection
