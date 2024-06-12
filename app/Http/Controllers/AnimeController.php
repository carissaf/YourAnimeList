<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnimeController extends Controller
{
    public function show_allanimes(){
        $animes = Anime::paginate(10);

        return view('animes', compact('animes'));
    }

    public function anime_detail_page($anime_id){
        $anime = Anime::find($anime_id);

        $ratings = Rating::join('users', 'ratings.user_id', '=', 'users.user_id')
        ->where('ratings.anime_id', $anime_id)
        ->select('ratings.*', 'users.username', 'users.image_url')
        ->get();

        return view('animedetail', compact('anime', 'ratings'));
    }

    public function edit_anime_page($anime_id){
        $anime = Anime::find($anime_id);

        return view('editanime', compact('anime'));
    }

    public function edit_anime(Request $request){
        $rules = [
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:20|max:10000',
            'episodes' => 'required|numeric|min:1|max:500',
            'aired_date' => 'required',
            'is_ongoing' => 'required',
        ];

        $validation = Validator::make($request->all(), $rules);
        if($validation->fails()){
            return back()->withErrors($validation);
        }

        $anime = Anime::find($request->anime_id);
        $anime->title = $request->title;
        $anime->description = $request->description;
        $anime->aired_date = $request->aired_date;
        $anime->is_ongoing = $request->is_ongoing;
        $anime->episodes = $request->episodes;

        $anime->save();
        return redirect()->route('anime_detail', ['anime_id' => $anime->anime_id]);
    }

    public function add_anime_page(){
        return view('addanime');
    }

    public function add_anime(Request $request){
        $rules = [
            'image' => 'required|mimes:jpg,png,jpeg',
            'title' => 'required|min:2|max:100',
            'description' => 'required|min:20|max:10000',
            'episodes' => 'required|min:1|max:500',
            'aired_date' => 'required',
            'is_ongoing' => 'required',
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
            'title' => $request->title,
            'description' => $request->description,
            'aired_date' => $request->aired_date,
            'is_ongoing' => $request->is_ongoing,
            'episodes' => $request->episodes,
            'rating' => 0.00,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ];

        DB::table('animes')->insert($data);

        $animes = Anime::all();

        return view('adminanimes', compact('animes'));
    }

    public function delete_anime(Request $request){
        Anime::destroy($request->anime_id);
        return redirect()->route('admin_animes');
    }

    public function search_anime(Request $request){
        $title = $request->title;
        // dd($title);
        $animes = Anime::where('animes.title', 'LIKE', '%'.$title.'%')->paginate(10);

        return view('animes', compact('animes'));
    }

    public function admin_search_anime(Request $request){
        $title = $request->title;
        // dd($title);
        $animes = Anime::where('animes.title', 'LIKE', '%'.$title.'%')->paginate(10);

        return view('adminanimes', compact('animes'));
    }
}
