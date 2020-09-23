@if($value === 0)
{!! Form::open(['route' => 'categorias.store', 'method' => 'POST', 'id' => 'target', 'autocomplete' => 'off']) !!}
@elseif($value === 1)
{!! Form::model($data, ['route' => ['categorias.update', $data->id], 'method' => 'PUT', 'id' => 'target', 'autocomplete' => 'off']) !!}
@endif
<fieldset spellcheck="false">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group col-md-12" id="nombre">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
        </div>
    </div>
</fieldset>
{!! Form::close() !!}