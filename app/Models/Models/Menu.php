<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "barang";
    protected $primaryKey = "id_barang";
    public $incrementing  = false;
    public $timestamps    = false;

    protected $guarded    = [];

    public function category()
    {
        return $this->hasMany(Category::class, 'id_kategori', 'id_kategori');
    }
}
