
<!DOCTYPE html>
<html lang="es">
    <head>        
        <!-- META SECTION -->
        <title>Road To Full Stack Developer</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{asset('css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Admnistrador</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{asset('assets/images/users/no-image.jpg')}}" alt="John Doe"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{asset('assets/images/users/no-image.jpg')}}" alt="John Doe"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">CID FARES</div>
                                <div class="profile-data-title">Empresa de Desarrollo de Software</div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                                  
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Información General</span></a>
                        <ul>
                            <li><a href="#"><span class="fa fa-image"></span> Información del sitio</a></li>
                        </ul>
                    </li>
                    <li><a href="/administrador/areas"><span class="fa fa-image"></span> Áreas</a></li>                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Cursos</span></a>
                        <ul>
                            <li><a href="/administrador/cursos"><span class="fa fa-image"></span>cursos</a></li>
                            <li><a href="#"><span class="fa fa-image"></span>Recursos</a></li>
                        </ul>
                    </li>
                  
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    <!-- SEARCH -->
                    
                    <!-- END SEARCH -->
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">¡Ha iniciado sesión!</a></li>                    
                </ul>
                <!-- END BREADCRUMB -->    
                
                <!-- CONTENT -->                   
                @yield('content')
                <!-- END CONTENT -->
                
                                          
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> ¿Desea <strong>Desconectarse</strong> ?</div>
                    <div class="mb-content">
                        
                        <p>Usted puede volver a iniciar sesión siempre que ingrese sus datos.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                        <a href="" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-success btn-lg">Si</a>
                                                     <form id="logout-form" action="" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->                  
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/jquery/jquery-ui.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/bootstrap/bootstrap.min.js')}}"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{asset('js/plugins/icheck/icheck.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/scrolltotop/scrolltopcontrol.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/plugins/morris/raphael-min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/morris/morris.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/rickshaw/d3.v3.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/rickshaw/rickshaw.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/bootstrap/bootstrap-datepicker.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/owl/owl.carousel.min.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/plugins/moment.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- END THIS PAGE PLUGINS-->        
        
        <!-- START TEMPLATE -->
        @stack('createTrasladosScript')
        @stack('infoEmpresa')
        @stack('createAventuraScript')
        @stack('insertar')
        <script type="text/javascript" src="{{asset('js/plugins.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/actions.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/demo_dashboard.js')}}"></script>

        <!-- Editor plugins -->
        <script type='text/javascript' src='{{asset("js/plugins/icheck/icheck.min.js")}}'></script>
        <script type="text/javascript" src="{{asset('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
        
        <script type="text/javascript" src="{{asset('js/plugins/codemirror/codemirror.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/codemirror/mode/xml/xml.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/codemirror/mode/javascript/javascript.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/codemirror/mode/css/css.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/codemirror/mode/clike/clike.js')}}"></script>
        <script type='text/javascript' src="{{asset('js/plugins/codemirror/mode/php/php.js')}}"></script>

        <script type="text/javascript" src="{{asset('js/plugins/summernote/summernote.js')}}"></script>
        @stack('infoIndexes')
        @stack('jsCreates')

        <!-- End editor plugins -->

         

        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






