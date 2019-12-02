@extends('layouts.app')

@section('title', '| Categorias registradas')

@section('content')

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                         <div class="panel-title pull-left">
                                             <h3 class="m-0 text-primary">Lista de Categorias</h3>
                                         </div>
                                        <div class="panel-title pull-right">
                                            <a href="{{ route('categorias.create')}}" type="button" class="btn mb-1 btn-flat btn-outline-success">
                                                Nuevo Categoria</a></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                    <table id="info-table" class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><div class="pull-center" >Producto</div></th>
                                                <th><div class="pull-center" >Cantidad</div></th>
                                                <th><div class="pull-center" >Precio</div></th>
                                                <th><div class="pull-center" >Estado</div></th>
                                                <th><div class="pull-center" >Fecha de Entrega</div></th>
                                                <th>Entregado</th>
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
          ajax: "{{route('all.categorias')}}",
          columns:[
            {data:'id'},
            {data:'producto'},
            {data:'cantidad'},
            {data:'precio'},
            {"render": function (data, type, row) {
                if(row.estado == 1){ ////1 indica q es admin
                return '<span class="label label-pill label-success">Aprobado</span>';
                }else if(row.estado ==3){
                 return '<span class="label label-pill label-warning">Pendiente</span>';

                }else if(row.estado ==2){
                    return '<span class="label label-pill label-danger">Rechazado</span>';
                }

           }},
            {data:'fechaaentrega'},
            {data:'fechaentrega'},

          ]

        });$('select, input[type="search"]').css({
                    "background-color": "#f3f3f3",
                    "font-weight": "bold"
                });



            </script>
@endsection
