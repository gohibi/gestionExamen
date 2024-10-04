@extends('layouts')
@section('content')
    <div class="wrapper w-50 shadow m-auto p-4 mt-5">
        <h1 class="">Modifier examen</h1>
        <form action="{{route('examen.update',$examen)}}" method="post" class="mt-4 g-3">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Cours</label>
                <select name="course_id" id="course_id" class="form-control">
                    <option value=""></option>
                    @foreach ($courses as $course)
                        <option value="{{$course->id}}"
                            {{$examen->course_id === $course->id ? "selected": ""}}>
                            {{$course->name}}</option>
                    @endforeach  
                </select>
            </div>
            @error('course_id')
            <div class="bg-danger text-white fs-5 mt-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Titre de l'examen</label>
                <input type="text" name="title" class="form-control" value="{{$examen->title}}" id="title" placeholder="Nom de l'examen">
            </div>
            @error('title')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Date examen</label>
                <input type="datetime-local" name="date" value="{{$examen->date}}" class="form-control" id="date" >
            </div>
            @error('date')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            
            <div class=" mb-3 mx-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
                {{-- <a href="{{route('examen.index')}}" class="btn btn-success">Annuler</a> --}}
            </div>
        </form>
    </div>
@endsection