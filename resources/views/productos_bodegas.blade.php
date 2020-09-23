@extends('layouts.app')

@section('content')
<div class="alert alert-primary" role="alert">
    <div class="h3 font-weight-bold text-center mb-3">{{ $bodega->nombre }}</div>
</div>

<div class="row">
@foreach($productos as $producto)
    <div class="col-md-3">
        <div class="card border-danger">
            <div class="card-header">
            <img src="{{ asset('img/productos/' . $producto['imagen']) }}" class="img-fluid">
            </div>
            <div class="card-body">
                <!-- <a href="{{ url('bodegas/' . $bodega->id)  }}" class="stretched-link"></a> -->
                <div class="h3 font-weight-bold text-center text-info">{{ $producto->nombre }}</div>
            </div>
            <div class="card-footer text-muted text-right">
                S/ {{ $producto->precio }}
            </div>
        </div>
    </div>
@endforeach
</div>

@include('layouts.modal')
@endsection

@push('scripts')

@endpush