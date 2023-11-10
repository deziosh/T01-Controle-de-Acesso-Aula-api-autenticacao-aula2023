<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Requests;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PapeisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');   
    }
    public function index(){
        $roles = Role::all();
        return view('viewsControleAcesso.papeis', compact('roles'));
    }

    public function create(){
        return view('viewsControleAcesso.papeis-create');
    }

    public function store(Request $request){
        
        $data = $request->only([
            'nomePapel',            
        ]);

        $nome = $data['nomePapel'];

        Role::findOrCreate($nome);
        
        return redirect()->route('papeis.index');

    }

    public function edit(Role $role){
        $id = $role->id;
        $role = Role::findById($id);

        return view('viewsControleAcesso.papeis-edit', compact(['role']));

    }

    public function update(Request $request, Role $role){
        $id = $role->id;
        $role = Role::findById($id);

        if(!(isset($role))){
            echo "Nao existe [ Papel ] com esse nome registrada(o) no sistema!";
            return view('papeis.index');
        }

        $data = $request->only([
            'nomePapel',            
        ]);

        $nome = $data['nomePapel'];
        $role->update(['name' => $nome]);

        return redirect()->route('papeis.index');
    }

    public function destroy(Role $role){
        $id = $role->id;
        $role = Role::findById($id);

        if(!(isset($role))){
            echo "Nao existe [ Papel ] com esse nome registrada(o) no sistema!";
            return view('papeis.index');
        }

        $role->delete();
        return redirect()->route('papeis.index');

    }
}
