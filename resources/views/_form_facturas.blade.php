@csrf 

<p> 
    <label class="uppercase text-gray-700 text-xs">Nº Factura</label>
    <span class="text-xs text-red-600">@error('numero_factura') {{ $message }} @enderror</span>
</p>

<p>
    <input type="number" name="numero_factura" class="rounded border-gray-200 w-full mb-4">
</p>


<p> 
    <label class="uppercase text-gray-700 text-xs">Cliente</label>
    <span class="text-xs text-red-600">@error('cliente') {{ $message }} @enderror</span>
</p>

<p>
  <select name="cliente" class="rounded border-gray-200 w-full mb-4">
    <option value="">-- Selecciona un cliente -- </option>
    @foreach ($clientes as $cliente)
     <option value="{{$cliente->id}}">{{$cliente->nombre}} @if ($cliente->empresa != "")  ({{$cliente->empresa}}) @endif</option>

    @endforeach

  </select>
</p>

<p> 
    <label class="uppercase text-gray-700 text-xs">Importe</label>
    <span class="text-xs text-red-600">@error('importe') {{ $message }} @enderror</span>
</p>

<p>
    <input type="number" name="importe" class="rounded border-gray-200 w-full mb-4">
</p>

<p> 
    <label class="uppercase text-gray-700 text-xs">IVA</label>
    <span class="text-xs text-red-600">@error('iva') {{ $message }} @enderror</span>
</p>

<p>
    <input type="number" name="iva" class="rounded border-gray-200 w-full mb-4">
</p>

<p> 
    <label class="uppercase text-gray-700 text-xs">Concepto</label>
    <span class="text-xs text-red-600">@error('concepto') {{ $message }} @enderror</span>
</p>

<p>
    <textarea name="concepto" class="rounded border-gray-200 w-full mb-4"></textarea>
</p>


<div class="flex justify-between items-center">

<input type="submit" value="Guardar" class="bg-gray-800 text-white rounded px-4 py-2">
<a href="{{route('facturas')}}" class="font-bold underline">&lt; ATRÁS</a>

</div>