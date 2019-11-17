@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <a href="{{ url('articulos') }}" class="thumbnail">
                                <img src="{{ asset('images/modulo-inventario.jpg') }}" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a href="{{ url('proveedores') }}" class="thumbnail">
                                <img src="{{ asset('images/PROVEEDORES.png') }}" width="100%">
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <a href="{{ url('clientes') }}" class="thumbnail">
                                <img src="{{ asset('images/clientes.png') }}" width="100%">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
