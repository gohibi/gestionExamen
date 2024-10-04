<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"rel="stylesheet"/>
        <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"rel="stylesheet"/>
    <!-- MDB -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    
    <title>Gestion des examens </title>
</head>
<body>
    <div class="">
        <div class="">
            <section class="">
                <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
                    <div class="container-fluid">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <a class="navbar-brand" href="#">Hidden brand</a>
                        
                       @if (Route::has('login'))

                          @auth
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                              <a class="nav-link" href="{{Route('student.index')}}">Etudiants</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{Route('filiere.index')}}">Filières</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{Route('course.index')}}">Cours</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" href="{{Route('examen.index')}}">Examens</a>
                            </li>
                          </ul>
                     
                         
                              
                        @else
                              
                       
                      
                        <div class="d-flex navbar-nav w-100 justify-content-end mb-2mb-lg-0" style="">
                            <li class="nav-item mx-4">
                              <a href="{{Route('examen.result.show')}}" class="nav-link text-success bg-light rounded">Resulats</a>
                            </li>
                            <li class="nav-item">
                              <a href="{{Route('login')}}" class="nav-link">Connexion</a>
                            </li>
                             @if (Route::has('registration'))
                             <li class="nav-item">
                              <a href="{{Route('registration')}}" class="ml-4 nav-link">S'inscrire</a>
                            </li>
                             @endif
                           
                            
                        </div>
                        
                        @endauth
                        
                       @endif
                       
                      </div>

                      @auth
                      <div class="d-flex align-items-center">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 profile-menu"> 
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <div class="profile-pic">
                                  <img src="https://ui-avatars.com/api/?name={{auth()->user()->name}}" alt="Profile Picture">
                               </div>
                           <!-- You can also use icon as follows: -->
                             <!--  <i class="fas fa-user"></i> -->
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><a class="dropdown-item" href="{{Route('examen.result.show')}}"><i class="fas fa-sliders-h fa-fw"></i>Les resultats</a></li>
                              <li><a class="dropdown-item" href="#"><i class="fas fa-cog fa-fw"></i> Settings</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="{{Route('signout')}}"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a></li>
                            </ul>
                          </li>
                       </ul>
                      </div>
                     
                      @endauth
                    </div>
                  </nav>
            </section>

            <section class="py-4">
                <div class="container">
                    @yield('content')
                </div>
            </section>
        </div>
    </div>
   

    

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>