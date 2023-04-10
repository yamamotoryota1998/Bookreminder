<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/home');
    }

    public function result(Request $request){
        $post_data = $request->all();    
        $data = "https://www.googleapis.com/books/v1/volumes?q=".$post_data["book"];
        $json = file_get_contents($data);
        $json_decode = json_decode($json, true);
        // dd($json_decode);
        return view('result', compact("json_decode"));
    }
}
