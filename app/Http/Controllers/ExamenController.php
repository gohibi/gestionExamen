<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Examen;
use App\Models\Student;
use App\Models\Resultat;
use Illuminate\Http\Request;
use App\Http\Requests\storeExamenNoteRequest;

class ExamenController extends Controller
{

    public function index(){
        $examens = Examen::with('course')->paginate(10);
        return view("examens.index" , compact("examens"));
    }
    public function create(){
        $courses = Course::all();
        return view("examens.create", compact("courses"));
    }

    public function store(Request $request){
        $validation = $request->validate([
            "title" =>"required",
            "date" => "required|date",
            "course_id" => "required|exists:courses,id"
        ]);

        Examen::create($validation);
        return redirect()->route('examen.index')->with("success_message","L'examen  a été enregistré avec succès!");
    }

    public function edit(Examen $examen){
        $courses = Course::all();
        return view("examens.edit",compact("examen","courses"));
    }

    public function update(Request $request , Examen $examen){
        $validation = $request->validate([
            "title" =>"required",
            "date" => "required|date",
            "course_id" => "required|exists:courses,id"
        ]);
        $examen -> title = $request -> title;
        $examen -> date = $request -> date;
        $examen -> course_id = $request -> course_id;
        $examen -> update($validation);
        // Examen::where('id',$examen->id).update($validation);
        return redirect()->route('examen.index')->with("success_message","Mise à jour de l'examen $examen->title avec succès!");

    }

    public function delete(Examen $examen){
       $result =  $examen -> delete();
       if ($result){
        return redirect()->route("examen.index")->with("success_message","Suppression de l'examen avec succès!");
       }
        
    }


    public function showResult(){
        $resultats = Resultat::paginate(10);
        return view("examens.resultshow", compact("resultats"));
    }

    public function createNote(){
        $students = Student::all();
        $examens = Examen::all();

        return view("examens.create-note" , compact("students","examens"));
    }

    public function storeNote(storeExamenNoteRequest $request){
        $note = $request->note;
        $grade = "Nulle";

        if($note <= 5 ){
            $grade = "Nulle";
        }elseif($note <= 7 ){
            $grade = "Faible";
        }elseif($note <= 9 ){
            $grade = "Insuffisant";
        }
        elseif($note <= 11 ){
            $grade = "Passable";
        }
        elseif($note <= 13 ){
            $grade = "Assez-bien";
        }
        elseif($note <= 15 ){
            $grade = "Bien";
        }
        elseif($note <= 17 ){
            $grade = "Tres-bien";
        }
        elseif($note <= 19 ){
            $grade = "Excellent";
        }
        elseif($note <= 20 ){
            $grade = "Honorable";
        }

        $query = Resultat::create(
            [
                "note"  => $request->note,
                "grade" => $grade,
                "student_id" => $request->student_id,
                "examen_id" => $request->examen_id,

            ]);

        if($query){
            return redirect()->route("examen.index")->with("success_message","Note enregistrée avec succès! ");
        }

    }


}
