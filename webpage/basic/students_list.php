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
  <title>
    <?php if ($_SESSION["language"] == "EN") echo "QualityLife - Students";
    elseif ($_SESSION["language"] == "ES") echo "QualityLife - Estudiantes"; ?>
  </title>
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
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
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
                <a href="main.php"><img src="../images/QualityLife_logo.png" width=200px><a>
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
                  <li>
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
                        <a href="form.php" class="nav-link">
                          <?php if ($_SESSION["language"] == "EN") echo "Form";
                          elseif ($_SESSION["language"] == "ES") echo "Formulario"; ?>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li aria-haspopup="true" class="active menu-dropdown classic-menu-dropdown">
                    <a href="javascript:;">
                      <?php if ($_SESSION["language"] == "EN") echo "Students";
                      elseif ($_SESSION["language"] == "ES") echo "Estudiantes"; ?><span class="arrow"></span>
                    </a>
                    <ul class="dropdown-menu pull-left">
                      <li aria-haspopup="true" class="active">
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
                  <h1>
                    <?php
                    if ($_SESSION["language"] == "EN") echo "List of students";
                    elseif ($_SESSION["language"] == "ES") echo "Lista de estudiantes";
                    ?>
                  </h1>
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
                  <!-- BEGIN Añadir Código -->
                  <!-- BEGIN EXAMPLE TABLE PORTLET-->
                  <div class="portlet light portlet-fit ">
                    <div class="portlet-title">
                      <div class="caption">
                        <i class="icon-settings font-red"></i>
                        <span class="caption-subject font-red sbold uppercase">
                          <?php
                          if ($_SESSION["language"] == "EN") echo "List of students";
                          elseif ($_SESSION["language"] == "ES") echo "Lista de estudiantes";
                          ?>
                        </span>
                      </div>
                    </div>
                    <div class="portlet-body">
                      <form class="" action="#" id="submit_form" method="post">
                        <!-- BEGIN TABLE TOOLBAR -->

                        <!-- END TABLE TOOLBAR -->
                        <!-- BEBGIN TABLE -->
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                          <thead>
                            <tr>
                              <th width="10%" style="text-align:center;"> id </th>
                              <th width="30%" style="text-align:center;">
                                <?php if ($_SESSION["language"] == "EN") echo "Name";
                                elseif ($_SESSION["language"] == "ES") echo "Nombre"; ?>
                              </th>
                              <th width="10%" style="text-align:center;">
                                <?php if ($_SESSION["language"] == "EN") echo "Age";
                                elseif ($_SESSION["language"] == "ES") echo "Edad"; ?>
                              </th>
                              <th width="30%" style="text-align:center;">Email</th>
                              <th width="20%" style="text-align:center;">
                                <?php if ($_SESSION["language"] == "EN") echo "City";
                                elseif ($_SESSION["language"] == "ES") echo "Ciudad"; ?>
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            include_once "functions.php";
                            $db = "WakeTeam";
                            $conn = connect_db($db);
                            $query = "SELECT student.id, student.name as st_name, student.age, student.email, city.name as c_name FROM student INNER JOIN form ON student.id=form.id_student INNER JOIN city ON city.id=form.id_city";
                            $res = pg_query($conn, $query);
                            //Print student tablbe
                            while ($row = pg_fetch_assoc($res)) {
                              $output = '';
                              $output .= '
                                    <tr>
                                      <td style="text-align:center;">' . $row["id"] . '</td>
                                      <td style="text-align:center;">' . $row["st_name"] . '</td>
                                      <td style="text-align:center;">' . $row["age"] . '</td>
                                      <td style="text-align:center;">' . $row["email"] . '</td>
                                      <td style="text-align:center;">' . $row["c_name"] . '</td>
                                    </tr>
                                  ';
                              echo $output;
                            }
                            //Close ddbb
                            pg_close($conn);
                            ?>
                          </tbody>
                        </table>
                        <!-- END TABLE -->
                      </form>
                    </div>
                  </div>
                  <!-- END EXAMPLE TABLE PORTLET-->
                  <!-- END Añadir Código -->
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
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL SCRIPTS -->
  <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
  <!-- END THEME GLOBAL SCRIPTS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="../assets/pages/scripts/table-datatables-editable.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
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