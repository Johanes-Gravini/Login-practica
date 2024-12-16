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
				<strong>SOLICITUD DE PRESTAMO</strong>
			</label>
	
			<label>
				<span class="custom-checkbox"></span>
				<input type="checkbox" id="option2" name="option2" value="value2">
				<strong>ANTICIPO DE ARRIENDO DE MOTO</strong>
			</label>
	
			<label>
				<span class="custom-checkbox"></span>
				<input type="checkbox" id="option3" name="option3" value="value3">
				<strong>ANTICIPO SUELDO</strong>
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

			<div class="authorize">
				<p>
					Autorizo a <strong>R.I.B. LOGISTICAS S.A.S</strong>, para descontar de mi salario la cantidad aprobada en ____ partidas, comenzando en la quincena de ____, en caso de que mi contrato fuera cancelado, autorizo a <strong>R.I.B. LOGISTICAS S.A.S</strong>, para descontar el saldo o saldos adeudados, de la liquidación de mis salarios, prestaciones sociales o bonificaciones a que tenga derecho, a la terminación de mi contrato.
				</p>
			</div>

			<div class="personal-data">
				<label for="employee" class="employee-label">EL EMPLEADO:</label>
				<input type="text" id="employee" name="employee">

				<label for="date" class="date-label">FECHA:</label>
				<input type="text" id="date" name="date">
			</div>
		</div>

		<div class="title-2">
			<u>PARA USO DE LA EMPRESA</u>
		</div>

		<!-- SEGUNDO FORMULARIO -->
		<div class="form-group-2">
			<div class="balance-maturity">
				<label for="balance" class="balance-label">Saldo a cargo del Empleado $:</label>
				<input type="text" id="balance" name="balance" required>

				<label for="maturity" class="maturity-label">Vencimiento:</label>
				<input type="text" id="maturity" name="maturity" required>
			</div>

			<div class="payments-entrydate">
				<label for="payments" class="payments-label">Pagos quincenales $:</label>
				<input type="text" id="payments" name="payments" required>

				<label for="entrydate" class="entrydate-label">Fecha de Entrada:</label>
				<input type="date" id="entrydate" name="entrydate" required>
			</div>

			<div class="salary-container">
				<label for="salary" class="salary-label">Salario $:</label>
				<input type="text" id="salary" name="salary" required>
			</div>

			<div class="responsible-date"> 
				<div class="responsible"> 
					<label for="responsible" class="responsible-report">Responsable del Informe</label>
				</div>
				<div class="date">
					<label for="date" class="date-responsible-label">Fecha</label>
					<input type="date" id="date" name="date" required>
				</div>
			</div>

			<div class="status-payments">
				<div class="approved">
					<label for="approved-label">APROBADO:</label>
					<input type="text" id="id-approved">
				</div>
				<div class="no-approved">
					<label for="noapproved-label">NO APROBADO:</label>
					<input type="text" id="id-noapproved">
				</div>
				<div class="signature">
					<label for="approved-label">FIRMA:</label>
					<input type="text" id="id-signature">
				</div>

				<div class="approved-amount">
					<label for="approved-amount">CANTIDAD APROBADA:</label>
					<input type="text" id="id-approvedamount">
				</div>
			</div>

			<div class="subtitle">
				<u>PARA PAGOS:</u>
			</div>

			<div class="payment-frequency">
				<div class="quincenales">
					<label for="quincenales-label">QUINCENALES:</label>
					<input type="text" id="id-quincenales">
				</div>
				<div class="no-approved">
					<label for="MENSUALES-label">MENSUALES:</label>
					<input type="text" id="id-mensuales">
				</div>
				<div class="from">
					<label for="from-label">A PARTIR DE:</label>
					<input type="text" id="id-from">
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

		</div>
	</div>
</body>
</html>