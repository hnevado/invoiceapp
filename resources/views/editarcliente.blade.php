<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar / Editar cliente') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex">
                    <div class="flex-1 w-50"><h2 class="mb-8 text-3xl font-bold">{{$cliente->nombre}}</h2><br/>
                    </div>
                    <div class="flex-1 w-50 text-right"><a href="{{route('clientes')}}" class="font-bold underline">&lt; ATRÁS</a></div>
                  </div>

                 <div class="pt-6">
                 <form action="{{route('actualizarcliente', $cliente)}}"
                       method="POST">
                       @method('PUT')
                       @include('_form_cliente')
                  </form>
                 </div>
                </div>
            </div>

            

        </div>
    </div>
</x-app-layout>
