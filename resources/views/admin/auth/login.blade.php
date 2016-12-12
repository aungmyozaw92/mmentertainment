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
        <title>MM Entertainment | Admin Login</title>
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
        {!! Html::style('backend/assets/global/plugins/select2/css/select2.min.css') !!} 
        {!! Html::style('backend/assets/global/plugins/select2/css/select2-bootstrap.min.css') !!} 
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        {!! Html::style('backend/assets/global/css/components.min.css') !!} 
        {!! Html::style('backend/assets/global/css/plugins.min.css') !!} 
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        {!! Html::style('backend/assets/pages/css/login-4.min.css') !!} 
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="backend/assets/pages/img/logo-big.png" alt="" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            {!! Form::open(array('url'=>'admin/signin','class'=>'login-form')) !!} 

                <h3 class="form-title">Login to your account</h3>
                @if ($errors->has('username') || $errors->has('password')) 
                <div class="alert alert-danger">
                    <button class="close" data-close="alert"></button>
                     <span>{{ $errors->first('username') }}<br>{{ $errors->first('password') }}</span>
                </div>
                @endif
                
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
                    
                    {!! Form::text('username','',array('class'=>'form-control placeholder-no-fix','autocomplete'=>'off','placeholder' => 'Please Enter UserName')) !!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                    <i class="fa fa-lock"></i>
                    {!! Form::password('password',array('class'=>'form-control placeholder-no-fix','autocomplete'=>'off', 'placeholder' => 'Please Enter your Password')) !!}
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green pull-right"> Login </button>
                </div>
                
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p> no worries, click
                        <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>
                </div>
               
            {!!Form::close()!!}
            <!-- END LOGIN FORM -->
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="index.html" method="post">
                <h3>Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-envelope"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn red btn-outline">Back </button>
                    <button type="submit" class="btn green pull-right"> Submit </button>
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
         
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN COPYRIGHT -->
        <div class="copyright"> {!! date('Y') !!} &copy; MM Entertainment - Admin Dashboard Template. </div>
        <!-- END COPYRIGHT -->
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
         {!!Html::script('backend/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')!!}
         {!!Html::script('backend/assets/global/plugins/jquery-validation/js/additional-methods.min.js')!!}
         {!!Html::script('backend/assets/global/plugins/select2/js/select2.full.min.js')!!}
         {!!Html::script('backend/assets/global/plugins/backstretch/jquery.backstretch.min.js')!!}
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
         {!!Html::script('backend/assets/global/scripts/app.min.js')!!}
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
         {!!Html::script('backend/assets/pages/scripts/login-4.min.js')!!}
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
        jQuery(document).ready(function() {     
        Login.init(); // init metronic core components
        // init background slide images
                   $.backstretch([
                    "backend/bg/1.jpg",
                    "backend/bg/2.jpg",
                    "backend/bg/3.jpg",
                    "backend/bg/4.jpg"
                    ], {
                      fade: 1000,
                      duration: 8000
                }
                );
        });

</script>
    </body>

</html>