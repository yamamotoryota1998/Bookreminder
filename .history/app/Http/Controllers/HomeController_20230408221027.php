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
    public function index(Request $request, $page = 1)
{
    $user_id = Auth::id();

    $books = Book::join('user_books', 'books.book_id', '=', 'user_books.book_id')
        ->where('user_books.user_id', $user_id)
        ->orderBy('user_books.created_at', 'desc')
        ->select('books.*')
        ->paginate(10);
    $startIndex = ($page - 1) * 10;    

    return view('home', compact('books'));
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
    // 既に登録されているbook_idかどうかを確認します
    $bookExists = Book::where('book_id', $book_id)->exists();
    if (!$bookExists) {
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
        return redirect()->route('home')->with('success', '本が正常に登録されました。');
    } else {
        return redirect()->back()->with('warning', 'この本は既に登録されています。');
    }
    }
}
