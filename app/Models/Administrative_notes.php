<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\student;

class Administrative_notes extends Model
{
    //
    public function student()
    {
        return $this->belongsTo(student::class, 'id_student');
    }
}
