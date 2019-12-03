@extends('layouts.app')
@section('title')
  Dash --Sistema ALQUIMIA
@endsection

@section('content')
<div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-primary alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                </button> <strong>{{ session('status') }}!</strong> You are logged in!.</div>
                    @endif
                    <div class="alert alert-success alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button> <strong>Bienvenid@!</strong> has ingresado sastifactoriamente!</div>
                            <table id="info-table" class="table table-responsive table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
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
  "order": [ [0, 'desc'],
                     ],
          ajax: "{{route('control.historico')}}",
          columns:[
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
