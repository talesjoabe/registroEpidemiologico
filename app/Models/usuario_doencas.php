<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuario_doencas extends Model
{
    use HasFactory, SoftDeletes;

    // Tratado = 0
    // Tratando = 1
    // Curado = 2


    protected $fillable = [
        'usuario_id', 'doenca_id', 'comentarios', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->hasMany('App\User', 'usuario_id');
    }

    public function doencas(){
        return $this->hasMany('App\doencas');
    }
}
