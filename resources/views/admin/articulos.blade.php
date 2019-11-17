@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#FFFFFF; opacity: 0.9;">
    @if ($resp)
        <div style="text-align:center" class="alert alert-{{ $resp['color'] }}">{{ $resp['msg'] }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8 mr-auto ml-auto">
            <h4><b>Agregar artículo</b></h4>
            <form action="articulos" method="POST" style="padding:20px">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <label for="codigo">Código</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="text" name="codigo" class="form-control" id="codigo" required placeholder="Código" onkeyup="mayus(this);" maxlength="10">
                            </div>
                            <div class="col-12 col-md-2">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="col-12 col-md-4">
                                <input type="text" name="nombre" class="form-control" id="nombre" required placeholder="Nombre" maxlength="30">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <label for="descripcion">Descripción</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripción" maxlength="100">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <label for="precio">Precio</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="number" name="precio" class="form-control" id="precio" placeholder="Precio" required maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                            </div> 
                            <div class="col-12 col-md-2">
                                <label for="cantidad">Cantidad</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad" required maxlength="6" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                            </div>
                            <div class="col-12 col-md-2">
                                <button type="submit" class="btn" style="background-color: #575D73; color:#FFFFFF;">Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-10 mr-auto ml-auto">
            <h4><b>Artículos</b></h4>
            <table class="table table-hover table-sm">
                <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th style="text-align:right" scope="col">Cantidad</th>
                        <th style="text-align:right" scope="col">Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($articulos) > 0)
                        @foreach ($articulos as $articulo)
                        <tr data-toggle="modal" data-target="#editar_articulo{{ $articulo->id }}">
                            <td>{{ $articulo->codigo }}</td>
                            <td>{{ $articulo->nombre }}</td>
                            <td>{{ $articulo->descripcion }}</td>
                            <td style="text-align:right">{{ $articulo->cantidad }}</td>
                            <td style="text-align:right">{{ '$ '. round($articulo->precio, 1) }}</td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar_articulo{{ $articulo->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="false">
                            <form action="articulos" method="POST">
                                <input type="hidden" value="{{ $articulo->id }}" name="id">
                            @csrf
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Editar artículo</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="row">
                                                        <div class="col-12 col-md-2">
                                                            <label for="codigo">Código</label>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <input type="text" name="codigo" value="{{ $articulo->codigo }}" class="form-control" id="codigo" required placeholder="Código" onkeyup="mayus(this);" maxlength="10">
                                                        </div>
                                                        <div class="col-12 col-md-2">
                                                            <label for="nombre">Nombre</label>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <input type="text" name="nombre" value="{{ $articulo->nombre }}" class="form-control" id="nombre" required placeholder="Nombre" maxlength="30">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="row">
                                                        <div class="col-12 col-md-2">
                                                            <label for="descripcion">Descripción</label>
                                                        </div>
                                                        <div class="col-12 col-md-10">
                                                            <input type="text" name="descripcion" value="{{ $articulo->descripcion }}" class="form-control" id="descripcion" placeholder="Descripción" maxlength="100">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="row">
                                                        <div class="col-12 col-md-2">
                                                            <label for="precio">Precio</label>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <input type="number" name="precio" value="{{ $articulo->precio }}" class="form-control" id="precio" required placeholder="Precio" maxlength="9" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                                        </div> 
                                                        <div class="col-12 col-md-2">
                                                            <label for="cantidad">Cantidad</label>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <input type="number" name="cantidad" value="{{ $articulo->cantidad }}" class="form-control" id="cantidad" required placeholder="Cantidad" maxlength="6" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#eliminar{{ $articulo->id }}">Eliminar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal" tabindex="-1" id="eliminar{{ $articulo->id }}" role="dialog" style=" opacity: 1;background-color:#FFFFFF;" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>¿Desea eliminar el artículo {{ $articulo->nombre }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <a role="button" class="btn btn-danger" href="{{ url('articulos/delete/'. $articulo->id) }}">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    
</div>
@endsection