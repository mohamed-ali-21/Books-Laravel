<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $books = Book::all()->where('user_id', '=', $userId);
        return view('Book.Index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Book.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cre(Request $data)
    {
        $input = $data->all();
        Book::create([
            'book_name'=>$input['book_name'],
            'user_id'=>null
        ]);
        return redirect()->action([BookController::class, 'index']);
    }

    public function getBook($id)
    {
        $userId = Auth::user()->id;
        $book = Book::find($id);
        $book->user_id = $userId;
        $book->update();

        return redirect()->action([HomeController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $input = Book::find($id);
        return view('Book.Edit')->with('data', $input);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upnew = $request->all(); 
        $input = Book::find($id);
        $input->update($upnew);
        return redirect()->action([BookController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->action([BookController::class, 'index']);
    }
}
