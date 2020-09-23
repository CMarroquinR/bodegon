<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Producto;
use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use App\Models\CategoriaProducto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ProductoRequest;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CategoriaProducto::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $unidades = UnidadMedida::orderBy('nombre', 'asc')->pluck('nombre', 'id');

        $body = view('forms.productos', compact('categorias', 'unidades'))->with('value', 0)->render();
        return ['body' => $body];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        $user_id = Auth::user()->id;
        $request['bodega_id'] = Bodega::where('user_id', $user_id)->first()->id;
        $imagen = $request->file('imagen');
        if ($imagen) {
            $imagen = $request->file('imagen');
            $name = date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/productos'), $name);
        }

        $request = $request->except('imagen');

        if (isset($imagen)) {
            $request['imagen'] = $name;
        }elseif(!isset($imagen) and !$request['hasImage']){
            $request['imagen'] = null;
        }

        $row = Producto::create($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorias = CategoriaProducto::orderBy('nombre', 'asc')->pluck('nombre', 'id');
        $unidades = UnidadMedida::orderBy('nombre', 'asc')->pluck('nombre', 'id');

        $data = Producto::find($id);
        $body = view('forms.productos', compact('categorias', 'unidades', 'data'))->with('value', 1)->render();
        return ['body' => $body];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, $id)
    {
        $imagen = $request->file('imagen');
        if ($imagen) {
            $imagen = $request->file('imagen');
            $name = date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/productos'), $name);
        }

        $request = $request->except('imagen');
        $row = Producto::find($id);

        if (isset($imagen)) {
            $old_image = $row->imagen;
            File::delete(public_path('img/productos/' . $old_image));
            $request['imagen'] = $name;
        }elseif(!isset($imagen) and !$request['hasImage']){
            $old_image = $row->imagen;
            File::delete(public_path('img/productos/' . $old_image));
            $request['imagen'] = null;
        }

        $row->fill($request);
        $row->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Producto::find($id);
        if (isset($row['imagen'])) {
            $old_image = $row->imagen;
            File::delete(public_path('img/productos/' . $old_image));
        }
        $row->delete();
    }

    public function datatable(Request $request)
    {
        $user_id = Auth::user()->id;
        $bodega_id = Bodega::where('user_id', $user_id)->first()->id;
        $columns = [
            0 => 'codigo',
            1 => 'categoria',
            2 => 'unidad',
            3 => 'descripcion',
            4 => 'marca',
            5 => 'precio'
        ];

        $totalData = Producto::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        // $order = $columns[$request->input('order.0.column')];
        // $dir = $request->input('order.0.dir');

        $data = Producto::join('categorias_productos as x', 'productos.categoria_id', '=', 'x.id')->join('unidades_medidas as y', 'productos.unidad_id', '=', 'y.id')->select('productos.id', 'codigo', 'x.nombre as categoria', 'y.nombre as unidad', 'descripcion', 'marca', 'precio')->where('bodega_id', $bodega_id)->orderBy('categoria', 'asc')->get();

        $json_data = array(
            'draw' => intval($request->input('draw')),
            'recordsFiltered' => intval($totalData),
            'recordsTotal' => intval($totalData),
            'data' => $data
        );

        return $json_data;
    }
}
