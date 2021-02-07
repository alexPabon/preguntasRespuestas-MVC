<?php
//El controlador Contact es el enacargado de gestionar el envio de los
//mails
class Contact{
	public function mensaje(){  
                
        if(empty($_POST['email']))
                throw new Exception("Error en el formulario");
                
        $to = DB::escape($_POST['MiEmail']);               //Nombre de la cuenta  a quien escribimos
        $nombre = DB::escape($_POST['nombre']);
        $from = DB::escape($_POST['email']);
        $company= DB::escape($_POST['empresa']);
        $tel= $_POST['tel'];
        $subject = DB::escape($_POST['motivo']);
        $message = DB::escape($_POST['recado']);
        $privacidad = !isset($_POST['acepto'])?1:0;
        
        if($privacidad||empty($to)||empty($nombre)||empty($from)||empty($message))
                die(json_encode("<p class='ErrorEnvio'>Hay campos que no se han llenado.<br>Rellena todos los campos</p>"));                

        $cuerpo ="Nombre: $nombre <br>";
        $cuerpo .="De: $from <br>";
        $cuerpo .="Empresa: $company <br>";
        $cuerpo .="Tel: $tel <br>";
        $cuerpo .="Asunto: $subject";
        $cuerpo .="<hr>";
        $cuerpo .="$message";

                //para el envío en formato HTML
        $headers  = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                //dirección del remitente
        $headers .= "From: <".$from.">\r\n";
                //Una Dirección de respuesta, si queremos que sea distinta que la del remitente
        $headers .= "Reply-To: ".$from."\r\n";
                //Direcciones que recibián copia
        //$headers .= "Cc: ejemplo2@gmail.com\r\n";
                //direcciones que recibirán copia oculta
        //$headers .= "Bcc: ejemplo3@yahoo.com\r\n";            

       echo mail($to,$subject,$cuerpo,$headers)? json_encode("<p class='envioCorrecto'>$to<br> ENVIADO</p>"):json_encode("<p class='ErrorEnvio'>$to <br>NO SE PUDO ENVIAR</p>");        
	}
}