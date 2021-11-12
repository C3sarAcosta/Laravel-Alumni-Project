<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveySix extends Model
{
    public function graduate()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    use HasFactory;
}
