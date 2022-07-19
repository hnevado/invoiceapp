<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;


    protected $fillable = [
         'id_usuario',
         'nombre',
         'empresa',
         'email',
         'nif_cif',
         'telefono',
         'direccion',
         'ciudad',
         'provincia',
         'pais',
    ];

}
