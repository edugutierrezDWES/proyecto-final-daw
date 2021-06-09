<div class="wrap wrap1">
    <div class="container">
        <!-- maincontent-->
        <!--title  -->
        <div class="row">
            <h2>Editar Datos de Usuario<em class="bi-grip-horizontal mar_l4"></em></h2>
        </div>
        <div class="container main_container mar_0_-15">
            <form method="post" action="/cliente/editar/<?php echo $id; ?>" class="needs-validation" novalidate>
                <div class="form-row">
                    <div class="text-secondary mb-2" style="font-size: 0.7rem;">
                        * Datos se actualizaran cuando se reinicie la sesión.
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" readonly value="<?php echo $email; ?>" autocomplete="email">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $nombre; ?>" pattern="^[a-zA-ZÁÉÍÓÚáéíóúñ][a-zA-ZÁÉÍÓÚáéíóúñüªº\-\.\s]+[a-zA-ZÁÉÍÓÚáéíóúñ\.]$">
                        <div class="invalid-feedback">
                            Introduce nombre(s) válido(s).
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos; ?>" pattern="^[a-zA-ZÁÉÍÓÚáéíóúñ][a-zA-ZÁÉÍÓÚáéíóúñüªº\-\.\s]+[a-zA-ZÁÉÍÓÚáéíóúñ\.]$">
                        <div class="invalid-feedback">
                            Introduce apellido(s) válido(s).
                        </div>
                    </div>
                </div>

                <hr>
                <div class="text-secondary mb-2" style="font-size: 0.7rem;">
                    * Datos solo necesarios si se va a actualizar la contraseña, para los demás campos dejarlo en blanco.
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contraseña actual">Contraseña Actual</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña Actual" autocomplete="current-password">
                    </div>

                    <div class="form-group">
                        <label for="cambiar contraseña">Cambiar Contraseña
                        </label>
                        <input type="password" class="form-control" placeholder="Nueva Contraseña" name="newpass" id="changedpass" autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="confirmar contraseña">Confirmar Contraseña</label>
                        <input type="password" class="form-control" placeholder="Confirmar Nueva Contraseña" name="confirmpass" id="confirmpass" autocomplete="new-password">

                    </div>
                </div>

                <button type="submit" class="btn btn_orange bt_login">Editar</button>
            </form>
        </div>
    </div>
    <script src="/js/bootstrap-form-validation.js"></script>
</div>