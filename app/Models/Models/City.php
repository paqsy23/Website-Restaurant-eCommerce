<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "kota";
    protected $primaryKey = "id_kota";
    public $incrementing  = false;
    public $timestamps    = false;
}
