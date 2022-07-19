@csrf 

<p> 
    <label class="uppercase text-gray-700 text-xs">Nombre</label>
    <span class="text-xs text-red-600">@error('nombre') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="nombre" class="rounded border-gray-200 w-full mb-4" value="{{ old('nombre', $cliente->nombre) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Empresa</label>
    <span class="text-xs text-red-600">@error('empresa') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="empresa" class="rounded border-gray-200 w-full mb-4" value="{{ old('empresa', $cliente->empresa) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Email</label>
    <span class="text-xs text-red-600">@error('email') {{ $message }} @enderror</span>
</p>

<p>
    <input type="email" name="email" class="rounded border-gray-200 w-full mb-4" value="{{ old('email', $cliente->email) }}">
</p>


<p>
    <label class="uppercase text-gray-700 text-xs">NIC/CIF</label>
    <span class="text-xs text-red-600">@error('nif_cif') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="nif_cif" class="rounded border-gray-200 w-full mb-4" value="{{ old('nif_cif', $cliente->nif_cif) }}">
</p>


<p>
    <label class="uppercase text-gray-700 text-xs">Teléfono</label>
    <span class="text-xs text-red-600">@error('telefono') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="telefono" class="rounded border-gray-200 w-full mb-4" value="{{ old('telefono', $cliente->telefono) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Dirección</label>
    <span class="text-xs text-red-600">@error('direccion') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="direccion" class="rounded border-gray-200 w-full mb-4" value="{{ old('direccion', $cliente->direccion) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Ciudad</label>
    <span class="text-xs text-red-600">@error('ciudad') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="ciudad" class="rounded border-gray-200 w-full mb-4" value="{{ old('ciudad', $cliente->ciudad) }}">
</p>


<p>
    <label class="uppercase text-gray-700 text-xs">Provincia</label>
    <span class="text-xs text-red-600">@error('provincia') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="provincia" class="rounded border-gray-200 w-full mb-4" value="{{ old('provincia', $cliente->provincia) }}">
</p>

<p>
    <label class="uppercase text-gray-700 text-xs">Pais</label>
    <span class="text-xs text-red-600">@error('pais') {{ $message }} @enderror</span>
</p>

<p>
    <input type="text" name="pais" class="rounded border-gray-200 w-full mb-4" value="{{ old('pais', $cliente->pais) }}">
</p>

<div class="flex justify-between items-center">

<input type="submit" value="Guardar" class="bg-gray-800 text-white rounded px-4 py-2">
<a href="{{route('clientes')}}" class="font-bold underline">&lt; ATRÁS</a>

</div>