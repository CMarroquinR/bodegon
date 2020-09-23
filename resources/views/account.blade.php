@extends('layouts.app')

@section('content')
<div class="pb-3">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">Datos generales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="direcciones-tab" data-toggle="tab" href="#direcciones" role="tab" aria-controls="direcciones" aria-selected="false">Mis direcciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pagos-tab" data-toggle="tab" href="#pagos" role="tab" aria-controls="pagos" aria-selected="false">Métodos de pago</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="bodega-tab" data-toggle="tab" href="#bodega" role="tab" aria-controls="bodega" aria-selected="false">Bodega</a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            {!! Form::open(['route' => 'cuenta.store', 'method' => 'POST', 'id' => 'target', 'autocomplete' => 'off']) !!}
            <fieldset spellcheck="false">
                <div class="container-fluid">
                    <div class="row">
                        <div class="form-group col-md-6" id="nombre">
                            {!! Form::label('nombre', 'Nombre') !!}
                            {!! Form::text('nombre', $user->nombre, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-md-6" id="apellido">
                            {!! Form::label('apellido', 'Apellido') !!}
                            {!! Form::text('apellido', $user->apellido, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12" id="email">
                            {!! Form::label('email', 'Correo electrónico') !!}
                            {!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <button type="button" class="btn btn-info float-right btn-check-modal"><i class="fas fa-check"></i> Grabar</button>
                </div>
            </fieldset>
            {!! Form::close() !!}
        </div>

        <div class="tab-pane" id="direcciones" role="tabpanel" aria-labelledby="direcciones-tab">
            Direcciones
        </div>

        <div class="tab-pane" id="pagos" role="tabpanel" aria-labelledby="pagos-tab">
            Pagos
        </div>
    </div>
</div>
@endsection