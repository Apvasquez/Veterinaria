<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bar extends Model
{
    protected $fillable = ["nombre","abierto","campus_id"];

    use HasFactory;
}
