<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guias extends Model
{
    use HasFactory;
    protected $table ='guias';
    protected $primaryKey = 'id';
    protected $fillable =['nombre','tema','descripcion','duracion','guia_aprendizaje'];
}
