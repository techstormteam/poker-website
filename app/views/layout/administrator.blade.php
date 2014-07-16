<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="techstorm">
        <meta name="author" content="techstorm">
        <link rel="shortcut icon" href="{{ $assets }}/images/logo.png">

        <title>Administrator</title>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="{{ $assets }}/js/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="{{ $assets }}/fonts/font-awesome-4/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ $assets }}/js/jquery.select2/select2.css">
        <link rel="stylesheet" href="{{ $assets }}/js/bootstrap.slider/css/slider.css">
        <link rel="stylesheet" href="{{ $assets }}/js/jquery.gritter/css/jquery.gritter.css">
        <link rel="stylesheet" href="{{ $assets }}/js/fuelux/css/fuelux.css">
        <link rel="stylesheet" href="{{ $assets }}/js/fuelux/css/fuelux-responsive.min.css">
        <link rel="stylesheet" href="{{ $assets }}/css/pygments.css">
        <link rel="stylesheet" href="{{ $assets }}/js/jquery.nanoscroller/nanoscroller.css">
        <link rel="stylesheet" href="{{ $assets }}/js/bootstrap.switch/bootstrap-switch.css">
        <link rel="stylesheet" href="{{ $assets }}/js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css">
        

<script src="{{ $assets }}/js/jquery.js"><!-- empty --></script>
<script src="{{ $assets }}/js/bootstrap/dist/js/bootstrap.min.js"><!-- empty --></script>
<script src="{{ $assets }}/js/jquery.ui/jquery-ui.js"><!-- empty --></script>
<script src="{{ $assets }}/js/jquery.gritter/js/jquery.gritter.js"><!-- empty --></script>
<script src="{{ $assets }}/js/behaviour/general.js"><!-- empty --></script>
<script src="{{ $assets }}/js/jquery.select2/select2.min.js"><!-- empty --></script>
<script src="{{ $assets }}/js/bootstrap.slider/js/bootstrap-slider.js"><!-- empty --></script>
<script src="{{ $assets }}/js/fuelux/loader.min.js"><!-- empty --></script>
<script src="{{ $assets }}/js/modernizr.js"><!-- empty --></script>
<script src="{{ $assets }}/js/jquery.nanoscroller/jquery.nanoscroller.js"><!-- empty --></script>
<script src="{{ $assets }}/js/bootstrap.switch/bootstrap-switch.min.js"><!-- empty --></script>
<script src="{{ $assets }}/js/jquery.nestable/jquery.nestable.js"><!-- empty --></script>
<script src="{{ $assets }}/js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js"><!-- empty --></script>
<script src="{{ $assets }}/js/behaviour/general.js"><!-- empty --></script>
<script src="{{ $assets }}/js/jquery.ui/jquery-ui.js"><!-- empty --></script>



        
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="../../assets/js/html5shiv.js"></script>
          <script src="../../assets/js/respond.min.js"></script>
        <![endif]-->
        <?php
        if (!empty($styles)) :
            foreach ($styles as $style) :
                ?>
                <link href="<?= $assets . '/' . $style; ?>" rel="stylesheet" />
                <?php
            endforeach;
        endif;
        ?>
        <link href="{{ $assets }}/css/style.css" rel="stylesheet" />
        <link href="{{ $assets }}/css/ts-style.css" rel="stylesheet" />

    </head>

    <body>

        <!-- Fixed navbar -->
        <div id="head-nav" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-gear"></span>
                    </button>
                    <a class="navbar-brand" href="#"><span>Poker Website</span></a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right user-nav">
                            <li class="dropdown profile_menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="{{ $assets }}/images/avatar2.jpg" />Hello, Admin <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Messages</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Sign Out</a></li>
                                </ul>
                            </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right not-nav">
                        <li class="button dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i>
                                <!--<span class="bubble">0</span>-->
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="nano nscroller">
                                        <div class="content">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-cloud-upload info"></i><b>Daniel</b> is now following you <span class="date">2 minutes ago.</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <ul class="foot"><li><a href="#">View all notifications </a></li></ul>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </div>

        <div id="cl-wrapper">
            <div class="cl-sidebar">
                <div class="cl-toggle"><i class="fa fa-bars"></i></div>
                <div class="cl-navblock">
                    <div class="menu-space">
                        <div class="content">
                            <div class="side-user">
                                <div class="avatar"><img src="{{ $assets }}/images/avatar1_50.jpg" alt="Avatar" /></div>
                                <div class="info">
                                    <a href="#">Hello, Administrator</a>
                                    <img src="{{ $assets }}/images/state_online.png" alt="Status" /> <span>Online</span>
                                </div>
                            </div>
                            <ul class="cl-vnavigation">
                                <li>
                                    {{ HTML::decode(HTML::linkAction('AdminController@get_index', '<i class="fa fa-home"></i><span>Dashboard</span>')) }}
                                </li>
                                <li><a href="#"><i class="fa fa-flag-checkered"></i><span>Tournament</span></a>
                                    <ul class="sub-menu">
                                        
                                        <li>{{ HTML::linkAction('AdminTournamentController@get_index', 'Add Tournament') }}</li>
                                        <li>{{ HTML::linkAction('AdminTournamentController@get_index', 'View Tournament List') }}</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="text-right collapse-button" style="padding:7px 9px;">
                        <input type="text" class="form-control search" placeholder="Search..." />
                        <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
                    </div>
                </div>
            </div>

            <div class="container-fluid" id="pcont">
                
            @yield('content')    
                
            </div>

        </div>

<script src="{{ $assets }}/js/ts.js"></script>

</body>
</html>
