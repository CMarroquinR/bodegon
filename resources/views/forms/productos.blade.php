@if($value === 0)
{!! Form::open(['route' => 'productos.store', 'method' => 'POST', 'id' => 'target', 'autocomplete' => 'off']) !!}
@elseif($value === 1)
{!! Form::model($data, ['route' => ['productos.update', $data->id], 'method' => 'PUT', 'id' => 'target', 'autocomplete' => 'off']) !!}
@endif
<fieldset spellcheck="false">
    <div class="container-fluid">
        <div class="row">
            <div class="form-group col-md-6" id="codigo">
                {!! Form::label('codigo', 'Código') !!}
                {!! Form::text('codigo', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6" id="nombre">
                {!! Form::label('nombre', 'Nombre') !!}
                {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12" id="descripcion">
                {!! Form::label('descripcion', 'Descripción') !!}
                {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '2']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6" id="categoria_id">
                {!! Form::label('categoria', 'Categoría') !!}
                {!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
            </div>
            <div class="form-group col-md-6" id="unidad_id">
                {!! Form::label('unidad', 'Unidad de medida') !!}
                {!! Form::select('unidad_id', $unidades, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6" id="precio">
                {!! Form::label('precio', 'Precio') !!}
                {!! Form::number('precio', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group col-md-6" id="stock_minimo">
                {!! Form::label('stock_minimo', 'Stock mínimo') !!}
                {!! Form::number('stock_minimo', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12" id="marca">
                {!! Form::label('marca', 'Marca') !!}
                {!! Form::text('marca', null, ['class' => 'form-control']) !!}
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
                <img src="{{ asset('img/productos/' . $data['imagen']) }}" class="img-fluid">
                @endif
            @endif
        </div>
    </div>
</fieldset>
{!! Form::close() !!}