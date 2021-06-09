<br><br><br>
<div class="container mt-5">
    <div class="card text-dark bg-light scroll mt-5">
        <div class="card-body">
            <h2 class="card-title">Editar una mascota</h2><br>


            <form method="POST" class="needs-validation" action="/mascota/editar/<?php echo $id_mascota; ?>" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" pattern="^[a-zA-Záéíóúñ][a-zA-Záéíóúñüªº\-\.\s]+[a-zA-Záéíóúñ\.]$" name="nombre" id="nombre" value="<?php echo $mascota["nombre"]; ?>" aria-describedby="nombre" required placeholder="Nombre...">
                    <div class="invalid-feedback">
                       Introduce nombre(s) válido(s).
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="raza">Raza</label>
                    <input type="text" class="form-control" name="raza" required id="raza" value="<?php echo $mascota["raza"]; ?>" placeholder="Raza..." pattern="^[a-zA-Záéíóúñ][a-zA-Záéíóúñüªº\-\.\s]+[a-zA-Záéíóúñ\.]$">
                    <div class="invalid-feedback">
                        Introduce un nombre de raza válida.
                    </div>
                </div><br>
                <div class="form-floating">
                    <textarea style="height: 160px;" class="form-control" name="descripcion" placeholder="Introduce una breve descripción..." id="descripcion"><?php echo $mascota["descripcion"]; ?></textarea>
                    <label for="descripcion">Descripción</label>
                    <div class="invalid-feedback">
                      Introduce una descripción válida.
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select class="form-control" id="tipo" name="tipo">
                        <option value="perro">Perro 🐶</option>
                        <option value="gato">Gato 🐱</option>
                    </select>
                </div>

                <br><br>
                <button id="register" class="btn btn-primary">Editar Mascota</button>
                <a href="../home/mascotas" class="btn btn-danger cancelar">Concelar</a>
            </form>

        </div>
    </div>
    <script src="/js/bootstrap-form-validation.js"></script>
</div>