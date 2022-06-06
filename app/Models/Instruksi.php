<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruksi extends Model
{
    use HasFactory;

    protected $table = 'tabel_instruksi';
    public $timestamps = false;
}
