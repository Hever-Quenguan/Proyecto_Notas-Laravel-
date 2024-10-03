<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'excerpt',
        'content',
        'usu_id', // el ID del usuario
        'categoria', // categoría
        'fechcre',
        'fecha_vencimiento',
        'imagen',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'usu_id');
    }
   
}
