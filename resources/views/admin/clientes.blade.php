@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#FFFFFF; opacity: 0.9;">
    @if ($resp)
        <div style="text-align:center" class="alert alert-{{ $resp['color'] }}">{{ $resp['msg'] }}</div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-9 mr-auto ml-auto">
            <h4><b>Agregar cliente</b></h4>
            <form action="clientes" method="POST" style="padding:20px">
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
                            <div class="col-12 col-md-10">
                                <input type="text" name="direccion" class="form-control" id="direccion" required placeholder="Dirección" maxlength="30">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <label for="tipo_documento">Tipo de documento</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <select name="tipo_documento_id" class="form-control" id="tipo_documento" required>
                                    <option disabled selected value="">Seleccione</option>
                                    @foreach ($tipos_documentos as $tipo)
                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                    @endforeach
                                </select>
                            </div> 
                            <div class="col-12 col-md-2">
                                <label for="numero_documento">Numero de documento</label>
                            </div>
                            <div class="col-12 col-md-3">
                                <input type="number" name="numero_documento" class="form-control" id="numero_documento" placeholder="Numero de documento" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
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
            <h4><b>Clientes</b></h4>
            <table class="table table-hover table-sm" >
                <thead>
                    <tr>
                        <th scope="col" style="width: 20%" >Identificación</th>
                        <th scope="col" style="width: 40%">Nombre</th>
                        <th scope="col" style="width: 40%">Dirección</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($clientes) > 0)
                        @foreach ($clientes as $cliente)
                        <tr data-toggle="modal" data-target="#editar_cliente{{ $cliente->id }}">
                            <td>{{ $cliente->tipo_documento->codigo.' '. $cliente->numero_documento }}</td>
                            <td>{{ $cliente->nombre }}</td>
                            <td>{{ $cliente->direccion }}</td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="editar_cliente{{ $cliente->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true" data-backdrop="false">
                            <form action="clientes" method="POST">
                                <input type="hidden" value="{{ $cliente->id }}" name="id">
                            @csrf
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Editar cliente</h5>
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
                                                            <input type="text" value="{{ $cliente->nombre }}" name="nombre" class="form-control" id="nombre" required placeholder="Nombre" maxlength="50">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <div class="row">
                                                        <div class="col-12 col-md-2">
                                                            <label for="direccion">Dirección</label>
                                                        </div>
                                                        <div class="col-12 col-md-10">
                                                            <input type="text" value="{{ $cliente->direccion }}" name="direccion" class="form-control" id="direccion" required placeholder="Dirección" maxlength="30">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <div class="row">
                                                        <div class="col-12 col-md-2">
                                                            <label for="tipo_documento">Tipo de documento</label>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <select name="tipo_documento_id" class="form-control" id="tipo_documento" required>
                                                                
                                                                @foreach ($tipos_documentos as $tipo)
                                                                    {{ $selected = ($tipo->id == $cliente->tipo_documento_id) ? 'selected' : '' }}
                                                                    <option value="{{ $tipo->id }}" {{ $selected }}>{{ $tipo->nombre }}</option>
                                                                    
                                                                    
                                                                @endforeach
                                                            </select>
                                                        </div> 
                                                        <div class="col-12 col-md-2">
                                                            <label for="numero_documento">Numero de documento</label>
                                                        </div>
                                                        <div class="col-12 col-md-4">
                                                            <input type="number" value="{{ $cliente->numero_documento }}" name="numero_documento" class="form-control" id="numero_documento" placeholder="Numero de documento" required maxlength="10" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#eliminar{{ $cliente->id }}">Eliminar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal" tabindex="-1" id="eliminar{{ $cliente->id }}" role="dialog" data-backdrop="false">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <p>¿Desea eliminar el cliente {{ $cliente->nombre }}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <a role="button" class="btn btn-danger" href="{{ url('clientes/delete/'. $cliente->id) }}">Eliminar</a>
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