<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSurvey extends Model
{
    public function graduate()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
