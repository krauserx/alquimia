@extends('layouts.app')

@section('title', '| Personas registradas')

@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            @if(Session::has('flash_message'))
                            {{Session::get('flash_message')}}
                            @endif
                                    <table id="info-table" class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><div class="pull-center" >Nombre</div></th>
                                                <th><div class="pull-center" >Tipo Cleinte</div></th>
                                                <th><div class="pull-center" >Sexo</div></th>
                                                <th><div class="pull-center" >Fecha Nacimiento</div></th>
                                                <th><div class="pull-center" >Creado</div></th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>

                    </div>
                </div>
            </div>
        </div>
@endsection
@section('js_bajo_body')
<script>

        var table1 = $('#info-table').DataTable({
          processing:true,
          serverSide:true,
          responsive: true,
          ajax: "{{route('all.persona')}}",
          columns:[
            {data:'id'},
            {data:'nombre'},
            {data:'tipoCliente'},
            {data:'sexo'},
            {data:'fechaNacimiente'},
            {data:'creado'},
            {"render": function (data, type, row) {
             return ' <a href="{{url("personas")}}/'+row.id+'" type="button" id="ButtonVer" class="ver btn btn-info botonEditar btn-md">'+
             '<span class="fa fa-eye"></span><span class="hidden-xs"> Ver</span></a>'+
             '<a type="button"  href="{{url("personas")}}/'+row.id+'/edit" class="editar btn btn-warning botonEditar btn-md">'+
             '<span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></a>'+
             '<button type="button" id="ButtonDelete" class="eliminar btn btn-danger botonEliminar btn-md">'+
             '<span class="fa fa-trash"></span><span class="hidden-xs"> Eliminar</span></button> ';
           }},

          ]

        });$('select, input[type="search"]').css({
                    "background-color": "#f3f3f3",
                    "font-weight": "bold"
                });
            </script>
@endsection
