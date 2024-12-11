<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/form.css">
    <title>PRESTAMOS RIB SUELDO</title>
    @vite('resources/css/form.css')
</head>
<body>
    <div class="title">
        <u>R.I.B LOGISTICAS S.A.S</u>
    </div>
    
    <form action="tu_url_de_envio" method="POST"> <!-- Agrega la etiqueta form -->
        <div class="request-info-section">
            <h2>TIPO PRESTAMO</h2>
                <!-- 3 CHECKBOX DEL INICIO -->
                <div class="radio-container">
                    <label>
                        <input type="radio" id="option1" name="request" value="prestamo">
                        SOLICITUD DE PRESTAMO
                    </label>

                    <label>
                        <input type="radio" id="option2" name="request" value="anticipo-arriendo">
                        ANTICIPO DE ARRIENDO DE MOTO
                    </label>

                    <label>
                        <input type="radio" id="option3" name="request" value="anticipo-sueldo">
                        ANTICIPO SUELDO
                    </label>
                </div>

                <!-- PRIMER FORMULARIO -->
                <div class="form-group">
                    <h2 class="title-data">DATOS</h2>
                    <div class="p-v">
                        <div class="personal-data">
                            <label for="name" class="name-label">NOMBRE:</label>
                            <input type="text" id="name" name="name" required>
    
                            <label for="cc" class="cc-label">C.C:</label>
                            <input type="text" id="cc" name="cc" required>
                        </div>
    
                        <div class="value-discount">
                            <label for="value" class="value-label">VALOR SOLICITADO:</label>
                            <input type="text" id="value" name="value" required>
    
                            <label for="discount" class="discount-label">DESC. SUGERIDO:</label>
                            <input type="text" id="discount" name="discount">
                        </div>
                    </div>

                    <h2 class=title-purpose>PROPOSITO</h2>
                    <div class="purpose">
                        <label for="purpose" class="purpose-label">PROPOSITO:</label>
                        <textarea id="purpose" name="purpose" rows="2" required></textarea>
                    </div>

                <div class="authorize">
                    <p>Autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar de mi salario la cantidad aprobada en: <input type="text" id="partidas" name="partidas"> partidas, comenzando en la quincena de <input type="text" id="quincena" name="quincena">, en caso de que mi contrato fuera cancelado, autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar el saldo o saldos adeudados, de la liquidación de mis salarios, prestaciones sociales o bonificaciones a que tenga derecho, a la terminación de mi contrato.
                    </p>
                </div>
                
            </div>

            <button type="submit">Enviar</button> <!-- Botón para enviar el formulario -->
        </div>
    </form>
</body>
</html>