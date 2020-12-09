<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $connection = "mysql";
    protected $table      = "review";
    protected $primaryKey = "id_review";
    protected $guarded    = [ 'id_review' ];
    public $incrementing  = true;
    public $timestamps    = false;
}
