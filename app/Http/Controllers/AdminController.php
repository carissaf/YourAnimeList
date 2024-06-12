<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show_allanimes(){
        $animes = Anime::all();

        return view('adminanimes', compact('animes'));
    }
}
