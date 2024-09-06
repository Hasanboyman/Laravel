<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Product extends Authenticatable
{

    use HasFactory, Notifiable;

    protected $table = 'product';

    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

}
