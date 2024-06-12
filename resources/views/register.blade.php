<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- {{-- <link rel="stylesheet" href="{{ asset('css/index.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>YourAnimeList</title>
</head>
<body class="d-flex flex-column align-items-center justify-content-center" style="background-color: #2e51a2; height: 100vh;">
    {{-- <div class="container-fluid d-flex flex-column justify-content-center align-items-center" style="height: 100vh"> --}}
        <div class="container d-flex flex-column align-items-center p-5" style="justify-content:center; background-color: white; border-radius: 15px">
            <div class="register d-flex flex-column justify-content-center" >
                <img src="{{asset('images/youranimelistlogo_black.png')}}" alt="" style="width: 20vw" class="mb-3">
                <h2>Start using YourAnimeList</h2>
                <p>Join YourAnimeList to catalog your anime, create your own profile, and plenty more. It's Free.</p>
                <form action="{{route('register')}}" method="POST"  enctype="multipart/form-data" class="container d-flex flex-column mb-3">
                    @csrf
                    <input class="form-control mb-3" type="file" name="image">
                    <input class="form-control mb-3" type="text" name="email" placeholder="Email">
                    <input class="form-control mb-3" type="password" name="password" placeholder="Password">
                    <input class="form-control mb-3" type="text" name="username" placeholder="Username">
                    <button class="btn btn-primary" type="submit">Register</button>
                </form>

                @if ($errors->any())
                    <p class="mb-3" style="color:red">
                        {{$errors->first()}}
                    </p>
                @endif
            </div>

            <div class="login-link">
                <h6>Already have an account? <a href="{{route('login_page')}}" style="text-decoration: none">Log In</a></h6>
            </div>
        </div>
    {{-- </div> --}}


</body>
</html>
