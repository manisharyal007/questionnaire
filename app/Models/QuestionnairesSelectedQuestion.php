<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnairesSelectedQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'questionnaire_id', 'subject_code', 'created_at',  'updated_at', 'question_id'];

}
