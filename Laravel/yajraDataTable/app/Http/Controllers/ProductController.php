<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import for this
use App\Yajra;
use Redirect, Response;

class ProductController extends Controller
{
    public function index() {

	    if(request()->ajax()) {
	    	print_r("lk");
	        return datatables()->of(Yajra::select('*'))
	        ->addColumn('action', 'DataTables.action')
	        ->rawColumns(['action'])
	        ->addIndexColumn()
	        ->make(true);
	    }
	    return view('yajra.list');
	}

	public function store(Request $request) {
		print_r("lk");
	    $productId = $request->product_id;
	    $product   =   Yajra::updateOrCreate(['id' => $productId],
	                ['title' => $request->title, 'product_code' => $request->product_code, 'description' => $request->description]);        
	    return Response::json($product);
	}

	public function edit($id) {   
	    $where = array('id' => $id);
	    $product  = Yajra::where($where)->first();
	  
	    return Response::json($product);
	}

	public function destroy($id) {
	    $product = Yajra::where('id',$id)->delete();
	  
	    return Response::json($product);
	}
}
