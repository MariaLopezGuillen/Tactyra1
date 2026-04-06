<x-app-layout>

<link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

<div class="dashboard-page">
<div class="tactyra-container">

<h2 class="title">⚽ Gestión del Equipo</h2>

<div class="grid">

<!-- ===================== -->
<!-- JUGADORAS + ESTADO -->
<!-- ===================== -->

<div class="card">

<h3>📊 Estado jugadoras</h3>

@foreach($players as $player)

<div class="player-row">

<div class="player-info">
    <div class="avatar">{{ strtoupper(substr($player->name,0,1)) }}</div>
    <span>{{ $player->name }}</span>
</div>

<div class="progress">
    <div class="bar" style="width: {{ $player->status }}%"></div>
</div>

<span class="percent">{{ $player->status }}%</span>

</div>

@endforeach

</div>

<!-- ===================== -->
<!-- NOTAS -->
<!-- ===================== -->

<div class="card">

<h3>📝 Notas del partido</h3>

<form action="{{ route('notes.store') }}" method="POST">
@csrf

<select name="player_id" class="input">
    @foreach($players as $player)
        <option value="{{ $player->id }}">{{ $player->name }}</option>
    @endforeach
</select>

<textarea name="content" class="input" placeholder="Escribe una mejora..."></textarea>

<button class="btn-submit">Guardar nota</button>

</form>

<hr>

@foreach($notes as $note)

<div class="note">

<strong>{{ $note->player->name }}</strong>
<p>{{ $note->content }}</p>

</div>

@endforeach

</div>

</div>

</div>
</div>

</x-app-layout>