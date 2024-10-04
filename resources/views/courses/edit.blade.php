@extends('layouts')
@section('content')
    <div class="wrapper w-50 shadow m-auto p-4 mt-5">
        <h1 class="">Modifier course</h1>
        <form action="{{route('course.update', $course)}}" method="post" class="mt-4 g-3">
            @csrf
            @method('PUT')
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Nom du cours</label>
                <input type="text" name="name" class="form-control" value="{{$course->name}}" id="course" placeholder="Ex:Mecanique du point">
            </div>
            @error('name')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control">{{$course->description}}</textarea>
            </div>
            @error('description')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class=" mb-3 mx-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
                {{-- <a href="{{route('course.index')}}" class="btn btn-success">Annuler</a> --}}
            </div>
        </form>
    </div>
@endsection