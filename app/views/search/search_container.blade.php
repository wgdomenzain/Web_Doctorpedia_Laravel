@extends('main.mainframe')
@section('contenido')
	<div id="doctor-detail" class="hide">
				
	</div>
	<section id="search_nav">
		
		<nav id="nav_list" class="">
			<div><input id="input-search" type="text"></div>
			<div id="nav-list-append">
				
			</div>
		</nav>
		<nav id="nav_filter" class="hide">
			<div class="block">
				<div class="checkbox align-left"><input name="filtrar-insurance" type="checkbox"><label class="color-black">Filtrar por aseguradora</label></div>
				<dl class="dropdown align-left"> 
				    <dt>
				    <a data-ul="insurance" href="#">
				      <span data-span="insurance" class="">Aseguradoras</span>    
				      <p data-tipo="insurance" class="multiSel dropdown-required"></p>  
				    </a>
				    </dt>
				    <dd>
				        <div class="mutliSelect">
				            <ul id="insurance" class="ul-cerca">
								<li><input name="insurance[]" type="checkbox" value="Axa" />Axa</li>
								<li><input name="insurance[]" type="checkbox" value="GNP" />GNP</li>
								<li><input name="insurance[]" type="checkbox" value="Inbursa" />Inbursa</li>
								<li><input name="insurance[]" type="checkbox" value="Metlife" />Metlife</li>
								<li><input name="insurance[]" type="checkbox" value="Seguros Monterrey" />Seguros Monterrey</li>
				            </ul>
				        </div>
				    </dd>
				</dl>
			</div>
			<div class="block">
				<div class="checkbox align-left"><input name="filtrar-state" type="checkbox"> <label class="color-black">Filtrar por estado</label></div>
				<dl class="dropdown align-left"> 
				    <dt>
				    <a data-ul="state" href="#">
				      <span data-span="state" class="">Estados</span>    
				      <p data-tipo="state" class="multiSel dropdown-required"></p>  
				    </a>
				    </dt>
				    <dd>
				        <div class="mutliSelect">
				            <ul id="state" class="ul-cerca">
								<li><input name="state[]" type="checkbox" value="Aguascalientes">Aguascalientes</li>
								<li><input name="state[]" type="checkbox" value="Baja California">Baja California</li>
								<li><input name="state[]" type="checkbox" value="Baja California Sur">Baja California Sur</li>
								<li><input name="state[]" type="checkbox" value="Campeche">Campeche</li>
								<li><input name="state[]" type="checkbox" value="Chiapas">Chiapas</li>
								<li><input name="state[]" type="checkbox" value="Chihuahua">Chihuahua</li>
								<li><input name="state[]" type="checkbox" value="Coahuila">Coahuila</li>
								<li><input name="state[]" type="checkbox" value="Colima">Colima</li>
								<li><input name="state[]" type="checkbox" value="Distrito Federal">Distrito Federal</li>
								<li><input name="state[]" type="checkbox" value="Durango">Durango</li>
								<li><input name="state[]" type="checkbox" value="Estado de México">Estado de México</li>
								<li><input name="state[]" type="checkbox" value="Guanajuato">Guanajuato</li>
								<li><input name="state[]" type="checkbox" value="Guerrero">Guerrero</li>
								<li><input name="state[]" type="checkbox" value="Hidalgo">Hidalgo</li>
								<li><input name="state[]" type="checkbox" value="Jalisco">Jalisco</li>
								<li><input name="state[]" type="checkbox" value="Michoacán">Michoacán</li>
								<li><input name="state[]" type="checkbox" value="Morelos">Morelos</li>
								<li><input name="state[]" type="checkbox" value="Nayarit">Nayarit</li>
								<li><input name="state[]" type="checkbox" value="Nuevo León">Nuevo León</li>
								<li><input name="state[]" type="checkbox" value="Oaxaca">Oaxaca</li>
								<li><input name="state[]" type="checkbox" value="Puebla">Puebla</li>
								<li><input name="state[]" type="checkbox" value="Querétaro">Querétaro</li>
								<li><input name="state[]" type="checkbox" value="Quintana Roo">Quintana Roo</li>
								<li><input name="state[]" type="checkbox" value="San Luis Potosí">San Luis Potosí</li>
								<li><input name="state[]" type="checkbox" value="Sinaloa">Sinaloa</li>
								<li><input name="state[]" type="checkbox" value="Sonora">Sonora</li>
								<li><input name="state[]" type="checkbox" value="Tabasco">Tabasco</li>
								<li><input name="state[]" type="checkbox" value="Tamaulipas">Tamaulipas</li>
								<li><input name="state[]" type="checkbox" value="Tlaxcala">Tlaxcala</li>
								<li><input name="state[]" type="checkbox" value="Veracruz">Veracruz</li>
								<li><input name="state[]" type="checkbox" value="Yucatán">Yucatán</li>
								<li><input name="state[]" type="checkbox" value="Zacatecas">Zacatecas</li>
				            </ul>
				        </div>
				    </dd>
				</dl>
			</div>
			<div class="block">
				<div class="checkbox align-left"><input name="filtrar-speciality" type="checkbox"> <label class="color-black">Filtrar por especialidad</label></div>
				<dl class="dropdown align-left"> 
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
			</div>
			<div class="block">
				<div class="checkbox align-left"><input name="filtrar-language" type="checkbox"> <label class="color-black">Filtrar por idioma</label></div>
				<dl class="dropdown align-left"> 
				    <dt>
				    <a data-ul="language" href="#">
				      <span data-span="language" class="">Idiomas</span>    
				      <p data-tipo="language" class="multiSel dropdown-required"></p>  
				    </a>
				    </dt>
				    <dd>
				        <div class="mutliSelect">
				            <ul id="language" class="ul-cerca">
								<li><input name="language[]" type="checkbox" value="Alemán" />Alemán</li>
								<li><input name="language[]" type="checkbox" value="Chino" />Chino</li>
								<li><input name="language[]" type="checkbox" value="Español" />Español</li>
								<li><input name="language[]" type="checkbox" value="Frances" />Francés</li>
								<li><input name="language[]" type="checkbox" value="Inglés" />Inglés</li>
								<li><input name="language[]" type="checkbox" value="Italiano" />Italiano</li>
								<li><input name="language[]" type="checkbox" value="Japonés" />Japonés</li>
								<li><input name="language[]" type="checkbox" value="Portugués" />Portugués</li>
								<li><input name="language[]" type="checkbox" value="Ruso" />Ruso</li>
				            </ul>
				        </div>
				    </dd>
				</dl>
			</div>
			<div class="block">
				<div class="checkbox align-left"><input name="filtrar-gender" type="checkbox"> <label class="color-black">Filtrar género</label></div>
				<div class="align-left">
					<div class="inline"><input name="gender" type="radio" value="1"><label class="color-black">Hombre</label></div>
					<div class="inline"><input name="gender" type="radio" value="2"><label class="color-black">Mujer</label></div>
				</div>
			</div>
			<div id="filter-button" class="button">Filtrar</div>
		</nav>
		<nav id="nav-search-options" class="">
			<div id="button-filter" class="inline  background-gray button-search">Filtro</div>
			<div id="button-list" class="inline  background-blue button-search">Lista</div>
			<div class="clear"></div>
		</nav>
	</section>
	<div id="search_map"></div>
@stop
