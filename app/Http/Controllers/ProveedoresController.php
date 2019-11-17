<?php

namespace App\Http\Controllers;

use App\proveedores;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( array $resp = null)
    {
        $proveedores = proveedores::get();
        return view('admin.proveedores', ['proveedores' => $proveedores, 'resp' => null]);
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
            $proveedor = proveedores::where('id', $request->id)->first();
            if (empty($proveedor)) {
                return $this->index(['msg' => 'Proveedor no encontrado', 'color' => 'danger']);
            }
            $msg = 'Proveedor actualizado correctamente';
        } else {
            $proveedor = new proveedores();
            $msg = 'Proveedor creado correctamente';
        }
        unset($request['_token']);
        $proveedor->forceFill($request->all())->save();
        return $this->index(['msg' => $msg, 'color' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        proveedores::where('id', $id)->delete();
        return redirect()->action('ProveedoresController@index');

    }
}
