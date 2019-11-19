@extends ('layouts.master') @section ('content')
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">                        
            <form class="form-horizontal" method = "post" action="/administrador/areas/agregarArea">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Crear un área nueva</strong></h3>
                </div>
                <div class="panel-body">                                        
                    <div class="form-group">
                        <label class="col-md-3 col-xs-12 control-label">Nombre del Área</label>
                        <div class="col-md-6 col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input name="nombre" type="text" class="form-control" method = "post" />
                            </div>
                        </div>
                    </div>                                       
                </div>
                <div class="panel-footer">                        
                <a href="/administrador/areas"><button type="button" class="btn btn-default"><i class="fa fa-mail-reply"></i> Volver</button></a>
                    <button class="btn btn-primary pull-right">Guardar</button>
                </div>
            </div>
        </form>
        </div>
    </div>

</div>
<!-- END PAGE CONTENT WRAPPER -->
@endsection @push('jsCreates')
<script type='text/javascript' src='{{asset("js/plugins/icheck/icheck.min.js")}}'></script>
<script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-file-input.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap-select.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/tagsinput/jquery.tagsinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/dropzone/dropzone.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/fileinput/fileinput.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/plugins/filetree/jqueryFileTree.js')}}"></script>

@endpush