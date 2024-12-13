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

      <h2>DATOS</h2>
      <!-- 3 CHECKBOX DEL INICIO -->
      <div class="radio-inputs">
        <label class="radio">
          <input type="radio" name="radio" checked="">
          <span class="name">Solicitud de Prestamo</span>
        </label>
        <label class="radio">
          <input type="radio" name="radio">
          <span class="name">Anticipo Arriendo de Moto</span>
        </label>
            
        <label class="radio">
          <input type="radio" name="radio">
          <span class="name">Anticipo Sueldo</span>
        </label>
      </div>

      <!-- PRIMER FORMULARIO -->
      <div class="form-group">
          <!-- <h2 class="title-data">DATOS</h2> -->
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
          
          <!-- <h2 class=title-purpose>PROPOSITO</h2> -->
          <h3>PROPOSITO</h3>
          <div class="purpose">
              <textarea id="purpose" name="purpose" rows="2" placeholder="Escriba el proposito..."required></textarea>
          </div>
          
          <div class="authorize">
              <!-- <h2 class=title-authorize>AUTORIZAR</h2> -->
              <p>Autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar de mi salario la cantidad aprobada en: <input type="text" id="partidas" name="partidas"> partidas, comenzando en la quincena de <input type="text" id="quincena" name="quincena">, en caso de que mi contrato fuera cancelado, autorizo a <strong>R.I.B LOGISTICA S.A.S</strong>, para descontar el saldo o saldos adeudados, de la liquidación de mis salarios, prestaciones sociales o bonificaciones a que tenga derecho, a la terminación de mi contrato.
              </p>
          </div>
          <div class="separator"></div>
          <div class="employee-date">
              <!-- <h2>EMPLEADO - FECHA</h2> -->
              <div class="label-input-group">
                  <label for="employee" class="employee-label">EL EMPLEADO:</label>
                  <input type="text" id="employee" name="employee" required>
              </div>

              <div class="label-input-group">
                  <label for="date" class="date-label">FECHA:</label>
                  <input type="date" id="date" name="date" required>
              </div>
          </div>
      </div>

      <h2>PARA USO DE LA EMPRESA</h2>
      <div class="form-group-2">
        <div class="salary-info">
          <div class="label-input-group">
            <label for="balance" class="balance-label">Saldo a cargo del Empleado $:</label>
            <input type="text" id="balance" name="balance" required>
          </div>
          <div class="label-input-group">
            <label for="marytiry" class="marytiry-label">Vencimiento:</label>
            <input type="text" id="marytiry" name="marytiry" required>
          </div>
          <div class="label-input-group">
            <label for="payments" class="payments-label">Pagos quincenales $:</label>
            <input type="text" id="payments" name="payments" required>
          </div>
          <div class="label-input-group">
            <label for="entrydate" class="entrydate-label">Fecha de Entrada:</label>
            <input type="date" id="entrydate" name="entrydate" required>
          </div>
          <div class="label-input-group">
            <label for="salary" class="salary-label">Salario $:</label>
            <input type="text" id="salary" name="salary" required>
        </div>

          <!-- <div class="separator"></div> -->
            
          <div class="signature-date">
            <div class="date">
<!-- FECHA EN LA QUE SE LLENÓ ESTE SEGUNDO INFORME -->
              <label for="date" class="datesignature-label">Fecha</label>
              <input type="date" id="date" name="date" required>
            </div>

<!-- LA FIRMA PUEDE SER UN SELECCIONAR YA QUE SON POCOS LOS RESPONSABLES DEL INFORME -->
            <div class="responsible-signature-report">
              <label for="responsible-signature-report" class="signature-label">Responsable del Informe</label>
              <select name="responsible-report" >
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
        <div class="signature-frequency-content">
          <div class="payment-signature">
            <div class="payment-status">
              <label for="payment-status" class="payment-status-label">Estado del Pago:</label>
              <select name="payment-status" id="payment-status">
                <option value="approved">APROBADO</option>
                <option value="no-aprovend">NO APROBADO</option>
              </select>
            </div>
            <div class="signature">
                <label for="signature" class="signature-label">Firma</label>
                <input type="text" id="signature" name="signature" required>
            </div>
          </div>

            <div class="label-input-group">
              <label for="approved-amount" class="approvedamount-label">Cantidad Aprobada $:</label>
              <input type="text" id="approved-amount" name="approved-amount" required>
            </div>

            <h3>PARA PAGOS</h3>
            <!-- <div class="for-payments"> -->
  <!-- LOS PAGOS SE TACHAN CON UNA X -->
              <div class="label-input-group">
                <div class="payment-frequency">
                  <label for="">Frecuencia</label>
                  <select name="" id="">
                    <option value="quincenales">QUINCELANES</option>
                    <option value="quincenales">MENSUALES</option>
                  </select>
                </div>
                <!-- <label for="quincena" class="quincena-label">:</label> -->
                <!-- <input type="text" id="quincena" name="quincena" required> -->
                <div class="date">
                  <label for="from" class="from-label">A partir de:</label>
                  <input type="date" id="from" name="from" required>
                </div>
              </div>
        </div>

            <div class="separator"></div>

            <div class="label-input-group">
              <label for="new-discounts" class="new-discounts-label">Nuevos decuentos:</label>
              <input type="text" id="new-discounts" name="new-discounts" required>
            </div>
            
            <!-- tabla de 3 columnas 4 filas -->
            <div class="table-container">
              <table class="table">
                <tr>
                  <th class="table-header-title-sup">LIBRANZAS</th>
                  <th class="table-header-title-sup">CUOTA MENSUAL</th>
                  <th class="table-header-title-sup">SALDO</th>
                </tr>
                <tr>
                  <th class="table-header-title">COMFENALCO</th>
                  <th class="table-header"><input type="text" id="input-table-22" name="input-table"></th>
                  <th class="table-header"><input type="text" id="input-table-23" name="input-table"></th>
                </tr>
                <tr>
                  <th class="table-header-title">COMBARRANQUILLA</th>
                  <th class="table-header"><input type="text" id="input-table-32" name="input-table"></th>
                  <th class="table-header"><input type="text" id="input-table-33" name="input-table"></th>
                </tr>
                <tr>
                  <th class="table-header-title">OTROS</th>
                  <th class="table-header"><input type="text" id="input-table-42" name="input-table"></th>
                  <th class="table-header"><input type="text" id="input-table-43" name="input-table"></th>
                </tr>
              </table>
            </div>
            <div class="final-container">
              <label for="approved-by">APROBADO POR:</label>
              <input type="text" id="input-approved">
              <label for="date-approved">FECHA:</label>
              <input type="date">
            </div>  
      </div>
            <button type="submit">Enviar</button> <!-- Botón para enviar el formulario -->
  </form>
</body>
</html>