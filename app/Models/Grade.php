<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Add this line


class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_name', 'course_code', 'credit_hours', 'grade', 'term'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

