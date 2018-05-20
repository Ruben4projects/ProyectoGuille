@extends('layouts.app')

@section('content')


<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						 <button  class="btn btn-success pull-right" onclick="guardarEditarRutina({{$rutina}});">Guardar y finalizar rutina</button>
						<form action="{{route('deleteEjer', ['rutina' => $rutina->id])}}" method="post" enctype="multipart/form-data" class="form-horizontal">							{{ csrf_field() }}
							<input type="hidden" name="nombre" value="{{$rutina->nombre}}">
							<input type="hidden" name="tipo" value="{{$rutina->tipo}}">
							<input type="hidden" name="sexo" value="{{$rutina->sexo}}">
							<input type="hidden" name="descripcion" value="{{$rutina->descripcion}}">
							<input type="hidden" name="nivel" value="{{$rutina->nivel}}">
							<input type="hidden" name="dias" value="{{$rutina->dias}}">

							<button type="submit" id="enviar" name="enviar" class="btn btn-danger pull-left"><b>Eliminar todos los ejercicios de la rutina</b></button>

						</form>
						<br>
					</div>
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th class="text-left">DIA</th>
								<th class="text-left">MUSCULO</th>
								<th class="text-left">EJERCICIOS</th>
								<th class="text-left">SERIES</th>
								<th class="text-left">ACCION</th>
							</tr>
						</thead>
						<tbody>

								
							<tr>
								<td class="text-left">
									<select  id="dia" name="dia" class="form-control">
							       		<?php $length=$rutina->dias ?>
										@for($i=1;$i<=$length;$i++)
							       		 <option value="{{$i}}">Dia {{$i}} </option>
							       		 @endfor
							   	    </select>
								</td>
								<td class="text-left"><select  id="musculo" name="musculo" class="form-control">
							     @foreach($musculos as $musculo)
							     <option value="{{$musculo->nombre}}">{{$musculo->nombre}}</option>
							      @endforeach
							    </select>
								</td>
								

								<td class="text-left">
								<input type="text" name="ejercicio" id="ejercicio" class="form-control"></td>
								
								<td class="text-left"><input type="text" name="cantidad" id="cantidad" class="form-control"></td>
								<td class="text-left"><button class="btn btn-success" onclick="addEjer();">Añadir mas ejercicios</button></td>

							</tr>

						</tbody>
					</table>
				</div>
			</div>
		
		</div>
<div class="row">
			<div class="col-md-4 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
					
						
							
							<h4>Lista de ejercicios guardados anteriormente</h4>
					</div>
					@if(isset($ejercicio->id))
						<table class="table table-hover" id="dev-table">
							<thead>
								<tr>
									<th class="text-left">DIA</th>
									<th class="text-left">MUSCULO</th>
									<th class="text-left">EJERCICIOS</th>
									<th class="text-left">SERIES</th>
									
								</tr>
							</thead>
							<tbody>
							<tr>
						    @foreach($ejercicios as $ejercicio)
			               		<tr>
				             		<td class="text-left">Dia {{$ejercicio->dia}}</td>
				             		<td class="text-left">{{$ejercicio->musculo->nombre}}</td>
									<td class="text-left">{{$ejercicio->ejercicio}}</td>	
									<td class="text-left">{{$ejercicio->cantidad}}</td>
								</tr>
	               			@endforeach
	               		
	               		</tbody></table>
               		@else
               		<h3>  &nbsp No hay ejercicios antiguos guardados</h3>
               		@endif  
				</div>
			</div> 
		
		<div class="col-md-4 " >
			<div class="panel panel-primary">
				<div class="panel-heading" >
					<button class="btn btn-danger pull-right" onclick="resetear();">Resetear rutina</button>
					<h4>Lista de ejercicios a guardar</h4>
				</div>
				<div id="tablaEjercicios">
					
				</div>

				</div>
			</div>
		</div>

</div>
   <div class="container pull-right">
   	   		

   		
   </div>

@endsection

 <script src="{{ asset('js/funcionesAjax.js') }}"></script>
