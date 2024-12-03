<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;

class StudentController extends Controller
{
    public function showAll(){
        $students = student::where('status', '=', true)->get();
        return view('students', compact('students'));
    }

    public function save(Request $request){
        $data = new student();
        $data->name = $request->name;
        $data->lastname = $request->lastname;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->status = TRUE;
        $data->save();
        return redirect()->back();
    }

    public function delete(Request $request){
        $student = Student::find($request->id);
        if ($student) {
            $student->status = false;
            $student->save();
    
            // Redirigir o devolver respuesta
            /*return redirect()->route('students')
                ->with('success', 'Estudiante actualizado exitosamente');*/
        }
        //return redirect()->route('students')->with('error', 'Estudiante no encontrado');
        return redirect()->back();
    }

    public function modify(Request $request){
        $student = Student::find($request->id);
        if ($student) {
            if ($request->has('name') && $request->name !== null)
                $student->name = $request->name;

            if ($request->has('lastname') && $request->lastname !== null)
                $student->lastname = $request->lastname;

            if ($request->has('address') && $request->address !== null) 
                $student->address = $request->address;

            if ($request->has('email') && $request->email !== null)
                $student->email = $request->email;

            if ($request->has('phone') && $request->phone !== null) 
                $student->phone = $request->phone;

            $student->save();

        }
        //return redirect()->back();
        return view('welcome');
    }

    public function redirectModifyView(Request $request){
        $id = $request->id;
        return view('modify_student', compact('id'));
    }

    
}
