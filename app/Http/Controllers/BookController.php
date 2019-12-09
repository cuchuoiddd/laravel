<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        header('Access-Control-Allow-Origin: *');
        $books = Book::with('category')->get();
        return response()->json([
            "data"=>$books,
            "success"=>true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
        $book = Book::where('code', $request->get('code'))->first();
        if ($book !== null) {
            dd(1);
            return response()->json([
                "success"=>false,
                "error"=>"book already exist"
                ]);
            } else {
            $book = Book::create($request->all());
            return response()->json([
                "data"=>$book,
                "success"=>true
            ]);
        }
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
        header('Access-Control-Allow-Origin: *');
        $book = Book::find($id);
        $book->category;
        return response()->json([
            "data"=>$book,
            "success"=>true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        header('Access-Control-Allow-Origin: *');
        $book = Book::find($id);
        $book->update($request->all());
        return response()->json([
            "data"=>$book,
            "success"=>true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        header('Access-Control-Allow-Origin: *');
        $book = Book::find($id);
        $book->delete();
        return response()->json([
            "data"=>$book,
            "success"=>true
        ]);
    }
}
