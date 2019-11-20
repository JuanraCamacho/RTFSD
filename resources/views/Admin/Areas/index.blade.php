@extends ('layouts.master')

@section ('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">                 
                
                <div class="row">
                    <div class="col-md-12">

                        <!-- START DEFAULT DATATABLE -->
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">ÁREAS</h3>
                                <a href="/administrador/areas/create"><button class="btn btn-primary pull-right"><i class="fa fa-plus-circle"></i> Nueva área</button></a>                             
                            </div>
                            <div class="panel-body">
                                <table class="table datatable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Área</th>                                            
                                            <th>Temas</th>                                            
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>                                                                                                                    
                                        @foreach($areas as $item)
                                        <tr>
                                        <td>{{$item->IdArea}}</td>
                                        <td>{{$item->Nombre}}</td>    
                                                <td>
                                                    {{-- <ul> --}}
                                                    <a href="/administrador/areas-{{$item->IdArea}}/temas">
                                                                <button class="btn btn-success"><i class="fa fa-tasks"></i></button></a>
                                                                
                                                                {{-- </ul> --}}
                                                    </td>                                        
                                                <td>
                                                <ul>
                                                <a href="/administrador/areas/edit-{{$item->IdArea}}">
                                                            <button class="btn btn-info"><i class="fa fa-edit"></i></button></a>
                                                            
                                                            <a href="" data-target="#message-box-danger-{{$item->IdArea}}" data-toggle="modal">
                                                            <button class="btn btn-danger" >
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>
                                                            </ul>
                                                </td>
                                                @include('Admin.Areas.delete')
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