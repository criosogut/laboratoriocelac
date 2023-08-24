<?php

require("class.phpmailer.php");
require("class.smtp.php");

$mail = new PHPMailer();
$mail->isSMTP();

// Activa la condificacción utf-8
$mail->CharSet = 'UTF-8';

//Modificar mail.correo.cl
$mail->Host = "mail.laboratoriocelac.cl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->SMTPSecure = true;

//MODIFICAR CONTACTO@CORREO.CL
//MODIFICAR PASSWORD CORREO CONTACTO@CORREO.CL
$mail->Username = 'contacto@laboratoriocelac.cl';
$mail->Password = 'c2l1c2022@';

//CORREO ELECTRONICO DE:
$mail->From = 'contacto@laboratoriocelac.cl';
//TITULO DEL CORREO A RECIBIR
$mail->FromName = "Laboratorio Celac - Cotización";
//
$mail->AddAddress('contacto@laboratoriocelac.cl', "LabCelac");
//$mail->AddAddress($_POST['email']);
//CON COPIA
//	$mail->addCC('correo_x@gmail.com');
//CON COPIA OCULTA
//	$mail->addBCC('correo_x@hotmail.cl');

$mail->WordWrap = 50;
$mail->IsHTML(true);

//TITULO DEL CORREO A RECIBIR (ASUNTO)
$mail->Subject = "Cotización";
//CUERPO DEL CORREO DESDE EL NOMBRE HASTA EL MENSAJE
$mail->Body    = <<<EOT
Nombre:	{$_POST['name']}<br/>
Correo: {$_POST['email']}<br/>
Teléfono: {$_POST['phone']}<br/>
Rut de la Empresa: {$_POST['rut']}<br/>
Nombre de la Empresa:  {$_POST['nombreempresa']}<br/>
Dirección de la Empresa:  {$_POST['direccionempresa']}<br/>
Nombre de la Obra: {$_POST['nombreobra']}<br/>
Dirección de la Obra: {$_POST['direccionobra']}<br/><br/><br/>
Asunto: {$_POST['subject']}<br/>
Mensaje: {$_POST['message']}<br/>
EOT;


$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);


if(!$mail->Send())

{
   echo "Error al enviar. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
//MENSAJE PARA EL CLIENTE INDICANDO MENSAJE ENVIADO
echo "Mensaje enviado!";


	
?> 
