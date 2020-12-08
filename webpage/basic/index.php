<?php
session_start();
if (isset($_SESSION["language"])) $language = $_SESSION["language"];
else $language = "ES";
$_SESSION["password"] = 0;
$_SESSION["username"] = "";
$_SESSION["language"] = $language;
//Decides LANGUAGE
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
  <title>QualityLife - LogIn</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Page of Project LogIn " name="description" />
  <meta content="Project LogIn" name="author" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <link href="../assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
  <link href="../assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL STYLES -->
  <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
  <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
  <!-- END THEME GLOBAL STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link href="../assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME LAYOUT STYLES -->
  <!-- END THEME LAYOUT STYLES -->
  <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class=" login">
  <!-- BEGIN LOGO -->
  <div class="logo">
    <a href="index.php"><img src="../images/QualityLife_logo.png" width=360px alt="" /> </a>
  </div>
  <!-- END LOGO -->
  <!-- BEGIN LOGIN -->
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
    <!-- BEGIN LANGUAGE DROPDOWN -->
    <div class="btn-group" style="margin-left:55px;">
      <button class="btn btn-circle red btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
        <?php
        if ($_SESSION["language"] == "EN") echo "Language";
        elseif ($_SESSION["language"] == "ES") echo "Idioma";
        ?>
        <i class="fa fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu" role="menu">
        <li style="margin:15px;">
          <form method="POST" id="EN">
            <input type="hidden" name="EN" />
            <a href="javascript:{}" onclick="document.getElementById('EN').submit(); return false;"><i class="fa fa-language"></i> English</a>
          </form>
        </li>
        <li style="margin:15px;">
          <form method="POST" id="ES">
            <input type="hidden" name="ES" />
            <a href="javascript:{}" onclick="document.getElementById('ES').submit(); return false;"><i class="fa fa-language"></i> Español</a>
          </form>
        </li>
      </ul>
    </div>
    <!-- END LANGUAGE DROPDOWN -->
    <form id="buttonLogin" class="login-form" action="index.php" method="post">
      <h3 class="form-title">
        <?php
        if ($_SESSION["language"] == "EN") echo "Login to your account";
        elseif ($_SESSION["language"] == "ES") echo "Entrar en su cuenta";
        ?>
      </h3>
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>
          <?php
          if ($_SESSION["language"] == "EN") echo "Enter any username and password.";
          elseif ($_SESSION["language"] == "ES") echo "Escriba nombre de usuario y contraseña";
          ?>
        </span>
      </div>
      <?php

      if ($_POST["login"] == true) {
        //Connects to DDBB WakeTeam
        include_once "functions.php";
        $db = "WakeTeam";
        $conn = connect_db($db);

        //Retrieve entered values
        $username = $_POST["username"];
        $password = $_POST["password"];

        //Do a query to know if username exists
        $query = "SELECT username, password FROM admin WHERE username='$username' ";
        $result = pg_query($conn, $query);

        //Converts query result into array
        $table = array();
        $table = pg_fetch_assoc($result);

        if (count($table) == 0) {
          if ($_SESSION["language"] == "EN") {
            echo '<div class="alert alert-danger">';
            echo '<button class="close" data-close="alert"></button>';
            echo '<strong>Error!</strong> Incorrect username!';
            echo '</div>';
          } elseif ($_SESSION["language"] == "ES") {
            echo '<div class="alert alert-danger">';
            echo '<button class="close" data-close="alert"></button>';
            echo "<strong>Error!</strong> Usuario incorrecto!";
            echo '</div>';
          }
        } else {
          if ($password == $table["password"]) {
            $_SESSION["password"] = 1;
            $_SESSION["username"] = $username;
            echo '<script type="text/javascript">window.location = "main.php"</script>';
          } else {
            if ($_SESSION["language"] == "EN") {
              echo '<div class="alert alert-danger">';
              echo '<button class="close" data-close="alert"></button>';
              echo '<strong>Error!</strong> Incorrect password!';
              echo '</div>';
            } elseif ($_SESSION["language"] == "ES") {
              echo '<div class="alert alert-danger">';
              echo '<button class="close" data-close="alert"></button>';
              echo '<strong>Error!</strong> Contraseña incorrecta!';
              echo '</div>';
            }
          }
        }
        //Close connection to ddbb
        pg_close($conn);
      }
      ?>
      <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">
          <?php
          if ($_SESSION["language"] == "EN") echo "Username";
          elseif ($_SESSION["language"] == "ES") echo "Usuario";
          ?>
        </label>
        <div class="input-icon">
          <i class="fa fa-user"></i>
          <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="<?php if ($_SESSION['language'] == 'EN') echo 'Username';
                                                                                                      elseif ($_SESSION['language'] == 'ES') echo 'Usuario'; ?>" name="username" />
        </div>
      </div>
      <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">
          <?php
          if ($_SESSION["language"] == "EN") echo "Password";
          elseif ($_SESSION["language"] == "ES") echo "Contraseña";
          ?>
        </label>
        <div class="input-icon">
          <i class="fa fa-lock"></i>
          <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder='<?php if ($_SESSION["language"] == "EN") echo "Password";
                                                                                                          elseif ($_SESSION["language"] == "ES") echo "Contraseña"; ?>' name="password" />
        </div>
      </div>
      <div class="form-actions">
        <label class="rememberme mt-checkbox mt-checkbox-outline">
          <input type="checkbox" name="remember" value="1" /><?php if ($_SESSION["language"] == "EN") echo "Remember me ";
                                                              elseif ($_SESSION["language"] == "ES") echo "Recordarme"; ?>
          <span></span>
        </label>
        <button type="submit" class="btn green pull-right" name="login" value="true" id=submit>
          <?php
          if ($_SESSION["language"] == "EN") echo "Login";
          elseif ($_SESSION["language"] == "ES") echo "Entrar";
          ?>
        </button>
      </div>
      <div class="forget-password">
        <h4>
          <?php
          if ($_SESSION["language"] == "EN") echo "Forgot your password ?";
          elseif ($_SESSION["language"] == "ES") echo "¿Ha olvidado su contraseña?";
          ?>
        </h4>
        <p><?php if ($_SESSION["language"] == "EN") echo "no worries, click ";
            elseif ($_SESSION["language"] == "ES") echo "pusle"; ?>
          <a href="javascript:;" id="forget-password"><?php if ($_SESSION["language"] == "EN") echo "here ";
                                                      elseif ($_SESSION["language"] == "ES") echo "aquí "; ?> </a>
          <?php if ($_SESSION["language"] == "EN") echo "to see the web admin mail.";
          elseif ($_SESSION["language"] == "ES") echo "para ver el correo del administrador de la plataforma"; ?>
        </p>
      </div>
    </form>

    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="index.php" method="POST">
      <h3>
        <?php
        if ($_SESSION["language"] == "EN") echo "Forgot your password ?";
        elseif ($_SESSION["language"] == "ES") echo "¿Ha olvidado su contraseña?";
        ?>
      </h3>
      <p>
        <?php
        if ($_SESSION["language"] == "EN") echo "Send an e-mail to the web admin to reset your password.";
        elseif ($_SESSION["language"] == "ES") echo "Envía un correo electrónico al administrador para restablecer su contraseña";
        ?>
      </p>
      <div class="form-group">
        <div class="input-icon">
          <i class="fa fa-envelope"></i>
          <div class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email">
            admin@wake.org
          </div>
        </div>
      </div>
      <div class="form-actions">
        <button type="button" id="back-btn" class="btn red btn-outline">
          <?php
          if ($_SESSION["language"] == "EN") echo "Back";
          elseif ($_SESSION["language"] == "ES") echo "Atrás";
          ?>
        </button>
      </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

    <!-- END REGISTRATION FORM -->
  </div>
  <!-- END LOGIN -->
  <!-- BEGIN COPYRIGHT -->
  <div class="copyright"> 2014 &copy; Metronic - Admin Dashboard Template. </div>
  <!-- END COPYRIGHT -->
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
  <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
  <script src="../assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN THEME GLOBAL SCRIPTS -->
  <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
  <!-- END THEME GLOBAL SCRIPTS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="../assets/pages/scripts/login-4.min.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL SCRIPTS -->
  <!-- BEGIN THEME LAYOUT SCRIPTS -->
  <!-- END THEME LAYOUT SCRIPTS -->
  <script>
    $(document).ready(function() {
      $('#clickmewow').click(function() {
        $('#radio1003').attr('checked', 'checked');
      });
    })
    $(document).keypress(function(e) {
      if (e.which == 13) {
        $("#submit").click();
      }
    });
  </script>
</body>

</html>