<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "kategori";
    protected $primaryKey = "id_kategori";
    public $incrementing  = false;
    public $timestamps    = false;

    protected $guarded    = [];
}
