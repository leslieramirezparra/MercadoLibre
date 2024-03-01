<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Traits\UploadFile;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Request\Product\ProductUpdateRequest;

class ProductController extends Controller
{
    use UploadFile;

    public function home()
    {
        $products=Product::with('category','file')->where('stock', '>', 0)->get();
        return view('index',compact('products'));
    }

    public function index(Request $request)
    {
        $products=Product::with('category','file')->get();
        if(!$request->ajax()) return view('products.index',compact('products'));
            return response()->json(['products'=> $products],200);
    }

    public function store(ProductRequest $request)
    {
        try{
            DB::beginTransaction();
            $product=new Product($request->all());
            $product->save();
            $this->uploadFile($product, $request);
            DB::commit();
            if(!$request->ajax()) return back()->with('success','Product created');
                return response()->json(['status'=>'Product created','product'=>$product],201);
        } catch (\Throwable $th){
            DB::rollback();
            throw $th;
        }
    }
    public function show(Request $request, Product $product)
    {
        if(!$request->ajax()) return view();
        return response()->json(['product'=>$product],200);
    }
    public function update(ProductUpdateRequest $request, Product $product)
    {
        try{
            DB::beginTransaction();
            $product->update($request->all());
            $this->uploadFile($product, $request);
            DB::commit();
            if(!$request->ajax()) return back()->with('success','Product update');
                return response()->json([],204);
            } catch (\Throwable $th){
                DB::rollback();
                throw $th;
            }
    }
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $this->deleteFile($product);
        if(!$request->ajax()) return back()->with('success','Product deleted');
            return response()->json([],204);
    }
}
