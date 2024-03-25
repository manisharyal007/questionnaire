<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionnairesStudentsTokenlink extends Model
{
    use HasFactory;
    protected $fillable = ['questionnaire_id', 'student_id', 'token_link', 'created_at', 'updated_at'];
    protected $table = 'questionnaires_students_token_links';
}
