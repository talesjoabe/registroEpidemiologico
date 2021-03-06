<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class doencas extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'cid', 'nome'
    ];

    protected $dates = ['deleted_at'];

    public function usuario_doenca(){
        return $this->hasMany('App\Models\usuario_doenca');
    }
}
