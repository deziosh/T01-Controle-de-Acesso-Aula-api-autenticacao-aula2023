<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Requests;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    public function index(){
        $users = User::all();
        return view('viewsControleAcesso.usuarios', compact('users'));
    }

    public function userRoles(User $user){
        $rolesOfUser = $user->getRoleNames();
        $roles = Role::all();
        return view('viewsControleAcesso.usuarios-papeis', compact('roles', 'rolesOfUser', 'user'));

    }

    public function edit(User $user){

        return view('viewsUsuarios.edit', compact(['user']));

    }
    public function update(Request $request, User $user){
        $user->password = Hash::make($request->password);   
        $user->save();        
        return redirect()->route('usuarios.index');
    }


    public function store(Request $request, User $user){
        /**
        * verificar se precisa fazer alguma validacao
        */
       $papeisDoUsuario = $request->input('papeisDoUsuario');

       $user->syncRoles($papeisDoUsuario);
       
       return redirect()->route('usuarios.index');
   }

}
