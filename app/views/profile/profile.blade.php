@extends('main.mainframe')
@section('contenido')
{{Form::open(array('url' => 'update_doctor', 'method' => 'POST'))}}
	<div id="edit-profile" class="background-blue">Editar</div>
	<section class="align-left">
		<section class="column align-left">
			<div class="color-gray">Doctor</div>
			<div id="profile-img" class="background-gray-profile align-center">
				<img src="{{asset('resources/img/session/'.Session::get('photo'))}}">
			</div>
			<div class="color-blue">{{$data['profile']->name.' '.$data['profile']->surname1.' '.$data['profile']->surname2}}</div>
			<div class="color-gray">{{$data['profile']->speciality}}</div>
			<div class="background-gray-profile column-padding">
				<div class="color-blue renglon align-left">Personal</div>
				<div class="color-blue renglon align-left">Nombre</div>
				<input name="name" class="renglon background-white color-gray align-left required" value="{{$data['profile']->name}}" readonly="readonly">
				<div class="renglon color-blue align-left">Apellido Paterno</div>
				<input name="surname1" class="renglon background-white color-gray align-left required" value="{{$data['profile']->surname1}}" readonly="readonly">
				<div class="renglon color-blue align-left">Apellido Materno</div>
				<input name="surname2" class="renglon background-white color-gray align-left required" value="{{$data['profile']->surname2}}" readonly="readonly">
				<div class="renglon color-blue align-left">Teléfono</div>
				<input name="phone" class="renglon background-white color-gray align-left required" value="{{$data['profile']->phone}}" readonly="readonly">
				<input name="gender" hidden value="{{$data['profile']->gender}}">
			</div>
		</section>
		<section class="column">
				<div class="background-gray-profile column-padding">
					<div class="color-blue renglon align-left">Profesional</div>
					<div class="color-blue renglon align-left">Cédula</div>
					<input name="credential" class="renglon background-white color-gray align-left required" value="{{$data['profile']->credential}}" readonly="readonly">
					<div class="combos-hide renglon color-blue align-left">Especialidad</div>
					<div class="combos-hide renglon background-white color-gray align-left">{{$data['profile']->speciality}}</div>
					<div class="combos-hide renglon color-blue align-left">Aseguradora</div>
					<div class="combos-hide renglon background-white color-gray align-left">{{$data['profile']->insurance}}</div>
					<div class="combos-hide renglon color-blue align-left">Idiomas</div>
					<div class="combos-hide renglon background-white color-gray align-left">{{$data['profile']->languages}}</div>
					<div id="combos-update" class="align-left hide">
						<dl class="dropdown"> 
						    <dt>
						    <a data-ul="especialidades" href="#">
						      <span data-span="especialidades" class="titulo hide" style="display:none; padding:0;"></span>    
						      	<p data-tipo="especialidades" class="multiSel dropdown-required">
						      		@foreach($data['speciality'] as $specia)
							      		<span title="{{$specia.','}}">{{$specia.','}}</span>
							      	@endforeach
						      	</p>  
						    </a>
						    </dt>
						    <dd>
						        <div class="mutliSelect">
						            <ul id="especialidades" class="ul-cerca">
						            	<li><input name="especialidades[]" type="checkbox" value="Alergología e inmunología pediátrica" {{(in_array('Alergología e inmunología pediátrica',$data['speciality']))?'checked':''}}/>Alergología e inmunología pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Algología" {{(in_array('Algología',$data['speciality']))?'checked':''}}/>Algología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Anatomía Patológica" {{(in_array('Anatomía Patológica',$data['speciality']))?'checked':''}}/>Anatomía Patológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Andrología" {{(in_array('Andrología',$data['speciality']))?'checked':''}}/>Andrología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Anestesiología" {{(in_array('Anestesiología',$data['speciality']))?'checked':''}}/>Anestesiología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Angiología y cirugía vascular" {{(in_array('Angiología y cirugía vascular',$data['speciality']))?'checked':''}}/>Angiología y cirugía vascular</li>
								        <li><input name="especialidades[]" type="checkbox" value="Audiometría" {{(in_array('Audiometría',$data['speciality']))?'checked':''}}/>Audiometría</li>
								        <li><input name="especialidades[]" type="checkbox" value="Biología de la reproducción humana" {{(in_array('Biología de la reproducción humana',$data['speciality']))?'checked':''}}/>Biología de la reproducción humana</li>
								        <li><input name="especialidades[]" type="checkbox" value="Campimetría" {{(in_array('Campimetría',$data['speciality']))?'checked':''}}/>Campimetría</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cardiología" {{(in_array('Cardiología',$data['speciality']))?'checked':''}}/>Cardiología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cardiología Geriátrica" {{(in_array('Cardiología Geriátrica',$data['speciality']))?'checked':''}}/>Cardiología Geriátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cardiología Pediátrica" {{(in_array('Cardiología Pediátrica',$data['speciality']))?'checked':''}}/>Cardiología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Artotroscópica" {{(in_array('Cirugía Artotroscópica',$data['speciality']))?'checked':''}}/>Cirugía Artotroscópica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Cardiotorácica" {{(in_array('Cirugía Cardiotorácica',$data['speciality']))?'checked':''}}/>Cirugía Cardiotorácica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Cardiovascular" {{(in_array('Cirugía Cardiovascular',$data['speciality']))?'checked':''}}/>Cirugía Cardiovascular</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Cabeza y Cuello" {{(in_array('Cirugía de Cabeza y Cuello',$data['speciality']))?'checked':''}}/>Cirugía de Cabeza y Cuello</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Columna" {{(in_array('Cirugía de Columna',$data['speciality']))?'checked':''}}/>Cirugía de Columna</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Córnea" {{(in_array('Cirugía de Córnea',$data['speciality']))?'checked':''}}/>Cirugía de Córnea</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Mano" {{(in_array('Cirugía de Mano',$data['speciality']))?'checked':''}}/>Cirugía de Mano</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Tórax" {{(in_array('Cirugía de Tórax',$data['speciality']))?'checked':''}}/>Cirugía de Tórax</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía de Transplantes" {{(in_array('Cirugía de Transplantes',$data['speciality']))?'checked':''}}/>Cirugía de Transplantes</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía del Aparato Digestivo" {{(in_array('Cirugía del Aparato Digestivo',$data['speciality']))?'checked':''}}/>Cirugía del Aparato Digestivo</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Dermatológica" {{(in_array('Cirugía Dermatológica',$data['speciality']))?'checked':''}}/>Cirugía Dermatológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Endoscópica" {{(in_array('Cirugía Endoscópica',$data['speciality']))?'checked':''}}/>Cirugía Endoscópica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Gastroenterologíca" {{(in_array('Cirugía Gastroenterologíca',$data['speciality']))?'checked':''}}/>Cirugía Gastroenterologíca</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía General" {{(in_array('Cirugía General',$data['speciality']))?'checked':''}}/>Cirugía General</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía General y Laparoscópica" {{(in_array('Cirugía General y Laparoscópica',$data['speciality']))?'checked':''}}/>Cirugía General y Laparoscópica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Laparoscópica" {{(in_array('Cirugía Laparoscópica',$data['speciality']))?'checked':''}}/>Cirugía Laparoscópica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Oftalmológica" {{(in_array('Cirugía Oftalmológica',$data['speciality']))?'checked':''}}/>Cirugía Oftalmológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Oncológica" {{(in_array('Cirugía Oncológica',$data['speciality']))?'checked':''}}/>Cirugía Oncológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Pediátrica" {{(in_array('Cirugía Pediátrica',$data['speciality']))?'checked':''}}/>Cirugía Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Plástica Y Reconstructiva" {{(in_array('Cirugía Plástica Y Reconstructiva',$data['speciality']))?'checked':''}}/>Cirugía Plástica Y Reconstructiva</li>
								        <li><input name="especialidades[]" type="checkbox" value="Cirugía Vascular Periférica" {{(in_array('Cirugía Vascular Periférica',$data['speciality']))?'checked':''}}/>Cirugía Vascular Periférica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Colonoscopia" {{(in_array('Colonoscopia',$data['speciality']))?'checked':''}}/>Colonoscopia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Coloproctologia" {{(in_array('Coloproctologia',$data['speciality']))?'checked':''}}/>Coloproctologia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Colposcopia" {{(in_array('Colposcopia',$data['speciality']))?'checked':''}}/>Colposcopia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Comunicación, Aufiología y Foniatría" {{(in_array('Comunicación, Aufiología y Foniatría',$data['speciality']))?'checked':''}}/>Comunicación, Aufiología y Foniatría</li>
								        <li><input name="especialidades[]" type="checkbox" value="Dermatología" {{(in_array('Dermatología',$data['speciality']))?'checked':''}}/>Dermatología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Dermatología Pediátrica" {{(in_array('Dermatología Pediátrica',$data['speciality']))?'checked':''}}/>Dermatología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Electrofisiología" {{(in_array('Electrofisiología',$data['speciality']))?'checked':''}}/>Electrofisiología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Endocrinología" {{(in_array('Endocrinología',$data['speciality']))?'checked':''}}/>Endocrinología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Endocrinología Pediátrica" {{(in_array('Endocrinología Pediátrica',$data['speciality']))?'checked':''}}/>Endocrinología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Endoscopía" {{(in_array('Endoscopía',$data['speciality']))?'checked':''}}/>Endoscopía</li>
								        <li><input name="especialidades[]" type="checkbox" value="Endourología" {{(in_array('Endourología',$data['speciality']))?'checked':''}}/>Endourología</li>
								        <li><input name="especialidades[]" type="checkbox" value="EQP para Rehabilitación Y Orto" {{(in_array('EQP para Rehabilitación Y Orto',$data['speciality']))?'checked':''}}/>EQP para Rehabilitación Y Orto</li>
								        <li><input name="especialidades[]" type="checkbox" value="Fisioterapia y Rehabilitación" {{(in_array('Fisioterapia y Rehabilitación',$data['speciality']))?'checked':''}}/>Fisioterapia y Rehabilitación</li>
								        <li><input name="especialidades[]" type="checkbox" value="Gastroenterología" {{(in_array('Gastroenterología',$data['speciality']))?'checked':''}}/>Gastroenterología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Gastroenterología Pediátrica" {{(in_array('Gastroenterología Pediátrica',$data['speciality']))?'checked':''}}/>Gastroenterología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Gastroenterología Y Endoscopia" {{(in_array('Gastroenterología Y Endoscopia',$data['speciality']))?'checked':''}}/>Gastroenterología Y Endoscopia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Genética" {{(in_array('Genética',$data['speciality']))?'checked':''}}/>Genética</li>
								        <li><input name="especialidades[]" type="checkbox" value="Geriatría" {{(in_array('Geriatría',$data['speciality']))?'checked':''}}/>Geriatría</li>
								        <li><input name="especialidades[]" type="checkbox" value="Ginecología Oncológica" {{(in_array('Ginecología Oncológica',$data['speciality']))?'checked':''}}/>Ginecología Oncológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Ginecología y Obstetricia" {{(in_array('Ginecología y Obstetricia',$data['speciality']))?'checked':''}}/>Ginecología y Obstetricia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Hematología" {{(in_array('Hematología',$data['speciality']))?'checked':''}}/>Hematología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Hemodinamia" {{(in_array('Hemodinamia',$data['speciality']))?'checked':''}}/>Hemodinamia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Infectología" {{(in_array('Infectología',$data['speciality']))?'checked':''}}/>Infectología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Infectología pediátrica" {{(in_array('Infectología pediátrica',$data['speciality']))?'checked':''}}/>Infectología pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Inmunología" {{(in_array('Inmunología',$data['speciality']))?'checked':''}}/>Inmunología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina Crítica Pediátrica" {{(in_array('Medicina Crítica Pediátrica',$data['speciality']))?'checked':''}}/>Medicina Crítica Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina Crítica y Terapia Intensiva" {{(in_array('Medicina Crítica y Terapia Intensiva',$data['speciality']))?'checked':''}}/>Medicina Crítica y Terapia Intensiva</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina del Reporte" {{(in_array('Medicina del Reporte',$data['speciality']))?'checked':''}}/>Medicina del Reporte</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina Familiar" {{(in_array('Medicina Familiar',$data['speciality']))?'checked':''}}/>Medicina Familiar</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina Fisica Y Rehabilitación" {{(in_array('Medicina Fisica Y Rehabilitación',$data['speciality']))?'checked':''}}/>Medicina Fisica Y Rehabilitación</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina General" {{(in_array('Medicina General',$data['speciality']))?'checked':''}}/>Medicina General</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina Interna" {{(in_array('Medicina Interna',$data['speciality']))?'checked':''}}/>Medicina Interna</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medicina Interna Pediátrica" {{(in_array('Medicina Interna Pediátrica',$data['speciality']))?'checked':''}}/>Medicina Interna Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Medico Coordinador" {{(in_array('Medico Coordinador',$data['speciality']))?'checked':''}}/>Medico Coordinador</li>
								        <li><input name="especialidades[]" type="checkbox" value="Microcirugía" {{(in_array('Microcirugía',$data['speciality']))?'checked':''}}/>Microcirugía</li>
								        <li><input name="especialidades[]" type="checkbox" value="Nefrología" {{(in_array('Nefrología',$data['speciality']))?'checked':''}}/>Nefrología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Nefrología Pediátrica" {{(in_array('Nefrología Pediátrica',$data['speciality']))?'checked':''}}/>Nefrología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neonatología" {{(in_array('Neonatología',$data['speciality']))?'checked':''}}/>Neonatología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neumología" {{(in_array('Neumología',$data['speciality']))?'checked':''}}/>Neumología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neumología Pediátrica" {{(in_array('Neumología Pediátrica',$data['speciality']))?'checked':''}}/>Neumología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neurocirugía" {{(in_array('Neurocirugía',$data['speciality']))?'checked':''}}/>Neurocirugía</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neurocirugía Pediátrica" {{(in_array('Neurocirugía Pediátrica',$data['speciality']))?'checked':''}}/>Neurocirugía Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neurología" {{(in_array('Neurología',$data['speciality']))?'checked':''}}/>Neurología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Neurología Pediátrica" {{(in_array('Neurología Pediátrica',$data['speciality']))?'checked':''}}/>Neurología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Nutriología Clínica" {{(in_array('Nutriología Clínica',$data['speciality']))?'checked':''}}/>Nutriología Clínica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Nutriología Pediátrica" {{(in_array('Nutriología Pediátrica',$data['speciality']))?'checked':''}}/>Nutriología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Odontopediatría" {{(in_array('Odontopediatría',$data['speciality']))?'checked':''}}/>Odontopediatría</li>
								        <li><input name="especialidades[]" type="checkbox" value="Oftalmología" {{(in_array('Oftalmología',$data['speciality']))?'checked':''}}/>Oftalmología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Oftalmología Pediátrica" {{(in_array('Oftalmología Pediátrica',$data['speciality']))?'checked':''}}/>Oftalmología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Oncología" {{(in_array('Oncología',$data['speciality']))?'checked':''}}/>Oncología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Oncología Cutánea" {{(in_array('Oncología Cutánea',$data['speciality']))?'checked':''}}/>Oncología Cutánea</li>
								        <li><input name="especialidades[]" type="checkbox" value="Oncología Pediátrica" {{(in_array('Oncología Pediátrica',$data['speciality']))?'checked':''}}/>Oncología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Ortopedía Y Traumatología" {{(in_array('Ortopedía Y Traumatología',$data['speciality']))?'checked':''}}/>Ortopedía Y Traumatología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Ortopedía Y Traumatología Pediátrica" {{(in_array('Ortopedía Y Traumatología Pediátrica',$data['speciality']))?'checked':''}}/>Ortopedía Y Traumatología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Otoneurología" {{(in_array('Otoneurología',$data['speciality']))?'checked':''}}/>Otoneurología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Otorrinolaringología" {{(in_array('Otorrinolaringología',$data['speciality']))?'checked':''}}/>Otorrinolaringología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Otorrinolaringología Pediátrica" {{(in_array('Otorrinolaringología Pediátrica',$data['speciality']))?'checked':''}}/>Otorrinolaringología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Patología" {{(in_array('Patología',$data['speciality']))?'checked':''}}/>Patología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Pediatra" {{(in_array('Pediatra',$data['speciality']))?'checked':''}}/>Pediatra</li>
								        <li><input name="especialidades[]" type="checkbox" value="Perinatología" {{(in_array('Perinatología',$data['speciality']))?'checked':''}}/>Perinatología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Proctología" {{(in_array('Proctología',$data['speciality']))?'checked':''}}/>Proctología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Psicología" {{(in_array('Psicología',$data['speciality']))?'checked':''}}/>Psicología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Psicología Infantil" {{(in_array('Psicología Infantil',$data['speciality']))?'checked':''}}/>Psicología Infantil</li>
								        <li><input name="especialidades[]" type="checkbox" value="Psicoterapia" {{(in_array('Psicoterapia',$data['speciality']))?'checked':''}}/>Psicoterapia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Psiquiatría" {{(in_array('Psiquiatría',$data['speciality']))?'checked':''}}/>Psiquiatría</li>
								        <li><input name="especialidades[]" type="checkbox" value="Quiropractico" {{(in_array('Quiropractico',$data['speciality']))?'checked':''}}/>Quiropractico</li>
								        <li><input name="especialidades[]" type="checkbox" value="Radio-Oncología" {{(in_array('Radio-Oncología',$data['speciality']))?'checked':''}}/>Radio-Oncología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Radiología" {{(in_array('Radiología',$data['speciality']))?'checked':''}}/>Radiología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Radioterapia" {{(in_array('Radioterapia',$data['speciality']))?'checked':''}}/>Radioterapia</li>
								        <li><input name="especialidades[]" type="checkbox" value="Reemplazos Articulares" {{(in_array('Reemplazos Articulares',$data['speciality']))?'checked':''}}/>Reemplazos Articulares</li>
								        <li><input name="especialidades[]" type="checkbox" value="Rehabilitación de Problemas Auditivos" {{(in_array('Rehabilitación de Problemas Auditivos',$data['speciality']))?'checked':''}}/>Rehabilitación de Problemas Auditivos</li>
								        <li><input name="especialidades[]" type="checkbox" value="Reumatología" {{(in_array('Reumatología',$data['speciality']))?'checked':''}}/>Reumatología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Reumatología Pediátrica" {{(in_array('Reumatología Pediátrica',$data['speciality']))?'checked':''}}/>Reumatología Pediátrica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Terapia Endovascular Neurológica" {{(in_array('Terapia Endovascular Neurológica',$data['speciality']))?'checked':''}}/>Terapia Endovascular Neurológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Terapia Fisica Y Rehabilitación" {{(in_array('Terapia Fisica Y Rehabilitación',$data['speciality']))?'checked':''}}/>Terapia Fisica Y Rehabilitación</li>
								        <li><input name="especialidades[]" type="checkbox" value="Urgencias Médico Quirúrgicas" {{(in_array('Urgencias Médico Quirúrgicas',$data['speciality']))?'checked':''}}/>Urgencias Médico Quirúrgicas</li>
								        <li><input name="especialidades[]" type="checkbox" value="Urología" {{(in_array('Urología',$data['speciality']))?'checked':''}}/>Urología</li>
								        <li><input name="especialidades[]" type="checkbox" value="Urología Ginecológica" {{(in_array('Urología Ginecológica',$data['speciality']))?'checked':''}}/>Urología Ginecológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Urología Oncológica" {{(in_array('Urología Oncológica',$data['speciality']))?'checked':''}}/>Urología Oncológica</li>
								        <li><input name="especialidades[]" type="checkbox" value="Urología Pediátrica" {{(in_array('Urología Pediátrica',$data['speciality']))?'checked':''}}/>Urología Pediátrica</li>
						            </ul>
						        </div>
						    </dd>
						</dl>
						<dl class="dropdown"> 
						    <dt>
						    <a data-ul="aseguradoras" href="#">
						      <span data-span="aseguradoras" class="hide" style="display:none; padding:0;"></span>    
						      	<p data-tipo="aseguradoras" class="multiSel dropdown-required">
						      		@foreach($data['insurance'] as $insu)
							      		<span title="{{$insu.','}}">{{$insu.','}}</span>
							      	@endforeach
						      	</p>  
						    </a>
						    </dt>
						    <dd>
						        <div class="mutliSelect">
						            <ul id="aseguradoras" class="ul-cerca">
										<li><input name="aseguradoras[]" type="checkbox" value="Axa" {{(in_array('Axa',$data['insurance']))?'checked':''}}/>Axa</li>
										<li><input name="aseguradoras[]" type="checkbox" value="GNP" {{(in_array('GNP',$data['insurance']))?'checked':''}}/>GNP</li>
										<li><input name="aseguradoras[]" type="checkbox" value="Inbursa" {{(in_array('Inbursa',$data['insurance']))?'checked':''}}/>Inbursa</li>
										<li><input name="aseguradoras[]" type="checkbox" value="Metlife" {{(in_array('Metlife',$data['insurance']))?'checked':''}}/>Metlife</li>
										<li><input name="aseguradoras[]" type="checkbox" value="Seguros Monterrey" {{(in_array('Seguros Monterrey',$data['insurance']))?'checked':''}}/>Seguros Monterrey</li>
						            </ul>
						        </div>
						    </dd>
						</dl>
						<dl class="dropdown"> 
						    <dt>
						    <a data-ul="idiomas" href="#">
						      <span data-span="idiomas" class="hide" style="display:none; padding:0;"></span>    
							    <p data-tipo="idiomas" class="multiSel dropdown-required">
							      	@foreach($data['languages'] as $language)
							      		<span title="{{$language.','}}">{{$language.','}}</span>
							      	@endforeach
							    </p>  
						    </a>
						    </dt>
						    <dd>
						        <div class="mutliSelect">
						            <ul id="idiomas" class="ul-cerca">
										<li><input name="idiomas[]" type="checkbox" value="Alemán" {{(in_array('Alemán',$data['languages']))?'checked':''}}/>Alemán</li>
										<li><input name="idiomas[]" type="checkbox" value="Chino" {{(in_array('Chino',$data['languages']))?'checked':''}}/>Chino</li>
										<li><input name="idiomas[]" type="checkbox" value="Español" {{(in_array('Español',$data['languages']))?'checked':''}}/>Español</li>
										<li><input name="idiomas[]" type="checkbox" value="Frances" {{(in_array('Frances',$data['languages']))?'checked':''}}/>Francés</li>
										<li><input name="idiomas[]" type="checkbox" value="Inglés" {{(in_array('Inglés',$data['languages']))?'checked':''}}/>Inglés</li>
										<li><input name="idiomas[]" type="checkbox" value="Italiano" {{(in_array('Italiano',$data['languages']))?'checked':''}}/>Italiano</li>
										<li><input name="idiomas[]" type="checkbox" value="Japonés" {{(in_array('Japonés',$data['languages']))?'checked':''}}/>Japonés</li>
										<li><input name="idiomas[]" type="checkbox" value="Portugués" {{(in_array('Portugués',$data['languages']))?'checked':''}}/>Portugués</li>
										<li><input name="idiomas[]" type="checkbox" value="Ruso" {{(in_array('Ruso',$data['languages']))?'checked':''}}/>Ruso</li>
						            </ul>
						        </div>
						    </dd>
						</dl>
					</div>
					<div class="renglon color-blue align-left">Dirección Principal</div>
					<textarea name="address1" class="renglon background-white color-gray align-left required" value="" readonly="readonly">{{$data['profile']->address1}}</textarea> 
					<div class="renglon color-blue align-left">Dirección Alterna</div>
					<textarea name="address2" class="renglon background-white color-gray align-left required" value="" readonly="readonly">{{$data['profile']->address2}}</textarea> 
					<div class="renglon color-blue align-left">Certificaciones</div>
					<textarea name="details" class="renglon background-white color-gray align-left required" readonly="readonly">{{$data['profile']->details}}</textarea>
				</div>
		</section>
		<section class="column">
			<div class="background-gray-profile column-padding">
				<div class="color-blue renglon align-left">Horario Laboral</div>
				<div class="color-blue renglon align-left">Días</div>
				<div class="renglon background-white color-gray align-left">{{$data['days']}}</div>
				<div class="color-blue renglon align-left">Horas</div>
				<div class="renglon background-white color-gray align-left">{{$data['time']}}</div>
			</div>
			<div class="background-gray-profile column-padding">
				<div class="color-blue renglon align-left">Localización</div>
				<div id="profile-map"></div>
				<input name="lat" id="mapa_latitud" hidden value="{{$data['profile']->lat}}">
				<input name="lng" id="mapa_longitud" hidden value="{{$data['profile']->lng}}">
			</div>
		</section>
	</section>
{{Form::close()}}
@stop
