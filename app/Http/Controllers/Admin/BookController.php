<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;
use Illuminate\Validation\Rule;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.books.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required|unique:books',
            'autor'=>'required',
            'año'=>'required|numeric|min:1800',
            'cantidad'=>'required|numeric|min:1',
            'volumen'=>'nullable|numeric|min:0',
        ],[
            'name.required' =>'El campo titulo es obligatorio',
            'name.unique' =>'El titulo ya existe',
            'autor.required' =>'El campo autor es obligatorio',
            'año.required' =>'El campo año es obligatorio',
            'año.numeric' =>'El campo año debe ser un numero',
            'año.min' =>'Ingrese un año valido',
            'cantidad.required' =>'El campo cantidad es obligatorio',
            'cantidad.numeric' =>'El campo cantidad debe ser un numero',
            'cantidad.min' =>'Ingrese una cantidad valida',
            'volumen.numeric' =>'El campo volumen debe ser un numero',
        ]);
        $book=Book::create($request->all());
        
        return redirect('/');
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
        
        $book=Book::find($id);
        return view('admin.books.edit', compact('book'));
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
        // dd($request);
        $this->validate($request,[
            'name'=>['required', Rule::unique('books')->ignore($id)],
            'autor'=>'required',
            'año'=>'required|numeric|min:1800',
            'cantidad'=>'required|numeric|min:1',
            'volumen'=>'nullable|numeric|min:0',
        ],[
            'name.required' =>'El campo nombre es obligatorio',
            'autor.required' =>'El campo autor es obligatorio',
            'año.required' =>'El campo año es obligatorio',
            'año.numeric' =>'El campo año debe ser un numero',
            'año.min' =>'Ingrese un año valido',
            'cantidad.required' =>'El campo cantidad es obligatorio',
            'cantidad.numeric' =>'El campo cantidad debe ser un numero',
            'cantidad.min' =>'Ingrese una cantidad valida',
            'volumen.numeric' =>'El campo volumen debe ser un numero',
        ]);
        $book=Book::find($id);
        $book->fill($request->all())->save();

        return redirect()->route('lista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book=Book::find($id)->delete();

        return back();
    }
}
