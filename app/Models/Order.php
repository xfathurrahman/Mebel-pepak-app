<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, int|string|null $id)
 * @method static find($id)
 */
class Order extends Model
{
    use HasFactory;

    protected $table= 'order';
    protected $fillable = [
        'user_id',
        'name',
        'phone_number',
        'address',
        'status',
        'message',
        'tracking_no',
    ];

    public function paymentimage(): HasOne
    {
        return $this->hasOne(PaymentImage::class,'order_id','id');
    }

    public function orderitem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

}
