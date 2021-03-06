
@extends('layouts.app')

@section('title', 'Listado de municipios')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.2/sweetalert2.all.js"></script>

@section('title2', 'Listado de Municipios')

@section('content')
	<table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%" style="margin-top:10px">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Municipio</th>            
                <th>Departamento</th>
                <th class="text-center">
                    <a href="/municipio/create" class="btn btn-primary btn-sm" id="nuevo"  
                        data-toggle="tooltip" title="Nueva Municipio">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Nuevo
                    </a> 
                </th>
            </tr>
        </thead>
        <tbody>
            @include('common.success')

            @foreach($municipios as $municipio)
                <tr>
                    <td>{{$municipio->muni_codi}}</td>
                    <td>{{$municipio->muni_nomb}}</td>
                    <td>{{$municipio->depa_nomb}}</td>
                    <td class="text-center">
                        <form method="POST" action="/municipio/{{$municipio->muni_codi}}" accept-charset="UTF-8" 
                            style="display:inline">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">					
                            <button type="submit" class="btn btn-danger btn-sm fa fa-trash" style="margin-right: 10px">	</button>				
                        </form>
                        <a href="/municipio/{{$municipio->muni_codi}}/edit"><i class="btn btn-info btn-sm fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
	</table>	
@endsection
