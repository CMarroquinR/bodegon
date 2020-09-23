@extends('layouts.app')

@section('content')
@role('admin')

@endrole

@unlessrole('admin')

@endunlessrole
<div class="row">
@foreach($bodegas as $bodega)
    <div class="col-md-4">
        <div class="card border-info">
            <div class="card-body">
                <a href="{{ url('bodegas/' . $bodega->id)  }}" class="stretched-link"></a>
                <div class="h3 font-weight-bold text-center text-success">{{ $bodega->nombre }}</div>
            </div>
            <div class="card-footer text-muted text-center">
                {{ $bodega->direccion }}
            </div>
        </div>
    </div>
@endforeach
</div>
@endsection
