<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $connection = "mysql";
    protected $table      = "user";
    protected $primaryKey = "id_user";
    public $incrementing  = false;
    public $timestamps    = false;

    protected $guarded    = [];

    public static function checkLogin($user_email, $password)
    {
        
    }
}
