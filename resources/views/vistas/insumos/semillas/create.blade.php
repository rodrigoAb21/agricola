@extends('layouts.index')

@section('contenido')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="pb-2">
                    Nueva Semilla
                </h3>

                <form method="POST" action="{{url('insumos/semillas')}}" autocomplete="off">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input required type="text" class="form-control" value="{{old('nombre')}}" name="nombre">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Precio</label>
                                <input
                                        type="number"
                                        step="0.01"
                                        class="form-control"
                                        value="{{old('precio')}}"
                                        name="precio">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Tipo</label>
                                <select class="form-control" name="subtipo_id">
                                    @foreach($tipos as $tipo)
                                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Unidad de Medida</label>
                                <select class="form-control" name="unidad_medida_id">
                                    @foreach($unidades as $unidad)
                                    <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label>Info</label>
                                <textarea class="form-control" name="info" rows="3"></textarea>
                            </div>
                        </div>
                        
                    </div>

                    
                    <a href="{{url('insumos/semillas')}}" class="btn btn-warning">Atras</a>
                    <button type="submit" class="btn btn-info">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection