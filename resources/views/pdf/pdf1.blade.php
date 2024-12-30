<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ public_path('css/pdf1.css') }}">
	@vite('resources/css/prueba.css')
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
				<span class="custom-checkbox">
					@if($admin->prestamo && $admin->prestamo->options == 'solicitud_prestamo')
						X
					@endif
				</span>
				<input type="checkbox" id="option1" name="options" value="value1"
					@if($admin->prestamo && $admin->prestamo->options == 'solicitud_prestamo') checked @endif>
				<strong>SOLICITUD DE PRESTAMO</strong>
			</label>
	
			<label>
				<span class="custom-checkbox">
					@if( $admin->prestamo && $admin->prestamo->options == 'anticipo_arriendo_moto')
						X
					@endif
				</span>
				<input type="checkbox" id="option2" name="options" value="value2"
					@if($admin->prestamo &&  $admin->prestamo->options == 'anticipo_arriendo_moto') checked @endif>
				<strong>ANTICIPO DE ARRIENDO DE MOTO</strong>
			</label>
	
			<label>
				<span class="custom-checkbox">
					@if($admin->prestamo &&  $admin->prestamo->options == 'anticipo_sueldo')
						X
					@endif
				</span>
				<input type="checkbox" id="option3" name="options" value="value3"
					@if($admin->prestamo &&  $admin->prestamo->options == 'anticipo_sueldo') checked @endif>
				<strong>ANTICIPO SUELDO</strong>
			</label>
		</div>

		<!-- PRIMER FORMULARIO -->
		<div class="form-group">
			<div class="personal-data">
				<label for="name" class="name-label" id="name-label-fl">NOMBRE:</label>
				<input type="text" id="id-name-fl" name="name" value="{{ $admin->prestamo->name }}">

				<label for="cc" class="cc-label" id="cc-fl">C.C:</label>
				<input type="text" id="cc" name="cc" value="{{ $admin->prestamo->cc }}">
			</div>

			<div class="value-discount">
				<label for="value" class="value-label" id="value-label-fl">VALOR SOLICITUADO:</label>
				<input type="text" id="id-value-fl" name="value" value="{{ $admin->prestamo->value }}">

				<label for="discount" class="discount-label" id="discount-label-fl">DESC. SUGERIDO:</label>
				<input type="text" id="id-discount-fl" name="discount" value="{{ $admin->prestamo->discount }}%">
			</div>

			<div class="purpose">
				<label for="purpose" class="purpose-label">PROPOSITO:</label>
				<textarea id="purpose" name="purpose" rows="2">{{ $admin->prestamo->purpose }}</textarea>
			</div>

			<div class="authorize">
				<p>
					Autorizo a <strong>R.I.B. LOGISTICAS S.A.S</strong>, para descontar de mi salario la cantidad aprobada en ____ partidas, comenzando en la quincena de ____, en caso de que mi contrato fuera cancelado, autorizo a <strong>R.I.B. LOGISTICAS S.A.S</strong>, para descontar el saldo o saldos adeudados, de la liquidación de mis salarios, prestaciones sociales o bonificaciones a que tenga derecho, a la terminación de mi contrato.
				</p>
			</div>

			<div class="personal-data">
				<label for="employee" class="employee-label" id="employee-label-fl">EL EMPLEADO:</label>
				<input type="text" id="id-employee-fl" name="employee" value="{{ $admin->prestamo->employee }}">

				<label for="date" class="date-label" id="date-label-fl">FECHA:</label>
				<input type="date" id="id-date-fl" name="date" value="{{ $admin->prestamo->date }}">
			</div>
		</div>

		<div class="title-2">
			<u>PARA USO DE LA EMPRESA</u>
		</div>

		<!-- SEGUNDO FORMULARIO -->
		<div class="form-group-2">
			<div class="balance-maturity-content">
				<label for="balance" class="balance-label" id="balance-label-fl">Saldo a cargo del Empleado $:</label>
				<input type="text" id="id-balance-fl" name="balance" required>

				<label for="maturity" class="maturity-label" id="maturity-label-fl">Vencimiento:</label>
				<input type="text" id="id-maturity-fl" name="maturity" required>
			</div>

			<div class="payments-entrydate-content">
				<label for="payments" class="payments-label" id="payments-label-fl">Pagos quincenales $:</label>
				<input type="text" id="id-payments-fl" name="payments" required>

				<label for="entrydate" class="entrydate-label" id="entrydate-label-fl">Fecha de Entrada:</label>
				<input type="date" id="id-entrydate-fl" name="entrydate" required>
			</div>

			<div class="salary-container-content">
				<label for="salary" class="salary-label" id="salary-label-fl">Salario $:</label>
				<input type="text" id="id-salary-fl" name="salary" required>
			</div>

			<div class="responsible-date-content"> 
				<div class="responsible"> 
					<label for="responsible" class="responsible-report">Responsable del Informe</label>
				</div>
				<div class="date">
					<label for="date" class="date-responsible-label" id="date-responsible-label-fl">Fecha</label>
					<input type="date" id="id-date-fl" name="date" required>
				</div>
			</div>

			<div class="status-payments-content">
				<div class="approved">
					<label for="approved-label" id="approved-label-fl">APROBADO:</label>
					<input type="text" id="id-approved-fl-x">
				</div>
				<div class="no-approved">
					<label for="noapproved-label" id="noapproved-label-fl">NO APROBADO:</label>
					<input type="text" id="id-noapproved-fl-x">
				</div>
				<div class="signature">
					<label for="approved-label" id="approvedfirma-label-fl">FIRMA:</label>
					<input type="text" id="id-signature-fl">
				</div>

				<div class="approved-amount-content">
					<label for="approved-amount" id="approvedamount-label-fl">CANTIDAD APROBADA:</label>
					<input type="text" id="id-approvedamount-fl">
				</div>
			</div>

			<div class="subtitle">
				<u>PARA PAGOS:</u>
			</div>

			<div class="payment-frequency-content">
				<div class="quincenales">
					<label for="quincenales-label" id="quincenales-label-fl">QUINCENALES:</label>
					<input type="text" id="id-quincenales-fl-x">
				</div>
				<div class="no-approved">
					<label for="mensuales-label" id="mensuales-label-fl">MENSUALES:</label>
					<input type="text" id="id-mensuales-fl-x">
				</div>
				<div class="from">
					<label for="from-label" id="from-label-fl">A PARTIR DE:</label>
					<input type="text" id="id-from-fl">
				</div>
			</div>

			<div class="new-discounts">
				<label for="new-discounts">
					<strong>
						NUEVOS DESCUENTOS:
					</strong> 
				</label>
				<input type="text" id="id-newdiscounts">
			</div>

			<!-- tabla de 3 columnas 4 filas -->
            <div class="table-container-content">
              <table class="table">
                <tr>
                  <th class="table-header-title-sup">LIBRANZAS</th>
                  <th class="table-header-title-sup">CUOTA MENSUAL</th>
                  <th class="table-header-title-sup">SALDO</th>
                </tr>
                <tr>
                  <th class="table-header-title">COMFENALCO</th>
                  <th class="table-header">$<input type="text" id="input-table-22" name="input-table"></th>
                  <th class="table-header"><input type="text" id="input-table-23" name="input-table"></th>
                </tr>
                <tr>
                  <th class="table-header-title">COMBARRANQUILLA</th>
                  <th class="table-header">$<input type="text" id="input-table-32" name="input-table"></th>
                  <th class="table-header"><input type="text" id="input-table-33" name="input-table"></th>
                </tr>
                <tr>
                  <th class="table-header-title">OTROS</th>
                  <th class="table-header">$<input type="text" id="input-table-42" name="input-table"></th>
                  <th class="table-header"><input type="text" id="input-table-43" name="input-table"></th>
                </tr>
              </table>
            </div>

			<div class="final-container-content">
              <label for="approved-by" id="approvedby-label-fl">APROBADO POR:</label>
              <input type="text" id="input-approved-fl">
              <label for="date-approved" id="dateapproved-label-fl">FECHA:</label>
              <input type="date" id="input-data-approved-fl">
            </div> 
		</div>
	</div>
</body>
</html>