<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "promo";
    protected $primaryKey = "id_promo";
    public $incrementing  = false;
    public $timestamps    = false;

    protected $guarded    = [];
}
