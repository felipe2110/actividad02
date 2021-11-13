<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendices extends Model
{
    use HasFactory;
    protected $table ='aprendices';
    protected $primaryKey = 'id';
    protected $fillable =['genero','ficha','users_id'];
}
