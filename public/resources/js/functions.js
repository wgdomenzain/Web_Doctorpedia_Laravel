$(function(){
	// Al cargar la página
	pop_up_msg();
	change_tab();
	select_change();
	select_multiple();
	form_submit();
	select_time();
	search_nav();
	search_nav_tab();
	filter_list();
	filter_nav();
	session_options();
	calendar_buttons();
	doctor_dates();
	event_appointment();
	edit_profile();
});

// Variable Globales
var search_data;
var list_data;
var list_dates;
var infoToggle = 'none';
var stateToggle = 'inactivo';
var indexActivo = -1;

// Funciones
function edit_profile(){
	$('#edit-profile').click(function(){
		$('input').attr("readonly", false); 
		$('textarea').attr("readonly", false);
		$('.combos-hide').addClass('hide');
		$('#combos-update').removeClass('hide');
		$(this).text('Guardar');
		$(this).addClass('button-submit'); 
		form_submit();
	});
}

function event_appointment(){
	$('.status-buttons').click(function(){
		append_loading('#contenido');
		var button = $(this);
		var form = $('#dates-detail-form');
		if(button.attr('id') == 'accept-button'){
			form.attr('action', url + 'accept');
			form.submit();
		}else{
			form.attr('action', url + 'cancel');
			form.submit();
		}
	});
}

function show_appointment(flagAppointment, appointment){
	$('#status-buttons-nav').addClass('hide');
	if(flagAppointment){
		$('#info-user-id').val(appointment.userID);
		$('#info-user').text(appointment.userName);
		$('#info-doctor-id').val(appointment.doctorID);
		$('#info-doctor').text(appointment.doctorName);
		$('#info-location').text(appointment.location);
		$('#info-date-post').val(appointment.date);
		$('#info-date').text(appointment.date);
		$('#info-time-post').val(appointment.time);
		$('#info-time').text(appointment.time);
		$('#info-comments').text(appointment.comments);
		switch(appointment.status){
			case '0':
				$('#info-status').text('Pendiente');
				$('#status-buttons-nav').removeClass('hide');
			break;
			case '1':
				$('#info-status').text('Aceptado');
			break;
		}
	}else{
		$('#info-user-id').val('');
		$('#info-doctor-id').val('');
		$('#info-date-post').val('');
		$('#info-time-post').val('');
		$('#info-user').text('');
		$('#info-doctor').text('');
		$('#info-location').text('');
		$('#info-date').text('');
		$('#info-time').text('');
		$('#info-status').text('');
		$('#info-comments').text('');

	}
}

function doctor_dates(){
	if($('#dates-info').length > 0){
		// console.log($('#dates-info').text());
		list_dates = JSON.parse($('#dates-info').text()).algo;
		$('#dates-info').remove();

		$('.select-date').change(function(){
			var flagAppointment = false;
			var block = $(this);
			var app = block.val();
			var appointment;
			$.each(list_dates, function(index, value){
				if(value.appID == app){
					// console.log(value);
					flagAppointment = true;
					appointment = value;
					return false;
				}
			});

			show_appointment(flagAppointment, appointment);
			
		});

		$('.dates-click').click(function(){
			var flagAppointment = false;
			var block = $(this);
			var app = block.attr('data-id');
			var appointment;
			$.each(list_dates, function(index, value){
				if(value.appID == app){
					console.log(value);
					flagAppointment = true;
					appointment = value;
					return false;
				}
			});

			show_appointment(flagAppointment, appointment);

		});
	}
}

function calendar(date, parameter){
	//$('#contenido').empty();
	append_loading('#contenido');
	$.ajax({
		type: "Get",
		url: url + 'calendar/'+date+'/'+parameter,
		success: function(data){
			$('#contenido').empty();
			remove_loading();
			$('#contenido').append(data);
			calendar_buttons();
		},
		error: function(){
			alert('Ocurrio un error');
		}
	});
}

function calendar_patient(date, parameter){
	//$('#contenido').empty();
	append_loading('#contenido');
	$.ajax({
		type: "Get",
		url: url + 'calendar_patient/'+date+'/'+parameter,
		success: function(data){
			$('#contenido').empty();
			remove_loading();
			$('#contenido').append(data);
			calendar_buttons();
		},
		error: function(){
			alert('Ocurrio un error');
		}
	});
}

function calendar_buttons(){
	$('#last-month').click(function(){
		var date = $('#date').datepicker('getDate');
		// console.log(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear());
		calendar(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear(), 'last');
	});

	$('#next-month').click(function(){
		var date = $('#date').datepicker('getDate');
		// console.log(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear());
		calendar(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear(), 'next');
	});

	$('#last-month-patient').click(function(){
		// console.log('paciente');
		var date = $('#date').datepicker('getDate');
		// console.log(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear());
		calendar_patient(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear(), 'last');
	});

	$('#next-month-patient').click(function(){
		var date = $('#date').datepicker('getDate');
		// console.log(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear());
		calendar_patient(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear(), 'next');
	});
}

function session_options(){
	
	var stateOptions = false;

	$(document).mouseup(function (e){
	    var container = $("#ventana_emergente");
	    var container2 = $('#flecha_sesion');
	    if (!container.is(e.target) && container.has(e.target).length === 0 && !container2.is(e.target) && container2.has(e.target).length === 0)
	    {
	        container.remove();
	        stateOptions = false;
	    }
	});

	$('#flecha_sesion').click(function(){
		
		var flecha = $(this);
	
		if(!stateOptions){
			var ventana_html = '<div id="ventana_emergente">'+
									'<div class="arrow-up-window"></div>'+
									'<div class="window-session">'+
										'<a href="'+url+'logout">Cerrar Sesión</a>'
									'</div>'+
							   '</div>';
			posicion = flecha.position();
			flecha.removeClass('arrow-up').addClass('arrow-down');
			flecha.parent().append(ventana_html);
			
			$('#ventana_emergente').css({top: posicion.top + 20, left:posicion.left - 90, position:'absolute'});
			stateOptions = true;
		}else{
			flecha.removeClass('arrow-down').addClass('arrow-up');
			$('#ventana_emergente').remove();
			stateOptions = false;
		}
		// console.log(stateOptions);	
	});
}

function search_nav_tab(){
	$('.button-search').click(function(){
		var button = $(this);
		if(button.text() == 'Filtro'){
			button.removeClass('background-gray').addClass('background-green');
			$('#button-list').removeClass('background-blue').addClass('background-gray');
			$('#nav_list').addClass('hide');
			$('#nav_filter').removeClass('hide');
		}else if(button.text() == 'Lista'){
			button.removeClass('background-gray').addClass('background-blue');
			$('#button-filter').removeClass('background-green').addClass('background-gray');
			$('#nav_filter').addClass('hide');
			$('#nav_list').removeClass('hide');
		}

	});
}

function filter_nav(){
	$('#filter-button').click(function(){

		var flagInsurance = $('input[name=filtrar-insurance]').prop('checked');
		var flagState = $('input[name=filtrar-state]').prop('checked');
		var flagSpeciality = $('input[name=filtrar-speciality]').prop('checked');
		var flagLanguage = $('input[name=filtrar-language]').prop('checked');
		var flagGender = $('input[name=filtrar-gender]').prop('checked');

		if(flagInsurance || flagState 
		|| flagSpeciality || flagLanguage || flagGender){
			var insurance =  $("input[name='insurance[]']:checked").map(function(index,domElement) {return $(domElement).val();});
			var	state = $("input[name='state[]']:checked").map(function(index,domElement) {return $(domElement).val();});
			var	speciality = $("input[name='especialidades[]']:checked").map(function(index,domElement) {return $(domElement).val();});
			var	language = $("input[name='language[]']:checked").map(function(index,domElement) {return $(domElement).val();});
			var	gender = $('input[name=gender]:checked').val();
				list_data = [];

				// console.log(insurance);
				// console.log(state);
				// console.log(speciality);
				// console.log(language);
				// console.log(gender);

				$.each(search_data['doctors'], function(index, doctor){
					var flagAdd = true;

					if(flagInsurance){
						var findInsurance = false;
						$.each(insurance, function(index, value){
							if(doctor.insurance.toLowerCase().indexOf(value.toLowerCase()) != -1){
								findInsurance = true;
							}
						});
						if(findInsurance)
							flagAdd = true;
						else
							flagAdd = false;
					}
					if(flagState){
						if(flagAdd){
							var findState = false;
							$.each(state, function(index, value){
								if(doctor.state == value){
									findState = true;
								}
							});
							if(findState)
								flagAdd = true;
							else
								flagAdd = false;
						}
						
					}
					if(flagSpeciality){
						if(flagAdd){
							var findSpeciality = false;
							$.each(speciality, function(index, value){
								if(doctor.speciality.toLowerCase().indexOf(value.toLowerCase()) != -1){
									findSpeciality = true;
								}
							});
							if(findSpeciality)
								flagAdd	= true;
							else
								flagAdd = false;

						}
					}
					if(flagLanguage){
						if(flagAdd){
							var findLanguage = false;
							$.each(language, function(index, value){
								if(doctor.languages.toLowerCase().indexOf(value.toLowerCase()) != -1){
									findLanguage = true;
								}
							});
							if(findLanguage)
								flagAdd = true;
							else
								flagAdd = false;
						}
						
					}
					if(flagGender){
						if(flagAdd){
							if(doctor.gender == gender){
								flagAdd = true;
							}else{
								flagAdd = false;
							}
						}
					}
					if(flagAdd){
						list_data.push(doctor);
					}	
				});
				append_doctors(list_data);
				$('#button-list').removeClass('background-gray').addClass('background-blue');
				$('#button-filter').removeClass('background-green').addClass('background-gray');
				$('#nav_filter').addClass('hide');
				$('#nav_list').removeClass('hide');
		}else{
			list_data = search_data['doctors'];
			append_doctors(list_data);
			$('#button-list').removeClass('background-gray').addClass('background-blue');
			$('#button-filter').removeClass('background-green').addClass('background-gray');
			$('#nav_filter').addClass('hide');
			$('#nav_list').removeClass('hide');
		}

	});
}

function filter_list(){
	$("#input-search").on("input", function() {
		close_detail();
		var value = $(this).val().trim();
		if(value != ''){
			var doctors = [];
			// console.log(value);
			$.each(list_data ,function(index, doctor){
				if(doctor.name.toLowerCase().indexOf(value) != -1
				|| doctor.surname1.toLowerCase().indexOf(value) != -1
			    || doctor.surname2.toLowerCase().indexOf(value) != -1){
					// console.log('pone:'+ doctor.name);
					doctors.push(doctor);
				}
			});
			// list_data = doctors;
			append_doctors(doctors);
		}else{
			// console.log('vacio');
			append_doctors(list_data);
		}
	});
}

function search_nav(){
	if($('#search_nav').length > 0){
		$.ajax({
			type: "Get",
			url: url + 'doctor_list',
			success: function(data){
				// console.log(data);
				search_data = JSON.parse(data);
				// console.log(search_data);
				list_data = search_data['doctors'];
				append_doctors(search_data['doctors']);
			},
			error: function(){
				alert('Ocurrio un error');
			}
		});
	}
}

function append_doctors(data){
	$('#nav-list-append').empty();
	clear_Map();
	$.each(data, function(index, value){
		ubicacion_mapa(value, searchMap);
		// console.log(value);
		var rating = rating_stars(value.rating);

		$('#nav-list-append').append(
			'<div class="block doctor-info">'+
				'<div class="doctor-info-click">'+
					'<div class="hide index">'+value.id+'</div>'+
					'<div class="align-left color-black">'+value.speciality+'</div>'+
					'<div class="align-left color-black bold">'+'Dr. '+value.name+' '+value.surname1+' '+value.surname2+'</div>'+
					'<div class="align-left phone-list color-black">'+value.phone+'</div>'+
					'<div class="align-left location-list color-black">'+value.address1+'</div>'+
					'<div class="rating align-left">'+rating+'</div>'+
				'</div>'+
				((profile == 'patient')?'<div><div class="message button-block-list left inline color-blue"><img src="'+url+'/resources/img/img_msg.png">Enviar Mensaje</div><div class="date button-block-list right inline color-blue"><img src="'+url+'/resources/img/img_cita.png">Hacer cita<div class="hide index-date">'+value.id+'</div></div><div class="clear"></div></div>':'')
				+'<input class="block-lat" hidden value="'+value.lat+'">'+
				'<input class="block-lng" hidden value="'+value.lng+'">'+
			'</div>'
		);
	});
	click_doctor_block();
	click_date();
	click_message();
}

function split_array(string){
	var html = "";
	var array = string.split(',');

	for(x = 0; x < array.length; x++){
		html += ''+array[x]+'';
	}
	return html;
}

function rating_stars(rating){
	var return_string = "";
	for(x = 0; x < 5; x++){
		if(x < rating){
			return_string += '<img src="'+url+'resources/img/star-on.svg">';
		}else{
			return_string += '<img src="'+url+'resources/img/star-off.svg">';
		}
	}

	return return_string;
}

function submit_doctor(){
	var flag = false;
	//console.log($('#sign-serialize').serialize());
	$.ajax({
		type: "POST",
		url: url + 'DRegister',
      	async: false,
		data: $('#sign-serialize').serialize(),
		success: function(data){
			// console.log(data);
			flag =  data;
			return flag;
		},
		error: function(){
			alert('Ocurrio un error');
		}
	});
	return flag;
}

function form_submit(){

	$('.button-submit').click(function(){
		
		var button = $(this);
		var flag = true;

		//Validación imagenes
		button.closest('form').find('.image').each(function(){
			var image = $(this);
			// console.log('imagen');
			if( $.trim(this.value) != '' ) {
				var Extension = $.trim(this.value).substring($.trim(this.value).lastIndexOf('.') + 1).toLowerCase();
	            if (Extension == "png" || Extension == "jpg" || Extension == "jpeg") {
	                flag = true; // Valid file type  
	            }else{
	            	
	            	flag = false;
	            	image.parent().find('img').addClass('red-border');
	            	//$(this).parent().css({'border-color':'red'});
	            }	
			}else{
				image.parent().find('img').addClass('red-border');
				//$(this).parent().css({'border-color':'red'});
				flag = false;
			}
		});

		//Validación combo multiple
		button.closest('form').find('.dropdown-required').each(function(){
			var dropdown = $(this);
			// console.log(dropdown.attr('data-tipo'));
			if(!$('span[data-span='+dropdown.attr('data-tipo')+']').hasClass('hide')){
				flag = false;
				dropdown.closest('dl').addClass('red-border');
			}
		});

		//Validación input text
		button.closest('form').find('.required').each(function(){
			var input = $(this);
			if(input.val().trim() == ''){
				input.addClass('red-border');
				input.css({'border':'1px solid'});
				input.css({'border-color':'red'});
				flag = false;
			}
		});
		// flag = true;
		if(flag){
			check_submit(button);
		}	
	});
}

function getState (lat, lng){
	$.ajax({ url:'http://maps.googleapis.com/maps/api/geocode/json?latlng='+lat+','+lng+'&sensor=true',
         success: function(data){
             console.log(data.results[0].formatted_address);
             /*or you could iterate the components for only the city and state*/
         }
	});
}

function check_submit(button){
	if(button.hasClass('doctor-sign')){
		doctor_sign(button);
	}else if(button.hasClass('button-next-time')){
		doctor_day(button);
	}else{
		button.closest('form').submit();	
	}	
}

function doctor_day(button){
	$('#schedule-Doctor-form').addClass('hide');
	$('#week-Doctor-form').removeClass('hide');
}

function doctor_sign(button){
	var flag = submit_doctor();
	console.log('bandera: '+ flag);
	if(flag){
		$('#sign-Doctor-form').addClass('hide');
		$('#schedule-Doctor-form').removeClass('hide');
		$('.form-button-home').each(function(){
			$(this).addClass('hide');
		});
	}else{
		//error
	}
}

function select_time(){
	$('.time').click(function(){
		var time = $(this);
		if(!time.hasClass('time-select')){
			time.addClass('time-select');
			// time.find('input').attr('checked', 'checked');
			time.find('input').val(1);
		}else{
			time.removeClass('time-select');
			// time.find('input').removeAttr('checked');
			time.find('input').val(0);
		}
	});
}

function select_multiple(){

	$(".dropdown dt a").on('click', function () {
		// console.log('click 1');
		var ul = $(this).attr('data-ul');
		//console.log(ul);
	  $("#"+ul).slideToggle('fast');
	});

	$(".dropdown dd ul li a").on('click', function () {
			// console.log('click 2');
	  $(".dropdown dd ul").hide();
	});

	function getSelectedValue(id) {
	   return $("#" + id).find("dt a span.value").html();
	}

	$(document).bind('click', function (e) {
			// console.log('click 3');
	  var $clicked = $(e.target);
	  if (!$clicked.parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
	});


	$('.mutliSelect input[type="checkbox"]').on('click', function () {
		// console.log('click 4');
		var title = $(this).closest('.mutliSelect').find('input[type="checkbox"]').val(),
		title = $(this).val() + ",";
		var tipo = $(this).attr('name');
		tipo = tipo.replace('[','');
		tipo = tipo.replace(']','');
		// console.log('tipo: '+tipo);
		if ($(this).is(':checked')) {

		  var html = '<span title="' + title + '">' + title + '</span>';
		  $('p[data-tipo='+tipo+']').append(html);
		  $("span[data-span="+tipo+"]").hide().addClass('hide');

		}else {

		  $('span[title="' + title + '"]').remove();
		  
		}

		if($('p[data-tipo='+tipo+']').text() == ''){
			$("span[data-span="+tipo+"]").show().removeClass('hide');
		}
	});
}

function select_change(){
	$('select').change(function(){

		if($(this).val() != ""){
			$(this).addClass('decoracion_activo');
			$(this).parent().addClass('div_activo');
		}else{
			$(this).removeClass('decoracion_activo');
			$(this).parent().removeClass('div_activo');
		}
	});
}

function pop_up_msg(){

	$('.nav-button-home').click(function(){
		$(this).next('.form').removeClass('hide');
	});

	$(document).mouseup(function (e)
	{
	    var container = $(".form");

	    if (!container.is(e.target) // if the target of the click isn't the container...
	        && container.has(e.target).length === 0) // ... nor a descendant of the container
	    {
	        container.addClass('hide');
	    }
	});
}

function change_tab(){
	$('.form-button-home').click(function(){
		var button = $(this);
		var data_tab = button.attr('data-tab');
		$('[data-tab='+data_tab+']').each(function(){
			$(this).addClass('background-gray');
		});

		if(button.text() == 'Paciente')
			button.removeClass('background-gray').addClass('background-blue');
		else
			button.removeClass('background-gray').addClass('background-green');

		$('[data-block='+data_tab+']').each(function(){
			$(this).addClass('hide');
		});
		
		$('#'+button.attr('data-tab')+'-'+button.text()+'-'+'form').removeClass('hide');
	});
}

function append_detail(index){
	var doctor;
	$.each(search_data['doctors'],function(key, value){
		if(value.id == index){
			doctor = value;
			return false;
		}
	});

	// var insurances = split_array(doctor.insurance);
	// var languages = split_array(doctor.languages);

	$('#doctor-detail').empty();
	$('#doctor-detail').append(
		'<img id="img-detail-doctor" src="'+url+'resources/img/img_medico.png">'+
		'<div class="align-left color-blue block-form-title">'+doctor.speciality+'</div>'+
		'<div class="block">'+
			'<div class="align-left color-blue bold">'+'Dr. '+doctor.name+' '+doctor.surname1+' '+doctor.surname2+'</div>'+
			'<div class="align-left color-black"><div class="bold inline">Cédula: </div><div class="color-blue inline"> '+doctor.credential+'</div></div>'+
			'<div class="align-left color-black"><div class="bold inline">Contacto: </div><div class="color-blue inline"> '+doctor.address1+'</div></div>'+
			'<div class="align-left color-black"><div class="bold inline">Télefono: </div><div class="color-blue inline">'+doctor.phone+'</div></div>'+
			'<div class="align-left color-black"><div class="bold inline">Aseguradoras: </div><div class="color-blue inline">'+doctor.insurance+'</div></div>'+
			'<div class="align-left color-black"><div class="bold inline">Idiomas: </div><div class="color-blue inline">'+doctor.languages+'</div></div>'+
			'<div id="doctor-map" class="align-left color-blue">Ver en mapa <input id="block-lat" hidden value="'+doctor.lat+'"><input id="block-lng" hidden value="'+doctor.lng+'"></div>'+
		'</div>'
	);
	 click_doctor_center();
	// console.log(doctor);
}

function calendar_buttons_mini(){
	$('#last-month-mini').click(function(){
		var date = $('#date').datepicker('getDate');
		// console.log(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear());
		append_calendar(indexActivo, date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear(), 'last');
	});

	$('#next-month-mini').click(function(){
		var date = $('#date').datepicker('getDate');
		// console.log(date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear());
		append_calendar(indexActivo, date.getDate()+'-'+(date.getMonth() + 1)+'-'+date.getFullYear(), 'next');
	});
}

function append_loading(contenedor){
	console.log('append_loading');
	ventana = '<div id="contenedor-loading"><div id="contenedor-img-loading"><img src="'+url+'resources/img/loading.gif"></div></div>';
	$(contenedor).append(ventana);
}

function remove_loading(){

	$('#contenedor-loading').remove();
}

function doctor_availability(index, date){
	
	append_loading('#doctor-detail');
	$.ajax({
		type: "POST",
		url: url + 'doctor_availability',
      	async: true,
		data: {'doctorID':index, date: date},
		success: function(data){
			$('#doctor-detail').empty();
			remove_loading();
	 		$('#doctor-detail').append(data);
	 		request_appointment();
		},
		error: function(){
			alert('Ocurrio un error');
		}
	});
}

function request_appointment(){
	var timeFlag = "";
	var comments = '<div class="hide textarea-container"><div class="textarea-title background-blue color-white align-left">Comentarios</div><textarea id="text-comments" class="textarea-available" placeholder="Comentario"></textarea></div>';
	var counter = "";

	$('.status-available').click(function(){
		
		var selectTime = $(this).parent().prev().text().trim();
		
		if(!timeFlag){
			$(comments).insertAfter($(this).parent().parent()).slideDown();
			timeFlag = selectTime;
			counter = $(this).parent().prev().prev().text();
		}else if(timeFlag && timeFlag == selectTime){
			$('.textarea-container').slideUp('slow', function(){
				$(this).remove();
			});
			timeFlag = "";
			counter = "";
		}else if(timeFlag != selectTime){
			$('.textarea-container').slideUp('slow', function(){
				$(this).remove();
			});
			$(comments).insertAfter($(this).parent().parent()).slideDown();
			timeFlag = selectTime;
			counter = $(this).parent().prev().prev().text();
		}
	});

	$('#request-appointment').click(function(){
		var comments = $('#text-comments').val();
		if(timeFlag && comments){
			var date = $('#request-date').val();
			console.log($('#request-date').val());
			append_loading('#doctor-detail');
			$.ajax({
				type: "POST",
				url: url + 'request_appointment',
				data: {
					doctorID:indexActivo,
					index: counter,
					comments: comments,
					time: timeFlag,
					date: date
				},
				success: function(data){
					console.log(data);
					remove_loading();
					$('#doctor-detail').empty();
					if(data == 'OK'){
						$('#doctor-detail').append(
							'<div id="server-msg" class="background-blue">Se ha agregado exitosamente</div>'
						);
					}else{
						$('#doctor-detail').append(
							'<div id="server-msg" class="background-blue">No se ha podido agregar</div>'
						);
					}
				},
				error: function(){
					alert('Ocurrio un error');
				}
			});
		}else{
			console.log('false');
		}
	});
}

function click_calendar_date(){
	$('.available').click(function(){
		doctor_availability(indexActivo, $(this).find('input').val());
	});
}

function append_calendar(index, date, parameter){

	append_loading('#doctor-detail');
	$.ajax({
		type: "POST",
		url: url + 'mini_calendar/'+date+'/'+parameter,
      	async: true,
		data: {'doctorID':index},
		success: function(data){
			$('#doctor-detail').empty();
			remove_loading();
	 		$('#doctor-detail').append(data);
	 		calendar_buttons_mini();
	 		click_calendar_date();
		},
		error: function(){
			alert('Ocurrio un error');
		}
	});
}

function click_date(){
	$('.date').click(function(){
		var index = $(this).find('.index-date').text();
		toggle_date(index);
	});
}

function toggle_date(index){
	if( stateToggle == 'activo' && infoToggle == 'detail'){
		
		$('#doctor-detail').toggle( "slide",function(){
			
			today = new Date();
			// console.log(today.getFullYear()+'-'+(today.getMonth() + 1) +'-'+today.getDate());
			today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			$('#doctor-detail').empty();
			append_calendar(index, today, 'nothing');
			
		});

		$('#doctor-detail').toggle( "slide");
		indexActivo = index;
		stateToggle = 'activo';
		infoToggle = 'date';

	}else if(stateToggle == 'activo' && index != indexActivo){
		
		$('#doctor-detail').toggle( "slide",function(){
			
			today = new Date();
			// console.log(today.getFullYear()+'-'+(today.getMonth() + 1 )+'-'+today.getDate());
			today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
			$('#doctor-detail').empty();
			append_calendar(index, today, 'nothing');
		
		});
		
		$('#doctor-detail').toggle( "slide");
		indexActivo = index;
		stateToggle = 'activo';
		infoToggle = 'date';

	}else if(stateToggle == 'inactivo'){

		today = new Date();
		// console.log(today.getFullYear()+'-'+(today.getMonth() + 1 )+'-'+today.getDate());
		today = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
		$('#doctor-detail').empty();
		append_calendar(index, today, 'nothing');
    	$('#doctor-detail').toggle( "slide");
    	indexActivo = index;
		stateToggle = 'activo';
		infoToggle = 'date';

	}else if(stateToggle == 'activo'){
		
		$('#doctor-detail').toggle("slide",function(){
			$('#doctor-detail').empty();
		});
		
		indexActivo = -1;
		stateToggle = 'inactivo';
		infoToggle = 'none';
	}
}

function click_message(){
	$('.message').click(function(){
		console.log('click message');
	});
}

function close_detail(){
	if(stateToggle == 'activo'){
		$('#doctor-detail').toggle("slide",function(){
			$('#doctor-detail').empty();
		});
		indexActivo = -1;
		stateToggle = 'inactivo';
		infoToggle = 'none';
	}
}

function click_doctor_block(){

    $('.doctor-info-click').click(function(){

    	var index = $(this).find('.index').text();
    	toggle_detail(index);
    });
}

function toggle_detail(index){
	if(stateToggle == 'activo' && infoToggle == 'date'){
		$('#doctor-detail').toggle( "slide",function(){
			append_detail(index);
		});
		$('#doctor-detail').toggle( "slide");
		indexActivo = index;
		stateToggle = 'activo';
		infoToggle = 'detail';
	}else if(stateToggle == 'activo' && index != indexActivo){
		$('#doctor-detail').toggle( "slide",function(){
			append_detail(index);
		});
		$('#doctor-detail').toggle( "slide");
		indexActivo = index;
		stateToggle = 'activo';
		infoToggle = 'detail';
	}else if(stateToggle == 'inactivo'){
		append_detail(index);
    	$('#doctor-detail').toggle( "slide");
    	indexActivo = index;
			stateToggle = 'activo';
			infoToggle = 'detail';
	}else if(stateToggle == 'activo'){
		close_detail();
	}
}