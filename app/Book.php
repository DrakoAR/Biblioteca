<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name','slug', 'autor','cantidad','referencia','año','volumen','categoria'
    ];
    public function prestamos()
    {
    	return $this->hasMany('App\Prestamo');
            }

    // Scope

    

    public function scopeName($query, $name){
       
        if($name)
            return $query->where('name','LIKE',"%$name%");
    }
    public function scopeAutor($query, $autor){
       
        if($autor)
            return $query->where('autor','LIKE',"%$autor%");
    }
    public function scopeAño($query, $año){
       
        if($año)
            return $query->where('año','LIKE',"%$año%");
    }
    public function scopeVolumen($query, $volumen){
       
        if($volumen)
            return $query->where('volumen','LIKE',"%$volumen%");
    }
    public function scopeCategoria($query, $categoria){
       
        if($categoria)
            return $query->where('categoria','LIKE',"%$categoria%");
    }
    
    public function scopeBusca($query, $palabra){
       
        // $palabra=$request->input('palabra');

        return $query->where('name','LIKE', "%$palabra%")
        ->orWhere('autor','LIKE', "%$palabra%")
        ->orWhere('año','LIKE', "%$palabra%");
    //  return  Book::when($palabra, function ($query) use ($palabra) {
    //         return $query->where('name','LIKE', "%$palabra%");
    //     })
    //     ->when($palabra, function ($query) use ($palabra) {
    //         return $query->where('autor','LIKE', "%$palabra%");
    //     })
    //     ->when($palabra, function ($query) use ($palabra) {
    //         return $query->where('año','LIKE', "%$palabra%");
    //     });
        
        // if($request->has('name'))
        //     return $query->where('name','LIKE',"%$request->input('name')%");
        // if($request->has('auto'))
        //     return $query->where('autor','LIKE',"%$request->input('autor')%");
        // if($request->has('año'))
        //     return $query->where('año','LIKE',"%$request->input('año')%");
    }

    public function scopeMayor($query){

        return $query->where('cantidad', '>', 0); 
    }
}
