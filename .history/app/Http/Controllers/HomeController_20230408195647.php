<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\UserBook;
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
    // Google Books APIの本のIDを取得
    $book_id = $request->input('book_id');
    try {
        // Bookの保存処理やUserBookの保存処理を行います

    } catch (QueryException $e) {
        // 重複エラー（エラーコード 1062）が発生した場合
        if ($e->errorInfo[1] == 1062) {
            return redirect()->back()->with('error', 'この本は既に登録されています。');
        }

        // それ以外のエラーが発生した場合は、そのまま例外をスローします
        throw $e;
    }
    // まず、booksテーブルに本の情報を保存します。
    $book = new Book;
    $book->book_id = $request->input('book_id'); // これを追加
    $book->title = $request->input('title');
    $book->author = $request->input('author');
    $book->thumbnail = $request->input('thumbnail');
    $book->save();
    // 現在ログインしているユーザーのIDを取得
    $user_id = Auth::id();
    // user_booksテーブルにユーザーと本の関連付けを行う
    $user_book = new UserBook();
    $user_book->user_id = $user_id;
    $user_book->book_id = $book_id; // Google Books APIの本のIDを使用
    $user_book->save();
    // 保存が完了したら、適切なビューにリダイレクトします。
    return redirect()->route('home');
    }
}
