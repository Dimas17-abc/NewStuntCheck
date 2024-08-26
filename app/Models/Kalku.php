<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kalku extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'height', 'weight', 'gender', 'category', 'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

