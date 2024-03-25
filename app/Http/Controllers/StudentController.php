<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\QuestionnairesStudentsTokenlink;
use App\Models\QuestionnairesSelectedQuestion;
use Illuminate\Support\Facades\Redirect;
use App\Models\Questionnaire;
use App\Models\Subject;
use App\Models\QuestionsAnswer;
use App\Models\Examination;

class StudentController extends Controller
{
    public function studentLogin(Request $request)
    {
        return view('students.login');
    }

    public function findEmail(Request $request)
    {
        $student = Student::where('email', $request->email)->first();
        if (!$student) {
            return back()->with('message', 'No email found');
        }
        return Redirect::route('student.questionnaires', ['student_id' => $student->id]);        
    }

    public function studentQuestionnaire($student_id)
    {
        $studentQuestionnaires = QuestionnairesStudentsTokenlink::where('student_id', $student_id)->get();
        foreach($studentQuestionnaires as $studentQuestionnaire) {
            $questionnaire_ids[] = $studentQuestionnaire['questionnaire_id'];
        }
        $questionnaire_ids = (array) $questionnaire_ids;
        $questionnaires = Questionnaire::whereIn('id', $questionnaire_ids)->get();
        return view('students.student_questionnaires', compact('studentQuestionnaires', 'questionnaires', 'student_id'));
    }

    public function myExam($student_id, $token_link)
    {
        $questionnairesStudentsTokenlink = QuestionnairesStudentsTokenlink::where('token_link', $token_link)->firstOrFail();
        $questionnaire_id = $questionnairesStudentsTokenlink->questionnaire_id;
        $questionnaire = Questionnaire::findOrFail($questionnaire_id);
        $subjects = Subject::get()->toArray();
        $questionnairesSelectedQuestions = QuestionnairesSelectedQuestion::where('questionnaire_id', $questionnaire_id)->select('subject_code','question_id')->get();
        $questions_answers = QuestionsAnswer::all();
        
        return view('students.student_exam', compact('student_id', 'token_link', 'questionnaire','questionnaire_id', 'subjects', 'questionnairesSelectedQuestions', 'questions_answers'));
    }

    public function answerSubmit(Request $request)
    {
        foreach ($request->question_id as $key => $question_id) {

            $data = [
                    'student_id' => $request->student_id,
                    'questionnaire_id' => $request->questionnaire_id,
                    'question_id' => $question_id,
                    'answer_by_student' => $request->get($question_id)
                    // Add other fields and their values as needed
                ];
                $newRecord = Examination::create($data);
        }

        return Redirect::route('student.questionnaires', ['student_id' => $request->student_id ]);
    }
}
