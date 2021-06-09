
  
 
       <!--  <?php
                if($error_Mensaje != ""){
                    echo "<div class='alert alert-danger form-group ' role='alert'>";
                    echo $error_Mensaje;
                    echo "</div>";
                }
            ?> -->
    <table id="tabla_RS" class="display nowrap" style="width:100%">
        <thead class="" >
            <tr>
                <th>RS</th>
                <th>Email</th>
                <th>Tipo RS</th>
                <th>T. Habitacion</th>
                <th>Fech. Inicio</th>
                <th>Fech. Final</th>
                <th>Precio Total</th>
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
                foreach ($arrayReservasHistorial as $fila => $reserva) {
                        $claseEstado = $reserva['estado_reserva'];
                        $id_reserva = $reserva['id_reserva'];
                        $email = $reserva['email'];
                        $tipo_reserva = $tipos_reservas[$reserva['tipo_reserva']];
                        $tipo_Hab = $reserva['tipo_Hab'];
                        $date = new DateTime($reserva['fecha_inicio']);
                        $fecha_inicio = $date->format('d/m/Y');
                        $date = new DateTime($reserva['fecha_final']);
                        $fecha_final = $date->format('d/m/Y');
                        $Precio_Total = number_format($reserva['Precio_Total'], 2, ',', ' ');
                    echo "<tr>";
                        
                        echo "<td> <a class='$clase[$claseEstado] w-100' href='/reserva/info/$id_reserva'><i class='bi bi-eye-fill'></i> $claseEstado<a></td>";
                        echo "<td> $email </td>";
                        echo "<td> $tipo_reserva </td>";
                        echo "<td> $tipo_Hab </td>";
                        echo "<td> $fecha_inicio </td>";
                        echo "<td> $fecha_final</td>";
                        echo "<td> $Precio_Total € </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <?php require_once("views/scripts.html")?> 
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


    

