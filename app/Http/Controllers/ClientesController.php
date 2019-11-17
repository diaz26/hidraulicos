<?php

namespace App\Http\Controllers;

use App\clientes;
use App\TiposDocumento;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( array $resp = null)
    {
        $clientes = clientes::with('tipo_documento')->orderBy('numero_documento')->get();
        $tiposDocumento = TiposDocumento::get();
        return view('admin.clientes', ['clientes' => $clientes, 'resp' => null, 'tipos_documentos' => $tiposDocumento]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->id) {
            $cliente = clientes::where('id', $request->id)->first();
            if (empty($cliente)) {
                return $this->index(['msg' => 'Cliente no encontrado', 'color' => 'danger']);
            }
            $msg = 'Cliente actualizado correctamente';
        } else {
            $cliente = new clientes();
            $msg = 'Cliente creado correctamente';
        }
        unset($request['_token']);
        $cliente->forceFill($request->all())->save();
        return $this->index(['msg' => $msg, 'color' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = clientes::where('id', $id)->delete();
        return redirect()->action('ClientesController@index');
    }
}
