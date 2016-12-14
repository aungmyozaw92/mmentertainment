<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Metronic | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        {!! Html::style('backend/assets/global/plugins/font-awesome/css/font-awesome.min.css') !!} 
        {!! Html::style('backend/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!} 
        {!! Html::style('backend/assets/global/plugins/bootstrap/css/bootstrap.min.css') !!} 
        {!! Html::style('backend/assets/global/plugins/uniform/css/uniform.default.css') !!} 
        {!! Html::style('backend/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!} 
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style('backend/assets/global/plugins/datatables/datatables.min.css') !!} 
        {!! Html::style('backend/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css') !!} 
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!! Html::style('backend/assets/global/plugins/morris/morris.css') !!} 
        {!! Html::style('backend/assets/global/plugins/fullcalendar/fullcalendar.min.css') !!} 
        {!! Html::style('backend/assets/global/plugins/jqvmap/jqvmap/jqvmap.css') !!} 
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style('backend/assets/global/css/components.min.css') !!} 
        {!! Html::style('backend/assets/global/css/plugins.min.css') !!} 
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        {!! Html::style('backend/assets/layouts/layout/css/layout.min.css') !!} 
        {!! Html::style('backend/assets/layouts/layout/css/themes/default.min.css') !!} 
        {!! Html::style('backend/assets/layouts/layout/css/custom.min.css') !!} 
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="{{URL::asset('backend/assets/layouts/layout/img/logo.png')}}" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
    
         @include('admin.layouts.navigation')
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
               @include('admin.layouts.sidebar')
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
               
                     @yield('content')
                    <div class="clearfix"></div>
                   
                   
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> 2014 &copy; MM Entertainment
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="backend/assets/global/plugins/respond.min.js"></script>
<script src="backend/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        {!!Html::script('backend/assets/global/plugins/jquery.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/bootstrap/js/bootstrap.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/js.cookie.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/jquery.blockui.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/uniform/jquery.uniform.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')!!}
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        {!!Html::script('backend/assets/global/plugins/moment.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/morris/morris.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/morris/raphael-min.js')!!}
        {!!Html::script('backend/assets/global/plugins/counterup/jquery.waypoints.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/counterup/jquery.counterup.min.js')!!}

        {!!Html::script('backend/assets/global/scripts/datatable.js')!!}
        {!!Html::script('backend/assets/global/plugins/datatables/datatables.min.js')!!}
        {!!Html::script('backend/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')!!}

        {!!Html::script('backend/assets/global/plugins/bootbox/bootbox.min.js')!!}

        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        {!!Html::script('backend/assets/global/scripts/app.min.js')!!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        {!!Html::script('backend/assets/pages/scripts/dashboard.min.js')!!}
        {!!Html::script('backend/assets/pages/scripts/table-datatables-managed.min.js')!!}
        {!!Html::script('backend/assets/pages/scripts/form-samples.min.js')!!}
        {!!Html::script('backend/assets/pages/scripts/ui-bootbox.min.js')!!}
          
        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        {!!Html::script('backend/assets/layouts/layout/scripts/layout.min.js')!!}
        {!!Html::script('backend/assets/layouts/layout/scripts/demo.min.js')!!}
        {!!Html::script('backend/assets/layouts/global/scripts/quick-sidebar.min.js')!!}
        <!-- END THEME LAYOUT SCRIPTS -->

        <script>
    $(document).ready(function() {
       
        $('#back').click(function(){
            window.history.back();
        });

      $('.delete').click(function(){
        var currentForm = $(this).closest("form");
        bootbox.confirm({
            title: 'Confirmation',
            message: $('#delete_text').html(),
            buttons: {
                'cancel': {
                    label: 'No',
                    className: 'btn green-meadow col-md-4 pull-left'
                },
                'confirm': {
                    label: 'Yes',
                    className: 'btn red col-md-4 pull-right'
                }
            },
            callback: function(result) {
                if (result) {
                    currentForm.submit();
                }
            }
        });
       });

    

    });
</script>
    </body>

</html>