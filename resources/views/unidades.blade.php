@extends('layouts.app')

@section('content')
<h4 class="font-weight-bold mb-3">Unidades de medida</h4>
<div hidden class="model-url" data-url="{{ route('unidades.index') }}"></div>

<table class="table table-hover table-bordered d-none" id="appTable" style="width:100%" data-url="{{ route('unidades.datatable') }}">
    <thead class="thead-dark">
        <th>Nombre</th>
    </thead>
</table>
{!! Form::open(['route' => ['unidades.destroy', ':ID'], 'method' => 'DELETE', 'class' => 'form-delete']) !!}
{!! Form::close() !!}

@include('layouts.modal')
@endsection

@push('scripts')
<script>
var table = $('#appTable').DataTable( {
    columns: [
        {data: 'nombre'},
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
</script>
@endpush