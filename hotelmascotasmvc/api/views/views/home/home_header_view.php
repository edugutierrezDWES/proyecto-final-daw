<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="/hotelmascotasmvc/css/bootstrap-icons.css" rel="stylesheet">
    <link href="/hotelmascotasmvc/css/tables.css" rel="stylesheet">

    <!-- DATATABLE -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css">
    <!-- fin DATATABLE -->

    <!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- fin ICONS -->

    <!-- DATAPICKER -->
    <link rel="stylesheet" href="/hotelmascotasmvc/css/bootstrap-datepicker.min.css">
    <!-- fin DATAPICKER -->

    <!-- SELECT -->
    <link rel="stylesheet" href="/hotelmascotasmvc/css/bootstrap-select.css">
    <link href="/hotelmascotasmvc/css/styles.css" rel="stylesheet">

    <title>Hotel para mascotas</title>

    <link rel="icon" type="image/png" href="/hotelmascotasmvc/img/patita.png" />

</head>

<body>
    <div class="container-fluid header_fixed" >
        <div class="header container">
            <div class="row ">
                <div class="col-sm-9 pad0">
                    <!-- <div class="fleft"><a href="home.html"><img class="img-fluid" src="img/logo.png" alt="Logo SCAPR"/> </a></div> -->
                    <div class="ipn-title fleft">
                        <h1 clas="ipn-title"><a href="/hotelmascotasmvc/home/mascotas">Bienvenido, <?php echo $nombre . " " . $apellidos; ?></a></h1>
                    </div>
                </div>
                <!-- dropdown admin -->
                <div class="col-sm-3 text-right"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"><?php echo $nombre . " " . $apellidos; ?></a>
                    <ul class="dropdown-menu dropdown-menu-right admin_user" style="margin-top:-30px;" aria-labelledby="dropdownMenuLink">
                        <li><span>Email:</span><?php echo $email; ?></li>
                        <li><span>Usuario Desde:</span><?php echo $fecha_alta; ?></li>
                        <li><a class="dropdown-item" href="/hotelmascotasmvc/home/editar"><i class="bi bi-unlock-fill mar_r4"></i>Cambiar Datos</a>
                        <li><a class="dropdown-item" href="/hotelmascotasmvc/logout"><i class="bi bi-power mar_r4 color_orange"></i>Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>