@extends('layouts.index')

@section('contenido')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="pb-2">
                        <a href="{{url('maquinarias')}}">
                            <i class="fa fa-tractor"></i> Maquinarias
                        </a>
                        <div class="float-right">
                            <a class="btn btn-success" href="{{url('maquinarias/create')}}">
                                <i class="fa fa-plus"></i> Nuevo
                            </a>
                        </div>
                    </h2>
                    <form method="GET" action="{{url('maquinarias')}}" autocomplete="off">
                        <input type="text" class="form-control mb-2 mr-sm-2"  value="{{$busqueda}}" id="busqueda" name="busqueda" placeholder="Buscar">
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered color-table info-table">
                            <thead>
                            <tr>
                                <th class="text-center">NOMBRE</th>
                                <th class="text-center">TIPO</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($maquinarias as $maquinaria)
                                <tr class="text-center">
                                    <td>{{$maquinaria->nombre}}</td>
                                    <td>{{$maquinaria->tipo->nombre}}</td>
                                    <td class="text-center ">
                                        <a href="{{url('maquinarias/'.$maquinaria->id)}}">
                                            <button class="btn btn-outline-info">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </a>
                                        <a href="{{url('maquinarias/'.$maquinaria->id.'/edit')}}">
                                            <button class="btn btn-warning">
                                                <i class="fa fa-pen"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-danger" onclick="modalEliminar('{{$maquinaria->nombre}}', '{{url('maquinarias/'.$maquinaria->id)}}');">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$maquinarias->links('pagination.default')}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('vistas.modal')
    @push('scripts')
        <script>

            function modalEliminar(nombre, url) {
                $('#modalEliminarForm').attr("action", url);
                $('#metodo').val("delete");
                $('#modalEliminarTitulo').html("Eliminar Abono");
                $('#modalEliminarEnunciado').html("Realmente desea eliminar el abono: " + nombre + "?");
                $('#modalEliminar').modal('show');
            }

        </script>

    @endpush()
@endsection
