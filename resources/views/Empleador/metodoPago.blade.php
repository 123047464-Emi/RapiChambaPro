<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RapiChamba - Agregar Método de Pago</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: white;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Decorative circles */
        .circle-decoration {
            position: absolute;
            border-radius: 50%;
            background: transparent;
            border: 120px solid #1D40AE;
        }

        .circle-1 {
            width: 800px;
            height: 800px;
            top: -400px;
            right: -400px;
        }

        .circle-2 {
            width: 700px;
            height: 700px;
            bottom: -350px;
            left: -350px;
        }

        /* Payment Form Container */
        .payment-container {
            background: white;
            padding: 50px 40px;
            border-radius: 20px;
            width: 100%;
            max-width: 600px;
            position: relative;
            z-index: 10;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.15);
        }

        .back-button {
            background: none;
            border: none;
            color: #1D40AE;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 20px;
            padding: 5px 0;
            transition: all 0.3s;
        }

        .back-button:hover {
            gap: 8px;
        }

        h1 {
            font-size: 32px;
            color: #1D40AE;
            margin-bottom: 10px;
        }

        .subtitle {
            color: #666;
            font-size: 15px;
            margin-bottom: 30px;
        }

        /* Payment Method Tabs */
        .payment-tabs {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            border-bottom: 2px solid #e0e0e0;
        }

        .tab {
            flex: 1;
            padding: 15px;
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            color: #666;
            transition: all 0.3s;
        }

        .tab.active {
            color: #1D40AE;
            border-bottom-color: #1D40AE;
        }

        .tab:hover {
            color: #1D40AE;
        }

        /* Form Sections */
        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #333;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .required {
            color: #dc3545;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        select {
            width: 100%;
            padding: 15px;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            background: #f8f9fa;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #1D40AE;
            background: white;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* Card Preview */
        .card-preview {
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            border-radius: 15px;
            padding: 30px;
            color: white;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
            min-height: 200px;
        }

        .card-preview::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .card-chip {
            width: 50px;
            height: 40px;
            background: linear-gradient(135deg, #FFD700, #FFA500);
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .card-number-preview {
            font-size: 24px;
            letter-spacing: 3px;
            margin-bottom: 25px;
            font-family: 'Courier New', monospace;
        }

        .card-info-preview {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }

        .card-holder-preview {
            text-transform: uppercase;
        }

        /* Bank Account Section */
        .bank-icon {
            width: 60px;
            height: 60px;
            background: #1D40AE;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color: white;
            margin-bottom: 20px;
        }

        /* Buttons */
        .btn {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #1D40AE;
            color: white;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #152f7f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.3);
        }

        .security-note {
            margin-top: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            font-size: 13px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .security-icon {
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .payment-container {
                padding: 40px 30px;
                margin: 20px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .circle-1, .circle-2 {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative Circles -->
    <div class="circle-decoration circle-1"></div>
    <div class="circle-decoration circle-2"></div>

    <!-- Payment Form Container -->
    <div class="payment-container">
        <button class="back-button" onclick="history.back()">← Volver a Pagos</button>
        
        <h1>Agregar Método de Pago</h1>
        <p class="subtitle">Selecciona tu método de pago preferido</p>

        <!-- Payment Method Tabs -->
        <div class="payment-tabs">
            <button class="tab active" onclick="switchTab('card')">💳 Tarjeta</button>
            <button class="tab" onclick="switchTab('bank')">🏦 Cuenta Bancaria</button>
        </div>

        <!-- Card Form Section -->
        <div id="card-section" class="form-section active">
            <!-- Card Preview -->
            <div class="card-preview">
                <div class="card-chip"></div>
                <div class="card-number-preview" id="card-number-display">•••• •••• •••• ••••</div>
                <div class="card-info-preview">
                    <div>
                        <div style="font-size: 12px; opacity: 0.8;">TITULAR</div>
                        <div class="card-holder-preview" id="card-holder-display">NOMBRE COMPLETO</div>
                    </div>
                    <div>
                        <div style="font-size: 12px; opacity: 0.8;">VENCE</div>
                        <div id="card-expiry-display">MM/AA</div>
                    </div>
                </div>
            </div>

            <form>
                <div class="form-group">
                    <label>Número de Tarjeta <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="card-number" 
                        placeholder="1234 5678 9012 3456"
                        maxlength="19"
                        oninput="formatCardNumber(this)"
                    >
                </div>

                <div class="form-group">
                    <label>Nombre del Titular <span class="required">*</span></label>
                    <input 
                        type="text" 
                        id="card-holder" 
                        placeholder="Como aparece en la tarjeta"
                        oninput="updateCardHolder(this)"
                    >
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Fecha de Vencimiento <span class="required">*</span></label>
                        <input 
                            type="text" 
                            id="card-expiry" 
                            placeholder="MM/AA"
                            maxlength="5"
                            oninput="formatExpiry(this)"
                        >
                    </div>
                    <div class="form-group">
                        <label>CVV <span class="required">*</span></label>
                        <input 
                            type="text" 
                            placeholder="123"
                            maxlength="4"
                        >
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Agregar Tarjeta</button>

                <div class="security-note">
                    <span class="security-icon">🔒</span>
                    <span>Tu información está protegida con encriptación de nivel bancario</span>
                </div>
            </form>
        </div>

        <!-- Bank Account Form Section -->
        <div id="bank-section" class="form-section">
            <div style="text-align: center; margin-bottom: 30px;">
                <div class="bank-icon">🏦</div>
                <h3 style="color: #333; margin-bottom: 10px;">Cuenta Bancaria</h3>
                <p style="color: #666; font-size: 14px;">Conecta tu cuenta bancaria de forma segura</p>
            </div>

            <form>
                <div class="form-group">
                    <label>Banco <span class="required">*</span></label>
                    <select>
                        <option value="">Selecciona tu banco</option>
                        <option value="bbva">BBVA</option>
                        <option value="banamex">Banamex</option>
                        <option value="santander">Santander</option>
                        <option value="banorte">Banorte</option>
                        <option value="hsbc">HSBC</option>
                        <option value="scotiabank">Scotiabank</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>CLABE Interbancaria <span class="required">*</span></label>
                    <input 
                        type="text" 
                        placeholder="18 dígitos"
                        maxlength="18"
                    >
                </div>

                <div class="form-group">
                    <label>Número de Cuenta <span class="required">*</span></label>
                    <input 
                        type="text" 
                        placeholder="10-16 dígitos"
                        maxlength="16"
                    >
                </div>

                <div class="form-group">
                    <label>Nombre del Titular <span class="required">*</span></label>
                    <input 
                        type="text" 
                        placeholder="Como aparece en el banco"
                    >
                </div>

                <div class="form-group">
                    <label>Email de Confirmación <span class="required">*</span></label>
                    <input 
                        type="email" 
                        placeholder="correo@ejemplo.com"
                    >
                </div>

                <button type="submit" class="btn btn-primary">Agregar Cuenta Bancaria</button>

                <div class="security-note">
                    <span class="security-icon">🔒</span>
                    <span>Nunca compartiremos tu información bancaria sin tu autorización</span>
                </div>
            </form>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Update tabs
            document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
            event.target.classList.add('active');
            
            // Update sections
            document.querySelectorAll('.form-section').forEach(s => s.classList.remove('active'));
            document.getElementById(tab + '-section').classList.add('active');
        }

        function formatCardNumber(input) {
            let value = input.value.replace(/\s/g, '');
            let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
            input.value = formattedValue;
            
            // Update preview
            document.getElementById('card-number-display').textContent = 
                formattedValue || '•••• •••• •••• ••••';
        }

        function updateCardHolder(input) {
            let value = input.value.toUpperCase();
            document.getElementById('card-holder-display').textContent = 
                value || 'NOMBRE COMPLETO';
        }

        function formatExpiry(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length >= 2) {
                value = value.substring(0, 2) + '/' + value.substring(2, 4);
            }
            input.value = value;
            
            // Update preview
            document.getElementById('card-expiry-display').textContent = 
                value || 'MM/AA';
        }
    </script>
</body>
</html>