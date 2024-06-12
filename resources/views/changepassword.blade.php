@extends('main')

@section('content')
    <div class="container">
        <h3 class="mt-5 mb-2">Change Password</h3>
        <form action="{{route('change_password')}}" method="POST">
            @csrf
            @method('PATCH')
            {{-- <input class="form-control mb-3" type="text" name="password" value="{{Auth::user()->password}}"> --}}
            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Current Password</p>
            <input class="form-control mb-3" type="password" name="current_password">

            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">New Password</p>
            <input class="form-control mb-3" type="password" name="new_password">

            <p style="color: rgba(0, 0, 0, 0.5); margin: 0;">Confirm Password</p>
            <input class="form-control mb-3" type="password" name="confirm_password">
            @if ($errors->any())
                <p class="mb-3" style="color:red">
                    {{$errors->first()}}
                </p>
            @endif

            <button class="btn btn-primary" type="submit">Edit</button>
        </form>
    </div>
@endsection
