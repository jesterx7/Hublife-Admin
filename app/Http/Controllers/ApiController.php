<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormHeader;
use App\Models\ValuesHeader;
use App\Models\ActionHeader;
use App\Models\Question;
use App\Models\Answer;
use App\Models\CareerPath;
use App\Models\ElementQuestion;
use App\Models\Value;
use App\Models\Action;

class ApiController extends Controller
{
    public function getForm() {
        $data = FormHeader::get();
        return json_encode($data);
    }

    public function insertForm(Request $request)
    {
        $result = [];
        $result['result'] = 1;
        $result['message'] = 'Data Form Berhasil Ditambahkan';
        try {
            $formHeader = new FormHeader;
            $formHeader->name = $request->name;
            $formHeader->email = $request->email;
            $formHeader->phone = $request->phone;
            $formHeader->gender = $request->gender;
            $formHeader->age = $request->age;
            $formHeader->save();

            $valuesList = explode(",", $request->values);
            foreach($valuesList as $value) {
                $valuesHeader = new ValuesHeader;
                $valuesHeader->value = $value;
                $valuesHeader->form_header_id = $formHeader->id;
                $valuesHeader->save();
            }

            $actionPlanList = $request->actionPlan;
            foreach($actionPlanList as $actionPlan) {
                $actionHeader = new ActionHeader;
                $actionHeader->action = $actionPlan["action"];
                $actionHeader->answer = $actionPlan["answer"];
                $actionHeader->form_header_id = $formHeader->id;
                $valuesHeader->save();
            }
        }
        catch(Exception $e) {
            $result['result'] = 0;
            $result['message'] = 'Data Form Gagal Ditambahkan';
        }

        return json_encode($result);
    }

    public function getQuestions() {
        $data = Question::with('answers')->get();
        return json_encode($data);
    }

    public function insertQuestions(Request $request)
    {
        $result = [];
        $result['result'] = 1;
        $result['message'] = 'Data Pertanyaan Berhasil Ditambahkan';
        try {
            $question = new Question;
            $question->question = $request->question;
            $question->save();
        }
        catch(Exception $e) {
            $result['result'] = 0;
            $result['message'] = 'Data Pertanyaan Gagal Ditambahkan';
        }

        return json_encode($result);
    }

    public function getAnswers() {
        $data = Answer::get();
        return json_encode($data);
    }

    public function insertAnswers(Request $request)
    {
        $result = [];
        $result['result'] = 1;
        $result['message'] = 'Data Jawaban Berhasil Ditambahkan';
        try {
            $answer = new Answer;
            $answer->answer = $request->answer;
            $answer->question_id = $request->question_id;
            $answer->save();
        }
        catch(Exception $e) {
            $result['result'] = 0;
            $result['message'] = 'Data Jawaban Gagal Ditambahkan';
        }

        return json_encode($result);
    }

    public function getCareers() {
        $data = CareerPath::with('careers')->get();
        return json_encode($data);
    }

    public function getElementQuestions() {
        $data = ElementQuestion::with('elementAnswers.element')->get();
        return json_encode($data);
    }

    public function getElementQuestionsBySeq(string $seq) {
        $data = ElementQuestion::where('seq', $seq)->with('elementAnswers.element')->first();
        return json_encode($data);
    }

    public function getValues() {
        $data = Value::orderBy('seq', 'ASC')->get();
        return json_encode($data);
    }

    public function getActions() {
        $data = Action::get();
        return json_encode($data);
    }
}
