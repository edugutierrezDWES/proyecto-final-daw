<div class="wrap wrap1">
    <div class="container bg-white p-4">
        <?php
        $claseBtn = [
    
            "en progreso" => "btn btn-success",
            "finalizado" => "btn btn-info",
            "abandonado" => "btn btn-danger",
            "cancelado" => "btn btn-warning"
        ];
        $posiblesCambios = [
            "en espera" => ["cancelado", "abandonado", "en progreso"],
            "en progreso" => ["finalizado", "abandonado"],
        ];
        $cambiosPermisos = [
    
            "en progreso" => ["admin"],
            "finalizado" => ["admin"],
            "abandonado" => ["admin"],
            "cancelado" => ["admin", "cliente"]
        ];

        echo "<div class='container row justify-content-md-center pb-3'>";
        foreach ($arrayReserva as $fila => $reserva) {
            $estadoReserva = $reserva['estado_reserva'];
            $hoy = date("Y-m-d");
            $fecha_Fin = date($reserva['fecha_final']);
            if (array_key_exists($estadoReserva, $posiblesCambios)) {
                foreach ($posiblesCambios[$estadoReserva] as $key => $cambio) {
               
                    if (in_array($rol_usuario, $cambiosPermisos[$cambio]) && !($cambio == "finalizado" && $hoy < $fecha_Fin)){
                        $rs_get = $_GET['RS'];
                        $actionGet = '/hotelmascotasmvc/api/booking.php?newStatus='.$cambio.'&RSupdate='.$id_reserva;
                            echo "<div class='col-md-auto'>";
                            echo "<a name='btn-Estado' href='$actionGet' class='$claseBtn[$cambio] btn-Estado'>$cambio</a>";
                            echo "</div>"; 

                    }
                }
            }
        }
        echo "</div>";

        ?>

        <table id="tabla_RS" class="display nowrap" style="width:100%">
            <thead class="">
                <tr>
                    <th>RS</th>
                    <th>Email</th>
                    <th>Mascota/s</th>
                    <th>Precio Total</th>
                    <th>Tipo RS</th>
                    <th>T. Habitacion</th>
                    <th>Habitacion</th>
                    <th>Fech. Inicio</th>
                    <th>Fech. Final</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $claseIconSVG_Mascota = [
                    "perro" => "fas fa-dog",
                    "gato" => "fas fa-cat",
                ];
                $claseText = [
                    "en espera" => " text-secondary",
                    "en progreso" => " text-success",
                    "finalizado" => " text-info",
                    "abandonado" => " text-danger",
                    "cancelado" => " text-warning"
                ];
                $tipos_reservas = [
                    "normal" => "Normal",
                    "vip" => "VIP",
                    "supervip" => "Super VIP",
                ];

                foreach ($arrayReserva as $fila => $reserva) {
                    $claseEstado = $reserva['estado_reserva'];
                    $id_reserva = $reserva['id_reserva'];
                    $email = $reserva['email'];
                    $tipo_reserva = $tipos_reservas[$reserva['tipo_reserva']];
                    $tipo_Hab = $reserva['tipo_Hab'];
                    $habitacion = $reserva['habitacion'];
                    $date = new DateTime($reserva['fecha_inicio']);
                    $fecha_inicio = $date->format('d/m/Y');
                    $date = new DateTime($reserva['fecha_final']);
                    $fecha_final = $date->format('d/m/Y');
                    $Precio_Total = number_format($reserva['Precio_Total'], 2, ',', ' ');
                    echo "<tr>";

                    echo "<td class='$claseText[$claseEstado]'> $claseEstado</td>";
                    echo "<td> $email </td>";
                    echo "<td>";
                    echo "<table class='display table table-striped table-bordered'><tbody>";
                    foreach ($arrayMascotasReserva as $FilaMascota => $arrayMascota) {
                        $nombre_mascota = $arrayMascota['nombre'];
                        $id_mascota = $arrayMascota['id_mascota'];
                        $tipo_mascota = $arrayMascota['tipo'];
                        echo "<tr>";
                        echo "<td><i class='$claseIconSVG_Mascota[$tipo_mascota]'></i> $nombre_mascota</a> </td>";
                        echo "</tr>";
                    }
                    echo "</tbody></table>";
                    echo "</td>";
                    echo "<td> $Precio_Total € </td>";
                    echo "<td> $tipo_reserva </td>";
                    echo "<td> $tipo_Hab </td>";
                    echo "<td> $habitacion </td>";
                    echo "<td> $fecha_inicio </td>";
                    echo "<td> $fecha_final</td>";

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once("views/scripts.html") ?>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#tabla_RS').DataTable({
            dom: "t",
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
            },
            responsive: true
        });
        $(".btn-Estado").click(function(event) {
            event.preventDefault()
            event.stopPropagation()
            let actionGet = this.href;
            Swal.fire({
                title: 'Estás seguro?',
                text: `Estás a punto de cancelar una reserva!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cancelar!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href=actionGet
                }
            })
        });
    });
</script>