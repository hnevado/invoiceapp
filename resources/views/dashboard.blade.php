<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <x-alert textochapa="NUEVO!" textomensaje="Añadida funcionalidad para exportar clientes"/>  
          <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg">
              
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex">
                    <div class="flex-1 w-50"><h2 class="mb-8 text-3xl font-bold">Últimos clientes</h2><br/>
                    </div>
                    <div class="flex-1 w-50 text-right"><a class="font-bold underline" href="{{route('clientes')}}">VER TODOS</a></div>
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
                                <td class="py-4 px-6"><a href="{{route('editarcliente',$cliente)}}">VER CLIENTE</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                 </div>

                 <!-- FACTURAS -->
                 <div class="flex mt-12">
                    <div class="flex-1 w-50"><h2 class="mb-8 text-3xl font-bold">Últimas facturas</h2><br/>
                    </div>
                    <div class="flex-1 w-50 text-right"><a class="font-bold underline" href="{{route('facturas')}}">VER TODAS</a></div>
                  </div>

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                            <th class="py-4 px-6">Factura</th>
                            <th class="py-4 px-6">Cliente</th>
                            <th class="py-4 px-6"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                            <tr class="border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-4 px-6">{{ $factura->id }}</td>
                                <td class="py-4 px-6">
                                    
                                <a class="font-bold" href="{{route('editarcliente',$factura->cliente)}}">{{ $factura->cliente->nombre }}</a>
                                
                                @if ($factura->cliente->empresa != "")
                                 <br/>
                                 {{ $factura->cliente->empresa }}
                                @endif

                                </td>
                                <td class="py-4 px-6"><a target="_blank" rel="noopener noreferrer" href="{{ $factura->factura }}">VER FACTURA</a></td>
                               
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                 </div>

                 <!-- FIN FACTURAS -->
                

                </div>
            </div>

            

        </div>
    </div>
</x-app-layout>
