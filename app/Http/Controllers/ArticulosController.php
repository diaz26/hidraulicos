<?php

namespace App\Http\Controllers;

use App\articulos;
use Illuminate\Http\Request;

class ArticulosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( array $resp = null)
    {
        $articulos = articulos::orderBy('codigo')->get();
        return view('admin.articulos', ['articulos' => $articulos, 'resp' => null]);
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
            $articulo = articulos::where('id', $request->id)->first();
            if (empty($articulo)) {
                return $this->index(['msg' => 'Artículo no encontrado', 'color' => 'danger']);
            }
            $msg = 'Artículo actualizado correctamente';
        } else {
            $articulo = new articulos();
            $msg = 'Artículo creado correctamente';
        }
        unset($request['_token']);
        $articulo->forceFill($request->all())->save();
        return $this->index(['msg' => $msg, 'color' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulos  $articulos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        articulos::where('id', $id)->delete();
        return redirect()->action('ArticulosController@index');
    }
}
