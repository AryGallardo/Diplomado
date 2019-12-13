@extends('layouts.app')

@section('title', 'Actualización de Municipio')
@section('title2', 'Actualización de Municipio')
@section('content')

	<div class="row" >
		<div class="col-sm">
			<div class="card" style="margin-top: 10px;">
				<div class="card-body">
					<form method="POST" action="/municipio/{{$municipio->muni_codi}}" accept-charset="UTF-8" style="display:inline">
						@csrf			
						<input type="hidden" name="_method" value="PUT">
						<div class="form-group">
							<label for="muni_nomb">Municipio</label>
							<input type="text" value = '{{$municipio->muni_nomb}}' class="form-control" name="muni_nomb"/>
						</div>
						
						<div class="form-group">
							<label for="depa_codi">Departamento </label>
							<select name='depa_codi' class = 'form-control'>
								<option value="">Seleccione uno ... </option>
								@foreach($departamentos as $departamento)
									@if($municipio->depa_codi == $departamento->depa_codi)
										<option selected value = '{{ $departamento->depa_codi }}'> {{ $departamento->depa_nomb }} </option>
									@else
										<option value = '{{ $departamento->depa_codi }}'> {{ $departamento->depa_nomb }} </option>
									@endif
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary btn-xs fa fa-save" style="margin-left: 10px"> Actualizar </button>				
					</form>
					<a href="/municipio" class="btn btn-danger btn-xs fa fa-arrow-alt-circle-right" style="margin-left: 10px"> Cancelar </a>				
				</div>
			</div>
		</div>
	</div>

@endsection
