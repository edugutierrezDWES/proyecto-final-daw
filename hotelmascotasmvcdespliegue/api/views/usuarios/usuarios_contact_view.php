<form method="post" action="/mail" id="contact-form">
  <div class="form-row">
    <div class="text-secondary mb-2" style="font-size: 0.8rem;">
      * Datos se actualizaran cuando se reinicie la sesión.
    </div>
  </div>
  <div class="form-row">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" readonly value="<?php echo $email; ?>">
    </div>
    <div class="form-group">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" name="nombre"  placeholder="Nombre" value="<?php echo $nombre; ?>">
    </div>
    <div class="form-group">
      <label for="apellidos">Apellidos</label>
      <input type="text" class="form-control" name="apellidos"  placeholder="Apellidos" value="<?php echo $apellidos; ?>">
    </div>
    <div class="form-group">
      <label for="asunto">Asunto</label>
      <input type="text" class="form-control" name="asunto" placeholder="Asunto" >
    </div>
    <div class="form-row">
      <div class="form-group">
        <label for="comentario">Comentario</label>
        <textarea style="height: 100px;" class="form-control" name="mensaje" rows="7" placeholder="Escribre aquí"></textarea>
      </div>
    </div>
  </div>
  <button type="submit" id="send" name="mail" class="btn btn_orange bt_login">Enviar</button>
</form>
</div>
<script>
  document.getElementById("linkcontacto").classList.add("active")
</script>
<!-- <script
src="https://code.jquery.com/jquery-3.6.0.js"
integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<!-- <script type="text/javascript">
  $(document).ready(function() {
    $("#send").click(function(event) {
      event.preventDefault()
      console.log(event.target)
      let nombre = '<?php echo $nombre;?>'
      Swal.fire(
      'Enviado!',
      `Tu correo se ha enviado correctamente <strong>${nombre}</strong>`,
      'success')

      setTimeout(() => {
         $("#contact-form").submit()
      }, 3000);
    });
  });
</script> -->