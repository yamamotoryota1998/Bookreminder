<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
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
    $book = $request->input('book');
    $startIndex = ($page - 1) * 10;
    $data = "https://www.googleapis.com/books/v1/volumes?q=".$book."&maxResults=10&startIndex=".$startIndex;
    $json = file_get_contents($data);
    $json_decode = json_decode($json, true);
    return view('result', compact("json_decode", "page"));
}

    public function regist(Request $request)
{
    // まず、booksテーブルに本の情報を保存します。
    $book = Book::firstOrCreate(
        ['book_id' => $request->input('book_id')],
        [
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'thumbnail' => $request->input('thumbnail')
        ]
    );

}
