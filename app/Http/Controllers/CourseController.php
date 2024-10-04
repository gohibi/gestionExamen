<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\courseRequest;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::orderBy('id', 'desc')->paginate(10);
        return view("courses.index",compact('courses'));
    }

    public function create(){
        return view("courses.create");
    }

    public function store(courseRequest $request){
        try{
            $query = Course::create($request->all());
            if($query){
                return redirect()->route('course.index')->with("success_message","Cours enregistré avec succès!");
            }
        }
        catch(Exception $e){
            dd($e);
        }
    }


    public function edit(Course $course){
        return view("courses.edit",compact("course"));
    }

    public function update(courseRequest $request ,Course $course){
        try{
            $course -> name = $request-> name;
            $course -> description = $request -> description;
            $course -> update();

            return redirect()->route('course.index')->with("success_message","Le cours intitulé $course->name a été modifié avec succàs!");

        } catch(Exception $e){
            dd($e);
        }
    }

    public function delete(Course $course){
        try{
            $course->delete();
            return redirect()->route("course.index")->with("success_message","Le cours intitulé $course->name a été supprimée avec succès!");   
        }
        catch(Exception $e){
            dd($e);
        }
    }
}
