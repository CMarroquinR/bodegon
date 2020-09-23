@if($value === 0)
{!! Form::open(['route' => 'publicidad.store', 'method' => 'POST', 'id' => 'target', 'autocomplete' => 'off']) !!}
@elseif($value === 1)
{!! Form::model($data, ['route' => ['publicidad.update', $data->id], 'method' => 'PUT', 'id' => 'target', 'autocomplete' => 'off']) !!}
@endif
<fieldset spellcheck="false">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group col-md-12" id="empresa">
                {!! Form::label('empresa', 'Empresa') !!}
                {!! Form::text('empresa', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6" id="inicio">
                {!! Form::label('inicio', 'Fecha Inicial') !!}
                {!! Form::date('inicio', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6" id="fin">
                {!! Form::label('fin', 'Fecha Final') !!}
                {!! Form::date('fin', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-12" id="imagen">
            <label for="imagen">
                <span>Imagen</span>
                <small><a href="#" id="remove-img" class="text-dark"><i class="fas fa-eraser"></i></a></small>
            </label>
            {!! Form::hidden('hasImage', isset($data['imagen']) ? 1 : 0, ['id' => 'has-image']) !!}
            {!! Form::file('imagen', ['class' => 'form-control-file', 'id' => 'publicidad-imagen']) !!}
            </div>
        </div>

        <div class="text-center" id="prev">
            @if($value === 1)
                @if(isset($data['imagen']))
                <img src="{{ asset('img/publicidad/' . $data['imagen']) }}" class="img-fluid">
                @endif
            @endif
        </div>
    </div>
</fieldset>
{!! Form::close() !!}