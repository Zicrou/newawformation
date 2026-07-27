<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\HasUuid;

class OrderItems extends Model
{
    use HasFactory, HasUuid;
    // use SoftDeletes;
    
    protected $fillable = [
        "order_id",
        "cours_id",
        "price"
    ];

    public function order()
    {
        return $this->belongsTo(Orders::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    
}
