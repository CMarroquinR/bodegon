<?php

namespace App\Http\Controllers;

use App\Models\UnidadMedida;
use Illuminate\Http\Request;
use App\Http\Requests\UnidadMedidaRequest;

class UnidadMedidaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unidades');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $body = view('forms.unidades')->with('value', 0)->render();
        return ['body' => $body];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnidadMedidaRequest $request)
    {
        $row = UnidadMedida::create($request->all());
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
        $data = UnidadMedida::find($id);
        $body = view('forms.unidades', compact('data'))->with('value', 1)->render();
        return ['body' => $body];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnidadMedidaRequest $request, $id)
    {
        $row = UnidadMedida::find($id);
        $row->fill($request->all());
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
        $row = UnidadMedida::find($id);
        $row->delete();
    }

    public function datatable(Request $request)
    {
        $columns = [
            0 => 'nombre',
        ];

        $totalData = UnidadMedida::count();
        $limit = $request->input('length');
        $start = $request->input('start');
        // $order = $columns[$request->input('order.0.column')];
        // $dir = $request->input('order.0.dir');

        $data = UnidadMedida::offset($start)->limit($limit)->orderBy('nombre', 'asc')->get();
        // $data = UnidadMedida::offset($start)->limit($limit)->get();

        $json_data = array(
            'draw' => intval($request->input('draw')),
            'recordsFiltered' => intval($totalData),
            'recordsTotal' => intval($totalData),
            'data' => $data
        );

        return $json_data;
    }
}