@extends('layouts.app')

@section('content')


<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<button class="btn btn-success pull-right" onclick="guardarRutina({{$rutina}});">Guardar y finalizar rutina</button>
						<br><br>
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
								<td class="text-left"><button class="btn btn-success" onclick="addEjer();">Añadir</button></td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>
		
		</div>
<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<button class="btn btn-danger pull-right" onclick="resetear();">Resetear rutina</button><br>
						<h3 class="panel-title">Lista de ejercicios a guardar</h3>
					</div>
					<div id="tablaEjercicios">
               
            </div>
				</div>
			</div>
		
		</div>


   <div class="container pull-right">
   	   		

   		
   </div>

@endsection

 <script src="{{ asset('js/funcionesAjax.js') }}"></script>
