<!-- <table id="tabla_mascotas" class="table display nowrap"style="width:100%">
          <thead>
            <tr role="row" class="even">
              <th>Nombre</th>
              <th >Raza</th>
              <th >Descripción</th>
              <th>Tipo</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (count($mascotas) == 0 || $mascotas === null) { ?>

              <div class="alert alert-danger row form-group" id="error-alert" role="alert">
                <h5 class="alert-heading">No tienes mascotas registradas!</h5>
                <p style="text-align: justify;">Comprueba que has dado de alta alguna mascota o si no inténtalo otra vez.</p>
              </div>
              <?php
            } else {

              foreach ($mascotas as $mascota) { ?>

                <tr>
                  <td><?php echo $mascota["nombre"]; ?></td>
                  <td><?php echo $mascota["raza"]; ?></td>
                  <td><?php echo $mascota["descripcion"]; ?></td>
                  <td><?php
                      if ($mascota["tipo"] == "perro") echo "Perro 🐶";
                      else echo "Gato 🐱"; ?></td>
                  <td><a href="/mascota/form/editar/<?php echo $mascota["id_mascota"]; ?>" class="btn btn_orange bt_login edit">Editar</a>
                    <a id="delete" href="/mascota/eliminar/<?php echo $mascota["id_mascota"]; ?>" class="btn btn_red delete">Borrar</a>
                  </td>
                </tr>

            <?php
              }
            }
            ?>
          </tbody>
        </table>
      </div>
      <?php require_once("views/scripts.html")?> 
      <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.moment('DD/MM/YYYY');
            $('#tabla_mascotas').DataTable( {
                "language":{
                    "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
                    searchPlaceholder: "en toda la tabla"
                },
                responsive: true,
                "pagingType": "full_numbers"
            } );
        });

    </script>
      <script>
        document.getElementById("linkmascotas").classList.add("active")

        document.querySelectorAll(".delete").forEach(eliminar => {

           eliminar.addEventListener("click", (e) => {
            e.preventDefault()
            e.stopPropagation()
            let id_mascota = eliminar.href
            Swal.fire({
              title: 'Estás seguro?',
              text: `Estás a punto de eliminar una mascota!`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Eliminado!',
                  'Se ha eliminado la mascota',
                  'success'
                )
                 setTimeout(() => {
                  window.location.href = `/mascota/eliminar/${id_mascota}`
                }, 2000); 
                console.log("Se va a eliminar: ", id_mascota)

              }
            })
          })
        })

      </script> -->



  
 
       <!--  <?php
                if($error_Mensaje != ""){
                    echo "<div class='alert alert-danger form-group ' role='alert'>";
                    echo $error_Mensaje;
                    echo "</div>";
                }
            ?> -->
    <table id="tabla_RS" class="display nowrap" style="width:100%;">
        <thead class="" >
            <tr>
                <th>Nombre</th>
                <th>Raza</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $clase = [
                    "en espera" => "btn btn-secondary",
                    "en progreso" => "btn btn-success",
                    "finalizado" => "btn btn-info",
                    "abandonado" => "btn btn-danger",
                    "cancelado" => "btn btn-warning"
                ];
                $tipos_reservas = [
                    "normal" => "Normal",
                    "vip" => "VIP",
                    "supervip" => "Super VIP",
                ];
                foreach ($mascotas as $fila => $mascota) {
                        $id_mascosta = $mascota['id_mascota'];
                        $nombre = $mascota['nombre'];
                        $raza = $mascota['raza'];
                        $descr = $mascota['descripcion'];
                        $tipo = $mascota['tipo'] == 'perro' ? '🐶' : '🐱';
                    echo "<tr>";
                        
                        echo "<td> $nombre </td>";
                        echo "<td> $raza </td>";
                        echo "<td> <div style='overflow:hidden; max-width:100px; white-space: nowrap; word-break:break-all' data-toggle='tooltip' data-placement='top' title='$descr'>$descr</div> </td>";
                        echo "<td> $tipo </td>";
                        echo "  <td><a href='/mascota/form/editar/$id_mascosta' class='btn btn_orange bt_login edit'>Editar</a>
                        <a id='delete' href='/mascota/eliminar/$id_mascosta' class='btn btn_red delete'>Borrar</a>
                      </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php require("views/scripts.html");?> 
  <script type="text/javascript">
        $(document).ready(function() {
            $.fn.dataTable.moment('DD/MM/YYYY');
            $('#tabla_RS').DataTable( {
                "language":{
                    "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
                    searchPlaceholder: "en toda la tabla"
                },
                responsive: true,
                "pagingType": "full_numbers"
            } );
        });

    </script>
      <script>
        document.getElementById("linkmascotas").classList.add("active")

        document.querySelectorAll(".delete").forEach(eliminar => {

           eliminar.addEventListener("click", (e) => {
            e.preventDefault()
            e.stopPropagation()
            let id_mascota = eliminar.href
            Swal.fire({
              title: 'Estás seguro?',
              text: `Estás a punto de eliminar una mascota!`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, eliminar!'
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  'Eliminado!',
                  'Se ha eliminado la mascota',
                  'success'
                )
                 setTimeout(() => {
                  window.location.href = `/mascota/eliminar/${id_mascota}`
                }, 2000); 
                console.log("Se va a eliminar: ", id_mascota)

              }
            })
          })
        })

      </script>


    


    


     