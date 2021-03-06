<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class usuario_doencas extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_TRATADO                = 0;
    const STATUS_TRATANDO             = 1;
    const STATUS_CURADO               = 2;
    const STATUSES = [
        self::STATUS_TRATADO                 => 0,
        self::STATUS_TRATANDO            => 1,
        self::STATUS_CURADO               => 2,
    ];

    protected $fillable = [
        'usuario_id', 'doenca_id', 'comentarios', 'status'
    ];

    protected $dates = ['deleted_at'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function doencas(){
        return $this->belongsTo('App\doencas');
    }
}
