<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../../css/form.css"> -->
  <title>PRESTAMOS RIB SUELDO</title>
  @vite('resources/css/form.css')
</head>
<body>
  <div class="title max">
      <u>R.I.B LOGISTICAS S.A.S</u>
  </div>
  <!-- Mostrar mensaje de éxito -->
  @if(session('success'))
    <div class="alert alert-success flx">
        {{ session('success') }}
    </div>
  @endif

  <!-- Mostrar mensaje de error NO FUNCIONA POR AHORA JASDFJASDF -->
  @if(session('error'))
    <div class="alert alert-error flx">
        {{ session('error') }}
    </div>
  @endif
  <!-- Mostrar errores de validación -->
  <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif -->

  <form action="{{ route('form.submit') }}" method="POST">
    @csrf
    <div class="request-info-section br">

      <h2 class="max">DATOS</h2>
      <!-- 3 CHECKBOX DEL INICIO -->
      <div class="radio-inputs-section flx br">
        <label class="radio br">
            <input type="radio" name="options" value="solicitud_prestamo" {{ old('options') == 'solicitud_prestamo' ? 'checked' : '' }}>
            <span class="name br">Solicitud de Préstamo</span>
        </label>
        <label class="radio br">
            <input type="radio" name="options" value="anticipo_arriendo_moto" {{ old('options') == 'anticipo_arriendo_moto' ? 'checked' : '' }}>
            <span class="name br">Anticipo Arriendo de Moto</span>
        </label>
        <label class="radio br">
            <input type="radio" name="options" value="anticipo_sueldo" {{ old('options') == 'anticipo_sueldo' ? 'checked' : '' }}>
            <span class="name br">Anticipo Sueldo</span>
        </label>
      </div>
      @error('options')
        <div class="error-message">{{ $message }}</div>
        <div class="separator-max"></div>
      @enderror

      <!-- PRIMER FORMULARIO -->
      <div class="form-group br">
          <!-- <h2 class="title-data">DATOS</h2> -->
          <div class="p-v-section flx">
            <div class="personal-data flx br box">
              <label for="name" class="name-label">NOMBRE:</label>
              <input type="text" id="name" name="name" required value="{{ old('name') }}">
              @error('name')
                <div class="error-message">{{ $message }}</div>
              @enderror

              <div class="campo-2 flx">
                <label for="cc" class="cc-label">C.C:</label>
                <input type="number" id="cc" name="cc" required value="{{ old('cc') }}">
                @error('cc')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
            </div>
            
            <div class="value-discount flx br box">
              <label for="value" class="value-label">VALOR SOLICITADO:</label>
              <input type="number" id="value" name="value" required value="{{ old('value') }}">
              @error('value')
                <div class="error-message">{{ $message }}</div>
              @enderror

              <div class="campo-2 flx">
                <label for="discount" class="discount-label">DESC. SUGERIDO:</label>
                <input type="number" id="discount" name="discount" value="{{ old('discount') }}">
                @error('discount')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
          
          <!-- <h2 class=title-purpose>PROPOSITO</h2> -->
          <h3 class="max">PROPOSITO</h3>
          <div class="purpose-section flx">
              <textarea class="br max" id="purpose" name="purpose" rows="2" placeholder="Escriba el propósito..." required>{{ old('purpose') }}</textarea>
              @error('purpose')
                <div class="error-message">{{ $message }}</div>
              @enderror
          </div>
          
          <div class="authorize-section">
              <!-- <h2 class=title-authorize>AUTORIZAR</h2> -->
              <p class="br max">Autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar de mi salario la cantidad aprobada en: <input type="text" id="partidas" name="partidas"> partidas, comenzando en la quincena de <input type="text" id="quincena" name="quincena">, en caso de que mi contrato fuera cancelado, autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar el saldo o saldos adeudados, de la liquidación de mis salarios, prestaciones sociales o bonificaciones a que tenga derecho, a la terminación de mi contrato.
              </p>
          </div>
          <div class="separator-max"></div>
          <div class="employee-date-section flx br box">
              <!-- <h2>EMPLEADO - FECHA</h2> -->
              <div class="label-input-group flx">
                <label for="employee" class="employee-label">EL EMPLEADO:</label>
                <input type="text" id="employee" name="employee" required value="{{ old('employee') }}">
              </div>
              @error('employee')
                <div class="error-message">{{ $message }}</div>
              @enderror

              <div class="label-input-group flx">
                  <label for="date" class="date-label">FECHA:</label>
                  <input type="date" id="date" name="date" required value="{{ old('date') }}">
                  @error('date')
                    <div class="error-message">{{ $message }}</div>
                  @enderror
              </div>
          </div>
      </div>
    <div class="btn">
      <button type="submit" class="br">Enviar</button> <!-- Botón para enviar el formulario -->
    </div>
  </form>
</body>
</html>