<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "cart";
    protected $primaryKey = "id";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $guarded    = [ 'id', 'pesan' ];
}
