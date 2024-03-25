<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','questionnaire_id','question_id','answer_by_student','created_at','updated_at' ];
}
