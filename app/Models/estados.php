<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class estados extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'sigla', 'nome'
    ];

    public function municipios(){
        return $this->belongsTo('App\municipios');
    }
}
