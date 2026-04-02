<x-app-layout>

<link rel="stylesheet" href="{{ asset('css/players.css') }}">

<div class="dashboard-page">

    <div class="tactyra-container">

        <div class="form-card">

            <h1 class="form-title">Añadir jugador</h1>

            <form action="{{ route('players.store') }}" method="POST">
                @csrf

                <!-- GRID PRINCIPAL -->
                <div class="form-grid">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" placeholder="Ej: Juan Pérez">
                    </div>

                    <div class="form-group">
                        <label>Club</label>
                        <input type="text" name="club" placeholder="Ej: Sevilla FC">
                    </div>

                    <div class="form-group">
                        <label>Categoría</label>
                        <select name="category">
                            <option>U12</option>
                            <option>U14</option>
                            <option>U16</option>
                            <option>U18</option>
                            <option>Senior</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Posición</label>
                        <select name="position">
                            <option>Portero</option>
                            <option>Defensa</option>
                            <option>Mediocampo</option>
                            <option>Delantero</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Edad</label>
                        <input type="number" name="age" placeholder="Ej: 18">
                    </div>

                </div>

                <!-- HABILIDADES -->
                <h2 class="form-subtitle">Habilidades</h2>

<div class="skills-fifa">

    @foreach([
        'speed' => 'Velocidad',
        'passing' => 'Pase',
        'shooting' => 'Tiro',
        'defense' => 'Defensa',
        'physical' => 'Físico'
    ] as $name => $label)

        <div class="skill-item">

            <div class="skill-header">
                <span>{{ $label }}</span>
                <span id="{{ $name }}Value">50</span>
            </div>

            <input 
                type="range" 
                name="{{ $name }}" 
                min="0" 
                max="100" 
                value="50"
                class="skill-slider"
                oninput="updateSkill(this, '{{ $name }}Value')"
            >

        </div>

    @endforeach

</div>
                <!-- BOTÓN -->
                <button class="btn-submit">
                    Guardar jugador
                </button>

            </form>

        </div>

    </div>
<script>

function updateSkill(slider, valueId) {

    let value = slider.value;
    let display = document.getElementById(valueId);

    display.innerText = value;

    // reset clases
    display.classList.remove('skill-low', 'skill-mid', 'skill-high');

    // colores tipo FIFA
    if (value < 40) {
        display.classList.add('skill-low');
    } else if (value < 70) {
        display.classList.add('skill-mid');
    } else {
        display.classList.add('skill-high');
    }

}

</script>
</div>

</x-app-layout>