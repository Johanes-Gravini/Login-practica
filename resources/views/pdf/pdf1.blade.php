<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ public_path('css/pdf1.css') }}">
    <title>PRESTAMOS RIB SUELDO</title>
</head>
<body>
    <div class="title">
        <u>R.I.B LOGISTICAS S.A.S</u>
    </div>
    
    <div class="request-info-section">
        <!-- 3 CHECKBOX DEL INICIO -->
        <div class="checkbox-container">
            <label>
                <span class="custom-checkbox"></span>
                <input type="checkbox" id="option1" name="option1" value="value1">
                SOLICITUD DE PRESTAMO
            </label>
    
            <label>
                <span class="custom-checkbox"></span>
                <input type="checkbox" id="option2" name="option2" value="value2">
                ANTICIPO DE ARRIENDO DE MOTO
            </label>
    
            <label>
                <span class="custom-checkbox"></span>
                <input type="checkbox" id="option3" name="option3" value="value3">
                ANTICIPO SUELDO
            </label>
        </div>

        <!-- PRIMER FORMULARIO -->
        <div class="form-group">
            <div class="personal-data">
                <label for="name" class="name-label">NOMBRE:</label>
                <input type="text" id="name" name="name">

                <label for="cc" class="cc-label">C.C:</label>
                <input type="text" id="cc" name="cc">
            </div>

            <div class="value-discount">
                <label for="value" class="value-label">VALOR SOLICITUADO:</label>
                <input type="text" id="value" name="value">

                <label for="discount" class="discount-label">DESC. SUGERIDO:</label>
                <input type="text" id="discount" name="discount">
            </div>

            <div class="purpose">
                <label for="purpose" class="purpose-label">PROPOSITO:</label>
                <textarea id="purpose" name="purpose" rows="2"></textarea>
            </div>
        </div>
    </div>
</body>
</html>