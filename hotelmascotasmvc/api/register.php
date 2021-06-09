<?php
require_once("db/db.php");
session_start();
if(isset($_SESSION) && !empty($_SESSION)) {
    header("location: home");
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <!-- <link href="css/bootstrap.css" rel="stylesheet"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="./css/bootstrap-icons.css" rel="stylesheet">

  <!-- My CSS -->
  <link href="./css/styles.css" rel="stylesheet">

  <title>Hotel Mascotas</title>
  <link rel="icon" 
      type="image/png" 
      href="img/patita.png" />
</head>
<style>
  .error-mensaje {

    color: #e43353;
    font-size: smaller;
    text-align: left;
    line-height: 100%;
  }
</style>

<body class="bg_login">
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-6 col-lg-4 text-center"><a href="/hotelmascotasmvc"><img class="img-responsive" src="img/logo.png" alt="logo" /></a>

        <div class="login">
          <form role="form" method="POST" class="form-horizontal needs-validation" id="register-form" action="clientes" novalidate>
            <h2 class="mar_b20 ">Registro</h2>
            <div class="form-group">
              <div class="row form-group">
                <div class="col-sm-2 ">
                  <label for="Nombre" class="control-label"><i class="bi bi-person-fill font_26"></i></label>
                </div>
                <div class="col-sm-10">
                  <input type="text" placeholder="Nombre" id="nombre" name="nombre" class="form-control form-control-login"
                  pattern="^[a-zA-ZÁÉÍÓÚáéíóúñ][a-zA-ZÁÉÍÓÚáéíóúñüªº\-\.\s]+[a-zA-ZÁÉÍÓÚáéíóúñ\.]$" required>
                  <div class="invalid-feedback" style="text-align: left;">
                       Introduce nombre(s) válido(s).
                  </div>
                </div>

              </div>

              <div class="row form-group">
                <div class="col-sm-2 ">
                  <label for="Apellidos" class="col-xs-2 control-label"><i class="bi bi-person-fill font_26"></i></label>
                </div>
                <div class="col-sm-10">
                  <input type="text" placeholder="Apellidos" id="apellidos" name="apellidos" class="form-control form-control-login"
                  pattern="^[a-zA-ZÁÉÍÓÚáéíóúñ][a-zA-ZÁÉÍÓÚáéíóúñüªº\-\.\s]+[a-zA-ZÁÉÍÓÚáéíóúñ\.]$" required>
                  <div class="invalid-feedback" style="text-align: left;">
                        Introduce apellido(s) válido(s).
                    </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-sm-2 ">
                  <label for="Email" class="col-xs-2 control-label"><i class="bi bi-envelope-fill font_26"></i></i></label>
                </div>
                <div class="col-sm-10">
                  <input type="email" placeholder="Email" id="email" name="email" class="form-control form-control-login"
                  pattern="^[a-zA-z][a-zA-z_\.\-0-9\S]+@[a-zA-z\.\S]+.[a-zA-z]{2,4}$" required>
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
                  <input autocomplete type="password" placeholder="Contraseña" id="pass" name="pass" class="form-control form-control-login"
                  required pattern="^[a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S][a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S]{2,60}[a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S]$">
                  <div class="invalid-feedback" style="text-align: left;">
                    Introduce una contraseña válida.
                  </div>
                </div>
              </div>

              <div class="row form-group">
                <div class="col-sm-2 ">
                  <label for="Confirmar Contraseña" class="col-xs-2 control-label"><i class="bi bi-unlock-fill font_26"></i></label>
                </div>
                <div class="col-sm-10">
                  <input autocomplete type="password" placeholder="Confirmar Contraseña" id="confirmpass" name="confirmpass" class="form-control form-control-login"
                  required pattern="^[a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S][a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S]{2,60}[a-záéíóúñA-ZÁÉÍÓÚÑ0-9\S]$">
                  <div class="invalid-feedback" style="text-align: left;">
                    Las contraseñas no coinciden o no es válida.
                  </div>
                </div>
              </div><br>
              <div class="text-center form-group">
                <button type="submit" id="btn-registrar" class="btn btn_orange bt_login col-12">Registrar</button>
              </div>
            </div>
            <div class="form-group">
              <div class="mar_t10 text-center">
                <form role="form" method="post" novalidate>
                  <a class="color_white font_16" href="login">¿Ya tienes una cuenta? Iniciar sesión</a>
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
  <div class="modal fade" id="modal" role="dialog" aria-="true">
    <div class="modal-dialog width_600">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="myModalLabel">Términos, condiciones de uso y políticas de privacidad </h3>
          <a href="#" title="Close modal window" class="close" data-dismiss="modal" aria-="true"> <i class="bi bi-x-circle"></i></a>
        </div>
        <div class="modal-body">
          <div class="panel panel-default">
            <div class="panel-body">
              <h3 class="dotted">Términos</h3>
              <label>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</label>
              <h3 class="dotted">Conditions of use</h3>
              <label>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</label>
              <h3 class="dotted">Privacy policy</h3>
              <label>Lorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sitLorem ipsum dolor sit</label>
            </div>
          </div>
        </div>
      </div>

      <!--fin ventana modal-->

      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="./js/jquery-3.6.0.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/bootstrap-select.js"></script>
      <script src="./js/registro.js"></script>
      <script src="js/bootstrap-form-validation.js"></script>
      <script>
      document.addEventListener("keydown", e => {
        if (e.key === 'Enter') {
            document.getElementById("register-form").submit()
          }
    })
      </script>
      <?php
      if (isset($_GET["registered"]) && $_GET["registered"] == "false") {
  
        echo '<script>
         document.getElementById("register-form").classList.add("was-validated")   
              </script>';
        }
      ?>
</body>
</html>