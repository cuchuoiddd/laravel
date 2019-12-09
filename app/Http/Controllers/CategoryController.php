<?php

namespace App\Http\Controllers;
header('Access-Control-Allow-Origin: *');
use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorys = Category::with('books')->get();
        return response()->json([
            "data"=>$categorys,
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
        header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
        $category = Category::create($request->all());
        return response()->json([
            "data"=>$category,
            "success"=>true
        ]);
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
        $category = Category::find($id)->with('books')->get();
        return response()->json([
            "data"=>$category,
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
        $category = Category::find($id);
        $category->update($request->all());
        return response()->json([
            "data"=>$category,
            "success"=>true
        ]);
    }
    public function updateStatus(Request $request, $id)
    {
        //
        header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
        header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
        $category = Category::find($id);
        $category->status = $request->status;
        $category->save();
        return response()->json([
            "data"=>$category,
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
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            "data"=>$category,
            "success"=>true
        ]);
    }
}
