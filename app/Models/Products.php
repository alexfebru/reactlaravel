<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Products extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'product';

    protected $fillable = [
        'title',
        'price',
        'description',
        'category',
        'image',
    ];
}
