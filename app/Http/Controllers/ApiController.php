<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Books;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index(){
        $libros = Books::with('author')->get();
        return response()->json($libros);
    }

    public function store(Request $request){
        try{
            $request->validate([
                'title' => 'required|string',
                'author_id' => 'required|integer',
                'published_year' => 'required|integer',
            ]);

            $book = new Books();
            $book->title = $request -> input('title');
            $book->author_id = $request -> input('author_id');
            $book->published_year = $request -> input('published_year');
            $book->save();

        }catch(\Exception $e){
            return response()->json(['error'=>'Error'], 500);
        }
    }
}
