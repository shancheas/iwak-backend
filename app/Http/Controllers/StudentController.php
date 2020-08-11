<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * @var Student
     */
    private $model;

    public function __construct()
    {
        $this->model = app(Student::class);
    }

    public function index()
    {
        $students = $this->model->all();

        return response([
            'students' => $students
        ]);
    }

    public function store(Request $request)
    {
        $params = $request->all();

        $this->model->create($params);
    }

    public function show($id)
    {
        $student = $this->model->find($id)->get();

        return response($student);
    }

    public function update($id, Request $request)
    {

    }

    public function approve($id)
    {
        $this->model->find($id)->approve();

        return response([
            'message' => 'Siswa telah diverifikasi'
        ]);
    }
}
