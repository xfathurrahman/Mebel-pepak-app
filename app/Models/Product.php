<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static where(string $string, int|string|null $id)
 * @method static id()
 * @method static find($id)
 */
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'description',
        'category_id',
        'quantity',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function images(): HasOne
    {
        return $this->hasOne(Image::class,'product_id','id');
    }
}
