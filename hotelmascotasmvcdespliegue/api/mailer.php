<?php session_start();?>
<?php
require_once("db/db.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'config.php';

$mail = new PHPMailer(true);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/styles.css" rel="stylesheet">
    <title>Contacto Email</title>
    <link rel="icon" type="image/png" href="/img/patita.png" />
</head>

<body>
    <?php
    if (isset($_SESSION) && !empty($_SESSION)) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['mail'])) {

                $nombres = $_POST["nombre"].' '.$_POST["apellidos"];
                $asunto = $_POST["asunto"];
                $emailCliente = $_POST["email"];
                $mensaje = $_POST["mensaje"];
    ?>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php
        try {                  
            $mail->isSMTP();                                            
            $mail->Host       = $host;                     
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = $user;                     
            $mail->Password   = $pass;                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;        
            $mail->Port       = 587;                                   
    
            $mail->From = $emailCliente;
            $mail->FromName = $nombres;
            $mail->addAddress($user); 
            $mail->addReplyTo($emailCliente, $nombres);    
            $mail->isHTML(true);                                  
            $mail->Subject = $asunto;
            $mail->Body    = $mensaje;
    
            $mail->send();
            ?>
            <script type="text/javascript">
                let nombres = "<?php echo $nombres; ?>"
                Swal.fire(
                    'Enviado!',
                    `Tu correo se ha enviado correctamente <strong>${nombres}</strong>`,
                    'success')
                setTimeout(() => {
                    window.location.href = "/home/contacto"
                }, 3000);
            </script>
        <?php
        } catch (Exception $e) { ?>
            <script type="text/javascript">
                Swal.fire({
                    icon: 'error',
                    title: 'Vaya...',
                    text: 'Ha habido un error!',
                    footer: '<a href="/home/contacto">Volver al formulario de contacto</a>'
                })
                setTimeout(() => {
                    window.location.href = "/home/contacto"
                }, 5000);
            </script>
        <?php
        }
            }
        } else navigateTo("/home/contacto");
    } else navigateTo("/home/contacto");
    
    ?>

</body>

</html>