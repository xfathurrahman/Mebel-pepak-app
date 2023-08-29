<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, $slug)
 * @method static find($slug)
 */
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image'
    ];

    protected $hidden = [];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

}
