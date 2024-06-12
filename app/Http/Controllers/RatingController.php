<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RatingController extends Controller
{
    public function add_rating_page($anime_id){
        $user = Auth::user();
        $anime = Anime::find($anime_id);

        $hasRated = Rating::where('user_id', $user->user_id)
        ->where('anime_id', $anime_id)
        ->exists();

        // dd($hasRated);

        if($hasRated){
            return redirect()->route('anime_detail', ['anime_id' => $anime_id])->with('error', 'You have already rated this anime!');
        }else{
            return view('addrating', compact('user', 'anime'));
        }
    }

    public function add_rating(Request $request){
        $rules = [
            'rating' => 'required|numeric|min:0|max:5',
            'comment' => 'required|min:5|max:10000'
        ];

        $validation = Validator::make($request->all(), $rules);

        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $data = [
            'user_id' => Auth::user()->user_id,
            'anime_id' => $request->anime_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        DB::table('ratings')->insert($data);
        $averageRating = Rating::where('anime_id', $request->anime_id)->avg('rating');

        Anime::where('anime_id', $request->anime_id)->update(['rating' => $averageRating]);

        return redirect()->route('anime_detail', ['anime_id' => $request->anime_id]);
        // return view('anime_detail_page', );
    }

    public function delete_rating(Request $request){
        Rating::where('user_id', $request->user_id)
        ->where('anime_id', $request->anime_id)
        ->delete();

        $averageRating = Rating::where('anime_id', $request->anime_id)->avg('rating');

        if($averageRating){
            Anime::where('anime_id', $request->anime_id)->update(['rating' => $averageRating]);
        }else{
            Anime::where('anime_id', $request->anime_id)->update(['rating' => 0.00]);
        }

        return redirect()->route('ratings');
    }

    public function show_allratings(){
        $ratings = Rating::join('users', 'ratings.user_id', '=', 'users.user_id')
        ->join('animes', 'ratings.anime_id', '=', 'animes.anime_id')
        ->select('ratings.*', 'users.username', 'users.image_url', 'users.user_id','animes.title', 'animes.anime_id')
        ->get();

        return view('ratings', compact('ratings'));
    }
}
