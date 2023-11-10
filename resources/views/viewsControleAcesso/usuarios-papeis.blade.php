<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Papeis do Usuario: ') }}
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
        
        <form action=" {{ route('usuarios.store', $user) }} " method="post">
            @csrf
            <input type="hidden" name="usuario" value="{{ $user }}" />


                    <!--<ul class="list-group">-->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Papel</th>
                                <th scope="col">Ativar</th>
                                </tr>
                            </thead>


        

                            <tbody>    
                                @foreach($roles as $role)
                                <tr>
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th scope="row"> {{ $role->id }} </th>
                                    <th>{{ $role->name }}</th>
                                    <td>

                                    <div style="display:flex">    
                                    @php $flag = false @endphp
                                    @foreach ($rolesOfUser as $rOF)
                                            @if($role->name == $rOF )
                                                @php $flag = true @endphp
                                            @endif
                                    @endforeach    
                                    
                                        <input class="form-check-input me-1" type="checkbox" name="papeisDoUsuario[]" id="{{$role->id}}" @if($flag) checked @endif value="{{ $role->name }}" aria-label="...">
                                            
                                    </div>
                                    </td>
                                <!--</li>-->

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                <button type="submit" class="btn btn-outline-primary">Salvar</button>

                <button class="btn btn-secondary">
                <a href="{{route('usuarios.index')}}">Voltar</a> 
        </form>
                            
                        

        </div>            
    </div>
</x-app-layout>
