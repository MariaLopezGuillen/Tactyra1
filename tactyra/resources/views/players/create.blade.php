<x-app-layout>

<div class="max-w-4xl mx-auto p-6">

<h1 class="text-2xl font-bold mb-6">
Añadir jugador
</h1>

<form action="{{ route('players.store') }}" method="POST">

@csrf

<div class="grid grid-cols-2 gap-4">

<div>
<label>Nombre</label>
<input type="text" name="name" class="w-full border rounded p-2">
</div>

<div>
<label>Club</label>
<input type="text" name="club" class="w-full border rounded p-2">
</div>

<div>
<label>Categoría</label>
<select name="category" class="w-full border rounded p-2">
<option>U12</option>
<option>U14</option>
<option>U16</option>
<option>U18</option>
<option>Senior</option>
</select>
</div>

<div>
<label>Posición</label>
<select name="position" class="w-full border rounded p-2">
<option>Portero</option>
<option>Defensa</option>
<option>Mediocampo</option>
<option>Delantero</option>
</select>
</div>

<div>
<label>Edad</label>
<input type="number" name="age" class="w-full border rounded p-2">
</div>

</div>

<h2 class="text-xl font-bold mt-6">
Habilidades
</h2>

<div class="grid grid-cols-5 gap-4 mt-4">

<div>
<label>Velocidad</label>
<input type="number" name="speed" class="w-full border rounded p-2">
</div>

<div>
<label>Pase</label>
<input type="number" name="passing" class="w-full border rounded p-2">
</div>

<div>
<label>Tiro</label>
<input type="number" name="shooting" class="w-full border rounded p-2">
</div>

<div>
<label>Defensa</label>
<input type="number" name="defense" class="w-full border rounded p-2">
</div>

<div>
<label>Físico</label>
<input type="number" name="physical" class="w-full border rounded p-2">
</div>

</div>

<button class="bg-blue-600 text-white px-6 py-2 rounded mt-6">
Guardar jugador
</button>

</form>

</div>

</x-app-layout>