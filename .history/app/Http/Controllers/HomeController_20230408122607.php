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

    // public function result(Request $request){
    //     $post_data = $request->all();
    //     $data = "https://www.googleapis.com/books/v1/volumes?q=".$post_data["book"]."&maxResults=20&startIndex=0";
    //     $json = file_get_contents($data);
    //     $json_decode = json_decode($json, true);
    //     // dd($json_decode);
    //     return view('result', compact("json_decode"));
    // }
    public function result(Request $request){
        $post_data = $request->all();
        $perPage = 10;
        $currentPage = $request->input('page', 1);
    
        // Google Books APIからデータを取得
        $startIndex = ($currentPage - 1) * $perPage;
        $data = "https://www.googleapis.com/books/v1/volumes?q=".$post_data["book"]."&maxResults=".$perPage."&startIndex=".$startIndex;
        $json = file_get_contents($data);
        $json_decode = json_decode($json, true);
        
        // ページネーションを作成
        $totalItems = $json_decode['totalItems'];
        $items = collect($json_decode['items']);
        $paginator = new LengthAwarePaginator($items, $totalItems, $perPage, $currentPage, ['path' => url('result')]);
        
        return view('result', compact("paginator"));
    }
}
