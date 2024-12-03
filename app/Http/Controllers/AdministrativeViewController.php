<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Administrative_notes;

class AdministrativeViewController extends Controller
{
    //
    public function redirectView(Request $request){
        $id = $request->id;
        $notes = Administrative_notes::where('id_student', '=', $id)->get();
        return view('administrative_notes', compact('id', 'notes'));
    }

    public function addNote(Request $request){
        $data = new Administrative_notes();
        $data->notes = $request->notes;
        $data->id_student = $request->id_student;
        $data->save();

        $notes = Administrative_notes::where('id_student', '=', $request->id_student)->get();
        return view('administrative_notes', ['id' => $request->id_student, 'notes' => $notes]);
    }
}
