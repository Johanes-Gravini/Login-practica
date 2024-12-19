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
  <div class="title">
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
    <div class="request-info-section">

      <h2>DATOS</h2>
      <!-- 3 CHECKBOX DEL INICIO -->
      <div class="radio-inputs-section">
        <label class="radio">
            <input type="radio" name="options" value="solicitud_prestamo" {{ old('options') == 'solicitud_prestamo' ? 'checked' : '' }}>
            <span class="name">Solicitud de Préstamo</span>
        </label>
        <label class="radio">
            <input type="radio" name="options" value="anticipo_arriendo_moto" {{ old('options') == 'anticipo_arriendo_moto' ? 'checked' : '' }}>
            <span class="name">Anticipo Arriendo de Moto</span>
        </label>
        <label class="radio">
            <input type="radio" name="options" value="anticipo_sueldo" {{ old('options') == 'anticipo_sueldo' ? 'checked' : '' }}>
            <span class="name">Anticipo Sueldo</span>
        </label>
      </div>
      @error('options')
        <div class="error-message">{{ $message }}</div>
        <div class="separator"></div>
      @enderror

      <!-- PRIMER FORMULARIO -->
      <div class="form-group">
          <!-- <h2 class="title-data">DATOS</h2> -->
          <div class="p-v-section flx">
            <div class="personal-data flx">
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
            
            <div class="value-discount flx">
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
          <h3>PROPOSITO</h3>
          <div class="purpose-section flx">
              <textarea id="purpose" name="purpose" rows="2" placeholder="Escriba el propósito..." required>{{ old('purpose') }}</textarea>
              @error('purpose')
                <div class="error-message">{{ $message }}</div>
              @enderror
          </div>
          
          <div class="authorize-section">
              <!-- <h2 class=title-authorize>AUTORIZAR</h2> -->
              <p>Autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar de mi salario la cantidad aprobada en: <input type="text" id="partidas" name="partidas"> partidas, comenzando en la quincena de <input type="text" id="quincena" name="quincena">, en caso de que mi contrato fuera cancelado, autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar el saldo o saldos adeudados, de la liquidación de mis salarios, prestaciones sociales o bonificaciones a que tenga derecho, a la terminación de mi contrato.
              </p>
          </div>
          <div class="separator"></div>
          <div class="employee-date-section flx">
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

      <h2>PARA USO DE LA EMPRESA</h2>
      <div class="form-group-2">
        <div class="salary-info-section flx">
          <div class="label-input-group flx">
            <label for="balance" class="balance-label">Saldo a cargo del Empleado $:</label>
            <input type="text" id="balance" name="balance" required disabled>
          </div>
          <div class="label-input-group flx">
            <label for="maturity" class="maturity-label">Vencimiento:</label>
            <input type="text" id="maturity" name="maturity" required disabled>
          </div>
          <div class="label-input-group flx">
            <label for="payments" class="payments-label">Pagos quincenales $:</label>
            <input type="text" id="payments" name="payments" required disabled>
          </div>
          <div class="label-input-group flx">
            <label for="entrydate" class="entrydate-label">Fecha de Entrada:</label>
            <input type="date" id="entrydate" name="entrydate" required disabled>
          </div>
          <div class="label-input-group flx">
            <label for="salary" class="salary-label">Salario $:</label>
            <input type="text" id="salary" name="salary" required disabled>
        </div>

          <!-- <div class="separator"></div> -->
            
          <div class="signature-date flx">
            <div class="date flx">
<!-- FECHA EN LA QUE SE LLENÓ ESTE SEGUNDO INFORME -->
              <label for="date" class="datesignature-label">Fecha</label>
              <input type="date" id="date" name="date" required disabled>
            </div>

<!-- LA FIRMA PUEDE SER UN SELECCIONAR YA QUE SON POCOS LOS RESPONSABLES DEL INFORME -->
            <div class="responsible-signature-report flx">
              <label for="responsible-signature-report flx" class="signature-label">Responsable del Informe</label>
              <select name="responsible-report" disabled>
                <option value="1">PERSONA 1</option>
                <option value="2">PERSONA 2</option>
                <option value="3">PERSONA 3</option>
                <option value="4">PERSONA 4</option>
              </select>
            </div>
          </div>
        </div>

        <div class="separator"></div>
  <!-- SEGUNDA FIRMA PARA EL QUE APROBÓ O NO -->
        <div class="signature-frequency-content-section flx">
          <div class="payment-signature flx">
            <div class="payment-status flx">
              <label for="payment-status" class="payment-status-label">Estado del Pago:</label>
              <select name="payment-status" id="payment-status" disabled>
                <option value="approved">APROBADO</option>
                <option value="no-aprovend">NO APROBADO</option>
              </select>
            </div>
            <div class="signature flx">
                <label for="signature" class="signature-label">Firma</label>
                <input type="text" id="signature" name="signature" required disabled>
            </div>
          </div>

            <div class="label-input-group flx">
              <label for="approved-amount" class="approvedamount-label">Cantidad Aprobada $:</label>
              <input type="text" id="approved-amount" name="approved-amount" required disabled>
            </div>

            <h3>PARA PAGOS</h3>
            <!-- <div class="for-payments"> -->
  <!-- LOS PAGOS SE TACHAN CON UNA X -->
              <div class="label-input-group flx">
                <div class="payment-frequency flx">
                  <label for="">Frecuencia</label>
                  <select disabled>
                    <option value="quincenales">QUINCELANES</option>
                    <option value="mensuales">MENSUALES</option>
                  </select>
                </div>
                <!-- <label for="quincena" class="quincena-label">:</label> -->
                <!-- <input type="text" id="quincena" name="quincena" required> -->
                <div class="date flx">
                  <label for="from" class="from-label">A partir de:</label>
                  <input type="date" id="from" name="from" required disabled>
                </div>
              </div>
        </div>

            <div class="separator"></div>

            <div class="label-input-group flx">
              <label for="new-discounts" class="new-discounts-label">Nuevos decuentos:</label>
              <input type="text" id="new-discounts" name="new-discounts" required disabled>
            </div>
            
            <!-- tabla de 3 columnas 4 filas -->
            <div class="table-container-section">
              <table class="table-section">
                <tr>
                  <th class="table-header-title-sup">LIBRANZAS</th>
                  <th class="table-header-title-sup">CUOTA MENSUAL</th>
                  <th class="table-header-title-sup">SALDO</th>
                </tr>
                <tr>
                  <th class="table-header-title">COMFENALCO</th>
                  <th class="table-header"><input type="text" id="input-table-22" name="input-table" disabled></th>
                  <th class="table-header"><input type="text" id="input-table-23" name="input-table" disabled></th>
                </tr>
                <tr>
                  <th class="table-header-title">COMBARRANQUILLA</th>
                  <th class="table-header"><input type="text" id="input-table-32" name="input-table" disabled></th>
                  <th class="table-header"><input type="text" id="input-table-33" name="input-table" disabled></th>
                </tr>
                <tr>
                  <th class="table-header-title">OTROS</th>
                  <th class="table-header"><input type="text" id="input-table-42" name="input-table" disabled></th>
                  <th class="table-header"><input type="text" id="input-table-43" name="input-table" disabled></th>
                </tr>
              </table>
            </div>
            <div class="final-container-section flx">
              <label for="approved-by">APROBADO POR:</label>
              <input type="text" id="input-approved" disabled>

              <label for="date-approved">FECHA:</label>
              <input type="date" disabled>
            </div> 
          </div>
          <div class="btn">
            <button type="submit">Enviar</button> <!-- Botón para enviar el formulario -->
          </div>
  </form>
</body>
</html>