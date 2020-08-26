@extends('layouts.app')

@section('content')
<h4 class="font-weight-bold mb-3">PUBLICIDAD</h4>

<div class="card mb-3" style="width:100%;">
    <div class="card-header">Agregar nuevo registro</div>
    <div class="card-body">
        <form class="form-inline">
        <div class="form-group mr-4">
            <input type="text" class="form-control" id="staticEmail2" placeholder="Razon social">
        </div>
        <div class="form-group mr-4">
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Empresa</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Gloria</td>
      <td>
        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-link"><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-link"><i class="fas fa-trash"></i></button>
        </div>
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Ripley</td>
      <td>
      <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-link"><i class="fas fa-pencil-alt"></i></button>
            <button type="button" class="btn btn-link"><i class="fas fa-trash"></i></button>
        </div>
      </td>
    </tr>
  </tbody>
</table>
@endsection