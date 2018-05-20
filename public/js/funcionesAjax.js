var arrayEjercicio = new Array();
var arrayCantidad = new Array();
var arrayMusculo = new Array();
var arrayDia = new Array();
var idrutina;
var idmusculos = new Array();
//Añadir ejercicios a un array para luego guardarlos en la base de datos
function addEjer(){
			 dia = $('#dia').val();
			 musculo = $('#musculo').val();
             ejercicio = $('#ejercicio').val();
             cantidad = $('#cantidad').val();
             // idrutina = idRutina;

             $('#cantidad').val("");
             $('#ejercicio').val("");
            
             if(ejercicio.length>0 && cantidad.length>0){
             arrayEjercicio.push(ejercicio);
             arrayCantidad.push(cantidad);
             arrayMusculo.push(musculo);
             arrayDia.push(dia);

             

        	}
            



              console.log(arrayCantidad);
             console.log(arrayEjercicio);
             console.log(arrayMusculo);
               // console.log(idrutina);

             var listaEjer = "";

             var num = arrayEjercicio.length;
             for(var i=0; i<num; i++){
             	listaEjer += '<tr>'+
             		'<td class="text-left">Dia '+arrayDia[i]+'</td>'+
             		'<td class="text-left">'+arrayMusculo[i]+'</td>'+
					'<td class="text-left">'+arrayEjercicio[i]+'</td>'+	
					'<td class="text-left">'+arrayCantidad[i]+'</td>'+
					
				'</tr>'
				
             }

             var tabla= '<table class="table table-hover" id="dev-table">'+
						'<thead><tr>'+
						'<th class="text-left">DIA</th>'+
						'<th class="text-left">MUSCULO</th>'+
						'<th class="text-left">EJERCICIOS</th>'+
						
						'<th class="text-left">SERIES</th>'+
						
						'</tr></thead><tbody>'+
						 listaEjer + '</tbody></table>'
             console.log(tabla);


			 $('#tablaEjercicios').html(tabla); 			
}



function resetear(){
  arrayDia.splice(0, arrayDia.length);
    arrayMusculo.splice(0, arrayMusculo.length);
      arrayEjercicio.splice(0, arrayEjercicio.length);
        arrayCantidad.splice(0, arrayCantidad.length);

        var listaEjer = "";

             var num = arrayEjercicio.length;
             for(var i=0; i<num; i++){
             	listaEjer += '<tr>'+
             		'<td class="text-left">Dia'+arrayDia[i]+'</td>'+
             		'<td class="text-left">'+arrayMusculo[i]+'</td>'+
					'<td class="text-left">'+arrayEjercicio[i]+'</td>'+	
					'<td class="text-left">'+arrayCantidad[i]+'</td>'+
					'<td class="text-left"><button class="btn btn-danger"'+ 
					'onclick="borrar('+i+');">Eliminar</button></td>'+
				'</tr>'
				
             }

             var tabla= '<table class="table table-hover" id="dev-table">'+
						'<thead><tr>'+
						'<th class="text-left">DIA</th>'+
						'<th class="text-left">MUSCULO</th>'+
						'<th class="text-left">EJERCICIOS</th>'+
						
						'<th class="text-left">SERIES</th>'+
						'<th class="text-left">ACCION</th>'+
						'</tr></thead><tbody>'+
						 listaEjer + '</tbody></table>'
             console.log(tabla);


			 $('#tablaEjercicios').html(tabla);

}

 function guardarRutina(rutina){

 	jsonEjercicio = JSON.stringify(arrayEjercicio);
    jsonCantidad = JSON.stringify(arrayCantidad);
    jsonDias= JSON.stringify(arrayDia);
    jsonMusculos = JSON.stringify(arrayMusculo);
           
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

 	$.ajax({
                type: 'POST',
                url: 'ajaxRequest',
                data: {jsonEjercicio: jsonEjercicio ,jsonCantidad : jsonCantidad, jsonMusculos : jsonMusculos, jsonDias: jsonDias, rutina:rutina},
                datatype:'json',
                success: function( data )
                {

                        console.log('exito');
                      if(data == 'exito'){
                      	window.location.href = "/tfg_2018/public/home";
                      }
                      
                 
   
                }
            });
 }

function guardarEditarRutina(rutina){

    jsonEjercicio = JSON.stringify(arrayEjercicio);
    jsonCantidad = JSON.stringify(arrayCantidad);
    jsonDias= JSON.stringify(arrayDia);
    jsonMusculos = JSON.stringify(arrayMusculo);
           console.log(rutina);
      var id = rutina['id'];     
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });

    $.ajax({
                type: 'POST',
                url: id+'/ajaxRequestEdit',
                data: {jsonEjercicio: jsonEjercicio ,jsonCantidad : jsonCantidad, jsonMusculos : jsonMusculos, jsonDias: jsonDias, rutina:rutina},
                datatype:'json',
                success: function( data )
                {
                        console.log('exito');

                      if(data == 'exito'){
                        window.location.href = "/tfg_2018/public/home";
                      }
                      
                            console.log();

   
                }
            });
 }