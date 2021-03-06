<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class municipios extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'estado_id', 'codigo', 'nome'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function estados(){
        return $this->hasMany('App\Models\estados');
    }
}
