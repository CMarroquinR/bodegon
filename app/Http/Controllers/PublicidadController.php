<?php

namespace App\Http\Controllers;

use App\Models\Publicidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PublicidadRequest;

class PublicidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publicidad');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $body = view('forms.publicidad')->with('value', 0)->render();
        return ['body' => $body];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicidadRequest $request)
    {
        $request['estado'] = isset($request['estado']) ? 1 : 0;
        $imagen = $request->file('imagen');
        if ($imagen) {
            $imagen = $request->file('imagen');
            $name = date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/publicidad'), $name);
        }

        $request = $request->except('imagen');

        if (isset($imagen)) {
            $request['imagen'] = $name;
        }elseif(!isset($imagen) and !$request['hasImage']){
            $request['imagen'] = null;
        }

        $row = Publicidad::create($request);
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
        $data = Publicidad::find($id);
        $body = view('forms.publicidad', compact('data'))->with('value', 1)->render();
        return ['body' => $body];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublicidadRequest $request, $id)
    {
        $request['estado'] = isset($request['estado']) ? 1 : 0;
        $imagen = $request->file('imagen');
        if ($imagen) {
            $imagen = $request->file('imagen');
            $name = date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('img/publicidad'), $name);
        }

        $request = $request->except('imagen');
        $row = Publicidad::find($id);

        if (isset($imagen)) {
            $old_image = $row->imagen;
            File::delete(public_path('img/publicidad/' . $old_image));
            $request['imagen'] = $name;
        }elseif(!isset($imagen) and !$request['hasImage']){
            $old_image = $row->imagen;
            File::delete(public_path('img/publicidad/' . $old_image));
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
        $row = Publicidad::find($id);
        if (isset($row['imagen'])) {
            $old_image = $row->imagen;
            File::delete(public_path('img/publicidad/' . $old_image));
        }
        $row->delete();
    }

    public function datatable(Request $request)
    {
        $columns = [
            0 => 'empresa',
            1 => 'inicio',
            2 => 'fin',
            3 => 'estado'
        ];

        $totalData = Publicidad::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        // $order = $columns[$request->input('order.0.column')];
        // $dir = $request->input('order.0.dir');

        $now = date('Y-m-d');

        $data = Publicidad::select('id', 'empresa', DB::raw('DATE_FORMAT(inicio, "%d-%m-%Y") as inicio'), DB::raw('DATE_FORMAT(fin, "%d-%m-%Y") as fin'), DB::raw("IF(inicio <= '$now' and fin >= '$now', 1, 0) AS estado"))->offset($start)->limit($limit)->orderBy('estado', 'desc')->get();

        $json_data = array(
            'draw' => intval($request->input('draw')),
            'recordsFiltered' => intval($totalData),
            'recordsTotal' => intval($totalData),
            'data' => $data
        );

        return $json_data;
    }
}
