<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/paciente.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$paciente = new Paciente($db);
 
// query products
$stmt = $paciente->read();
//print_r($stmt);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $paciente_arr=array();
    $paciente_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $paciente_item=array(
           "hiscli" => $hiscli,
            "apenom" => $apenom,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "nombreelegido" => $nombreelegido,
            "tipdoc" => $tipdoc,
            "numdoc" => $numdoc,
            "fecnacimiento" => $fecnacimiento,
            "localidadnac" => $localidadnac,
            "partidonac" => $partidonac,
            "provincianac" => $provincianac,
            "paisnac" => $paisnac,
            "nacionalidad" => $nacionalidad,
            "sexo" => $sexo,
            "direccion" => $direccion,
            "codcalle" => $codcalle,
            "nrocalle" => $nrocalle,
            "barrio" => $barrio,
            "cuerpo" => $cuerpo,
            "depto" => $depto,
            "codlocalidad" => $codlocalidad,
            "codprovincia" => $codprovincia,
            "telefono" => $telefono,
            "email"=> $email,
            "codobrasoc" => $codobrasoc,
            "nroafiliado" => $nroafiliado,
            "apellidomadre" => $apellidomadre,
            "situacionlaboral" => $situacionlaboral,
            "ocupacion" => $ocupacion,
            "apellidofamiliar" =>$apellidofamiliar,
            "telefonofamiliar" =>$telefonofamiliar,
            "fallecido" => $fallecido
        );
 
        array_push($paciente_arr["records"], $paciente_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show products data in json format
    echo json_encode($paciente_arr);
}
 
else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no products found
    echo json_encode(
        array("message" => "No se encontraron pacientes.")
    );
}