@extends('layouts.app')

@section('content')
<h4 class="font-weight-bold mb-3">Publicidad</h4>
<div hidden class="model-url" data-url="{{ route('publicidad.index') }}"></div>

<table class="table table-hover table-bordered d-none" id="appTable" style="width:100%" data-url="{{ route('publicidad.datatable') }}">
    <thead class="thead-dark">
        <th>Empresa</th>
        <th>Fecha Inicial</th>
        <th>Fecha Final</th>
        <th>Estado</th>
    </thead>
</table>
{!! Form::open(['route' => ['publicidad.destroy', ':ID'], 'method' => 'DELETE', 'class' => 'form-delete']) !!}
{!! Form::close() !!}

@include('layouts.modal')
@endsection

@push('scripts')
<script>
var table = $('#appTable').DataTable( {
    columns: [
        {data: 'empresa'},
        {data: 'inicio'},
        {data: 'fin'},
        {
			data: 'estado',
			render: function(data, type, row) {
				switch(data) {
					case 0 : return 'Inactivo'; break;
					case 1 : return 'Activo'; break;
					default:break;
				}
			}
		}
	],
	rowId: 'id',
	// order: [ 3, 'desc' ],
	ordering: false,
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
</script>
@endpush