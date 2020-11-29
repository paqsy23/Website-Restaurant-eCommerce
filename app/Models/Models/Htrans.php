<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Htrans extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "htrans";
    protected $primaryKey = "id_trans";
    public $incrementing  = false;
    public $timestamps    = false;

    protected $guarded    = [ 'status' ];

    public function Dtrans()
    {
        return $this->hasMany(Dtrans::class, 'id_htrans', 'id_trans');
    }

    public function City()
    {
        return $this->belongsTo(City::class, 'kota', 'id_kota');
    }
}
