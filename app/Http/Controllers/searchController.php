<?php

namespace App\Http\Controllers;
use App\Models\Movies;

use Illuminate\Http\Request;

class searchController extends Controller
{
       /**
    * Display a listing of one resource searched.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */          
    public function search(Request $request)
    // public function search()
    {
        $movieSearched = trim($request -> get('inputSearchMovie'));
        echo "movieSearched:", $movieSearched;
        $data['movies'] = Movies::query()
                ->where('name', 'like', "%{$movieSearched}%")
                ->orWhere('synopsis', 'like', "%{$movieSearched}%")
                ->orderBy('created_at', 'desc')
                ->get();

        return view('movies.searchedMovie', $data);
        // return view('movies.test');
    }
    public function searchback()
    {
        return view('movies.index');
    }
}
