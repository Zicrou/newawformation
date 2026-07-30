<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\HasUuid;
use App\Models\CartItem;

class Cart extends Model
{
    use HasFactory, HasUuid;
    // use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'paid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(CartItem::class);
    }

    
}
