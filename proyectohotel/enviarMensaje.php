<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion , pro.id_cliente , per.nombres , per.apellidos ,per.DNI ,per.Tipo_habitacion , per. Fecha_reserva ,per. hora_ingreso ,per. hora_salida ,per.celular
  FROM promociones pro 
  INNER JOIN cliente per ON per.id = pro.id_cliente
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$cliente = $sentencia->fetch(PDO::FETCH_OBJ);
// hxskxksxkxkaxhkahx
$imagenHotel ="https://www.shutterstock.com/image-illustration/hotel-sign-stars-3d-illustration-260nw-195879770.jpg";

// $image_data = file_get_contents($imagenHotel);
// $image_base64 = base64_encode($image_data);


    $url = 'https://api.green-api.com/waInstance1101816209/SendMessage/  b4bf0fe66780425a840e30483ff62c56037c18ed260c4ee19f';
    $data = [
        "chatId" => "51".$cliente->celular."@c.us",
        "message" => $imagenHotel.' '. 'Nuestro hotel está ubicado en una zona privilegiada de la ciudad de Arequipa, cerca de los principales puntos turísticos y con excelentes vistas al volcán Misti. Sr.(a)  '.strtoupper($cliente->nombres).' '.strtoupper($cliente->apellidos).' '.strtoupper($cliente->DNI).' por estas festividades '.strtoupper($cliente->promocion).' La promoción tienen un limite de '.$cliente->duracion.''
    ];
// jjskdksdksndn
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'content' => json_encode($data),
            'header' =>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
        )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    $response = json_decode($result);
   // header('Location: agregarPromocion.php?codigo='.$persona->id_cliente);
?>