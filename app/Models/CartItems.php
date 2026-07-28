<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\HasUuid;

class CartItems extends Model
{
    use HasFactory, HasUuid;
    // use SoftDeletes;
    
    protected $fillable = [
        'cours_id',
        'cart_id',
    ];

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    
}
