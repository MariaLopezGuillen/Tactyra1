<x-app-layout>

<link rel="stylesheet" href="{{ asset('css/players.css') }}">

<div class="dashboard-page">
<div class="tactyra-container">

<!-- HEADER -->
<div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; color:white;">
    <h2>Asistencia</h2>

    <div style="display:flex; gap:10px;">
        <button onclick="openTrainingModal()" class="btn-blue">
            ⚙ Días
        </button>

        <a href="{{ route('players.index') }}" class="btn-green">
            ← Volver
        </a>
    </div>
</div>

<!-- FILTRO CLUB -->
<div class="club-selector">

    <a href="/attendance" 
       class="club-box {{ $clubSeleccionado == 'todos' ? 'active' : '' }}">
        <p>Todos</p>
    </a>

    @foreach($clubs as $club)
        <a href="/attendance?club={{ $club }}" 
           class="club-box {{ $clubSeleccionado == $club ? 'active' : '' }}">
            <p>{{ $club }}</p>
        </a>
    @endforeach

</div>

<!-- FORM -->
<form action="{{ route('attendance.store') }}" method="POST">
@csrf

<div class="table-wrapper">

<table>

<thead>
<tr>
<th>Jugador</th>

@foreach($trainingDays as $day)
<th>{{ ucfirst($day) }}</th>
@endforeach

</tr>
</thead>

<tbody>

@forelse($players as $player)

<tr>

<td style="font-weight:600;">
    {{ $player->name }}
</td>

@foreach($trainingDays as $day)

<td>
    <input 
        type="checkbox" 
        name="attendance[{{ $player->id }}][{{ $day }}]" 
        value="1"
        style="width:18px; height:18px; cursor:pointer;"
    >
</td>

@endforeach

</tr>

@empty

<tr>
<td colspan="5">No hay jugadores</td>
</tr>

@endforelse

</tbody>
</table>

</div>

<!-- BOTÓN -->
<button class="btn-submit">
    Guardar asistencia
</button>

</form>

</div>
</div>

<!-- ========================= -->
<!-- MODAL DÍAS ENTRENAMIENTO -->
<!-- ========================= -->

<div id="trainingModal" class="modal">
<div class="modal-content">

<span class="close" onclick="closeTrainingModal()">✖</span>

<h2>Días de entrenamiento</h2>

<form action="{{ route('training.store') }}" method="POST">
@csrf

<div style="margin-top:15px; color:white;">

<label><input type="checkbox" name="days[]" value="lunes"> Lunes</label><br>
<label><input type="checkbox" name="days[]" value="martes"> Martes</label><br>
<label><input type="checkbox" name="days[]" value="miercoles"> Miércoles</label><br>
<label><input type="checkbox" name="days[]" value="jueves"> Jueves</label><br>
<label><input type="checkbox" name="days[]" value="viernes"> Viernes</label><br>

</div>

<button class="btn-submit" style="margin-top:20px;">
    Guardar días
</button>

</form>

</div>
</div>

<!-- ========================= -->
<!-- JS -->
<!-- ========================= -->

<script>

function openTrainingModal(){
    document.getElementById('trainingModal').style.display = 'flex';
}

function closeTrainingModal(){
    document.getElementById('trainingModal').style.display = 'none';
}

// cerrar al hacer click fuera
window.onclick = function(event) {
    let modal = document.getElementById('trainingModal');
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

</x-app-layout>