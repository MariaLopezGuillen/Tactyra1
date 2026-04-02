<x-app-layout>

<link rel="stylesheet" href="{{ asset('css/players.css') }}">

<div class="dashboard-page">
<div class="tactyra-container">

<!-- HEADER -->
<div class="header">
    <h2>Jugadores</h2>

    <div class="header-actions">
        <a href="{{ route('attendance.index') }}" class="btn-blue">Asistencia</a>
        <a href="{{ route('players.create') }}" class="btn-green">+ Añadir jugador</a>
    </div>
</div>

<!-- FILTRO CLUB -->
<div class="club-selector">

    <a href="{{ route('players.index') }}" 
       class="club-box {{ request('club') == null ? 'active' : '' }}">
        <p>Todos</p>
    </a>

    @foreach($clubs as $club)
        <a href="{{ route('players.index', ['club' => $club]) }}" 
           class="club-box {{ request('club') == $club ? 'active' : '' }}">
            <p>{{ $club }}</p>
        </a>
    @endforeach

</div>

<!-- TABLA -->
<div class="table-wrapper">

<table>

<thead>
<tr>
<th>Nombre</th>
<th>Club</th>
<th>Posición</th>
<th>Edad</th>
<th>Media</th>
<th>Acciones</th>
</tr>
</thead>

<tbody>

@forelse($players as $player)
<tr>

<td>{{ $player->name }}</td>
<td>{{ $player->club }}</td>
<td>{{ $player->position }}</td>
<td>{{ $player->age ?? '-' }}</td>
<td class="overall">{{ $player->overall ?? '-' }}</td>

<td class="actions">

<!-- EDITAR -->
<button class="btn-icon edit" onclick='openEditModal(
    {{ $player->id }},
    @json($player->name),
    @json($player->club),
    @json($player->position),
    {{ $player->age ?? 'null' }}
)'>✏</button>

<!-- ELIMINAR -->
<form action="{{ route('players.destroy', $player->id) }}" method="POST" onsubmit="return confirmDelete()">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn-icon delete">
        🗑
    </button>
</form>

</td>

</tr>
@empty
<tr>
<td colspan="6">No hay jugadores</td>
</tr>
@endforelse

</tbody>

</table>

</div>

</div>
</div>

<!-- ========================= -->
<!-- MODAL PRO -->
<!-- ========================= -->

<div id="editModal" class="modal-pro">

    <div class="modal-card">

        <div class="modal-header">
            <h2>Editar jugador</h2>
            <span onclick="closeEditModal()">✖</span>
        </div>

        <form id="editForm" method="POST" class="modal-form">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" id="edit_name">
            </div>

            <div class="form-group">
                <label>Club</label>
                <input type="text" name="club" id="edit_club">
            </div>

            <div class="form-group">
                <label>Posición</label>
                <input type="text" name="position" id="edit_position">
            </div>

            <div class="form-group">
                <label>Edad</label>
                <input type="number" name="age" id="edit_age">
            </div>

            <button type="submit" class="btn-save">
                Guardar cambios
            </button>

        </form>

    </div>

</div>

<!-- ========================= -->
<!-- JS -->
<!-- ========================= -->

<script>

function openEditModal(id, name, club, position, age) {

    document.getElementById("editModal").style.display = "flex";

    document.getElementById("edit_name").value = name ?? "";
    document.getElementById("edit_club").value = club ?? "";
    document.getElementById("edit_position").value = position ?? "";
    document.getElementById("edit_age").value = age ?? "";

    document.getElementById("editForm").action = "/players/" + id;
}

function closeEditModal() {
    document.getElementById("editModal").style.display = "none";
}

function confirmDelete() {
    return confirm("¿Seguro que quieres eliminar este jugador?");
}

window.onclick = function(event) {
    let modal = document.getElementById("editModal");

    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>

</x-app-layout>