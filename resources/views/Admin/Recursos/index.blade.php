@extends ('layouts.master')

@section ('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                 
                
                <div class="row">
                    <div class="col-md-12">

                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">RECURSOS</h3>
                                <a href="/administrador/areas/temas{{$IdTema2}}/recursos/create"><button class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Nuevo recurso</button></a>                             
                            </div>
                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nombre</th>                                            
                                            <th>Recursos</th>                                            
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    
                                        @foreach($recursos as $item)
                                        <tr>
                                            <td class="tdShort">{{$item->IdRecurso}}</td>
                                            <td>{{$item->Nombre}}</td>   
                                            <td>                                                
                                                <a href="#">
                                                <button class="btn btn-success"><i class="fa fa-laptop"></i></button></a>                                                            
                                            </td>                                         
                                            <td>
                                                <ul>
                                                    <a href="/administrador/areas/temas/recursos{{$item->IdRecurso}}/editar">
                                                    <button class="btn btn-info"><i class="fa fa-edit"></i></button></a>

                                                   
                                                            <a href="" data-target="#message-box-danger-{{$item->IdRecurso}}" data-toggle="modal">
                                                            <button class="btn btn-danger" >
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                </ul>
                                            </td>
                                            @include('Admin.Cursos.delete')
                                        </tr>
                                        @endforeach
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END DEFAULT DATATABLE -->

                        

                    </div>
                </div>                                
                
            </div>
            <!-- PAGE CONTENT WRAPPER -->   
@endsection

@push('infoIndexes')
<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='{{asset("js/plugins/icheck/icheck.min.js")}}'></script>
<script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/datatables/jquery.dataTables.min.js')}}"></script>    

        <!-- END PAGE PLUGINS -->
@endpush