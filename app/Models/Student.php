<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Student extends Authenticatable implements JWTSubject
{
    protected $guarded = ['id'];

    protected $hidden = ['password', 'created_at', 'updated_at'];

    public function exams()
    {
        return $this->belongsToMany(Exam::class);
    }

    public function approve()
    {
        $this->update(['approve' => 1]);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->password = Hash::make($model->password);
        });

        self::updating(function ($model) {
            if ($model->isDirty('password'))
                $model->password = Hash::make($model->password);
        });
    }
}
