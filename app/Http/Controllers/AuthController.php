<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegistrationRequest;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function handleLogin(LoginRequest $request){
        
        $credits = $request->only("email","password");
        if(Auth::attempt($credits)){
            return redirect()->route("student.index")->with("success_message","Connexion reussie");

        }
        return redirect()->route('login')->with("success_message","Mot de passe ou email non valides");;
    } 

    public function registration(){
        return view('auth.registration'); 
    }

    public function registerUser(RegistrationRequest $request){

        try{
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
    
            $result = $user->save();
    
            if($result){
                return redirect()->route("login")->with("success_message","Vous etes enregistrés!");
            }
    
            return redirect()->route("registration")->with("success_message","Echec de l'enregistrement !");
        }
        catch(Exception $e){
            dd($e);
        }
        
        
    }

    public function signout(){
        session()->flush();
        Auth::logout();
        return redirect("login");
    }



}
