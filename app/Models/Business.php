<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Time;


class Business extends Model
{
    use HasFactory, Time;


    protected $fillable = ([
        'website',
        'author_name',
        'business',
        'themes',
        'wp_version',  
        'duration',
        'admin_login_link',     
        'admin_username', 
        'admin_password',
        'auth_login_link',
        'auth_username',
        'auth_password',
        'database_name',
        'database_username',
        'database_password',
        'is_active',
        'priority',
        'expired_date',
    ]);
}
