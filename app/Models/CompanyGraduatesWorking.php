<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyGraduatesWorking extends Model
{
    public function surveyTwo()
    {
        return $this->belongsTo(CompanySurveyTwo::class, 'company_survey_id', 'id');
    }
    
    use HasFactory;
}
