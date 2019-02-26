<?php  

//edit.php

include('database_connection.php');

$message = '';

$form_data = json_decode(file_get_contents("php://input"));

$data = array(
 ':idk'  => $form_data->idk,
 ':idn'  => $form_data->idn,
 ':tel'  => $form_data->tel,
 ':car'  => $form_data->car,
 ':opisU'  => $form_data->opisU,
 ':opisN'  => $form_data->opisN,
 ':koszt'  => $form_data->koszt,
 ':etap'  => $form_data->etap,
 ':id'  => $form_data->id

);

$query = "
 UPDATE naprawy
 SET idk = :idk, idn = :idn, tel = :tel, car = :car, opisU = :opisU, opisN = :opisN, koszt = :koszt, etap = :etap, id = :id 
 WHERE id = :id
";

$statement = $connect->prepare($query);
if($statement->execute($data))
{
 $message = 'Dane zostały zedytowane';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>