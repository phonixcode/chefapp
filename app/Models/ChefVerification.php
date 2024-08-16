<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChefVerification extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 
        'certificate',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
