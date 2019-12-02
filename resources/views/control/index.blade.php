@extends('layouts.app')

@section('title', '| Personas registradas')

@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <div class="panel-title pull-left">
                                             <h3 class="m-0 text-primary">Lista de personas</h3>
                                         </div>
                                        <div class="panel-title pull-right">
                                            <a href="{{ route('personas.create')}}" type="button" class="btn mb-1 btn-flat btn-outline-success">
                                                Nuevo Persona</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>

                                    <table id="info-table" class="table table-responsive table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><div class="pull-center" >Entrenador</div></th>
                                                <th><div class="pull-center" >Cliente</div></th>
                                                <th><div class="pull-center" >Altura</div></th>
                                                <th><div class="pull-center" >Peso</div></th>
                                                <th><div class="pull-center" >Porc.Grasa</div></th>
                                                <th><div class="pull-center" >Grasa Viceral</div></th>
                                                <th><div class="pull-center" >Cintura</div></th>
                                                <th><div class="pull-center" >Pecho</div></th>
                                                <th><div class="pull-center" >cadera</div></th>
                                                <th><div class="pull-center" >Brazo</div></th>
                                                <th><div class="pull-center" >IMC</div></th>
                                                <th><div class="pull-center" >Tipo Regsitro</div></th>
                                                <th><div class="pull-center" >Nota</div></th>
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
          ajax: "{{route('all.controles')}}",
          columns:[
            {data:'id'},
            {data:'usario_id'},
            {data:'persona_id'},
            {data:'c_altura'},
            {data:'c_peso'},
            {data:'c_procentaje_grasa'},
            {data:'c_grasa_viceral'},
            {data:'c_cintura'},
            {data:'c_pecho'},
            {data:'c_cadera'},
            {data:'c_brazo'},
            {data:'c_imc'},
            {data:'c_tipo'},
            {data:'c_nota'},
            {data:'created_at'},
            {"render": function (data, type, row) {
             return ' <a href="{{url("personas")}}/'+row.id+'" type="button" id="ButtonVer" class="ver btn btn-info botonEditar btn-md">'+
             '<span class="fa fa-eye"></span><span class="hidden-xs"> Ver</span></a>'+
             '<a type="button"  href="{{url("personas")}}/'+row.id+'/edit" class="editar btn btn-warning botonEditar btn-md">'+
             '<span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></a>'+
             '<button type="button" id="ButtonDelete" onclick="deletedForm('+row.id+')" class="eliminar btn btn-danger botonEliminar btn-md">'+
             '<span class="fa fa-trash"></span><span class="hidden-xs"> Eliminar</span></button> ';
           }},

          ]

        });$('select, input[type="search"]').css({
                    "background-color": "#f3f3f3",
                    "font-weight": "bold"
                });


            </script>
@endsection
