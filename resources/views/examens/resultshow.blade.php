@extends('layouts')
@section('content')

@if (Session::get('success_message'))
    <div class="alert alert-success" id="success-alert">
        {{ Session::get('success_message') }}
    </div>
    <script>
        setTimeout(function() {
            document.getElementById('success-alert').style.display = 'none';
        }, 3000); 
    </script>
@endif
    <a href="{{route('examen.result.show')}}" class="text-decoration-none text-justify text-uppercase" style="color:#b4d9f3;"><h1>resultats des examens </h1></a>
    <div class="col-auto py-2 mb-2">
        <div class="page-utilities">
           <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
               <div class="col-auto">
                   <form class="table-search-form row gx-1 align-items-center">
                       <div class="col-auto">
                           <input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Recherche">
                       </div>
                       <div class="col-auto">
                           <button type="submit" class="btn btn-success">Recherche</button>
                       </div>
                   </form>
                   
               </div><!--//col-->
              
               <div class="col-auto">						    
                   <a class="btn btn-primary" href="{{ route('examen.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width=1em height=1em viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                   </a>
               </div>
           </div><!--//row-->
       </div><!--//table-utilities-->
   </div>
    <div class="table-responsive">
        <div class="shadow m-auto">
            <div class="my-3">
                <table class="table table-hover mb-0 text-left table-striped">
                    <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Nom complet etudiant </th>
                            <th class="cell">Examen </th>
                            <th class="cell">Mention </th>
                            <th class="cell">Decision</th>
                            <th class="cell">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($resultats as $resultat)
                        <tr>
                            <td class="cell">#{{$resultat->id}}</td>
                            <td class="cell"><span class="truncate text-muted mb-0 ">{{$resultat->student->firstname. ' '.$resultat->student->lastname}}</span></td>
                            <td class="cell"><span class="truncate text-muted mb-0 ">{{$resultat->examen->title.' '.$resultat->examen->course->name}}</span></td>
                            <td class="cell"><span class="badge bg-primary">{{$resultat->grade}}</span></td>
                            <td class="cell">
                                @if ($resultat->note >= 10)
                                <span class="text-success bg-light py-2 text-center rounded shadow d-block" style="width:100%;" >
                                    Validé
                                </span>
                                @else
                                <span class="text-danger bg-light py-2 text-center rounded shadow d-block" style="width:100%;" >
                                    Echec
                                </span>

                                @endif
                                
                            </td>
                            <td class="cell">
                                <a class="btn btn-primary mb-2 btn-rounded btn-sm fw-bold" href="">Modifier</a>
                                <a class="btn btn-danger mb-2 btn-rounded btn-sm fw-bold" href="">Supprimer</a>
                                {{-- <form id="deleteForm{{$resultat->id}}" method="POST" action="{{route('resultat.delete', $resultat->id)}}" style="display: none;">
                                    @csrf
                                    @method('GET')
                                </form>
                                <a class="btn btn-danger btn-rounded btn-sm fw-bold" onclick="confirmDelete({{$resultat->id}},'{{$resultat->name}}')">Supprimer</a>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td class="cell" colspan="8">Aucun enregistrement observé</td>
                            
                        </tr>
                            
                        @endforelse
                       
        
                    </tbody>
                </table>
            </div>
            <nav class="pagination">
                {{ $resultats->links() }}
            </nav>
        </div>
       
    </div>


    <script>
        function confirmDelete(resultatId) {
            // Utiliser SweetAlert pour afficher une boîte de confirmation
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous êtes sur le point de supprimer le cours !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si confirmé, rediriger vers l'URL de suppression
                    // window.location.href = "/resultats/delete/" + resultatId;
                    document.getElementById('deleteForm' + resultatId).submit();
                }
            })
        }
    </script>
@endsection