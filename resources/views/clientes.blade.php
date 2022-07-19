<x-app-layout>
    <x-slot name="header">
     <div class="flex">

       <div class="flex-1 w-50">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clientes') }}
          </h2>
        </div>

        <div class="flex-1 w-50 text-right">
             <a class="bg-gray-800 text-white rounded px-4 py-2 pointer" href="{{route('exportarclientesexcel')}}">EXPORTAR A EXCEL</a>
        </div> 
    </div>

    </x-slot>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex">
                    <div class="flex-1 w-50"><h2 class="mb-8 text-3xl font-bold">Clientes</h2><br/>
                    </div>
                    <div class="flex-1 w-50 text-right"><a href="{{route('nuevocliente')}}" class="font-bold underline">+ NUEVO</a></div>
                  </div>


                 

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                            <th class="py-4 px-6">Nombre</th>
                            <th class="py-4 px-6">Empresa</th>
                            <th class="py-4 px-6">Email</th>
                            <th class="py-4 px-6">Teléfono</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6">{{ $cliente->nombre }}</td>
                                <td class="py-4 px-6">{{ $cliente->empresa }}</td>
                                <td class="py-4 px-6">{{ $cliente->email }}</td>
                                <td class="py-4 px-6">{{ $cliente->telefono }}</td>
                                <td class="py-4 px-6">
                                    
                                <a class="bg-gray-800 text-white rounded px-4 py-2" href="{{route('editarcliente',$cliente)}}">VER</a> 
                                <br/><br/>
                                <form action="{{route('eliminarcliente', $cliente) }}" method="POST">
                                   @csrf 
                                   @method('DELETE')
                                   <input 
                                     type="submit" 
                                     value="Eliminar"
                                     class="bg-gray-800 text-white rounded px-4 py-2 pointer"
                                     onclick="return confirm('Estás seguro de eliminar el cliente? Se borrará todo el contenido asociado')">
                                 </form>
                            
                            
                            </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                 </div>
                
                 <div class="pt-6">
                  {{ $clientes->links() }}
                 </div>
                </div>
            </div>

            

        </div>
    </div>
</x-app-layout>
