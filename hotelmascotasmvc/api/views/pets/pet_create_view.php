<style>
    div.title-orange {
    height: 17px;
    width: 8px;
    background-color: #d06503;
    margin-right: 10px;
    display: inline-block;
 }

 .datepicker-dropdown {
     margin-top: 50px;
 }
  body{
    background-image: url('/hotelmascotasmvc/img/fondoform.png');
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }  
  
  .card{
      background-color: transparent;
      border: none;
  }

  .header_fixed, footer{
      opacity: 0.75;
  }

  label{
      color: #ee7244;
      font-weight: 600px;
  }
 </style>




<br><br><br><div class="container mt-5">
<div class="card text-dark scroll mt-5">
            <div class="card-body">
            <div class="title-orange"></div><h2 class="card-title d-inline-block"">Crear una mascota</h2><br>


                <form method="POST" class="needs-validation"  action="/hotelmascotasmvc/mascota/crear" novalidate>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" pattern="^[a-zA-Záéíóúñ][a-zA-Záéíóúñüªº\-\.\s]+[a-zA-Záéíóúñ\.]$" name="nombre" id="nombre"  aria-describedby="nombre" required placeholder="Nombre...">
                    <div class="invalid-feedback">
                       Introduce nombre(s) válido(s).
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="raza">Raza</label>
                    <input type="text" class="form-control" name="raza" required id="raza"  placeholder="Raza..." pattern="^[a-zA-Záéíóúñ][a-zA-Záéíóúñüªº\-\.\s]+[a-zA-Záéíóúñ\.]$">
                    <div class="invalid-feedback">
                        Introduce un nombre de raza válida.
                    </div>
                </div><br>
                <div class="form-floating">
                    <textarea maxlength="250" style="height: 160px;" class="form-control" name="descripcion" placeholder="Introduce una breve descripción..." id="descripcion"></textarea>
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
                </div><br>

    
                    <button id="register" class="btn btn_orange bt_login">Crear Mascota</button>
                    <a href="../home/mascotas" class="btn btn_red delete">Concelar</a>
                </form>

            </div>
        </div>
        <script src="/hotelmascotasmvc/js/bootstrap-form-validation.js"></script>
</div>