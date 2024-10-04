@extends('layouts')
@section('content')
    <main class="signup-form">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="shadow">
                        <h3 class="card-header text-center">S'enregister</h3>
                        <div class="card-body">
                            <form action="{{route('registration.user')}}" method="post" class="mt-4 g-3">
                                @csrf
                              
                                <div class="form-group mb-3 mx-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nom utilisateur</label>
                                    <input type="text" name="name" class="form-control" id="name" autofocus placeholder="Entrez votre nom">
                                    @error('name')
                                    <div class="text-danger fs-6 mt-3 mx-3 mb-3"> {{ $message }}</div>
                                    @enderror
                                </div>
                               


                                <div class="form-group mb-3 mx-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email utilisateur</label>
                                    <input type="email" name="email" class="form-control" id="email" autofocus placeholder="Entrez votre email">
                                    @error('email')
                                    <div class="text-danger  fs-6 mt-3 mx-3 mb-3"> {{ $message }}</div>
                                    @enderror
                                </div>
                               
                                <div class="form-group mb-3 mx-3">
                                    <label for="exampleFormControlInput1" class="form-label">Mot de passe</label>
                                    <input type="password" name="password" class="form-control" id="password" autofocus placeholder="Entrez votre mot de passe">
                                    {{-- @if ($error->has('password'))
                                    <div class="bg-danger text-white fs-6 mt-3 mx-3 mb-3"> {{ $error->first('password') }}</div>
                                    @endif --}}
                                    @error('password')
                                    <div class="text-danger fs-6 mt-3 mx-3 mb-3"> {{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <div class="form-group mb-3 mx-3">
                                    <div class="checkbox">
                                        <label> <input type="checkbox" name="remember" id=""> Remember me</label>
                                    </div>
                                    
                                </div>
                        
                                
                              
                                <div class="d-grid mx-auto mb-3">
                                    <button type="submit" class="btn btn-block btn-info">S'enrigstrer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
   

</div>
@endsection