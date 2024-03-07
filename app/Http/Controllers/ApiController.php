<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormHeader;
use App\Models\Question;
use App\Models\Answer;

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
            $formHeader->nama = $request->nama;
            $formHeader->email = $request->email;
            $formHeader->nomor_telepon = $request->nomor_telepon;
            $formHeader->gender = $request->gender;
            $formHeader->umur = $request->umur;
            $formHeader->save();
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
}