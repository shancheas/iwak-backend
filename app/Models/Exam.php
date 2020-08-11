<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = ['id'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function deactivate()
    {
        $this->active = 0;
        $this->save();
    }
}
