<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <script src="https://cdn.jsdelivr.net/npm/face-api.js@0.22.2/dist/face-api.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #C1D7E6 0%, #e8f1f7 100%);
            padding: 40px 20px;
            min-height: 100vh;
            background: #f5f5f5;
        }
                /* Círculos decorativos */
        .circle-decoration {
            position: fixed;
            border-radius: 50%;
            z-index: -1;
        }

        .circle-top-right {
            width: 450px;
            height: 450px;
            top: -100px;
            right: -300px;
            background: transparent;
            border: 50px solid #1D40AE;
            position: fixed;
            border-radius: 50%;
            z-index: -1;
        }

        .circle-top-right-second {
            width: 500px;
            height: 500px;
            top: -100px;
            right: -100px;
            background: transparent;
            border: 50px solid #1D40AE;
            position: fixed;
            border-radius: 50%;
            z-index: -1;
        }
        .circle-bottom-left {
            width: 550px;
            height: 550px;
            bottom: -225px; 
            left: -200px;
            background: transparent;
            border: 60px solid #1D40AE;
            position: fixed;
            z-index: -1;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.2);
            overflow: hidden;
        }

        .header {
            background: #1D40AE;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .user-type-selector {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 30px;
            background: #f8f9fa;
        }

        .type-btn {
            flex: 1;
            max-width: 250px;
            padding: 20px;
            border: 3px solid #C1D7E6;
            border-radius: 12px;
            background: white;
            color: #1D40AE;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .type-btn:hover {
            border-color: #1D40AE;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.2);
        }

        .type-btn.active {
            background: #1D40AE;
            color: white;
            border-color: #1D40AE;
        }

        .form-container {
            padding: 40px;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .section-title {
            color: #1D40AE;
            font-size: 24px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #C1D7E6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            color: #1D40AE;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        label .required {
            color: #d9534f;
        }

        input, select, textarea {
            padding: 12px;
            border: 2px solid #C1D7E6;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: inherit;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #1D40AE;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            background: #C1D7E6;
            color: #1D40AE;
            border: 2px dashed #1D40AE;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .file-input-label:hover {
            background: #1D40AE;
            color: white;
        }

        .file-name {
            margin-top: 8px;
            font-size: 12px;
            color: #666;
        }

        .habilidades-container {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .habilidades-container input {
            flex: 1;
        }

        .btn-add-skill {
            padding: 12px 20px;
            background: #C1D7E6;
            color: #1D40AE;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-add-skill:hover {
            background: #1D40AE;
            color: white;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .skill-tag {
            background: #1D40AE;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .skill-tag button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            line-height: 1;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: #1D40AE;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background: #152f7f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.3);
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .user-type-selector {
                flex-direction: column;
            }

            .type-btn {
                max-width: 100%;
            }

            .form-container {
                padding: 20px;
            }
        }
        .input-error {
            border: 2px solid #e74c3c; /* rojo */
        }
        .error-label {
            display: inline-block;
            background: #e74c3c;
            color: #fff;
            padding: 2px 6px;
            border-radius: 4px;
            font-size: 12px;
            margin-top: 4px;
        }

        /* =============================================
           RESPONSIVO — agregado sin tocar lo de arriba
           ============================================= */

        /* Ocultar círculos decorativos en móvil para que no interfieran */
        @media (max-width: 480px) {
            .circle-top-right,
            .circle-top-right-second,
            .circle-bottom-left {
                display: none;
            }

            body {
                padding: 16px 12px;
            }

            .container {
                border-radius: 10px;
            }

            .header {
                padding: 20px 16px;
            }

            .header h1 {
                font-size: 22px;
            }

            .header p {
                font-size: 14px;
            }
            .error-text {
            display: none;
            color: #b30000;
            font-size: 0.9em;
            }

            input:invalid + .error-text {
            display: block;
            }
            .error-label {
            display: inline-block;
            background: #ffe6e6;
            color: #b30000;
            font-size: 0.9em;
            padding: 5px 10px;
            border-radius: 6px;
            margin-top: 5px;
            }


            .user-type-selector {
                padding: 16px 12px;
                gap: 12px;
            }

            .type-btn {
                font-size: 15px;
                padding: 14px 10px;
            }

            .section-title {
                font-size: 18px;
            }

            .habilidades-container {
                flex-direction: column;
            }

            .btn-add-skill {
                width: 100%;
            }

            /* Video/cámara: no se desborda en pantallas pequeñas */
            #video,
            #previewFoto {
                width: 100%;
                height: auto;
                max-width: 100%;
            }

            #canvas {
                width: 100%;
                height: auto;
            }

            .btn-submit {
                font-size: 16px;
                padding: 14px;
            }
        }

        /* Tablet intermedia */
        @media (min-width: 481px) and (max-width: 768px) {
            .circle-top-right,
            .circle-top-right-second,
            .circle-bottom-left {
                display: none;
            }

            body {
                padding: 24px 16px;
            }

            .header h1 {
                font-size: 26px;
            }

            #video,
            #previewFoto {
                width: 100%;
                height: auto;
                max-width: 400px;
            }
        }

        /* Asegurar que el container no se desborde en cualquier tamaño */
        .container {
            width: 100%;
        }

        /* Inputs, selects y textareas no se desbordan */
        input, select, textarea {
            max-width: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="circle-decoration circle-top-right"></div>
    <div class="circle-decoration circle-top-right-second"></div>
    <div class="circle-decoration circle-bottom-left"></div>

<div class="container">
    <div class="header">
        <h1>Registro de Usuario</h1>
        <p>Completa tus datos para crear tu cuenta</p>
    </div>

    <div class="user-type-selector">
        <button type="button" class="type-btn active" onclick="selectUserType('empleado', this)">👤 Empleado</button>
        <button type="button" class="type-btn" onclick="selectUserType('empleador', this)">🏢 Empleador</button>
    </div>

    <div class="form-container">
        <form action="{{ route('registro.registrar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tipo_usuario" id="tipoUsuario" value="empleado">
            <input type="hidden" name="habilidades" id="habilidadesHidden">

            <!-- Datos Personales -->
            <div class="section-title"> Datos Personales</div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nombre <span>*</span></label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 caracteres">
                    @error('nombre')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Apellido Paterno <span>*</span></label>
                    <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 caracteres">
                    @error('apellido_paterno')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Apellido Materno <span>*</span></label>
                    <input type="text" name="apellido_materno" value="{{ old('apellido_materno') }}" pattern="^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{2,50}$" title="Solo letras, mínimo 2 caracteres">
                    @error('apellido_materno')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Teléfono <span class=>*</span></label>
                    <input type="tel" name="telefono" value="{{ old('telefono') }}" pattern="[0-9]{10}" maxlength="10" placeholder="10 dígitos">
                    @error('telefono')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group full-width">
                    <label>Correo Electrónico <span>*</span></label>
                    <input type="email" 
                        name="correo" 
                        value="{{ old('correo') }}" 
                        required 
                        placeholder="ejemplo@correo.com"
                        title="Ingresa un correo válido">

                    @error('correo')
                        <span class="error-label">Este correo ya está registrado</span>
                    @enderror
                </div>


                <div class="form-group full-width">
                    <label>Contraseña <span>*</span></label>
                    <input type="password" 
                        name="contrasena" 
                        pattern="^(?=.*[A-Z])(?=.*[0-9]).{8,}$" 
                        title="Mínimo 8 caracteres, una mayúscula y un número" 
                        minlength="8" 
                        required 
                        placeholder="Ingresa tu contraseña">
                </div>
            </div>

            <!-- Dirección -->
            <div class="section-title"> Dirección</div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Código Postal <span>*</span></label>
                    <input type="text" name="codigo_postal" value="{{ old('codigo_postal') }}" placeholder="5 dígitos"  required>
                    @error('codigo_postal')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Estado <span>*</span></label>
                    <select id="estadoSelect" name="estado"  required>
                        <option value="">Seleccione un estado</option>
                        @foreach($estados as $estado)
                            <option value="{{ $estado->id }}" {{ old('estado') == $estado->id ? 'selected' : '' }}>
                                {{ $estado->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Municipio <span>*</span></label>
                    <select id="municipioSelect" name="municipio"  required>
                        <option value="">Seleccione un municipio</option>
                    </select>
                </div>
                <div class="form-group" >
                    <label>Colonia <span>*</span></label>
                    <select id="coloniaSelect" name="colonia"  required>
                        <option value="">Seleccione una colonia</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Calle <span>*</span></label>
                    <select id="calleSelect" name="calle"  required>
                        <option value="">Seleccione una calle</option>
                    </select>
                </div>


                <div class="form-group">
                    <label>Número Exterior <span >*</span></label>
                    <input type="text" name="numero_exterior" value="{{ old('numero_exterior') }}">
                    @error('numero_exterior')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Número Interior</label>
                    <input type="text" name="numero_interior" value="{{ old('numero_interior') }}">
                    @error('numero_interior')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Fotografía -->
            <video id="video" width="400" height="300" autoplay></video>

            <canvas id="canvas" width="400" height="300" style="display:none;"></canvas>

            <img id="previewFoto" style="display:none; border-radius:15px; width:400px;">

            <button type="button" id="tomarFoto">📸 Capturar foto</button>

            <input type="hidden" name="vector_facial" id="vectorInput">
            <input type="hidden" name="foto_base64" id="fotoInput">

            <!-- SECCIÓN EMPLEADO -->
            <div id="empleadoSection" class="form-section active">
                <div class="section-title">Información Profesional (Empleado)</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Experiencia <span>*</span></label>
                        <textarea name="experiencia"  required>{{ old('experiencia') }}</textarea>
                    </div>
                    <div class="form-group full-width">
                    <label>Habilidades <span>*</span></label>
                    <div class="habilidades-container">
                        <select id="habilidadSelect" class="form-input" >
                        <option value="">Seleccione una habilidad</option>
                        @foreach($habilidades as $habilidad)
                            <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
                        @endforeach
                        </select>
                        <button type="button" id="addHabilidadBtn" class="btn-add-skill">Agregar</button>
                    </div>

                    <!-- Aquí se van mostrando las habilidades agregadas -->
                    <div id="habilidadesList" class="skills-list"></div>
                    </div>

                </div>

            </div>

            <!-- SECCIÓN EMPLEADOR -->
            <div id="empleadorSection" class="form-section">
                <div class="section-title"> Información de la Empresa (Empleador)</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Nombre de la Empresa</label>
                        <input type="text" name="nombre_empresa" value="{{ old('nombre_empresa') }}">
                        @error('nombre_empresa')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group full-width">
                        <label>Descripción <span>*</span></label>
                        <textarea name="descripcion">{{ old('descripcion') }}</textarea>
                        @error('descripcion')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">Registrarse</button>
        </form>
    </div>
    <script>
        let stream;

        // Función principal optimizada
        async function startCamera() {
            try {
                const video = document.getElementById('video');
                
                // 1. Iniciamos la cámara de inmediato para que no se vea negro
                stream = await navigator.mediaDevices.getUserMedia({ video: true });
                video.srcObject = stream;

                // 2. Cargamos los "cerebros" desde un servidor externo (GitHub oficial)
                // Así NO tienes que descargar nada a tu carpeta local
                const MODEL_URL = 'https://raw.githubusercontent.com/justadudewhohacks/face-api.js/master/weights';
                
                console.log("Cargando IA desde la nube...");
                await Promise.all([
                    faceapi.nets.tinyFaceDetector.loadFromUri(MODEL_URL),
                    faceapi.nets.faceLandmark68Net.loadFromUri(MODEL_URL),
                    faceapi.nets.faceRecognitionNet.loadFromUri(MODEL_URL)
                ]);
                
                console.log("IA Lista para reconocer rostros");

            } catch (error) {
                console.error("Error:", error);
                alert("Hubo un problema: " + error.message);
            }
        }

        // Llamar a la función cuando la página esté lista
        window.addEventListener('load', startCamera);

        // IMPORTANTE: Solo ejecutar cuando toda la página ya cargó
        window.addEventListener('load', () => {
            startCamera();
        });

        document.getElementById('tomarFoto').addEventListener('click', async () => {
            const video = document.getElementById('video');
            const canvas = document.getElementById('canvas');
            const preview = document.getElementById('previewFoto');
            const btn = document.getElementById('tomarFoto');

            btn.innerText = "Analizando rostro...";
            btn.disabled = true;

            // Detectar rostro y crear descriptor (el vector para el login)
            const detection = await faceapi.detectSingleFace(video, new faceapi.TinyFaceDetectorOptions())
                .withFaceLandmarks()
                .withFaceDescriptor();

            if (!detection) {
                alert("No veo tu cara. Acércate más y asegúrate de tener luz.");
                btn.innerText = "Tomar foto";
                btn.disabled = false;
                return;
            }

            // Dibujar y mostrar foto
            const ctx = canvas.getContext('2d');
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
            
            const fotoBase64 = canvas.toDataURL('image/png');

            // GUARDAR DATOS CLAVE
            document.getElementById('fotoInput').value = fotoBase64;
            // Esto es lo que usará el Login para reconocerte:
            document.getElementById('vectorInput').value = JSON.stringify(Array.from(detection.descriptor));

            preview.src = fotoBase64;
            preview.style.display = 'block';
            video.style.display = 'none';

            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }

            btn.innerText = " Identidad Facial Lista";
        });
    </script>
    <script>
    document.querySelector("form").addEventListener("submit", function(e) {
        let valid = true;

        // Limpiar errores anteriores
        document.querySelectorAll(".error-label").forEach(el => el.remove());
        document.querySelectorAll(".input-error").forEach(el => el.classList.remove("input-error"));

        const campos = [
            {name: "nombre", msg: "El nombre solo debe tener letras"},
            {name: "apellido_paterno", msg: "Apellido inválido"},
            {name: "telefono", msg: "El teléfono debe tener 10 dígitos"},
            {name: "correo", msg: "Correo inválido"},
            {name: "contrasena", msg: "Mínimo 8 caracteres, 1 mayúscula y 1 número"}
        ];

        campos.forEach(campo => {
            const input = document.querySelector(`[name="${campo.name}"]`);
            
            if (input && !input.checkValidity()) {
                valid = false;
                input.classList.add("input-error");

                const error = document.createElement("span");
                error.classList.add("error-label");
                error.innerText = campo.msg;

                input.parentNode.appendChild(error);
            }
        });

        if (!valid) {
            e.preventDefault();
        }
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const select = document.getElementById('habilidadSelect');
        const addBtn = document.getElementById('addHabilidadBtn');
        const list = document.getElementById('habilidadesList');

        addBtn.addEventListener('click', function() {
            const habilidadId = select.value;
            const habilidadText = select.options[select.selectedIndex].text;

            if (habilidadId) {
                // Crear chip visual
                const chip = document.createElement('div');
                chip.classList.add('chip');
                chip.textContent = habilidadText;

                // Input hidden para enviar al backend
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'habilidades[]';
                hidden.value = habilidadId;
                chip.appendChild(hidden);

                // Botón para eliminar
                const removeBtn = document.createElement('span');
                removeBtn.textContent = '✕';
                removeBtn.classList.add('remove-chip');
                removeBtn.onclick = () => chip.remove();
                chip.appendChild(removeBtn);

                list.appendChild(chip);

                // Resetear el select para poder elegir otra
                select.selectedIndex = 0;
            } else {
                alert('Selecciona una habilidad primero');
            }
        });
    });
    </script>

    <script>
    // Estado → Municipio
    document.getElementById('estadoSelect').addEventListener('change', function() {
        const estadoId = this.value;
        if (!estadoId) return;

        fetch(`/municipios/${estadoId}`)
            .then(res => res.json())
            .then(data => {
                const municipioSelect = document.getElementById('municipioSelect');
                municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';
                data.forEach(m => {
                    const option = document.createElement('option');
                    option.value = m.id;
                    option.textContent = m.nombre;
                    municipioSelect.appendChild(option);
                });
            })
            .catch(err => console.error('Error cargando municipios:', err));
    });

    // Municipio → Colonia
    document.getElementById('municipioSelect').addEventListener('change', function() {
        const municipioId = this.value;
        if (!municipioId) return;

        fetch(`/colonias/${municipioId}`)
            .then(res => res.json())
            .then(data => {
                const coloniaSelect = document.getElementById('coloniaSelect');
                coloniaSelect.innerHTML = '<option value="">Seleccione una colonia</option>';
                data.forEach(c => {
                    const option = document.createElement('option');
                    option.value = c.id;
                    option.textContent = c.nombre;
                    coloniaSelect.appendChild(option);
                });
            })
            .catch(err => console.error('Error cargando colonias:', err));
    });

    // Colonia → Calle
    document.getElementById('coloniaSelect').addEventListener('change', function() {
        const coloniaId = this.value;
        if (!coloniaId) return;

        fetch(`/calles/${coloniaId}`)
            .then(res => res.json())
            .then(data => {
                const calleSelect = document.getElementById('calleSelect');
                calleSelect.innerHTML = '<option value="">Seleccione una calle</option>';
                data.forEach(calle => {
                    const option = document.createElement('option');
                    option.value = calle.id;
                    option.textContent = calle.nombre;
                    calleSelect.appendChild(option);
                });
            })
            .catch(err => console.error('Error cargando calles:', err));
    });
    </script>


</div>
    <script src="{{ asset('js/registro.js') }}"></script>
</body>
</html>