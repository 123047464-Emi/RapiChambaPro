
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapichamba - Crear Tarea</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Círculos decorativos */
        .circle-decoration {
            position: fixed;
            border-radius: 50%;
            z-index: 0;
        }

        .circle-top-right {
            width: 450px;
            height: 450px;
            top: -100px;
            right: -300px;
            background: transparent;
            border: 50px solid #1D40AE;
        }

        .circle-top-right-second {
            width: 500px;
            height: 500px;
            top: -100px;
            right: -100px;
            background: transparent;
            border: 50px solid #1D40AE;
        }

        .circle-bottom-left {
            width: 550px;
            height: 550px;
            bottom: -225px;
            left: -200px;
            background: transparent;
            border: 60px solid #1D40AE;
        }

        /* Header */
        .header {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-circle {
            width: 60px;
            height: 60px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px;
        }

        .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        
        .logo-circle {
            width: 70px;
            height: 70px;
        }

        .brand-name {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            letter-spacing: 1px;
        }

        .nav-menu {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-menu a:hover { color: #1D40AE; }

        /* Container */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        .page-title {
            text-align: center;
            font-size: 1.1rem;
            font-weight: 700;
            color: #1D40AE;
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .section-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem 1.8rem;
            margin-bottom: 1rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .section-heading {
            font-size: 1rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group { margin-bottom: 1.1rem; }
        .form-group:last-child { margin-bottom: 0; }

        label {
            display: block;
            font-size: .85rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 6px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: .9rem;
            color: #333;
            background: white;
            transition: all 0.3s;
            appearance: none;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #1D40AE;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 110px;
            line-height: 1.6;
        }

        .form-select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23666' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
            cursor: pointer;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .empleador-card {
            display: flex;
            align-items: center;
            gap: 14px;
            background: #f5f5f5;
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid #ddd;
        }

        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #1D40AE;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        .emp-name {
            font-weight: 700;
            font-size: .95rem;
            color: #333;
        }

        .emp-meta {
            font-size: .78rem;
            color: #666;
            margin-top: 2px;
        }

        .badge-default {
            display: inline-block;
            background: #e8f0fe;
            color: #1D40AE;
            font-size: .72rem;
            font-weight: 700;
            padding: 2px 10px;
            border-radius: 20px;
            margin-top: 5px;
        }

        .actions {
            display: flex;
            gap: 1rem;
            margin-top: 6px;
        }

        .btn-cancel {
            flex: 1;
            padding: 13px;
            background: white;
            color: #333;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-cancel:hover {
            border-color: #1D40AE;
            color: #1D40AE;
            transform: translateY(-2px);
        }

        .btn-submit {
            flex: 1;
            padding: 13px;
            background: #000;
            color: white;
            border: none;
            border-radius: 10px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            background: #333;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container { padding: 1rem; }
            .header { padding: .8rem 1rem; }
            .logo-circle { width: 46px; height: 46px; }
            .nav-menu { gap: 1.2rem; }
            .nav-menu a { font-size: .85rem; }
            .circle-top-right,
            .circle-top-right-second,
            .circle-bottom-left { display: none; }
            .form-row { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .nav-menu { gap: .8rem; }
            .nav-menu a { font-size: .78rem; }
            .actions { flex-direction: column; }
        }
    </style>
</head>
<body>

    <!-- Círculos decorativos -->
    <div class="circle-decoration circle-top-right"></div>
    <div class="circle-decoration circle-top-right-second"></div>
    <div class="circle-decoration circle-bottom-left"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-section">
                <div class="logo-circle">
                    <img src="{{ asset('img/Logo.png') }}" alt="Logo" class="logo-img">
                </div>
            <span class="brand-name">Empleador</span>
        </div>
        <nav class="nav-menu">
            <a href="#">Inicio</a>
            <a href="{{ route('empleador.perfil') }}">Perfil</a>
            <a href="{{ route('Empleador.SiTerminarEmpleador') }}">Notificaciones</a>
        </nav>
    </header>

    @php $usuario = Auth::user(); @endphp

    <div class="container">

        <p class="page-title">Crear Nueva Tarea</p>

         <!-- FORMULARIO COMPLETO -->
        <form id="formCrearTarea" method="POST" action="{{ route('tareas.store') }}">
            @csrf

            <!-- Información general -->
            <div class="section-card">
                <div class="section-heading">📝 Información general</div>

                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="nombre" class="form-input" placeholder="Ej. Limpieza de patio trasero" required>
                </div>

                <div class="form-group">
                    <label>Categoría</label>
                    <select name="categoria_id" class="form-input" required>
                        <option value="">Selecciona una categoría</option>

                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label>Descripción</label>
                    <textarea name="descripcion" class="form-textarea" placeholder="Describe con detalle qué necesitas que se haga..." required></textarea>
                </div>

                <div class="form-group">
                    <label>Presupuesto (MXN)</label>
                    <input type="number" name="presupuesto" class="form-input" placeholder="0.00" min="0" step="0.01" required>
                </div>
            </div>

            <!-- Fechas -->
            <div class="section-card">
                <div class="section-heading">📅 Fechas</div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Fecha de publicación</label>
                        <input type="date" id="fechaPublicacion" name="fechaPublicacion" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label>Fecha límite</label>
                        <input type="date" id="fechaLimite" name="fechaLimite" class="form-input" required>
                    </div>
                </div>
            </div>

            <!-- Ubicación -->
            <div class="section-card">
                <div class="section-heading">📍 Dirección</div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Código Postal <span>*</span></label>
                        <input type="text" name="codigo_postal" 
                            value="{{ old('codigo_postal') }}" 
                            class="form-input"
                            placeholder="5 dígitos" required>
                        @error('codigo_postal')
                            <span class="error-text">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Estado <span>*</span></label>
                        <select id="estadoSelect" name="estado" class="form-select" required>
                            <option value="">Seleccione un estado</option>
                            @foreach($estados as $estado)
                                <option value="{{ $estado->id }}" {{ old('estado') == $estado->id ? 'selected' : '' }}>
                                    {{ $estado->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Municipio <span>*</span></label>
                        <select id="municipioSelect" name="municipio" class="form-select" required>
                            <option value="">Seleccione un municipio</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Colonia <span>*</span></label>
                        <select id="coloniaSelect" name="colonia" class="form-select" required>
                            <option value="">Seleccione una colonia</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Calle <span>*</span></label>
                    <select id="calleSelect" name="calle" class="form-select" required>
                        <option value="">Seleccione una calle</option>
                    </select>
                </div>

                <!-- Direccion para geocoding -->
                <div class="form-group">
                    <label>Dirección completa </label>
                    <input type="text" name="direccion_texto" class="form-input"
                        placeholder="Ej. Calle, número, colonia, ciudad">
                </div>
            </div>

            <!-- Publicado por -->
            <div class="section-card">
                <div class="section-heading">👤 Publicado por</div>
                <div class="empleador-card">
                    <div class="avatar">
                        {{ strtoupper(substr($usuario->nombre, 0, 1)) }}
                    </div>
                    <div>
                        <div class="emp-name">{{ $usuario->nombre }} {{ $usuario->apellido_paterno }} {{ $usuario->apellido_materno }}</div>
                        <div class="emp-meta">{{ $usuario->correo }}</div>
                        <div class="emp-meta">{{ $usuario->telefono }}</div>
                        <span class="badge-default">Tu cuenta</span>
                    </div>
                </div>
            </div>

            <!-- Acciones -->
            <div class="actions">
                <button type="button" class="btn-cancel" onclick="cancelar()">Cancelar</button>
                <button type="submit" class="btn-submit">Publicar tarea</button>
            </div>

        </form>
        <!-- FIN DEL FORMULARIO -->

    </div>

    <script>
        document.getElementById('fechaPublicacion').valueAsDate = new Date();

        document.getElementById('formCrearTarea').addEventListener('submit', function(e) {
            let fechaPub = new Date(document.getElementById('fechaPublicacion').value);
            let fechaLim = new Date(document.getElementById('fechaLimite').value);

            if (fechaLim <= fechaPub) {
                e.preventDefault();
                Swal.fire({
                    icon: 'warning',
                    title: 'Fechas inválidas',
                    text: 'La fecha límite debe ser mayor a la fecha de publicación.',
                    confirmButtonColor: '#1D40AE'
                });
            }
        });

        function cancelar() {
            Swal.fire({
                title: '¿Descartar tarea?',
                text: 'Se perderán los datos ingresados.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#1D40AE',
                confirmButtonText: 'Sí, descartar',
                cancelButtonText: 'Seguir editando'
            }).then((result) => {
                if (result.isConfirmed) window.history.back();
            });
        }

        // Ubicación dinámica por C.P. y selects
        // ... (aquí va todo tu JS existente para CP, estado, municipio, colonias

        </script>
        <script>
        function actualizarDireccion() {
            const estado = document.getElementById('estadoSelect');
            const municipio = document.getElementById('municipioSelect');
            const colonia = document.getElementById('coloniaSelect');
            const calle = document.getElementById('calleSelect');

            const estadoNombre = estado.options[estado.selectedIndex]?.text || '';
            const municipioNombre = municipio.options[municipio.selectedIndex]?.text || '';
            const coloniaNombre = colonia.options[colonia.selectedIndex]?.text || '';
            const calleNombre = calle.options[calle.selectedIndex]?.text || '';

            const direccion = `${calleNombre}, ${coloniaNombre}, ${municipioNombre}, ${estadoNombre}`;
            document.querySelector('input[name="direccion_texto"]').value = direccion;
        }

        document.getElementById('estadoSelect').addEventListener('change', function() {
            let estadoId = this.value;
            if (estadoId) {
                fetch(`/municipios/${estadoId}`)
                    .then(res => res.json())
                    .then(data => {
                        let municipioSelect = document.getElementById('municipioSelect');
                        municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';
                        data.forEach(m => {
                            municipioSelect.innerHTML += `<option value="${m.id}">${m.nombre}</option>`;
                        });
                        actualizarDireccion();
                    });
            }
        });

        document.getElementById('municipioSelect').addEventListener('change', function() {
            let municipioId = this.value;
            if (municipioId) {
                fetch(`/colonias/${municipioId}`)
                    .then(res => res.json())
                    .then(data => {
                        let coloniaSelect = document.getElementById('coloniaSelect');
                        coloniaSelect.innerHTML = '<option value="">Seleccione una colonia</option>';
                        data.forEach(c => {
                            coloniaSelect.innerHTML += `<option value="${c.id}">${c.nombre}</option>`;
                        });
                        actualizarDireccion();
                    });
            }
        });

        document.getElementById('coloniaSelect').addEventListener('change', function() {
            let coloniaId = this.value;
            if (coloniaId) {
                fetch(`/calles/${coloniaId}`)
                    .then(res => res.json())
                    .then(data => {
                        let calleSelect = document.getElementById('calleSelect');
                        calleSelect.innerHTML = '<option value="">Seleccione una calle</option>';
                        data.forEach(ca => {
                            calleSelect.innerHTML += `<option value="${ca.id}">${ca.nombre}</option>`;
                        });
                        actualizarDireccion();
                    });
            }
        });

        document.getElementById('calleSelect').addEventListener('change', actualizarDireccion);
        </script>


</body>
</html>