<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\studentStoreRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    public function index(){
        $students = Student::with('filiere')->orderBy('id','desc')->paginate(10);
        return view("students.index" , compact("students"));
    }
    public function create(){
        $filieres = Filiere::all();
        return view("students.create", compact("filieres"));
    }

    public function store(studentStoreRequest $request , Student $student){
        try{
            $student->filiere_id = $request->filiere_id;
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->email = $request->email;
            $student->mobile = $request->mobile;
            $student->save();
            if($student){
                return redirect()->route('student.index')->with("success_message","L'etudiant(e) $student->firstname $student->lastname a été enregistré avec succès!");
            }

        }
        catch(Exception $e){
            dd($e);
        }
    }
    
    public function edit(Student $student){
        $filieres = Filiere::all();
        return view("students.edit",compact('student',"filieres"));
    }

    public function update(UpdateStudentRequest $request,  Student $student){
        try{
            $student->filiere_id = $request->filiere_id;
            $student->firstname = $request->firstname;
            $student->lastname = $request->lastname;
            $student->email = $request->email;
            $student->mobile = $request->mobile;
            $student->update();
            return redirect()->route('student.index')->with("success_message","Mise à jour de l'etudiant(e) $student->firstname $student->lastname avec succès!");
        }
        catch(Exception $e){
            dd($e);
        }
    }

    public function delete(Student $student){
        try{
            $student->delete();
            return redirect()->route("student.index")->with("success_message","Suppression de l'etudiant(e) $student->firstname $student->lastname avec succès!");
        }   
        catch(Exception $e){
            dd($e);
        }
    }
}