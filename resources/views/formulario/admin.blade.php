<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="../../css/form.css"> -->
  <title>PRESTAMOS RIB SUELDO</title>
  @vite('resources/css/form.css')
  @vite('resources/css/details.css')
</head>
<body>
  <div class="title max">
      <u>R.I.B LOGISTICAS S.A.S</u>
  </div>
  <div class="main">

    <div class="loan-details-card">
      <h2>Detalles del Préstamo</h2>
      <div class="details-grid">
          <!-- <p><strong>ID:</strong> {{ $prestamo->id }}</p> -->
          <p><strong>Opción de Préstamo:</strong> {{ $prestamo->options }}</p>
          <p><strong>Cliente:</strong> {{ $prestamo->name }}</p>
          <p><strong>Cédula:</strong> {{ $prestamo->cc }}</p>
          <p><strong>Valor Solicitado:</strong> ${{ number_format($prestamo->value, 2) }}</p>
          <p><strong>Descuento:</strong> {{ $prestamo->discount }}%</p>
          <p><strong>Propósito:</strong> {{ $prestamo->purpose }}</p>
          <p><strong>Empleado:</strong> {{ $prestamo->employee }}</p>
          <p><strong>Fecha:</strong> {{ $prestamo->date }}</p>
      </div>
    </div>
  
    <form action="{{ route('form.submit.admin', $prestamo->id) }}" method="POST">
      @csrf
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
      <div class="request-info-section br">
        <h2 class="max">PARA USO DE LA EMPRESA</h2>
        <div class="form-group-2 br">
          <div class="salary-info-section flx br box">
            <div class="label-input-group flx">
              <label for="balance" class="balance-label">Saldo a cargo del Empleado $:</label>
              <input type="number" id="balance" name="balance" value="{{ old('balance') }}" required>
              @error('balance')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
            <div class="label-input-group flx">
              <label for="maturity" class="maturity-label">Vencimiento:</label>
              <input type="text" id="maturity" name="maturity" value="{{ old('maturity') }}" required>
              @error('maturity')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
            <div class="label-input-group flx">
              <label for="payments" class="payments-label">Pagos quincenales $:</label>
              <input type="number" id="payments" name="payments" value="{{ old('payments') }}" required>
              @error('payments')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
            <div class="label-input-group flx">
              <label for="entrydate" class="entrydate-label">Fecha de Entrada:</label>
              <input type="date" id="entrydate" name="entrydate" value="{{ old('entrydate') }}" required>
              @error('entrydate')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
            <div class="label-input-group flx">
              <label for="salary" class="salary-label">Salario $:</label>
              <input type="number" id="salary" name="salary" value="{{ old('salary') }}" required>
              @error('salary')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
  
            <div class="signature-date flx">
              <div class="date-report flx">
                <label for="date" class="datesignature-label">Fecha</label>
                <input type="date" id="date" name="date" value="{{ old('date') }}" required>
                @error('date')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
  
  
              <div class="responsible-signature-report flx">
                <label for="responsible-signature-report flx" class="signature-label">Responsable del Informe</label>
                <select name="responsible_report" id="responsible-report" value="{{ old('responsible_report') }}">
                  <option value="1">PERSONA 1</option>
                  <option value="2">PERSONA 2</option>
                  <option value="3">PERSONA 3</option>
                  <option value="4">PERSONA 4</option>
                </select>
                @error('responsible_report')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
  
          <div class="separator-max"></div>
    
          <div class="signature-frequency-content-section flx br box">
            <div class="payment-signature flx">
              <div class="payment-status-report flx">
                <label for="payment-status" class="payment-status-label">Estado del Pago:</label>
                <select name="payment_status" id="payment-status" value="{{ old('payment_status') }}">
                  <option value="approved">APROBADO</option>
                  <option value="no-aprovend">NO APROBADO</option>
                </select>
                @error('payment_status')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
              <div class="signature-report flx">
                  <label for="signature" class="signature-label">Firma</label>
                  <input type="text" class="max" id="signature" name="signature" value="{{ old('signature') }}" required>
                  @error('signature')
                    <div class="error-message">{{ $message }}</div>
                  @enderror
              </div>
            </div>
  
            <div class="label-input-group flx">
              <label for="approved-amount" class="approvedamount-label">Cantidad Aprobada $:</label>
              <input type="number" id="approved-amount" name="approved_amount" value="{{ old('approved_amount') }}" required>
              @error('approved-amount')
                <div class="error-message">{{ $message }}</div>
              @enderror
            </div>
  
            <h3 class="max">PARA PAGOS</h3>     

            <div class="label-input-group flx">
              <div class="payment-frequency-report flx">
                <label for="">Frecuencia</label>
                <select name="payment_frequency" value="{{ old('payment_frequency') }}">
                  <option value="quincenales">QUINCELANES</option>
                  <option value="mensuales">MENSUALES</option>
                </select>
                @error('payment_frequency')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
              
              <div class="date-report flx">
                <label for="from" class="from-label">A partir de:</label>
                <input type="date" id="from" name="from" value="{{ old('from') }}" required>
                @error('from')
                  <div class="error-message">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>
  
          <div class="separator-max"></div>
  
          <div class="label-input-group flx">
            <label for="new-discounts" class="new-discounts-label">Nuevos decuentos:</label>
            <input type="text" id="new-discounts" name="new_discounts" value="{{ old('new_discounts') }}" required>
            @error('new_discount')
              <div class="error-message">{{ $message }}</div>
            @enderror
          </div>
              
          <div class="table-container-section max br">
            <table class="table-section max">
              <tr>
                <th class="table-header-title-sup">LIBRANZAS</th>
                <th class="table-header-title-sup">CUOTA MENSUAL</th>
                <th class="table-header-title-sup">SALDO</th>
              </tr>
              <tr>
                <th class="table-header-title">COMFENALCO</th>
                <th class="table-header"><input type="number" id="input-table-22" name="comfenalco_mensual" value="{{ old('comfenalco_mensual') }}"></th>
                <th class="table-header"><input type="number" id="input-table-23" name="comfenalco_saldo" value="{{ old('comfenalco_saldo') }}" ></th>
              </tr>
              <tr>
                <th class="table-header-title">COMBARRANQUILLA</th>
                <th class="table-header"><input type="number" id="input-table-32" name="combarranquilla_mensual" value="{{ old('combarranquilla_mensual') }}" ></th>
                <th class="table-header"><input type="number" id="input-table-33" name="combarranquilla_saldo" value="{{ old('combarranquilla_saldo') }}"></th>
              </tr>
              <tr>
                <th class="table-header-title">OTROS</th>
                <th class="table-header"><input type="number" id="input-table-42" name="otros_mensual" value="{{ old('otros_mensual') }}"></th>
                <th class="table-header"><input type="number" id="input-table-43" name="otros_saldo" value="{{ old('otros_saldo') }}"></th>
              </tr>
            </table>
          </div>
          <div class="final-container-section flx br box">
            <label for="approved-by">APROBADO POR:</label>
            <input type="text" id="input-approved" name="input_approved" value="{{ old('input_approved') }}">
            @error('input_approved')
              <div class="error-message">{{ $message }}</div>
            @enderror
  
            <label for="date-approved">FECHA:</label>
            <input type="date" name="date_approved" value="{{ old('date_approved') }}" required>
            @error('date_approved')
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