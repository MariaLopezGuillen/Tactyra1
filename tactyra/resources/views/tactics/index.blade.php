<x-app-layout>

<link rel="stylesheet" href="{{ asset('css/players.css') }}">

<div class="dashboard-page">
<div class="tactyra-container">

    <!-- HEADER -->
    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
        <h2 style="color:white;">Pizarra Táctica</h2>

        <a href="{{ route('players.index') }}" class="btn-green">
            ← Volver a jugadores
        </a>
    </div>

    <!-- CONTROLES -->
    <div style="display:flex; gap:10px; margin-bottom:15px; flex-wrap:wrap;">

        <button onclick="setTool('draw')" class="btn-green">✏ Dibujar</button>

        <button onclick="setTool('player')" class="btn-green">⚽ Jugador</button>

        <input type="color" id="colorPicker" value="#22c55e">

        <button onclick="clearCanvas()" class="btn-delete">🗑 Limpiar</button>

    </div>

    <!-- CAMPO -->
    <div style="
        border:2px solid white;
        border-radius:12px;
        overflow:hidden;
        position:relative;
    ">

        <canvas 
            id="tacticCanvas" 
            width="1000" 
            height="550"
            style="background:#166534; width:100%;">
        </canvas>

    </div>

</div>
</div>

<script src="{{ asset('js/tactics.js') }}"></script>

</x-app-layout>