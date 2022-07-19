<x-app-layout>
    <x-slot name="header">
     <div class="flex">

       <div class="flex-1 w-100">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Facturas') }}
          </h2>
        </div>
    </div>

    </x-slot>
   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex">
                    <div class="flex-1 w-50"><h2 class="mb-8 text-3xl font-bold">Facturas</h2><br/>
                    </div>
                    <div class="flex-1 w-50 text-right"><a href="#" class="font-bold underline"><a class="font-bold underline" href="{{route('nuevafactura')}}">+ NUEVA</a></a></div>
                  </div>


                 

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                            <th class="py-4 px-6">Nº Factura</th>
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
                                <td class="py-4 px-6"><a target="_blank" href="{{ $factura->factura }}" rel="noopener noreferrer">VER FACTURA</a></td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                 </div>
                
                 <div class="pt-6">
                  {{ $facturas->links() }}
                 </div>
                </div>
            </div>

            

        </div>
    </div>
</x-app-layout>
