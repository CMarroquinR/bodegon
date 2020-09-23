@extends('layouts.app')

@section('content')

@if(!isset($bodega))
<h5 class="font-weight-bold text-danger text-center mb-3"><i class="far fa-sad-cry"></i> AÚN NO HAS REGISTRADO UNA BODEGA <i class="far fa-sad-cry"></i></h5>
<h4 class="font-weight-bold text-center mb-3"><i class="far fa-smile-wink"></i> REGISTRA TU BODEGA AHORA <i class="far fa-smile-wink"></i></h4>
{!! Form::open(['route' => 'bodegas.store', 'method' => 'POST']) !!}
<div class="container-fluid">
    <div class="font-weight-bold">Datos generales</div>
    <hr>
    <div class="row">
        <div class="form-group col-md-12" id="nombre">
            {!! Form::label('nombre', 'Nombre de Bodega') !!}
            {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            @error('nombre')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4" id="tipo_documento">
            {!! Form::label('tipo_documento', 'Tipo de documento') !!}
            {!! Form::select('tipo_documento', ['RUC' => 'RUC', 'DNI' => 'DNI'], null, ['class' => 'form-control', 'placeholder' => 'Selecciona una opción']) !!}
        </div>
        <div class="form-group col-md-4" id="numero_documento">
            {!! Form::label('numero_documento', 'N° de documento') !!}
            {!! Form::text('numero_documento', null, ['class' => 'form-control']) !!}
            @error('numero_documento')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4" id="razon_social">
            {!! Form::label('razon_social', 'Razon social') !!}
            {!! Form::text('razon_social', null, ['class' => 'form-control']) !!}
            @error('razon_social')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
    <div class="form-group col-md-4" id="telefono">
            {!! Form::label('telefono', 'Teléfono') !!}
            {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
            @error('telefono')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4" id="email">
            {!! Form::label('email', 'Correo electrónico') !!}
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-4" id="web">
            {!! Form::label('web', 'Página web') !!}
            {!! Form::text('web', null, ['class' => 'form-control']) !!}
            @error('web')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-12" id="direccion">
            {!! Form::label('direccion', 'Dirección') !!}
            {!! Form::text('direccion', null, ['class' => 'form-control', 'id' => 'search_input', 'placeholder' => 'Buscar'] ) !!}
            @error('direccion')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="font-weight-bold">Opciones de Delivery</div>
    <hr>

    <div class="row mb-2">
        <div class="form-group col-md-3">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio0" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio0">No cobra delivery</label>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="form-group col-md-3">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio1">Si cobra delivery</label>
            </div>
        </div>
        <div class="form-group col-md-3">
            {!! Form::number(null, null, ['class' => 'form-control', 'placeholder' => 'Ingrese monto S/'] ) !!}
        </div>
    </div>
    <div class="row mb-2">
        <div class="form-group col-md-3">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                <label class="custom-control-label" for="customRadio2">Cobra delivery según monto</label>
            </div>
        </div>
        <div class="form-group col-md-3">
            {!! Form::number(null, null, ['class' => 'form-control', 'placeholder' => 'Ingrese monto mínimo S/'] ) !!}
        </div>
    </div>

    <div class="mb-2">
        <p>Seleccione distritos de cobertura:</p>
        <ul id="sortable1" class="connectedSortable">
            <li class="ui-state-default">Lince</li>
            <li class="ui-state-default">Magdalena</li>
            <li class="ui-state-default">Miraflores</li>
            <li class="ui-state-default">San Borja</li>
            <li class="ui-state-default">San Isidro</li>
        </ul>

        <ul id="sortable2" class="connectedSortable">

        </ul>
    </div>

    <button type="submit" class="btn btn-info btn-block"><i class="fas fa-check"></i> Registrar</button>
</div>
{!! Form::close() !!}

@else

<div class="alert alert-primary" role="alert">
    <div class="h3 font-weight-bold text-center mb-3">{{ $bodega->nombre }}</div>
</div>

<h4 class="font-weight-bold mb-3">Productos</h4>
<div hidden class="model-url" data-url="{{ route('productos.index') }}"></div>

<table class="table table-hover table-bordered d-none" id="appTable" style="width:100%" data-url="{{ route('productos.datatable') }}">
    <thead class="thead-dark">
        <th>Código</th>
        <th>Categoría</th>
        <th>Unidad</th>
        <th>Descripción</th>
        <th>Marca</th>
        <th>Precio</th>
    </thead>
</table>
{!! Form::open(['route' => ['productos.destroy', ':ID'], 'method' => 'DELETE', 'class' => 'form-delete']) !!}
{!! Form::close() !!}
@endif

@include('layouts.modal')
@endsection

@push('scripts')
<script>
var searchInput = 'search_input';

$(document).ready(function () {
    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        types: ['address'],
        componentRestrictions: {
            country: "pe"
        }
    });

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var near_place = autocomplete.getPlace();
    });
});

var table = $('#appTable').DataTable( {
    columns: [
        {data: 'codigo'},
        {data: 'categoria'},
        {data: 'unidad'},
        {data: 'descripcion'},
        {data: 'marca'},
        {data: 'precio'},
	],
    rowId: 'id',
    ordering: false,
    // order: [ 0, 'asc' ],
	searching: false
});
table.on( 'select deselect', function(){
	var selectedRows = table.rows( { selected: true } ).count();
	table.buttons([1, 2]).enable( selectedRows === 1 );
});

$(document).on('change', '#publicidad-imagen',function(){
	$('#prev').empty();
	if ($(this).prop('files')[0]) {
		var type = $(this).prop('files')[0].type;

		if(type == 'image/jpeg' || type == 'image/png' || type == 'image/jpg'){
		var reader = new FileReader();

		reader.onload = function (e) {
			$('#prev').append('<img src="' + e.target.result + '" class="img-fluid">');
		};

		reader.readAsDataURL($(this).prop('files')[0]);
		}
	}
});

$(document).on('click', '#remove-img', function(){
	$('#prev').empty();
	$('#has-image').val(0);
	$('#publicidad-imagen').val('');
});

$(document).ready(function () {
    $( "#sortable1, #sortable2" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
});
</script>
@endpush