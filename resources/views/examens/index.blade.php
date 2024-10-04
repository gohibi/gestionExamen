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
    <a href="{{route('examen.index')}}" class="text-decoration-none text-justify text-uppercase" style="color:#b4d9f3;"><h1>nos examens</h1></a>
    <div class="col-auto py-2 mb-2">
        <div class="page-utilities">
           >
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
                   <a class="btn btn-primary" href="{{ route('examen.create')}}">
                       <svg xmlns="http://www.w3.org/2000/svg" width=1em height=1em viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                       Ajouter examen
                   </a>
               </div>
               {{-- {{ route('examen.resultat.create')}} --}}

               <div class="col-auto">						    
                    <a class="btn btn-info" href="{{Route('examen.result.create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width=1em height=1em viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg>
                        Enregistrer note
                    </a>
                </div>
               
           </div><!--//row-->
       </div><!--//table-utilities-->
   </div>
    <div class="table-responsive">
        <div class="shadow m-auto p-auto">
            <div class="my-3">
                <table class="table table-hover mb-0 text-left table-striped">
                    <thead>
                        <tr>
                            <th class="cell">#</th>
                            <th class="cell">Cours</th>
                            <th class="cell">Titre de l'examen</th>
                            <th class="cell">Date de l'examen</th>
                            <th class="cell">Actions</th>
                            {{-- <th class="cell">Supprimer</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($examens as $examen)
                        <tr>
                            <td class="cell">#{{$examen->id}}</td>
                            <td class="cell"><span class="truncate">{{$examen->course->name}}</span></td>
                            <td class="cell">{{$examen->title}}</td>
                            <td class="cell"><span class="badge bg-success">{{$examen->date}}</span></td>
                            <td class="cell">
                               
                                    <a class="btn btn-primary mb btn-rounded btn-sm fw-bold" href="{{route('examen.edit',$examen->id)}}">Modifier</a>
                             
                              
                                    <form id="deleteForm{{$examen->id}}" method="POST" action="{{route('examen.delete', $examen->id)}}" style="display: none;">
                                        @csrf
                                        @method('GET')
                                    </form>
                                    <a class="btn btn-danger btn-rounded btn-sm fw-bold" onclick="confirmDelete({{$examen->id}},'{{$examen->title}}')">Supprimer</a>
                                
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td class="cell" colspan="5">Aucun enregistrement observé</td>
                            
                        </tr>
                            
                        @endforelse
                       
        
                    </tbody>
                </table>
            </div>
            <nav class="pagination">
                {{ $examens->links() }}
            </nav>
        </div>
       
    </div>


    <script>
        function confirmDelete(examId,examenTitle,) {
            // Utiliser SweetAlert pour afficher une boîte de confirmation
            Swal.fire({
                title: 'Êtes-vous sûr ?',
                text: "Vous êtes sur le point de supprimer l'examen de  " + examenTitle +"!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, supprimer!',
                cancelButtonText: 'Annuler'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Si confirmé, rediriger vers l'URL de suppression
                    // window.location.href = "/examens/delete/" + examenId;
                    document.getElementById('deleteForm' + examId).submit();
                }
            })
        }
    </script>
@endsection