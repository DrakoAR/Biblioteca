<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
        protected $fillable = [
                'book_id', 'user_id', 'devolucion','registro_inicio', 'registro_fin',
            ];        
    public function user()
    {
    	return $this->belongsTo('App\User');
                }
    
    public function book()
                {
        return $this->belongsTo('App\Book');
                }
}
