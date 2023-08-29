<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'link_carousel',
        'slug',
        'image'
    ];

    protected $hidden = [];
}
