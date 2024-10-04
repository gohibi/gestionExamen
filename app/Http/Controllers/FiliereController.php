<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Http\Requests\storeFiliereRequest;

class FiliereController extends Controller
{
    public function index(){
        $filieres = Filiere::paginate(10);

        return view("filieres.index",compact("filieres"));
    }


    /* create(le formulaire) et enregistrer(le traitement) les donnees */
    public function create(){
        return view("filieres.create");
    }

    public function enregister(storeFiliereRequest $request , Filiere $filiere){
        try{
            $filiere -> name = $request->name;
            $filiere->save();
            return redirect()->route("filiere.index")->with("success_message","Filiere ajouté avec succès !");

        }catch(Exception $e){
            dd($e);
        }
    }
    /* modifier(le formulaire) et update(le traitement) les donnees */
    public function modifier(Filiere $filiere){

        return view("filieres.edit" , compact('filiere'));
    }
    public function update(storeFiliereRequest $request , Filiere $filiere){
        try{
            $filiere->name = $request->name;
            $filiere->update();
            return redirect()->route('filiere.index')->with('success_message','Filière modifiée avec succès !');
        }
        catch(Exception $e){
            dd($e);
        }
    }


    /* suprimer les donnees */
    public function delete(Filiere $filiere){
        try{
            Filiere::delete($filiere);
            // $filiere -> delete();
            return redirect()->route('filiere.index')->with('success_message',"La filière  $filiere->name a été supprimée avec succès!");
        }
        catch(Exception $e){
            dd($e);
        }
    }
}
