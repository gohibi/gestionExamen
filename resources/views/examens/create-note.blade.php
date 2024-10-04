@extends('layouts')
@section('content')
<div class="wrapper w-50 shadow m-auto p-4 mt-5">
    <h1 class="text-capitalize">remplissage note</h1>
    <form action="{{route('examen.result.store')}}" method="post" class="mt-4 g-3">
        @csrf
        @method('POST')
        
        <div class="form-group mb-3 mx-3">
            <label for="exampleFormControlInput1" class="form-label">Etudiant</label>
            <select name="student_id" id="student_id" class="form-control">
                <option value=""></option>
                @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->firstname .' ' .$student->lastname}}</option>
                @endforeach  
            </select>
        </div>
        @error('student_id')
        <div class="bg-danger text-white fs-5 mt-3"> {{ $message }}</div>
        @enderror

        <div class="form-group mb-3 mx-3">
            <label for="exampleFormControlInput1" class="form-label">Examen</label>
            <select name="examen_id" id="examen_id" class="form-control">
                <option value=""></option>
                @foreach ($examens as $examen)
                    <option value="{{$examen->id}}">{{$examen->title .' de '.$examen->course->name}}</option>
                @endforeach  
            </select>
        </div>
        @error('examen_id')
        <div class="bg-danger text-white fs-5 mt-3"> {{ $message }}</div>
        @enderror


        <div class="form-group mb-3 mx-3">
            <label for="exampleFormControlInput1" class="form-label">Note</label>
            <input type="text" name="note" class="form-control" id="note" placeholder="Note de l'examen">
        </div>
        @error('note')
        <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
        @enderror
       
        
        <div class=" mb-3 mx-3">
            <button type="submit" class="btn btn-success">Enregistrer</button>
           
        </div>
    </form>
</div>
@endsection