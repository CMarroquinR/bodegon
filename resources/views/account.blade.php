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
        </ul>
    </div>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            Datos generales
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