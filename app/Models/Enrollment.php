<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\HasUuid;
use App\Models\CartItems;

class Enrollment extends Model
{
    use HasFactory, HasUuid;
    // use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'cours_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cours()
    {
        return $this->belongsTo(Cours::class);
    }

    
}
