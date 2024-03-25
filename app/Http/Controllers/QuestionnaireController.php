<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questionnaire;
use Illuminate\Support\Str;
use App\Models\QuestionsAnswer;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\Mail;
use App\Models\QuestionnairesSelectedQuestion;
use Carbon\Carbon;
use App\Models\QuestionnairesStudentsTokenlink;
use DB;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::all();
        return view('questionnaires.index', compact('questionnaires'))->with('success', 'Welcome to the Questionnaire Dashboard!');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questionnaires.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // public function sendEmail()
    // {
    //     $data = array('name'=>"Virat Gandhi");
    //     Mail::send('mail', $data, function($message) {
    //        $message->to('abc@gmail.com', 'Tutorials Point')->subject
    //           ('Laravel HTML Testing Mail');
    //        $message->from('xyz@gmail.com','Virat Gandhi');
    //     });
    //     echo "HTML Email Sent. Check your inbox.";
    // }

    public function store(Request $request)
    {
    
        $request->validate([
            'title' => 'required|unique:questionnaires,title',
            'expiry_date' => 'required|date',
        ]);
        $data = $request->except('_token'); // Exclude CSRF token
        $data['exam_code'] = Str::random(5);
        $questionnaire = Questionnaire::create($data); //store questionare

        /* For questionnaires selected questions */

        /* for Subject Codes */
        $subject_physics_code = Subject::all()[0]['code'];
        $subject_chemistry_code = Subject::all()[1]['code'];

        /* Five random questions from physics */
        $physics_random_5_qa = QuestionsAnswer::where('subject_code',$subject_physics_code)->inRandomOrder()->limit(5)->get();

        /* Five random questions from chemistry */
        $chemistry_random_5_qa = QuestionsAnswer::where('subject_code', $subject_chemistry_code)->inRandomOrder()->limit(5)->get();

        //for Physics Questionnaires Selected Questions            
        for ($i = 0; $i < 5; $i++) {
            $physics_questionnaires_selected_questions = new QuestionnairesSelectedQuestion();
            $physics_questionnaires_selected_questions->subject_code = $subject_physics_code;
            $physics_questionnaires_selected_questions->question_id = $physics_random_5_qa[$i]['id'];
            $physics_questionnaires_selected_questions->questionnaire_id = $questionnaire->id;
            //QuestionnairesSelectedQuestion::create($physics_questionnaires_selected_questions);
            $physics_questionnaires_selected_questions->save();
        }
        //For Chemistry Questionnaires Selected Questions
        for ($i = 0; $i < 5; $i++) {
            $chemistry_questionnaires_selected_questions = new QuestionnairesSelectedQuestion();

            $chemistry_questionnaires_selected_questions->subject_code = $subject_chemistry_code;
            $chemistry_questionnaires_selected_questions->question_id = $chemistry_random_5_qa[$i]['id'];
            $chemistry_questionnaires_selected_questions->questionnaire_id = $questionnaire->id;
            $chemistry_questionnaires_selected_questions->save();
        }

        //For all students with unique url token link and Questionnaires Students Token Links

        $students = Student::all();
        $count_students = count($students);
        for ($i = 0; $i < $count_students; $i++) {
            $randomTokenLink = Str::random(10);
            $questionnaires_students = [];
            $questionnaires_students['questionnaire_id'] = $questionnaire->id; 
            $questionnaires_students['student_id'] = $students[$i]['id'];
            $questionnaires_students['token_link'] = $randomTokenLink;
            //$questionnaires_students->save();
            DB::table('questionnaires_students_token_links')->insert($questionnaires_students);
            // $uniqueUrl[] = url('/questionnaire/' . $questionnaire->id . '/response/' . $student->id . '/'. $randomTokenLink);
        }

        return redirect()->route('questionnaires.index')->with('success', 'Questionnaire created successfully!');

    }

    public function activeQuestionnaire(Request $request)
    {
        $now = Carbon::now();
        $questionnaires = Questionnaire::where('expiry_date', '>' , $now )->get();
        return view('questionnaires.activeindex', compact('questionnaires'))->with('success', 'Welcome to the Active Questionnaire Dashboard!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
