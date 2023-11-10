<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                    <!--<ul class="list-group">-->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Acoes</th>
                                </tr>
                            </thead>

                            <tbody>    
                                @foreach($users as $user)
                                <tr>
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th scope="row"> {{ $user->id }} </th>
                                    <th>{{ $user->name }}</th>
                                    <td>

                                    <div style="display:flex">    
                                    @auth
                                        
                                        
                                       
                                        
                                        <!-- can('visualizar-noticia', $noticia) -->
                                            <!--can('view', $noticia)-->
                                            <div style="margin-right:2%;">
                                                <button type="button" class="btn btn-outline-info">
                                                    <a href="{{ route('usuarios.papeis', $user) }}">Papeis do Usuario</a>
                                                </button>
                                            </div>
                                
                                        <!-- endcan -->
                                        

                                    @endauth
                                    </div>
                                    </td>
                                <!--</li>-->

                                </tr>
                                @endforeach
                                @if(Auth::check()) 
                                <div style="margin-right:2%;margin-bottom:2%;">
                                    <button type="button" class="btn btn-outline-info">
                                        <a href="{{ route('usuarios.edit', Auth::user()) }}">Alterar Senha</a>
                                    </button>
                                </div>
                                @endif
                                
                            </tbody>
                        </table>

        </div>            
    </div>
</x-app-layout>
