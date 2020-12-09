<?php
session_start();
if ($_SESSION["password"] <> 1) {
  echo '<script type="text/javascript">window.location = "index.php"</script>';
}
//Decide LANGUAGE
if (isset($_POST["EN"])) {
  $_SESSION["language"] = "EN";
} else if (isset($_POST["ES"])) {
  $_SESSION["language"] = "ES";
}
?>
<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
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
  <title><?php if ($_SESSION["language"] == "EN") echo "QualityLife - Home";
          elseif ($_SESSION["language"] == "ES") echo "QualityLife - Home"; ?></title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Preview page of Metronic Admin Theme #3 for " name="description" />
  <meta content="" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
  <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME LAYOUT STYLES -->
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-container-fluid-bg-solid page-header-menu-fixed">
  <div class="page-wrapper">
    <div class="page-wrapper-row">
      <div class="page-wrapper-top">
        <!-- BEGIN HEADER -->
        <div class="page-header">
          <!-- BEGIN HEADER TOP -->
          <div class="page-header-top">
            <div class="container-fluid">
              <!-- BEGIN LOGO -->
              <div class="page-logo">
                <a href="main.php"><img src="../images/QualityLife_logo.png" alt="logo-hec" width=200px><a>
              </div>
              <!-- END LOGO -->
              <!-- BEGIN RESPONSIVE MENU TOGGLER -->
              <a href="javascript:;" class="menu-toggler"></a>
              <!-- END RESPONSIVE MENU TOGGLER -->
              <!-- BEGIN TOP NAVIGATION MENU -->
              <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                  <!-- BEGIN NOTIFICATION DROPDOWN -->
                  <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                  <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->

                  <!-- END NOTIFICATION DROPDOWN -->
                  <!-- BEGIN TODO DROPDOWN -->

                  <!-- END TODO DROPDOWN -->

                  <!-- BEGIN INBOX DROPDOWN -->

                  <!-- END INBOX DROPDOWN -->
                  <!-- BEGIN LANGUAGE DROPDOWN -->
                  <li class="dropdown dropdown-user" id="header_language_select">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                      <i class="fa fa-language"></i>
                      <span class="username username-hide-mobile">
                        <?php echo $_SESSION["language"]; ?>
                      </span>
                    </a>
                    <ul class="dropdown-menu">
                      <li style="margin:15px;">
                        <form method="POST" id="EN">
                          <input type="hidden" name="EN" />
                          <a href="javascript:{}" onclick="document.getElementById('EN').submit(); return false;"><i class="fa fa-language"></i> English</a>
                        </form>
                      </li>
                      <li style="margin:15px;">
                        <form method="POST" id="ES">
                          <input type="hidden" name="ES" />
                          <a href="javascript:{}" onclick="document.getElementById('FR').submit(); return false;"><i class="fa fa-language"></i> Español</a>
                        </form>
                      </li>
                    </ul>
                  </li>
                  <!-- END LANGUAGE DROPDOWN -->
                  <li class="droddown dropdown-separator">
                    <span class="separator"></span>
                  </li>
                  <!-- BEGIN USER LOGIN DROPDOWN -->
                  <!-- END USER LOGIN DROPDOWN -->
                  <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                  <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
              </div>
              <!-- END TOP NAVIGATION MENU -->
            </div>
          </div>
          <!-- END HEADER TOP -->
          <!-- BEGIN HEADER MENU -->
          <div class="page-header-menu">
            <div class="container-fluid">
              <!-- BEGIN MEGA MENU -->
              <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
              <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
              <div class="hor-menu">
                <ul class="nav navbar-nav">
                  <li class="active">
                    <a href="main.php"><i class="fa fa-home"></i></a>
                  </li>
                  <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                    <a href="javascript:;">
                      <?php if ($_SESSION["language"] == "EN") echo "Form";
                      elseif ($_SESSION["language"] == "ES") echo "Formulario";
                      ?><span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                      <li aria-haspopup="true" class=" ">
                        <a href="form.php" class="nav-link"><?php if ($_SESSION["language"] == "EN") echo "Form";
                                                            elseif ($_SESSION["language"] == "ES") echo "Formulario"; ?>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown" <?php if ($_SESSION["username"] != "admin") echo "style='display:none;'"; ?>>
                    <a href="javascript:;">
                      <?php if ($_SESSION["language"] == "EN") echo "Students";
                      elseif ($_SESSION["language"] == "ES") echo "Estudiantes"; ?><span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                      <li aria-haspopup="true" class=" ">
                        <a href="students_list.php" class="nav-link ">
                          <?php if ($_SESSION["language"] == "EN") echo "List of students";
                          elseif ($_SESSION["language"] == "ES") echo "Lista de estudiantes"; ?>
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- END MEGA MENU -->
            </div>
          </div>
          <!-- END HEADER MENU -->
        </div>
        <!-- END HEADER -->
      </div>
    </div>
    <div class="page-wrapper-row full-height">
      <div class="page-wrapper-middle">
        <!-- BEGIN CONTAINER -->
        <div class="page-container-fluid">
          <!-- BEGIN CONTENT -->
          <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
              <div class="container-fluid">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                  <h1>Home</h1>
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->

                <!-- END PAGE TOOLBAR -->
              </div>
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE CONTENT BODY -->
            <div class="page-content">
              <div class="container-fluid">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <!-- END PAGE BREADCRUMBS -->
                <!-- BEGIN PAGE CONTENT INNER -->
                <div class="page-content-inner">
                  <div class="portlet light tasks-widget">
                    <div class="portlet-title">
                      <div class="caption">
                        <span class="caption-subject font-green-haze bold uppercase">
                          <?php if ($_SESSION["language"] == "EN") echo "Form";
                          elseif ($_SESSION["language"] == "ES") echo "Formulario"; ?></span>
                      </div>
                    </div>
                    <div class="portlet-body">
                      <div class="clearfix">
                        <a href="form.php" class="btn btn-circle green btn-lg">
                          <?php if ($_SESSION["language"] == "EN") echo "Form";
                          elseif ($_SESSION["language"] == "ES") echo "Formulario"; ?>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="portlet light tasks-widget" <?php if ($_SESSION["username"] != "admin") echo "style='display:none;'"; ?>>
                    <div class="portlet-title">
                      <div class="caption">
                        <span class="caption-subject font-green-haze bold uppercase">
                          <?php if ($_SESSION["language"] == "EN") echo "Students";
                          elseif ($_SESSION["language"] == "ES") echo "Estudiantes"; ?></span>
                      </div>
                    </div>
                    <div class="portlet-body">
                      <div class="clearfix">
                        <a href="students_list.php" class="btn btn-circle green btn-lg">
                          <?php if ($_SESSION["language"] == "EN") echo "List of students";
                          elseif ($_SESSION["language"] == "ES") echo "Lista de estudiantes"; ?>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- END PAGE CONTENT INNER -->
              </div>
            </div>
            <!-- END PAGE CONTENT BODY -->
            <!-- END CONTENT BODY -->
          </div>
          <!-- END CONTENT -->
          <!-- BEGIN QUICK SIDEBAR -->

          <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
      </div>
    </div>
    <div class="page-wrapper-row">
      <div class="page-wrapper-bottom">
        <!-- BEGIN FOOTER -->
        <!-- BEGIN PRE-FOOTER -->

        <!-- END PRE-FOOTER -->
        <!-- BEGIN INNER FOOTER -->
        <div class="page-footer">
          <div class="container-fluid"> 2016 &copy; Metronic Theme By
            <a target="_blank" href="http://keenthemes.com">Keenthemes</a> &nbsp;|&nbsp;
            <a href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" title="Purchase Metronic just for 27$ and get lifetime updates for free" target="_blank">Purchase Metronic!</a>
          </div>
        </div>
        <div class="scroll-to-top">
          <i class="icon-arrow-up"></i>
        </div>
        <!-- END INNER FOOTER -->
        <!-- END FOOTER -->
      </div>
    </div>
  </div>
  <!-- BEGIN QUICK NAV -->
  <!--
  <nav class="quick-nav">
    <a class="quick-nav-trigger" href="#0"><span aria-hidden="true"></span></a>
    <ul>
      <li>
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">
          <span>Purchase Metronic</span><i class="icon-basket"></i>
        </a>
      </li>
      <li>
        <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">
          <span>Customer Reviews</span><i class="icon-users"></i>
        </a>
      </li>
      <li>
        <a href="http://keenthemes.com/showcast/" target="_blank">
          <span>Showcase</span><i class="icon-user"></i>
        </a>
      </li>
      <li>
        <a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">
          <span>Changelog</span><i class="icon-graph"></i>
        </a>
      </li>
    </ul>
    <span aria-hidden="true" class="quick-nav-bg"></span>
  </nav>
  <div class="quick-nav-overlay"></div>
  -->
  <!-- END QUICK NAV -->
  <!--[if lt IE 9]>
  <script src="../assets/global/plugins/respond.min.js"></script>
  <script src="../assets/global/plugins/excanvas.min.js"></script>
  <script src="../assets/global/plugins/ie8.fix.min.js"></script>
  <![endif]-->
  <!-- BEGIN CORE PLUGINS -->
  <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN THEME GLOBAL SCRIPTS -->
  <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
  <!-- END THEME GLOBAL SCRIPTS -->
  <!-- BEGIN THEME LAYOUT SCRIPTS -->
  <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
  <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
  <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
  <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
  <!-- END THEME LAYOUT SCRIPTS -->
  <script>
    $(document).ready(function() {
      $('#clickmewow').click(function() {
        $('#radio1003').attr('checked', 'checked');
      });
    })
  </script>
</body>

</html>