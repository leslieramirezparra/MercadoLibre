<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // use UploadFile;

    // public function home()
    // {
    //     $books=Book::with('author','category','file')->whereHas('category')->get();
    //     return view('index',compact('books'));
    // }

    public function index(Request $request)
    {
        $products = Product::get();
		return view('index', compact('products'));
        // $books=Book::with('author','category', 'file')->whereHas('category')->get();
        // if(!$request->ajax()) return view('products.index',compact('products'));
        //     return response()->json(['products'=> $products],200);
    }

    // public function store(BookRequest $request)
    // {
    //     try{
    //         DB::beginTransaction();
    //         $book=new Book($request->all());
    //         $book->save();
    //         $this->uploadFile($book, $request);
    //         DB::commit();
    //         if(!$request->ajax()) return back()->with('success','Book created');
    //             return response()->json(['status'=>'Book created','book'=>$book],201);
    //     } catch (\Throwable $th){
    //         DB::rollback();
    //         throw $th;
    //     }
    // }
    // public function show(Request $request, Book $book)
    // {
    //     if(!$request->ajax()) return view();
    //     return response()->json(['book'=>$book],200);
    // }
    // public function update(BookUpdateRequest $request, Book $book)
    // {
    //     try{
    //         DB::beginTransaction();
    //         $book->update($request->all());
    //         $this->uploadFile($book, $request);
    //         DB::commit();
    //         if(!$request->ajax()) return back()->with('success','Book update');
    //             return response()->json([],204);
    //         } catch (\Throwable $th){
    //             DB::rollback();
    //             throw $th;
    //         }
    // }
    // public function destroy(Request $request, Book $book)
    // {
    //     $book->delete();
    //     $this->deleteFile($book);
    //     if(!$request->ajax()) return back()->with('success','Book deleted');
    //         return response()->json([],204);
    // }
}
