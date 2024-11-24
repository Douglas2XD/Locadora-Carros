<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    protected $fillable = ["modelo","tipo","ano","data_cadastro","valor","foto"];
}
