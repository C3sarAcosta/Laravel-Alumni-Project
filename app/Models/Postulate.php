<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulate extends Model
{
    public function job()
    {
        return $this->belongsTo(CompanyJobs::class, 'job_id', 'id');
    }

    public function graduate()
    {
        return $this->belongsTo(User::class, 'graduate_id', 'id');
    }
    use HasFactory;
}
