@extends('layouts')
@section('content')
    <div class="wrapper w-50 shadow m-auto p-4 mt-5">
        <h1 class="">Ajout filiere</h1>
        <form action="{{route('filiere.enregister')}}" method="post" class="mt-4 g-3">
            @csrf
            @method('POST')
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Nom filiere</label>
                <input type="filiere" name="name" class="form-control" id="filiere" placeholder="Data Science">
            </div>
            @error('name')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class=" mb-3 mx-3">
                <button type="submit" class="btn btn-primary">Ajouter</button>
                <a href="{{route('filiere.index')}}" class="btn btn-success">Annuler</a>
            </div>
        </form>
    </div>
@endsection