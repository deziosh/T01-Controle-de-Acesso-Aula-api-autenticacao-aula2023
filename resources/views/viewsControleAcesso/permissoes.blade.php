<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissoes do Papel: ') }}
            {{ $role->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
       
        
        <form action=" {{ route('permissoes.store') }} " method="post">
            @csrf
            <input type="hidden" name="papel" value="{{ $role->name }}" />


                    <!--<ul class="list-group">-->
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Permissao</th>
                                <th scope="col">Ativar</th>
                                </tr>
                            </thead>


        

                            <tbody>    
                                @foreach($permissions as $permission)
                                <tr>
                                <!--<li class="list-group-item d-flex justify-content-between align-items-center">-->
                                    <th scope="row"> {{ $permission->id }} </th>
                                    <th>{{ $permission->name }}</th>
                                    <td>

                                    <div style="display:flex">    
                                    @php $flag = false @endphp
                                    @foreach ($permissoesDoPapel as $perPapel)
                                            @if($permission->name == $perPapel )
                                                @php $flag = true @endphp
                                            @endif
                                    @endforeach    
                                    
                                        <input class="form-check-input me-1" type="checkbox" name="permissoes[]" id="{{$permission->name}}" @if($flag) checked @endif value="{{ $permission->name }}" aria-label="...">
                                            
                                    </div>
                                    </td>
                                <!--</li>-->

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
        
                <button type="submit" class="btn btn-outline-primary">Salvar</button>

                <button class="btn btn-secondary">
                <a href="{{route('papeis.index')}}">Voltar</a> 
        </form>
                            
                        

        </div>            
    </div>
</x-app-layout>
