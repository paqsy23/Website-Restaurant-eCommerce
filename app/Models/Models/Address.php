<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "alamat";
    protected $primaryKey = "id";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $guarded    = [ 'id', 'status' ];

    public function City()
    {
        return $this->belongsTo(City::class, 'kota', 'id_kota');
    }
}
