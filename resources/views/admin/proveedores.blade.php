@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#FFFFFF; opacity: 0.9;">
    @if ($resp)
        <div style="text-align:center" class="alert alert-{{ $resp['color'] }}">{{ $resp['msg'] }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-9 mr-auto ml-auto">
            <h4><b>Agregar proveedor</b></h4>
            <form action="proveedores" method="POST" style="padding:20px">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <label for="nombre">Nombre</label>
                            </div>
                            <div class="col-12 col-md-10">
                                <input type="text" name="nombre" class="form-control" id="nombre" required placeholder="Nombre" maxlength="50">
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <label for="direccion">Dirección</label>
                            </div>
                            <div class="col-12 col-md-5">
                                <input type="text" name="direccion" class="form-control" id="direccion" required placeholder="Dirección" maxlength="50">
                            </div>
                            <div class="col-12 col-md-2">
                                <label for="telefono">Teléfono</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="number" name="telefono" class="form-control" id="telefono" required placeholder="Teléfono" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
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
                            <div class="col-12 col-md-8">
                                <input type="text" name="descripcion" class="form-control" id="descripcion" required placeholder="Descripción">
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
            <h4><b>Proveedores</b></h4>
            <table class="table table-hover table-sm" >
                <thead>
                    <tr>
                        <th scope="col" style="width: 30%">Nombre</th>
                        <th scope="col" style="width: 12%; text-align:right">Teléfono</th>
                        <th scope="col" style="width: 28%">Dirección</th>
                        <th scope="col" style="width: 30%">Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($proveedores) > 0)
                        @foreach ($proveedores as $proveedor)
                        <tr data-toggle="modal" data-target="#editar_proveedor{{ $proveedor->id }}">
                            <td>{{ $proveedor->nombre }}</td>
                            <td style="text-align:right">{{ $proveedor->telefono }}</td>
                            <td>{{ $proveedor->direccion }}</td>
                            <td>{{ $proveedor->descripcion }}</td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar_proveedor{{ $proveedor->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="false">
                            <form action="proveedores" method="POST">
                                <input type="hidden" value="{{ $proveedor->id }}" name="id">
                            @csrf
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Editar proveedor</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <div class="form-row">
                                                    <div class="form-group col-md-12">
                                                        <div class="row">
                                                            <div class="col-12 col-md-2">
                                                                <label for="nombre">Nombre</label>
                                                            </div>
                                                            <div class="col-12 col-md-10">
                                                                <input type="text" name="nombre" value="{{ $proveedor->nombre }}" class="form-control" id="nombre" required placeholder="Nombre" maxlength="50">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <div class="row">
                                                            <div class="col-12 col-md-2">
                                                                <label for="direccion">Dirección</label>
                                                            </div>
                                                            <div class="col-12 col-md-5">
                                                                <input type="text" name="direccion" value="{{ $proveedor->direccion }}" class="form-control" id="direccion" required placeholder="Dirección" maxlength="50">
                                                            </div>
                                                            <div class="col-12 col-md-2">
                                                                <label for="telefono">Teléfono</label>
                                                            </div>
                                                            <div class="col-12 col-md-3">
                                                                <input type="number" name="telefono" value="{{ $proveedor->telefono }}" class="form-control" id="telefono" required placeholder="Teléfono" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
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
                                                                <input type="text" name="descripcion" value="{{ $proveedor->descripcion }}" class="form-control" id="descripcion" required placeholder="Descripción">
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#eliminar{{ $proveedor->id }}">Eliminar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal" tabindex="-1" id="eliminar{{ $proveedor->id }}" role="dialog" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>¿Desea eliminar el proveedor {{ $proveedor->nombre }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <a role="button" class="btn btn-danger" href="{{ url('proveedores/delete/'. $proveedor->id) }}">Eliminar</a>
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