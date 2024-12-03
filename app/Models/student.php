<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Administrative_notes;

class student extends Model
{
    //
    public function administrativeNotes()
    {
        return $this->hasMany(Administrative_notes::class, 'id_student');
    }

}
