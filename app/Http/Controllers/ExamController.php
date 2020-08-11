<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * @var Exam
     */
    private $model;

    public function __construct()
    {
        $this->model = app(Exam::class);
    }

    public function index()
    {
        $exams = $this->model->with('courses')->get();
        return response([
            'exams' => $exams
        ]);
    }

    public function show($id)
    {
        $exams = $this->model->with('courses')->find($id);
        return response([
            'exam' => $exams
        ]);
    }

    public function store(Request $request)
    {
        $name = $request->get('name');
        $date = Carbon::createFromTimeString($request->get('date'), 'Asia/Jakarta');
        $this->model->insert([
            'name' => $name,
            'date' => $date
        ]);


        return response([
            'message' => 'Berhasil Menyimpan Ujian'
        ]);
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();
    }

    public function deactivate()
    {
        $this->model->find(1)->deactivate();
    }
}
