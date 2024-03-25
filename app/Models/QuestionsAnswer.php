<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionsAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'subject_code', 'question', 'a', 'b', 'c', 'd', 'created_at', 'updated_at', 'correct_answer'];
}
