
<div class="wrap wrap1">
  <div class="container">
    <div class="row">
      <ul class="col nav justify-content-center">
        <li class="nav-item"> <a class="nav-link" id="linkmascotas" href="/home/mascotas">Mascotas</a> </li>
        <li class="nav-item"> <a class="nav-link" id="linkreservas" href="/home/reservas">Reservas</a> </li>
        <li class="nav-item"> <a class="nav-link" id="linkcontacto" href="/home/contacto">Contacto</a> </li>
      </ul>
    </div>

    <div class="container main_container mar_0_-15">
      <p>Este es el panel de control de Hotel de Mascotas. Puedes consultar tus reservas, las mascotas que tienes registradas además de contactarnos para cualquier consulta.</p>
      <div class="row row-cols-2 txt_center">
        <div class="col"><img alt="icono dar de alta mascota" src="/img/ico_list.png"/>&nbsp;&nbsp;<a class="font_26" title="dar de alta una nueva mascota" href="/mascota/form/crear">Añadir una nueva Mascota</a></div>
        <div class="col"><img alt="icon hacer una reserva" src="/img/reserva.png" /><a class="font_26" title="hacer una reserva" href="/reserva/form">Reserva ya!!</a></div>
      </div>
    </div>
    <div id="push"></div>
    <?php
    if (isset($_GET["mascotas"])) {

      require("models/pets_model.php");
      $mascotas = getAllPets($id);
      if($mascotas==null || !$mascotas) $mascotas=[];

    ?>

      <div class="container main_container mar_0_-15">
        <h2>Lista de Mascotas</h2>
        <?php
        require_once("views/pets/pets_data_view.php");
        ?>
       
    <?php
    }

    if (isset($_GET["reservas"])) { ?>

      <div class="container main_container mar_0_-15">
        <h2>Lista de Reservas</h2>
        <?php
        require_once("controllers/booking_data_controller.php")
        ?>
      </div>
      </div>
      <script>
        document.getElementById("linkreservas").classList.add("active")
      </script>
    <?php
    }

    if (isset($_GET["contacto"])) { ?>

      <div class="container main_container mar_0_-15">
      <h2>Contacto</h2>

    <?php
    require_once("views/usuarios/usuarios_contact_view.php");
    } ?>
  </div>
</div>