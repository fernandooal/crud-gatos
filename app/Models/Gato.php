<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gato extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'idade',
        'raca',
        'peso',
        'sexo',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
