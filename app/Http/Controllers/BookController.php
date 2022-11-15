<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $books = Book::all()->where('book_creator', '=', $userId);
        return view('Book.Index')->with('books', $books);
    }

    // Create Book Page
    public function create()
    {
        return view('Book.Create');
    }

    // Create Book Action
    public function cre(Request $data)
    {
        $input = $data->all();
        $userId = Auth::user()->id;

        Book::create([
            'book_name'=>$input['book_name'],
            'user_id'=>null,
            'book_creator'=>$userId
        ]);
        return redirect()->action([BookController::class, 'index']);
    }

    // Borrowing a book 
    public function getBook($id)
    {
        $userId = Auth::user()->id;
        $book = Book::find($id);
        $book->user_id = $userId;
        $book->update();

        return redirect()->action([HomeController::class, 'index']);
    }

    // Return a book
    public function returnBook($id)
    {
        $book = Book::find($id);
        $book->user_id = null;
        $book->update();

        return redirect()->action([HomeController::class, 'index']);
    }

    // Edit Book Page
    public function edit($id)
    {
        $input = Book::find($id);
        return view('Book.Edit')->with('data', $input);
    }

    // Edit Book Action 
    public function update(Request $request, $id)
    {
        $upnew = $request->all(); 
        $input = Book::find($id);
        $input->update($upnew);
        return redirect()->action([BookController::class, 'index']);
    }

    // Remove a Book
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->action([BookController::class, 'index']);
    }
}
