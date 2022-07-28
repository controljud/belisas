<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Styles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'background', 'font'
    ];
    protected $table = "tb_styles";
}
