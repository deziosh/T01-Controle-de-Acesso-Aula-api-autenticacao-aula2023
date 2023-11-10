<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissoesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    
    public function index(Role $role){
        $permissions = Permission::all();
        $permissoesDoPapel = $role->permissions->pluck('name');

        return view('viewsControleAcesso.permissoes', compact('permissions', 'role', 'permissoesDoPapel'));
    }

    public function store(Request $request){
         /**
         * verificar se precisa fazer alguma validacao
         */
        $permissoes = $request->input('permissoes');
        $papel = $request->input('papel');
        $role = Role::findByName($papel);
        
        /**
         * verificar se precisa testar se deu certo a sincronizacao
         */
        $role->syncPermissions($permissoes);
        
        
        return redirect()->route('papeis.index');
    }
}
