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
        echo "<title>" . $title . "</title>";
        echo "<meta name=\"description\" content=\" . $description . \"/>";
    } else {
        echo "<title>Autosurf | This autosurf can help you to increase your rankings.</title>";
    }
    ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Autosurf, get free geo-targeted visitors to your video, website or blog. This autosurf can help you to increase your rankings. Helpful SEO tool."
          name="description"/>
    <meta content="BaykusGrup" name="author"/>
    <link rel="shortcut icon" href="<?php echo base_url() ?>favicon.ico"/>

    <?php if (!isset($_COOKIE['dil'])) {
        $_COOKIE['dil'] = "en";
    }
    ?>
    <script language="javascript" type="text/javascript">
        <?php
        if ($_SERVER['SERVER_NAME'] === '127.0.0.1') {
            echo 'var base_url = "http://127.0.0.1/autohit";';
        } else {
            echo 'var base_url = "http://nearlyweb.com";';
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
        <!-- END PAGE LEVEL PLUGINS -->
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
    <?php
    if (class_exists('Login')) {
        ?>
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url(); ?>assets/pages/css/login-5.min.css?vlogin" rel="stylesheet" type="text/css"/>
        <!-- END PAGE LEVEL STYLES -->
        <?php
    } else {
        ?>

        <?php
    }
    ?>
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?php echo base_url() ?>assets/layouts/layout/css/layout.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url() ?>assets/layouts/layout/css/themes/light2.min.css" rel="stylesheet"
          type="text/css" id="style_color"/>
    <link href="<?php echo base_url() ?>assets/layouts/layout/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->
<body class="page-header-fixed page-sidebar-opened page-content-white page-sidebar-fixed  page-boxed page-md">

<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">

                <a style="text-decoration: none;" href="<?php echo base_url() ?>"><h1 class="logoa"><span>Nearly</span>Web
                    </h1></a>
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
                            <li><a href="<?php echo base_url(); ?>index.php/Login/dilDegistir/en"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/en.png">
                                    English
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/dilDegistir/tr"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/tr.png">
                                    Turkish
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/dilDegistir/fa"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/fa.png">
                                    Persian
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/dilDegistir/de"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/de.png">
                                    German
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/dilDegistir/ru"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/ru.png">
                                    Russian
                                </a></li>
                            <li><a href="<?php echo base_url(); ?>index.php/Login/dilDegistir/it"> <img alt=""
                                                                                                        src="<?php echo base_url() ?>assets/global/img/flags/it.png">
                                    Italian
                                </a></li>
                        </ul>
                    </li>

                    <?php
                    if (class_exists('Register') || class_exists('Home') || class_exists('Login')) {
                        ?>
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">

                            <span class="username username-hide-on-mobile"> <i class="icon-user"></i> <span
                                        class="username username-hide-on-mobile"> USER AREA</span> <i
                                        class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/Login">
                                        <i class="icon-home"></i> <?php echo lang("Login"); ?> </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/Register">
                                        <i class="icon-key"></i> <?php echo lang("welcome"); ?> </a>
                                </li>
                                <li class="divider"></li>
                            </ul>
                        </li>
                        <?php
                    } else {
                        ?>


                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                               data-close-others="true">

                            <span class="username username-hide-on-mobile"> <i class="icon-user"></i> <span
                                        class="username username-hide-on-mobile"> USER </span> <i
                                        class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/Account">
                                        <i class="icon-home"></i> <?php echo lang("MyAccount"); ?> </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="<?php echo base_url() ?>index.php/VerifyLogin/sessionDestroy">
                                        <i class="icon-key"></i> <?php echo lang("Logout"); ?> </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->


                        <?php
                    }
                    ?>
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

            <?php
            if (class_exists('Register') || class_exists('Home') || class_exists('Login')) {
                ?>
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
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false"
                            data-auto-scroll="true"
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
                                <a href="<?php echo base_url() ?>index.php/Home" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title"><?php echo lang("HomePage"); ?></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase"><?php echo lang("WelcomeSite"); ?></h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Login" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title"><?php echo lang("Login"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Register" class="nav-link nav-toggle">
                                    <i class="icon-user"></i>
                                    <span class="title"><?php echo lang("Register"); ?></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase"><?php echo lang("OtherThinks"); ?></h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Buy" class="nav-link nav-toggle">
                                    <i class="icon-wallet"></i>
                                    <span class="title"><?php echo lang("BuyCredits"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Statistics" class="nav-link nav-toggle">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title"><?php echo lang("Statistics"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Help" class="nav-link nav-toggle">
                                    <i class="icon-directions"></i>
                                    <span class="title"><?php echo lang("Help"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="mailto:info@nearlyweb.com?subject=#NearlyWeb Comments&body=Hi!"
                                   class="nav-link nav-toggle">
                                    <i class="icon-envelope-letter"></i>
                                    <span class="title"><?php echo lang("ContactUs"); ?></span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <?php
            } else {
                ?>

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
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false"
                            data-auto-scroll="true"
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
                                <a href="<?php echo base_url() ?>index.php/Account" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title"><?php echo lang("MyAccount"); ?></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase"><?php echo lang("AboutSite"); ?></h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Earn" class="nav-link nav-toggle">
                                    <i class="icon-settings"></i>
                                    <span class="title"><?php echo lang("EarnCredits"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Sites" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title"><?php echo lang("MySites"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Blocked" class="nav-link nav-toggle">
                                    <i class="icon-dislike"></i>
                                    <span class="title"><?php echo lang("BlockedSites"); ?></span>
                                </a>
                            </li>

                            <li class="heading">
                                <h3 class="uppercase"><?php echo lang("OtherThinks"); ?></h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Buy" class="nav-link nav-toggle">
                                    <i class="icon-wallet"></i>
                                    <span class="title"><?php echo lang("BuyCredits"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Refferal" class="nav-link nav-toggle">
                                    <i class="icon-users"></i>
                                    <span class="title"><?php echo lang("Refferal"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Statistics" class="nav-link nav-toggle">
                                    <i class="icon-bar-chart"></i>
                                    <span class="title"><?php echo lang("Statistics"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?php echo base_url() ?>index.php/Help" class="nav-link nav-toggle">
                                    <i class="icon-directions"></i>
                                    <span class="title"><?php echo lang("Help"); ?></span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="mailto:info@autohit.com?subject=#sss Comments&body=Hi!"
                                   class="nav-link nav-toggle">
                                    <i class="icon-envelope-letter"></i>
                                    <span class="title"><?php echo lang("ContactUs"); ?> </span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <?php
            }
            ?>
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
