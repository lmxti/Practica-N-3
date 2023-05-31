<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interaccion extends Model
{
    use HasFactory;

    protected $table = 'interacciones';
    public $timestamps = true;

    protected $fillable = [
        "idPerroInteresado",
        "idPerroCandidato",
        "preferencia"
    ];

    public function perroInteresado(){
        return $this->belongsTo(Perro::class, 'idPerroInteresado');
    }
    public function perroCandidato(){
        return $this->belongsTo(Perro::class, 'idPerroCandidato');
    }
}
