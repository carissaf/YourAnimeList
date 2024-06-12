<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register_page(){
        return view('register');
    }

    public function register(Request $request){
        $rules = [
            'image' => 'required|mimes:jpg,png,jpeg',
            'email' => 'required|email:rfc,dns',
            'password' => 'required|min:8|max:128',
            'username' => 'required|min:5|max:20',
        ];

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $file = $request->file('image');
        $image_name = time().'.'.$file->getClientOriginalExtension();
        Storage::putFileAs("public/images", $file, $image_name);
        $image_url = 'images/'.$image_name;

        $data = [
            'image_url' => $image_url,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

        ];

        DB::table('users')->insert($data);

        return view('login');
    }

    public function login_page(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return redirect()->route('home_page'); //['user_id' => $request->user_id]
        }else{
            return redirect()->route('login_page')->with('error', 'Invalid credentials! Try again');
        }
    }

    public function home_page(){
        // $animes = Anime::all();
        $animes = Anime::orderBy('rating', 'desc')
        ->take(5)
        ->get();

        $latestanimes = Anime::orderBy('aired_date', 'desc')
        ->take(5)
        ->get();

        // $latestratings = Rating::orderBy('created_at', 'desc')
        // ->take(10)
        // ->get();

        $latestratings = Rating::join('users', 'ratings.user_id', '=', 'users.user_id')
        ->join('animes', 'ratings.anime_id', '=', 'animes.anime_id')
        ->select('ratings.*', 'users.username', 'users.image_url', 'users.user_id','animes.title', 'animes.anime_id')
        ->orderBy('created_at', 'desc')
        ->take(10)
        ->get();

        return view('home', compact('animes', 'latestanimes', 'latestratings'));
    }

    public function profile_page($user_id){
        $user = User::find($user_id);

        return view('profile', compact('user'));
    }

    public function edit_profile_page($user_id){
        $user = User::find($user_id);
        return view('editprofile', compact('user'));
    }

    public function edit_profile(Request $request){
        $rules = [
            'email' => 'required|email:rfc,dns',
            'username' => 'required|min:5|max:20',
        ];

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $user = User::find(Auth::user()->user_id);
        $user->email = $request->email;
        $user->username = $request->username;

        $user->save();
        return redirect()->route('profile_page', ['user_id' => Auth::user()->user_id]);
    }

    public function change_password_page(){
        return view('changepassword');
    }

    public function change_password(Request $request){
        $user = User::find(Auth::user()->user_id);
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:8|max:128',
            'confirm_password' => 'required|same:new_password'
        ];

        if (!password_verify($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $user->password = bcrypt($request->new_password);

        $user->save();
        return redirect()->route('profile_page', ['user_id' => Auth::user()->user_id]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login_page');
    }
}
