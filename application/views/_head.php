<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8"/>

    <?php if (isset($title)) {
        echo "<title>". $title ."</title>";
        echo "<meta name=\"description\" content=\" . $description . \"/>";
    }else {
        echo "<title>Autosurf | This autosurf can help you to increase your rankings.</title>";
    }
    ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Autosurf, get free geo-targeted visitors to your video, website or blog. This autosurf can help you to increase your rankings. Helpful SEO tool." name="description"/>
    <meta content="BaykusGrup" name="author"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico"/>

    <?php if (!isset($_COOKIE['dil'])) {
        $_COOKIE['dil'] = "en";
    }
    ?>
    <script language="javascript" type="text/javascript">
        <?php
        if ($_SERVER['SERVER_NAME'] === '127.0.0.1') {
            echo 'var base_url = "http://127.0.0.1/picfy";';
        } else {
            echo 'var base_url = "http://sss.com";';
        }
        ?>
    </script>


    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"
          rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->


    <?php
    if (class_exists('Login')) {
    ?>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2.min.css?vlogin" rel="stylesheet"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/plugins/select2/css/select2-bootstrap.min.css?vlogin"
          rel="stylesheet"
          type="text/css"/>
    <!-- END PAGE LEVEL PLUGINS --><!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url(); ?>assets/global/css/components-md.min.css?vlogin" rel="stylesheet"
          id="style_components"
          type="text/css"/>
    <link href="<?php echo base_url(); ?>assets/global/css/plugins-md.min.css?vlogin" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES --><!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url(); ?>assets/pages/css/login-5.min.css?vlogin" rel="stylesheet" type="text/css"/>
    <!-- END PAGE LEVEL STYLES -->


        <?php
    } else {
    ?>

        <?php
    }
    ?>
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url() ?>assets/global/css/components-md.min.css" rel="stylesheet" id="style_components"
          type="text/css"/>
    <link href="<?php echo base_url() ?>assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url() ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>assets/layouts/layout/css/themes/light2.min.css" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="<?php echo base_url() ?>assets/layouts/layout/css/custom.min.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->
<?php
if (class_exists('Login')) {
    echo "<body class=\"login\" style=\" background-color: #fff;\">";
} else {
    echo "<body class=\"page-header-fixed page-sidebar-opened page-content-white page-sidebar-fixed  page-boxed page-md\">";
}
?>

<?php
if (!class_exists('Login')) {
?>

<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="<?php echo base_url() ?>">
                    <img src="<?php echo base_url() ?>assets/layouts/layout/img/logo.png" alt="logo"
                         class="logo-default"/> </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse"
               data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    <!-- BEGIN LANGUAGE BAR -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-language"><a href="javascript:;" class="dropdown-toggle"
                                                              data-toggle="dropdown" data-hover="dropdown"
                                                              data-close-others="true"> <img alt=""
                                                                                             src="<?php echo base_url() ?>assets/global/img/flags/<?php echo $_COOKIE['dil']; ?>.png">
                            &nbsp;
                            <span class="langname"><?php echo $_COOKIE['dil']; ?></span> <i
                                    class="fa fa-angle-down"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li><a href="<?php echo base_url(); ?>Login/dilDegistir/en"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/en.png">
                                    English
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>Login/dilDegistir/tr"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/tr.png">
                                    Turkish
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>Login/dilDegistir/fa"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/fa.png">
                                    Persian
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>Login/dilDegistir/de"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/de.png">
                                    German
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>Login/dilDegistir/ru"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/ru.png">
                                    Russian
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>Login/dilDegistir/it"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/it.png">
                                    Italian
                                </a></li>
                        </ul>
                    </li>
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> 7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="page_user_profile_1.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> 4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">7 New</span> Messages</h3>
                                <a href="app_inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?php echo base_url() ?>assets/layouts/layout3/img/avatar2.jpg"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?php echo base_url() ?>assets/layouts/layout3/img/avatar3.jpg"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?php echo base_url() ?>assets/layouts/layout3/img/avatar1.jpg"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                            <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?php echo base_url() ?>assets/layouts/layout3/img/avatar2.jpg"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="<?php echo base_url() ?>assets/layouts/layout3/img/avatar3.jpg"
                                                             class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default"> 3 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">12 pending</span> tasks</h3>
                                <a href="app_todo.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;"
                                    data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New release v1.2 </span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 40%;"
                                                              class="progress-bar progress-bar-success"
                                                              aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Application deployment</span>
                                                        <span class="percent">65%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 65%;"
                                                              class="progress-bar progress-bar-danger"
                                                              aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">65% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile app release</span>
                                                        <span class="percent">98%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 98%;"
                                                              class="progress-bar progress-bar-success"
                                                              aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">98% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">10%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 10%;"
                                                              class="progress-bar progress-bar-warning"
                                                              aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">10% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Web server upgrade</span>
                                                        <span class="percent">58%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 58%;" class="progress-bar progress-bar-info"
                                                              aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">58% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">85%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 85%;"
                                                              class="progress-bar progress-bar-success"
                                                              aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">85% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New UI release</span>
                                                        <span class="percent">38%</span>
                                                    </span>
                                            <span class="progress progress-striped">
                                                        <span style="width: 38%;"
                                                              class="progress-bar progress-bar-important"
                                                              aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">38% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                           data-close-others="true">
                            <img alt="" class="img-circle"
                                 src="<?php echo base_url() ?>assets/layouts/layout/img/avatar3_small.jpg"/>
                            <span class="username username-hide-on-mobile"> Nick </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo base_url() ?>Account">
                                    <i class="icon-user"></i> My Account </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="<?php echo base_url() ?>VerifyLogin/sessionDestroy">
                                    <i class="icon-key"></i> Log Out </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="javascript:;" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"></div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <div class="container">
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true"
                        data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>
                        <!-- END SIDEBAR TOGGLER BUTTON -->

                        <li class="nav-item start ">
                            <a href="<?php echo base_url() ?>Account" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">My Account</span>
                            </a>
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">About Site</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Earn" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">Earn Credits</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Sites" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">My Sites</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Blocked" class="nav-link nav-toggle">
                                <i class="icon-wallet"></i>
                                <span class="title">Blocked Sites</span>
                            </a>
                        </li>

                        <li class="heading">
                            <h3 class="uppercase">Other Thinks</h3>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Buy" class="nav-link nav-toggle">
                                <i class="icon-bulb"></i>
                                <span class="title">Buy Credits</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Refferal" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Refferal</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Statistics" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Statistics</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="<?php echo base_url() ?>Help" class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Help</span>
                            </a>
                        </li>
                        <li class="nav-item  ">
                            <a href="mailto:info@autohit.com?subject=#sss Comments&body=Hi!"
                               class="nav-link nav-toggle">
                                <i class="icon-pointer"></i>
                                <span class="title">Contact us</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->

                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-9">

                                <?php
                                }
                                ?>
