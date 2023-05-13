<?php

namespace App\Http\Controllers;

use App\Models\Members;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Catalog;
use App\Models\Transaction;
use App\Models\TransactionDetails;
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
        $members = Members::with('user')->get();
        //$book = Book::with('publisher')->get();
        //$publisher = Publisher::with('books')->get();
        //$author = Author::with('books')->get();
        //$catalog = Catalog::with('books')->get();

        //no 1
        $data = Members::select('*')
                        ->join('users', 'users.member_id', '=', 'members.id')
                        ->get();

        //no 2
        $data2 = Members::select('*')
                        ->leftjoin('users', 'users.member_id', '=', 'members.id')
                        ->where('users.id', NULL)
                        ->get();

        //no 3
        $data3 = Transaction::select('members.id', 'members.name')
                        ->rightjoin('members', 'members.id', '=', 'transactions.member_id')
                        ->where('transactions.member_id', NULL)
                        ->get();

        //no 4
        $data4 = Members::select('members.id', 'members.name', 'members.phone_number')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->orderBy('members.id', 'asc')
                        ->get();

        //no 5
        $data5 = Members::select('members.id', 'members.name', 'members.phone_number')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->orderBy('members.id', 'asc')
                        ->get();

        //no 6
        $data6 = Members::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->orderBy('members.id', 'asc')
                        ->get();

        //no 7
        $data7 = Members::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->whereMonth('transactions.date_end', '=', '06')
                        ->get();

        //no 8
        $data8 = Members::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->whereMonth('transactions.date_start', '=', '05')
                        ->get();
        
        //no 9
        $data9 = Members::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->whereMonth('transactions.date_start', '=', '06')
                        ->whereMonth('transactions.date_end', '=', '06')
                        ->get();

        //no 10
        $data10 = Members::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->where('members.address', '=', 'Bandung')
                        ->get();

        //no 11
        $data11 = Members::select('members.name', 'members.phone_number', 'members.address','members.gender', 'transactions.date_start', 'transactions.date_end')
                        ->join('transactions', 'transactions.member_id', '=', 'members.id')
                        ->where('members.address', '=', 'Bandung')
                        ->where('members.gender', '=', 'P')
                        ->get();

        //no 12 
        $data12 = Transaction::select('members.name', 'members.phone_number', 'members.address','transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty')
                        ->join('members', 'transactions.member_id', '=', 'members.id')
                        ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->join('books', 'books.id', '=', 'transaction_details.book_id')
                        ->where('transaction_details.qty', '>', '1')
                        ->get();

        //no 13     
        $data13 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'books.title', )
                        ->selectRaw('transaction_details.qty * books.price as total_price')
                        ->join('members', 'transactions.member_id', '=', 'members.id')
                        ->join('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->join('books', 'transaction_details.book_id', '=', 'books.id')
                        ->get();

        //no 14
        $data14 = Transaction::select('members.name', 'members.phone_number', 'members.address', 'transactions.date_start', 'transactions.date_end', 'books.isbn', 'transaction_details.qty', 'books.title', 'publishers.name', 'authors.name', 'catalogs.name')
                        ->join('members', 'transactions.member_id', '=', 'members.id')
                        ->join('transaction_details', 'transactions.id', '=', 'transaction_details.transaction_id')
                        ->join('books', 'transaction_details.book_id', '=', 'books.id')
                        ->join('publishers', 'books.publisher_id', '=', 'publishers.id')
                        ->join('authors', 'books.author_id', '=', 'authors.id')
                        ->join('catalogs', 'books.catalog_id', '=', 'catalogs.id')
                        ->get();

        //no 15
        $data15 = Book::select('catalogs.id', 'catalogs.name', 'books.title')
                        ->join('catalogs', 'catalogs.id', '=', 'books.catalog_id')
                        ->get();

        //no 16
        $data16 = Book::select('books.*', 'publishers.name')
                        ->leftjoin('publishers', 'publishers.id', '=', 'books.publisher_id')
                        ->get();

        //no 17
        $data17 = Book::select('authors.id', 'books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'books.catalog_id', 'books.qty', 'books.price')
                        ->join('authors', 'authors.id', '=', 'books.author_id')
                        ->where('authors.id', '=', 'PG05')
                        ->get();

        //no18
        $data18 = Book::select('books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price')
                        ->where('books.price', '>', '10000')
                        ->get();

        //no19
        $data19 =  publisher::select('books.isbn', 'books.title', 'books.year', 'books.publisher_id', 'books.author_id', 'books.catalog_id', 'books.qty', 'books.price', 'publishers.name')
                        ->join('books', 'books.publisher_id', '=', 'publishers.id')
                        ->where('books.qty', '>', '10', 'AND', 'publishers.name', '=', 'Jacynthe Johnston')
                        ->get();

        //no 20
        $data20 = Members::select('members.*')
                        ->whereMonth('members.created_at', '=', '06')
                        ->get();

        //return $data20;
        return view('home');
    }
}
