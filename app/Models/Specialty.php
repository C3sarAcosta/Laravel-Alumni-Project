<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    public function career(){
        return $this->belongsTo(Career::class, 'id_career', 'id');
    }
    use HasFactory;
}
