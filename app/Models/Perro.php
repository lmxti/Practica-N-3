<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perro extends Model{
    use HasFactory;

    protected $table = 'perros';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Ver que es fillable
    protected $fillable = [
        "name",
        "url",
        "descripcion"
    ];
}
