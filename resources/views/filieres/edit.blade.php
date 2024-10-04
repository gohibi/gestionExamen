@extends('layouts')
@section('content')
    <div class="wrapper w-50 shadow m-auto p-4 mt-5">
        <h1 class="">Modifier filiere</h1>
        <form action="{{route('filiere.mettreajour', $filiere)}}" method="post" class="mt-4 g-3">
            @csrf
            @method('PUT')
            <div class="form-group mb-3 mx-3">
                <label for="exampleFormControlInput1" class="form-label">Nom filiere</label>
                <input type="filiere" name="name" class="form-control" value="{{$filiere->name}}" id="filiere" placeholder="Data Science">
            </div>
            @error('name')
            <div class="bg-danger text-white fs-5 mt-3 mx-3 mb-3"> {{ $message }}</div>
            @enderror
            <div class=" mb-3 mx-3">
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                {{-- <a href="{{route('filiere.index')}}" class="btn btn-success">Annuler</a> --}}
            </div>
        </form>
    </div>
@endsection