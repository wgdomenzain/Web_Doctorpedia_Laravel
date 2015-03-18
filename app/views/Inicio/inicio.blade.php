<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Doctorpedia</title>
	{{ HTML::script('resources/js/jquery.js') }}
	{{ HTML::script('resources/js/functions.js') }}
	{{ HTML::script('resources/js/mapa.js') }}
	{{ HTML::style('resources/css/styles.css'); }}
</head>
<body>
    <section id="banner-login">
    <header>
    	<nav id="nav-home">
    		<div class="nav-button-home">Sign In</div>
    		<div class="form hide">
    			<div class="div-form-button">
    				<div class="form-button-home left background-blue" data-tab="sign">Paciente</div>
    				<div id="click_mapa" class="form-button-home right background-gray" data-tab="sign">Doctor</div>
    				<div class="clear"></div>
    				<div id="sign-Paciente-form" class="form-block" data-block="sign">
    					<form action="{{asset('PRegister')}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    						{{Form::token();}}
    						<div class="block-form-home">
    							<div class="block-form-title">
    								Paciente
    							</div>
								<div class="image-upload inline">
								    <label for="file-input-paciente">
								        <img class="border" src="{{asset('resources/img/ic_contact_picture.png')}}"/>
								    </label>
								    <input name="foto_perfil_paciente" class="" id="file-input-paciente" type="file"/>
								</div>
    							<div class="input-info inline">	
									<input name="email" class="required" type="email" placeholder="Correo electrónico">
									<input name="password" class="required" type="password" placeholder="Contraseña">
									<input name="second_password" class="required" type="password" placeholder="Confirmar Contraseña">	
    							</div>
    						</div>
    						<div class="block-form-home">
    							<div class="block-form-title">
    								Personal
    							</div>
    							<div>
    								<input name="name" class="required" type="text" placeholder="Nombre">
    								<input name="surname1" class="required" type="text" placeholder="Apellido Paterno">
    								<input name="surname2" class="required" type="text" placeholder="Apellido Materno">
    								<input name="phone" class="required" type="text" placeholder="Teléfono">
    								<input name="birthdate" class="required" type="date" placeholder="Fecha de Nacimiento">
    							</div>
    						</div>
    						<div class="block-form-home">
    							<div class="button button-submit">Registrarme</div>
    						</div>
    					</form>
    				</div>
    				<form id="sign-serialize" action="{{asset('DRegister')}}" method="post" enctype="multipart/form-data" accept-charset="UTF-8">
    					{{Form::token();}}
	    				<div id="sign-Doctor-form" class="form-block hide" data-block="sign">
							<div class="block-form-home">
								<div class="block-form-title">
									Doctor
								</div>
								<div class="image-upload inline">
								    <label for="file-input-doctor">
								        <img src="{{asset('resources/img/ic_contact_picture.png')}}"/>
								    </label>
								    <input name="foto_perfil_doctor" class="" id="file-input-doctor" type="file"/>
								</div>
								<div class="input-info inline">	
									<input name="email" class="required" type="email" placeholder="Correo electrónico">
									<input name="password" class="required" type="password" placeholder="Contraseña">
									<input name="password2" class="required" type="password" placeholder="Confirmar Contraseña">	
								</div>
							</div>
							<div class="block-form-home">
								<div class="block-form-title">
									Personal
								</div>
								<div>
									<div class="align-left">
										<div class="div-radio">
											<input class="inline" type="radio" name="gender" value="1" required>
											<label class="inline">Hombre</label>
										</div>
										<div class="div-radio">
											<input  class="inline" type="radio" name="gender" value="2" required>
											<label class="inline">Mujer</label>
										</div>
									</div>
									<input name="name" class="required" type="text" placeholder="Nombre">
									<input name="surname1" class="required" type="text" placeholder="Apellido Paterno">
									<input name="surname2" class="required" type="text" placeholder="Apellido Materno">
									<input name="phone" class="required" type="text" placeholder="Teléfono">
									<input name="address1" class="required" type="text" placeholder="Dirección 1">
									<input name="address2" class="required" type="text" placeholder="Dirección 2">
								</div>
							</div>
							<div class="block-form-home">
								<div class="block-form-title">
									Profesional
								</div>
								<div>
									<input name="credential" class="required" type="text" placeholder="Cédula Profesional">
									<div class="align-left">
										<dl class="dropdown"> 
										    <dt>
										    <a data-ul="especialidades" href="#">
										      <span data-span="especialidades" class="titulo">Especialidades</span>    
										      <p data-tipo="especialidades" class="multiSel dropdown-required"></p>  
										    </a>
										    </dt>
										    <dd>
										        <div class="mutliSelect">
										            <ul id="especialidades" class="ul-cerca">
										            	<li><input name="especialidades[]" type="checkbox" value="Alergología e inmunología pediátrica" />Alergología e inmunología pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Algología" />Algología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Anatomía Patológica" />Anatomía Patológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Andrología" />Andrología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Anestesiología" />Anestesiología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Angiología y cirugía vascular" />Angiología y cirugía vascular</li>
												        <li><input name="especialidades[]" type="checkbox" value="Audiometría" />Audiometría</li>
												        <li><input name="especialidades[]" type="checkbox" value="Biología de la reproducción humana" />Biología de la reproducción humana</li>
												        <li><input name="especialidades[]" type="checkbox" value="Campimetría" />Campimetría</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cardiología" />Cardiología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cardiología Geriátrica" />Cardiología Geriátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cardiología Pediátrica" />Cardiología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Artotroscópica" />Cirugía Artotroscópica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Cardiotorácica" />Cirugía Cardiotorácica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Cardiovascular" />Cirugía Cardiovascular</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Cabeza y Cuello" />Cirugía de Cabeza y Cuello</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Columna" />Cirugía de Columna</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Córnea" />Cirugía de Córnea</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Mano" />Cirugía de Mano</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Tórax" />Cirugía de Tórax</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Transplantes" />Cirugía de Transplantes</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía del Aparato Digestivo" />Cirugía del Aparato Digestivo</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Dermatológica" />Cirugía Dermatológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Endoscópica" />Cirugía Endoscópica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Gastroenterologíca" />Cirugía Gastroenterologíca</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía General" />Cirugía General</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía General y Laparoscópica" />Cirugía General y Laparoscópica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Laparoscópica" />Cirugía Laparoscópica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Oftalmológica" />Cirugía Oftalmológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Oncológica" />Cirugía Oncológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Pediátrica" />Cirugía Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Plástica Y Reconstructiva" />Cirugía Plástica Y Reconstructiva</li>
												        <li><input name="especialidades[]" type="checkbox" value="Cirugía Vascular Periférica" />Cirugía Vascular Periférica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Colonoscopia" />Colonoscopia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Coloproctologia" />Coloproctologia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Colposcopia" />Colposcopia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Comunicación, Aufiología y Foniatría" />Comunicación, Aufiología y Foniatría</li>
												        <li><input name="especialidades[]" type="checkbox" value="Dermatología" />Dermatología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Dermatología Pediátrica" />Dermatología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Electrofisiología" />Electrofisiología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Endocrinología" />Endocrinología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Endocrinología Pediátrica" />Endocrinología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Endoscopía" />Endoscopía</li>
												        <li><input name="especialidades[]" type="checkbox" value="Endourología" />Endourología</li>
												        <li><input name="especialidades[]" type="checkbox" value="EQP para Rehabilitación Y Orto" />EQP para Rehabilitación Y Orto</li>
												        <li><input name="especialidades[]" type="checkbox" value="Fisioterapia y Rehabilitación" />Fisioterapia y Rehabilitación</li>
												        <li><input name="especialidades[]" type="checkbox" value="Gastroenterología" />Gastroenterología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Gastroenterología Pediátrica" />Gastroenterología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Gastroenterología Y Endoscopia" />Gastroenterología Y Endoscopia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Genética" />Genética</li>
												        <li><input name="especialidades[]" type="checkbox" value="Geriatría" />Geriatría</li>
												        <li><input name="especialidades[]" type="checkbox" value="Ginecología Oncológica" />Ginecología Oncológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Ginecología y Obstetricia" />Ginecología y Obstetricia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Hematología" />Hematología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Hemodinamia" />Hemodinamia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Infectología" />Infectología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Infectología pediátrica" />Infectología pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Inmunología" />Inmunología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Inmunología" />Inmunología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Inmunología" />Inmunología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina Crítica Pediátrica" />Medicina Crítica Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina Crítica y Terapia Intensiva" />Medicina Crítica y Terapia Intensiva</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina del Reporte" />Medicina del Reporte</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina Familiar" />Medicina Familiar</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina Fisica Y Rehabilitación" />Medicina Fisica Y Rehabilitación</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina General" />Medicina General</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina Interna" />Medicina Interna</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medicina Interna Pediátrica" />Medicina Interna Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Medico Coordinador" />Medico Coordinador</li>
												        <li><input name="especialidades[]" type="checkbox" value="Microcirugía" />Microcirugía</li>
												        <li><input name="especialidades[]" type="checkbox" value="Nefrología" />Nefrología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Nefrología Pediátrica" />Nefrología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neonatología" />Neonatología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neumología" />Neumología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neumología Pediátrica" />Neumología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neurocirugía" />Neurocirugía</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neurocirugía Pediátrica" />Neurocirugía Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neurología" />Neurología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Neurología Pediátrica" />Neurología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Nutriología Clínica" />Nutriología Clínica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Nutriología Pediátrica" />Nutriología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Odontopediatría" />Odontopediatría</li>
												        <li><input name="especialidades[]" type="checkbox" value="Oftalmología" />Oftalmología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Oftalmología Pediátrica" />Oftalmología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Oncología" />Oncología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Oncología Cutánea" />Oncología Cutánea</li>
												        <li><input name="especialidades[]" type="checkbox" value="Oncología Pediátrica" />Oncología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Ortopedía Y Traumatología" />Ortopedía Y Traumatología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Ortopedía Y Traumatología Pediátrica" />Ortopedía Y Traumatología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Otoneurología" />Otoneurología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Otorrinolaringología" />Otorrinolaringología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Otorrinolaringología Pediátrica" />Otorrinolaringología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Patología" />Patología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Pediatra" />Pediatra</li>
												        <li><input name="especialidades[]" type="checkbox" value="Perinatología" />Perinatología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Proctología" />Proctología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Psicología" />Psicología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Psicología Infantil" />Psicología Infantil</li>
												        <li><input name="especialidades[]" type="checkbox" value="Psicoterapia" />Psicoterapia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Psiquiatría" />Psiquiatría</li>
												        <li><input name="especialidades[]" type="checkbox" value="Quiropractico" />Quiropractico</li>
												        <li><input name="especialidades[]" type="checkbox" value="Radio-Oncología" />Radio-Oncología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Radiología" />Radiología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Radioterapia" />Radioterapia</li>
												        <li><input name="especialidades[]" type="checkbox" value="Reemplazos Articulares" />Reemplazos Articulares</li>
												        <li><input name="especialidades[]" type="checkbox" value="Rehabilitación de Problemas Auditivos" />Rehabilitación de Problemas Auditivos</li>
												        <li><input name="especialidades[]" type="checkbox" value="Reumatología" />Reumatología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Reumatología Pediátrica" />Reumatología Pediátrica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Terapia Endovascular Neurológica" />Terapia Endovascular Neurológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Terapia Fisica Y Rehabilitación" />Terapia Fisica Y Rehabilitación</li>
												        <li><input name="especialidades[]" type="checkbox" value="Urgencias Médico Quirúrgicas" />Urgencias Médico Quirúrgicas</li>
												        <li><input name="especialidades[]" type="checkbox" value="Urología" />Urología</li>
												        <li><input name="especialidades[]" type="checkbox" value="Urología Ginecológica" />Urología Ginecológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Urología Oncológica" />Urología Oncológica</li>
												        <li><input name="especialidades[]" type="checkbox" value="Urología Pediátrica" />Urología Pediátrica</li>
										            </ul>
										        </div>
										    </dd>
										</dl>
										<dl class="dropdown"> 
										    <dt>
										    <a data-ul="aseguradoras" href="#">
										      <span data-span="aseguradoras" class="">Aseguradoras</span>    
										      <p data-tipo="aseguradoras" class="multiSel dropdown-required"></p>  
										    </a>
										    </dt>
										    <dd>
										        <div class="mutliSelect">
										            <ul id="aseguradoras" class="ul-cerca">
														<li><input name="aseguradoras[]" type="checkbox" value="Axa" />Axa</li>
														<li><input name="aseguradoras[]" type="checkbox" value="GNP" />GNP</li>
														<li><input name="aseguradoras[]" type="checkbox" value="Inbursa" />Inbursa</li>
														<li><input name="aseguradoras[]" type="checkbox" value="Metlife" />Metlife</li>
														<li><input name="aseguradoras[]" type="checkbox" value="Seguros Monterrey" />Seguros Monterrey</li>
										            </ul>
										        </div>
										    </dd>
										</dl>
										<dl class="dropdown"> 
										    <dt>
										    <a data-ul="idiomas" href="#">
										      <span data-span="idiomas" class="">Idiomas</span>    
										      <p data-tipo="idiomas" class="multiSel dropdown-required"></p>  
										    </a>
										    </dt>
										    <dd>
										        <div class="mutliSelect">
										            <ul id="idiomas" class="ul-cerca">
														<li><input name="idiomas[]" type="checkbox" value="Alemán" />Alemán</li>
														<li><input name="idiomas[]" type="checkbox" value="Chino" />Chino</li>
														<li><input name="idiomas[]" type="checkbox" value="Español" />Español</li>
														<li><input name="idiomas[]" type="checkbox" value="Frances" />Francés</li>
														<li><input name="idiomas[]" type="checkbox" value="Inglés" />Inglés</li>
														<li><input name="idiomas[]" type="checkbox" value="Italiano" />Italiano</li>
														<li><input name="idiomas[]" type="checkbox" value="Japonés" />Japonés</li>
														<li><input name="idiomas[]" type="checkbox" value="Portugués" />Portugués</li>
														<li><input name="idiomas[]" type="checkbox" value="Ruso" />Ruso</li>
										            </ul>
										        </div>
										    </dd>
										</dl>
									</div>
									<textarea name="details" placeholder="Detalles"></textarea>
									<div id="map-button-home" class="button">Buscar mi localización</div>
									<div id="map-home"></div>
									<input name="lat" class="required" id="mapa_latitud" type="hidden">
									<input name="lng" class="required" id="mapa_longitud" type="hidden">
								</div>
							</div>
							<div class="block-form-home">
								<div class="button button-submit doctor-sign">Registrarme</div>
							</div>
	    				</div>
    				</form>
	    			<form action="{{asset('DRegister_schedule')}}" method="post" accept-charset="UTF-8">
	    				{{Form::token();}}
	    				<div id="schedule-Doctor-form" class="form-block hide" data-block="schedule">
	    					<div class="block-form-home align-left">
	    						Selecciona tu horario
	    					</div>
	    					<div class="block-form-home">
								@for($time = date('H:i', strtotime('00:00')); $time <= date('H:i', strtotime('23:00')) ;)
									<div class="time align-left">{{$time}}
									<?$time = date('H:i', strtotime(date("H:i", strtotime($time)) . " + 30 minutes"));?>
									-{{$time}}<input name="time[]" type="checkbox" hidden value="{{0}}" checked="checked"></div>
								@endfor
								<div class="time align-left">23:30-00:00<input name="time[]" type="checkbox" hidden value="{{0}}" checked="checked" ></div>
							</div>
							<div class="block-form-home">
								<div class="button button-submit button-next-time">Siguiente</div>
							</div>
	    				</div>
	    				<div id="week-Doctor-form" class="form-block hide" data-block="week">
	    					<div class="block-form-home align-left">
	    						Selecciona tu semana
	    					</div>
	    					<div class="block-form-home">
								<div class="time align-left">Lunes <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
								<div class="time align-left">Martes <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
								<div class="time align-left">Miercoles <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
								<div class="time align-left">Jueves <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
								<div class="time align-left">Viernes <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
								<div class="time align-left">Sabado <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
								<div class="time align-left">Domingo <input name="week[]" type="checkbox" hidden value="0" checked="checked"></div>
							</div>
							<div class="block-form-home">
								<div class="button button-submit">Terminar</div>
							</div>
	    				</div>
	    			</form>
    			</div>
    		</div>
    		<div class="nav-button-home">Log In</div>
    		<div class="form hide">
    			<div class="div-form-button">
    				<div class="form-button-home left background-blue" data-tab="log">Paciente</div>
    				<div class="form-button-home right background-gray" data-tab="log">Doctor</div>
    				<div class="clear"></div>
    				<div id="log-Paciente-form" class="form-block" data-block="log">
    					<form action="{{asset('PLogin')}}" method="post" accept-charset="UTF-8">
    						{{Form::token();}}
    						<div class="block-form-home">
    							<div class="block-form-title">
    								Paciente
    							</div>
    							<div>
    								<input name="email" class="required" type="email" placeholder="Correo">
    								<input name="password" class="required" type="password" placeholder="Contraseña">
    							</div>
    						</div>
    						<div class="block-form-home">
    							<div class="button button-submit">Ingresar</div>
    						</div>
    					</form>
    				</div>
    				<div id="log-Doctor-form" class="form-block hide" data-block="log">
    					<form action="{{asset('DLogin')}}" method="post" accept-charset="UTF-8">
    						{{Form::token();}}
    						<div class="block-form-home">
    							<div class="block-form-title">
    								Doctor
    							</div>
    							<input name="email" class="required" type="email" placeholder="Correo">
    							<input name="password" class="required" type="password" placeholder="Contraseña">
    						</div>
    						<div class="block-form-home">
    							<div class="button button-submit">Ingresar</div>
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</nav>
    </header>

    <div id="title-home" class="color-white">
    	DOCTORPEDIA
    </div>
    </section>
    <script type="text/javascript"> var url = '{{asset("")}}';</script>
    {{ HTML::script('https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true') }}
  	<!-- {{ HTML::script('http://maps.google.com/maps/api/js?sensor=true') }} -->
</body>
</html>
