<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Redirect,Response,DB;
use Datatables;

class YajraController extends Controller
{
    /**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function index()
{
    return view('yajra.index');
}
public function usersList() {
        $data = DB::table('products')->select('*');
        return datatables()->of($data)->addColumn('action', 'yajra.action')
        ->rawColumns(['action'])
        ->addIndexColumn()->make(true);
}
  
  
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function store(Request $request)
{  
    Artisan::command('question', function () {
    $name = $this->ask('What is your name?');

    $language = $this->choice('Which language do you program in?', [
        'PHP',
        'Ruby',
        'Python',
    ]);

    $this->line('Your name is '.$name.' and you program in '.$language.'.');
});
    $productId = $request->product_id;
    $product   =   Product::updateOrCreate(['id' => $productId],
                ['title' => $request->title, 'product_code' => $request->product_code, 'description' => $request->description]);        
    // return Response::json($product);
}
  
  
/**
 * Show the form for editing the specified resource.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{   
    $where = array('id' => $id);
    $product  = Product::where($where)->first();
  
    return Response::json($product);
}
  
  
/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Product  $product
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $product = Product::where('id',$id)->delete();
  
    return Response::json($product);
}
}
