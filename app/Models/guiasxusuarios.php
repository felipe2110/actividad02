<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guiasxusuarios extends Model
{
    use HasFactory;
    protected $table ='guiasxsuarios';
    protected $primaryKey = 'id';
    protected $fillable =['users_id','guias_id'];
}
