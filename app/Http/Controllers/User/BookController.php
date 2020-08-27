<?php

namespace App\Http\Controllers\User;

use App\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class BookController extends Controller
{
    public function listaTodos(){


        $ejemplares= Book::mayor()
        ->orderBy('name','asc')->paginate(10);    
        
        return view('user.books.index', compact('ejemplares'));
    }
    public function listaLibros(){
        $ejemplares= Book::mayor()
        ->where('categoria', 'libros')
        ->orderBy('name','asc')->paginate(10);    
        
        return view('user.books.index', compact('ejemplares'));
    }
    public function listaRevistas(){
        $ejemplares= Book::mayor()->where('categoria', 'revistas')
        ->orderBy('name','asc')->paginate(10);   
        
        return view('user.books.index', compact('ejemplares'));
    }
    public function listaTesis(){
        $ejemplares= Book::mayor()->where('categoria', 'tesis')
        ->orderBy('name','asc')->paginate(10);   
        
        return view('user.books.index', compact('ejemplares'));
    }
    public function listaActas(){
        $ejemplares= Book::mayor()->where('categoria', 'actas')
        ->orderBy('name','asc')->paginate(10);   
        
        return view('user.books.index', compact('ejemplares'));
    }

    public function busquedaAvanzada(){
        return view('user.books.busqueda');
    }
    public function busqueda(Request $request){

        // dd($request);
        $nombre=$request->get('name');
        $autor=$request->get('autor');
        $año=$request->get('año');
        $volumen=$request->get('volumen');
        $categoria=$request->get('categoria');
        $palabra=$request->get('palabra');
        // $ejemplares= Book::orderBy('name','asc')
        // ->name($nombre)
        // ->autor($autor)
        // ->año($año)
        // ->paginate(10);  
          
        // busqueda completa
        // $ejemplares= Book::mayor()
        // ->busca($palabra)
        // ->orderBy('name','asc')->paginate(10);
        
        
        $ejemplares= Book::mayor()
        ->name($nombre)
        ->autor($autor)
        ->año($año)
        ->volumen($volumen)
        ->categoria($categoria)
        ->busca($palabra)
        ->orderBy('name','asc')->paginate(10);    
        // dd($ejemplares);
        return view('user.books.index', compact('ejemplares'));
    }
    
   


}
