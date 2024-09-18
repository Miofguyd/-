<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class FirstController extends Controller
{
    function first(Anime $anime){
    return view('animes.first')->with(['animes' => $anime->get()]);
}
    function anime(Anime $anime){
    return view('animes.anime')->with(['anime' => $anime]);
}
}
