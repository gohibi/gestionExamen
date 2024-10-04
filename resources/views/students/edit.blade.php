@extends('layouts')
@section('content')
    <div class="wrapper w-50 shadow m-auto p-4 mt-5">
        <h1 class="">Modifier etudiant</h1>
        <form action="{{route('student.update',$student)}}" method="post" class="mt-4 g-3">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Filiere</label>
                <select name="filiere_id" id="filiere_id" class="form-control">
                    <option value=""></option>
                    @foreach ($filieres as $filiere)
                        <option value="{{$filiere->id}}"
                            {{$student->filiere_id === $filiere->id ? "selected": " "}}>
                            {{ $filiere->name}}</option>
                    @endforeach  
                </select>
            </div>
            @error('filiere_id')
            <div class="bg-danger text-white fs-5 mt-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Nom etudiant</label>
                <input type="text" name="firstname" value={{$student->firstname}} class="form-control" id="firstname" placeholder="Doe">
            </div>
            @error('firstname')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Prenoms etudiant</label>
                <input type="text" name="lastname" value={{$student->lastname}} class="form-control" id="lastname" placeholder="John">
            </div>
            @error('lastname')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Email</label>
                <input type="email" name="email" value={{$student->email}} class="form-control" id="email" placeholder="johndoe@yopmail.com">
            </div>
            @error('email')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Telephone</label>
                <input type="text" name="mobile" value={{$student->mobile}} class="form-control" id="mobile"  placeholder="+225 xx xx xx xx xx">
            </div>
            @error('mobile')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class=" mb-3 mx-3">
                <button type="submit" class="btn btn-primary">Modifier</button>
               
            </div>
        </form>
    </div>
@endsection