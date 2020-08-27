<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use Auth;
use App\Prestamo;
use Carbon\Carbon;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos= Prestamo::where('user_id', Auth::User()->id)
        ->whereNull('registro_fin')
        ->orderBy('id','DESC')->paginate(10);

        // dd($prestamos); 

        return view('user.prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($book_id)
    {
        $book= Book::findOrFail($book_id);
        if ($book->cantidad <=0) {
            return redirect()->route('lista');
        }
           
        
        $fecha= Carbon::now()->toDateString();
        //   dd($fecha);

        // dd($book->name);
        return view('user.prestamos.create', compact('book','fecha')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $book= Book::findOrFail($request->book_id);
        if ($book->cantidad >0) {
            $book->decrement('cantidad');
            $book->save();
        }
       
        $registro= Prestamo::create($request->all());

        return redirect()->route('prestamos');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $prestamo= Prestamo::find($id);
        // dd($prestamo);
        $prestamo->registro_fin= Carbon::now()->toDateString();
        // dd($prestamo->registro_fin);
        $prestamo->save();
        $book=Book::find($prestamo->book->id);
        $book->increment('cantidad');
        $book->save();
       
        // $prestamo->delete();

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin.prestamos');    
        }
        return redirect()->route('prestamos');

    }
}
