<?php session_start();?>
<?php
require_once("db/db.php");
if(isset($_SESSION) && !empty($_SESSION)) {
  if(isset($_GET["cerrar"]) && $_GET["cerrar"]==true){
      session_start();
      session_unset();
      session_destroy();
      navigateTo("/login");
  } else navigateTo("/home");
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <link href="/css/bootstrap-select.css" rel="stylesheet">
  <link href="/css/bootstrap-icons.css" rel="stylesheet">

  <!-- My CSS -->
  <link href="/css/styles.css" rel="stylesheet">
  <title>Hotel para Mascotas</title>
  <link rel="icon" 
      type="image/png" 
      href="/img/patita.png" />
</head>

<body class="bg_login">
  <div class="container">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 col-lg-4 text-center"><a href="/"><img class="img-responsive" src="/img/logo.png" alt="logo hotelmascotas" /></a>
        <div class="login ">
          <form role="form" method="POST" class="form-horizontal needs-validation" action="/clientes" id="login-form" novalidate>
            <h2 class="mar_b20 ">Iniciar Sesión</h2>
            <div class="form-group">

              <div hidden class="alert alert-danger row form-group" id="error-alert" role="alert">
                <h5 class="alert-heading">Ha ocurrido un error!</h5>
                <p style="text-align: justify;">Comprueba que este email está registrado y que la contraseña es la correcta.</p>
              </div>


              <div class="row form-group">
                <div class="col-sm-2 ">
                  <label for="Email" class="control-label"><i class="bi bi-person-fill font_26"></i> </label>
                </div>
                <div class="col-sm-10">
                  <input type="email" placeholder="Email" value="" name="email" id="email" class="form-control form-control-login" required
                  pattern="^[a-zA-z][a-zA-z_\.\-0-9\S]+@[a-zA-z\.\S]+.[a-zA-z]{2,4}$">
                  <div class="invalid-feedback" style="text-align: left;">
                       Introduce un email válido.
                  </div>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-sm-2 ">
                  <label for="Contraseña" class="col-xs-2 control-label"><i class="bi bi-unlock-fill font_26"></i></label>
                </div>
                <div class="col-sm-10">
                  <input type="password" placeholder="Contraseña" name="pass" class="form-control form-control-login"
                  required pattern="^[a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S][a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S]{2,60}[a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S]$">
                  <div class="invalid-feedback" style="text-align: left;">
                        Introduce una contraseña válido.
                    </div>
                </div>
              </div>

              <input type="text" hidden name="login" value="login" />

              <div class="text-center form-group ">
                <input type="submit" id="login" class="btn btn_orange bt_login col-12"value="Iniciar Sesión"/>
              </div>
            </div>
            <div class="form-group">
              <div class="mar_t10 text-center">
                <form role="form" method="post" novalidate>
                  <a class="color_white font_16" href="register">¿No tienes una cuenta? Regístrate</a>
                </form>
              </div>
            </div>
            <div class="form-group">
              <div class=" text-center"> <a data-toggle="modal" role="button" href="#modal" class="color_white font_12">Términos, condiciones de uso y políticas de privacidad</a> </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!--ventana modal Terms-->
  <div class="modal fade" id="modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog width_600">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Términos, condiciones de uso y políticas de privacidad </h3>
          <a href="#" title="Close modal window" class="close" data-dismiss="modal" aria-hidden="true"> <i class="bi bi-x-circle"></i></a>
        </div>
        <div class="modal-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="dotted">Terms</h3>
              <label>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</label>
              <h3 class="dotted">Conditions of use</h3>
              <label>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</label>
              <h3 class="dotted">Privacy policy</h3>
              <label>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</label>
            </div>
          </div>
        </div>
      </div>

      <?php
      if (isset($_GET["login"]) && $_GET["login"] == "false") {

        echo '<script>
        document.getElementById("login-form").classList.add("was-validated")      
              </script>';
      }
      ?>

      <!--fin ventana modal-->

      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="/js/jquery-3.6.0.min.js"></script>
      <script src="/js/bootstrap.bundle.min.js"></script>
      <script src="/js/bootstrap-select.js"></script>
      <script>
      document.addEventListener("keydown", e => {
        if (e.key === 'Enter') {
            document.getElementById("login-form").submit()
          }
    })
      </script>
      <script src="/js/bootstrap-form-validation.js"></script>
</body>

</html>