<x-app-layout>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="dashboard-page">

        <div class="tactyra-container">

            <div class="dashboard-top">

                <!-- FORMULARIO -->
                <div class="card">

                    <h2>Añadir jugador</h2>

                    <form action="{{ route('players.store') }}" method="POST">
                        @csrf

                        <input type="text" name="name" placeholder="Nombre jugador" required>
                        <input type="number" name="number" placeholder="Dorsal (opcional)">

                        <!-- CLUB -->
                        <input type="text" name="club" placeholder="Club" list="clubs" required>

                        <datalist id="clubs">
                            @foreach ($clubs as $club)
                                <option value="{{ $club }}"></option>
                            @endforeach
                        </datalist>

                        <select name="category">
                            <option value="">Categoría</option>
                            <option>Baby</option>
                            <option>Prebenjamín</option>
                            <option>Benjamín</option>
                            <option>Alevín</option>
                            <option>Infantil</option>
                            <option>Cadete</option>
                            <option>Juvenil</option>
                            <option>Senior</option>
                        </select>

                        <select name="position" required>
                            <option value="">Posición</option>
                            <option>Portero</option>
                            <option>Lateral Derecho</option>
                            <option>Lateral Izquierdo</option>
                            <option>Defensa Central</option>
                            <option>Mediocentro</option>
                            <option>Mediapunta</option>
                            <option>Extremo Derecho</option>
                            <option>Extremo Izquierdo</option>
                            <option>Delantero</option>
                        </select>

                        <input type="number" name="age" placeholder="Edad">

                        <h3>Habilidades</h3>

                        <div class="skills">
                            <input type="number" name="speed" placeholder="Velocidad">
                            <input type="number" name="passing" placeholder="Pase">
                            <input type="number" name="shooting" placeholder="Tiro">
                            <input type="number" name="defense" placeholder="Defensa">
                            <input type="number" name="physical" placeholder="Físico">
                        </div>

                        <button type="submit" class="btn-green">
                            Guardar jugador
                        </button>

                    </form>

                </div>

                <!-- ESTADÍSTICAS -->
                <div class="card">

                    <h2>Estadísticas</h2>

                    <div class="stat-box">
                        <p>Total jugadores</p>
                        <h3>{{ $players->count() }}</h3>
                    </div>

                </div>

            </div>

                    </thead>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>