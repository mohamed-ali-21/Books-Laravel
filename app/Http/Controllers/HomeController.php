<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    // Get books for home page
    public function index()
    {
        $books = Book::with('user')->get();
        $userId = Auth::user()->id;

        return view('home')->with('books', $books)->with('userId', $userId);
    }
}
