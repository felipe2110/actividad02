<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guiasxusuarios extends Model
{
    use HasFactory;
    protected $table ='guiasxusuarios';
    protected $primaryKey = 'id';
    protected $fillable =['aprendices_id','guias_id'];
}
