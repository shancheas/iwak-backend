<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * @var Course
     */
    private $model;

    public function __construct()
    {
        $this->model = app(Course::class);
    }

    public function show($id) {
        $course = $this->model->find($id);
        return response([
            'course' => $course
        ]);
    }

    public function store($examId, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
