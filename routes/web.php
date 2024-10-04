<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get("login",[AuthController::class,"index"])->name("login");
Route::post("login",[AuthController::class,"handleLogin"])->name("login.user");

Route::get("registration",[AuthController::class,"registration"])->name("registration");
Route::post("registration",[AuthController::class,"registerUser"])->name("registration.user");

Route::get("logout",[AuthController::class,"signout"])->name("signout");

Route::get("/examens/results/show",[ExamenController::class, "showResult"])->name("examen.result.show");




Route::middleware(['auth'])->group(function () {

    //Filieres
    Route::prefix('filieres')->group(function (){
    
        Route::get("",[FiliereController::class, "index"])->name("filiere.index");
    
        Route::get('/create', [FiliereController::class, 'create'])->name('filiere.create');
        Route::post('/create', [FiliereController::class, 'enregister'])->name('filiere.enregister');
    
        Route::get('/edit/{filiere}',[FiliereController::class,'modifier'])->name('filiere.modifier');
        Route::put('/update/{filiere}',[FiliereController::class,'update'])->name('filiere.mettreajour');
    
        Route::get('/delete/{filiere}',[FiliereController::class,'delete'])->name('filiere.supprimer');
        
    
    });
    
    //COURSES
    Route::prefix('courses')->group(function (){
        
        Route::get("",[CourseController::class, "index"])->name("course.index");
    
        Route::get('/create', [CourseController::class, 'create'])->name('course.create');
        Route::post('/create', [CourseController::class, 'store'])->name('course.store');
    
        Route::get('/edit/{course}',[CourseController::class,'edit'])->name('course.edit');
        Route::put('/update/{course}',[CourseController::class,'update'])->name('course.update');
    
        Route::get('/delete/{course}',[CourseController::class,'delete'])->name('course.delete');
        
    
    });


    //ETUDIANTS
    
    Route::prefix('etudiants')->group(function (){
        
        Route::get("",[StudentController::class, "index"])->name("student.index");
    
        Route::get('/create', [StudentController::class, 'create'])->name('student.create');
        Route::post('/create', [StudentController::class, 'store'])->name('student.store');
    
        Route::get('/edit/{student}',[StudentController::class,'edit'])->name('student.edit');
        Route::put('/update/{student}',[StudentController::class,'update'])->name('student.update');
    
        Route::get('/delete/{student}',[StudentController::class,'delete'])->name('student.delete');
        
    
    });

    //EXAMENS
    
    Route::prefix('examens')->group(function (){
        Route::get("",[ExamenController::class, "index"])->name("examen.index");

        Route::get("/resultats",[ExamenController::class, "createNote"])->name("examen.result.create");
        Route::post("/resultats",[ExamenController::class, "storeNote"])->name("examen.result.store");
        
        Route::get('/create', [ExamenController::class, 'create'])->name('examen.create');
        Route::post('/create', [ExamenController::class, 'store'])->name('examen.store');
    
        Route::get('/edit/{examen}',[ExamenController::class,'edit'])->name('examen.edit');
        Route::put('/update/{examen}',[ExamenController::class,'update'])->name('examen.update');
    
        Route::get('/delete/{examen}',[ExamenController::class,'delete'])->name('examen.delete');
        
    
    });
});