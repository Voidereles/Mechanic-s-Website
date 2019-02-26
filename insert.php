<?php  

//insert.php

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
 ':etap'  => $form_data->etap
);

$query = "
 INSERT INTO naprawy 
 (idk, idn, tel, car, opisU, opisN, koszt, etap) VALUES 
 (:idk, :idn, :tel, :car, :opisU, :opisN, :koszt, :etap)
";

$statement = $connect->prepare($query);

if($statement->execute($data))
{
 $message = 'Dane zostały dodane';
}

$output = array(
 'message' => $message
);

echo json_encode($output);

?>