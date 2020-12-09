<?php

namespace App\Models\Models;

// use App\Models\review;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dtrans extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "dtrans";
    protected $primaryKey = "id_dtrans";
    public $incrementing  = true;
    public $timestamps    = false;

    protected $guarded    = [ 'id_dtrans' ];

    public function Menu()
    {
        return $this->belongsTo(Menu::class, 'id_barang', 'id_barang');
    }
    // public function review()
    // {
    //     return $this->hasMany(review::class,"id_dtrans","id_dtrans");
    // }
}
