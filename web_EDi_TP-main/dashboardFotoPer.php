<?php
session_start();
$logged = $_SESSION['logged'];

if(!$logged){
  echo "Ingreso no autorizado";
  die();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Mi Tablero de Control</title>
  <meta name="description" content="Admin, Dashboard, Bootstrap, Bootstrap 4, Angular, AngularJS" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="assets/images/logo.png">

  <!-- style -->
  <link rel="stylesheet" href="assets/animate.css/animate.min.css" type="text/css" >
  <link rel="stylesheet" href="assets/glyphicons/glyphicons.css" type="text/css" >
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" type="text/css" >
  <link rel="stylesheet" href="assets/material-design-icons/material-design-icons.css" type="text/css" >

  <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.min.css" type="text/css" >
  <!-- build:css assets/styles/app.min.css -->
  <link rel="stylesheet" href="assets/styles/app.css" type="text/css" >
  <!-- endbuild -->
  <link rel="stylesheet" href="assets/styles/font.css" type="text/css" >
  <link rel="stylesheet" href="styles/stylesMain.css" type="text/css">
</head>
<body>

  <div class="app" id="app">

    <!-- ############ LAYOUT START-->

    <!-- BARRA IZQUIERDA -->
    <!-- aside -->
    <div id="aside" class="app-aside modal nav-dropdown">
      <!-- fluid app aside -->
      <div class="left navside dark dk" data-layout="column">
        <div class="navbar no-radius">
          <!-- brand -->
          <a class="navbar-brand">
            <div ui-include="'assets/images/logo.svg'"></div>
            <img src="assets/images/logo.png" alt="." class="hide">
            <span class="hidden-folded inline">EDi</span>
          </a>
          <!-- / brand -->
        </div>
        <div class="hide-scroll" data-flex>
          <nav class="scroll nav-light">

            <ul class="nav" ui-nav>
              <li class="nav-header hidden-folded">
                <small class="text-muted">Opciones</small>
                <div id="pruebaid">
                  esto es una prueba de css
                </div>
              </li>

              <li>
                <a href="dashboard.php" >
                  <span class="nav-icon">
                    <i class="fa fa-building-o"></i>
                  </span>
                  <span class="nav-text">Principal</span>
                </a>
              </li>

              <li>
                <a href="devices.php" >
                  <span class="nav-icon">
                    <i class="fa fa-cogs"></i>
                  </span>
                  <span class="nav-text">Dispositivos</span>
                </a>
              </li>

              <li>
                <a href="devices.php" >
                  <span class="nav-icon">
                    <i class="fa fa-cogs"></i>
                  </span>
                  <span class="nav-text">Crear Dispositivos</span>
                </a>
              </li>

            </ul>
          </nav>
        </div>
      </div>
    </div>

    <!-- content -->
    <div id="content" class="app-content box-shadow-z0" role="main">
      <div class="app-header white box-shadow">
        <div class="navbar navbar-toggleable-sm flex-row align-items-center">
          <!-- Open side - Naviation on mobile -->
          <a data-toggle="modal" data-target="#aside" class="hidden-lg-up mr-3">
            <i class="material-icons">&#xe5d2;</i>
          </a>
          <!-- / -->

          <!-- Page title - Bind to $state's title -->
          <div class="mb-0 h5 no-wrap" ng-bind="$state.current.data.title" id="pageTitle"></div>

          <!-- navbar collapse -->
          <div class="collapse navbar-collapse" id="collapse">
            <div class="Nombre Usuario">
              <h5>Nombre del usuario de Sesión.....</h5>
            </div>
            <!-- / -->
          </div>
        </div>
      </div>


      <!-- PIE DE PAGINA -->
      <div class="app-footer">
        <div class="p-2 text-xs">
          <div class="pull-right text-muted py-1">
            &copy; Copyright <strong>EDi 2021</strong>
          </div>
        </div>
      </div>

      <div ui-view class="app-body" id="view">
        <!-- SECCION CENTRAL -->
        <div class="padding">

          <!-- ###################### Fila 1 ###################### -->

          <div class="row">

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 1</h4>
                  <div class="" id="divid">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp1">
                      <input id='switchLamp1' class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL1_On"> </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL1_Off"> </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 2</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp2">
                      <input id="switchLamp2" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL2_On"  > </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL2_Off"> </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- ###################### Fila 2 ###################### -->
          <div class="row">

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 3</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp3">
                      <input id="switchLamp3" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL3_On"  > </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL3_Off" > </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 4</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp4">
                      <input id="switchLamp4" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL4_On"> </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL4_Off" > </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- ###################### Fila 3 ###################### -->

          <div class="row">

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 5</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp5">
                      <input id="switchLamp5" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL5_On" > </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL5_Off" > </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 6</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp6">
                      <input id="switchLamp6" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL6_On" > </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL6_Off"> </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- ###################### Fila 4 ###################### -->

          <div class="row">

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 7</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp7">
                      <input id="switchLamp7" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL7_On" > </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL7_Off" > </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xs-12 col-sm-6" >
              <div class="box p-a">
                <div class="form-group row d-flex justify-content-around">
                  <h4 class="col-sm-2 form-control-label d-flex justify-content-center font-weight-bold" >Lámpara 8</h4>
                  <div class="">
                    <div>Off-On</div>
                    <label class="ui-switch ui-switch-md info m-t-xs labelSw" id="labelSwLamp8">
                      <input id="switchLamp8" class="inputSwitch" type="checkbox"  > <!-- Interruptor led1 de nuestro dashboard -->
                      <i ></i>
                    </label>
                  </div>
                  <div class="d-flex justify-content-around h-10 d-inline-block" >
                    <div class="col-sm-5 w-21 p-3" >
                      <div> Time On </div>
                      <select class="insert-hours-list" id="listTimesL8_On" > </select>
                    </div>
                    <div class="col-sm-5 w-21 p-3">
                      <div> Time Off </div>
                      <select class="insert-hours-list" id="listTimesL8_Off" > </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <!-- ###################### Fila 5 ###################### -->

          <div class="row">

            <div class="col-xs-12 col-sm-12">
              <div class="box p-a">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <div class="btn btn-primary btn-lg d-flex justify-content-center" id="botonEnviarId">
                      Enviar parémtros al dispositivo
                    </div>
                    <div class="jorge" id="andres">
                      Esto es un div de prueba
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
</div>
<!-- build:js scripts/app.html.js -->
<!-- jQuery -->
<script src="libs/jquery/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
<script src="libs/jquery/tether/dist/js/tether.min.js"></script>
<script src="libs/jquery/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
<script src="libs/jquery/underscore/underscore-min.js"></script>
<script src="libs/jquery/jQuery-Storage-API/jquery.storageapi.min.js"></script>
<script src="libs/jquery/PACE/pace.min.js"></script>

<script src="html/scripts/config.lazyload.js"></script>

<script src="html/scripts/palette.js"></script>
<script src="html/scripts/ui-load.js"></script>
<script src="html/scripts/ui-jp.js"></script>
<script src="html/scripts/ui-include.js"></script>
<script src="html/scripts/ui-device.js"></script>
<script src="html/scripts/ui-form.js"></script>
<script src="html/scripts/ui-nav.js"></script>
<script src="html/scripts/ui-screenfull.js"></script>
<script src="html/scripts/ui-scroll-to.js"></script>
<script src="html/scripts/ui-toggle-class.js"></script>

<script src="html/scripts/app.js"></script>

<!-- ajax -->
<script src="libs/jquery/jquery-pjax/jquery.pjax.js"></script>
<script src="html/scripts/ajax.js"></script>

<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

<!-- listas de configuraciones de horas on/off usando templates y js para limpiar html -->
<script src="scripts/timesList.js" ></script>

<!-- Script de js principal -->
<script src="scripts/main.js" ></script>
<script src="scripts/colorConfirmation.js"></script>

<!-- endbuild -->
</body>
</html> -->
