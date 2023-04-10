<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

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

    public function result(Request $request, $page = 1)
{
    $post_data = $request->all();
    $startIndex = ($page - 1) * 10;
    $data = "https://www.googleapis.com/books/v1/volumes?q=".$post_data["book"]."&maxResults=20&startIndex=".$startIndex;
    $json = file_get_contents($data);
    $json_decode = json_decode($json, true);
    return view('result', compact("json_decode", "page"));
}
}
